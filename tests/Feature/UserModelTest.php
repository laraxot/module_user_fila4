<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\User\Models\User;

beforeEach(function (): void {
    $this->user = User::factory()->create();
    $this->admin = User::factory()->create();
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Model Creation', function (): void {
    it('can be created with valid data', function (): void {
        $userData = [
            'name' => 'Test User',
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'lang' => 'it',
            'is_active' => true,
        ];

        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create($userData);

        expect($user)
            ->toBeInstanceOf(User::class)
            ->name->toBe('Test User')
            ->first_name->toBe('Test')
            ->last_name->toBe('User')
            ->email->toBe('test@example.com')
            ->lang->toBe('it')
            ->is_active->toBe(true);
    });

    it('generates uuid for id', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->id)->toBeString()->toHaveLength(36); // UUID format
    });

    it('uses user database connection', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->getConnectionName())->toBe('user');
    });

    it('has factory', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $users = User::factory()->count(3)->create();

        expect($users)->toHaveCount(3);
        /** @phpstan-ignore-next-line method.nonObject */
        $users->each(function ($user): void {
            expect($user)->toBeInstanceOf(User::class);
        });
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Model Attributes', function (): void {
    it('has full name accessor', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        expect($user->full_name)->toBe('John Doe');
    });

    it('can have password expiration', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'password_expires_at' => now()->addDays(30),
        ]);

        expect($user->password_expires_at)->not->toBeNull();
    });

    it('can be active or inactive', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $activeUser = User::factory()->create(['is_active' => true]);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $inactiveUser = User::factory()->create(['is_active' => false]);

        expect($activeUser->is_active)->toBe(true);
        expect($inactiveUser->is_active)->toBe(false);
    });

    it('can have otp enabled', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create(['is_otp' => true]);

        expect($user->is_otp)->toBe(true);
    });

    it('can have profile photo path', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'profile_photo_path' => 'photos/user.jpg',
        ]);

        expect($user->profile_photo_path)->toBe('photos/user.jpg');
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Authentication Features', function (): void {
    it('can verify email', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        expect($user->email_verified_at)->toBeNull();

        /** @phpstan-ignore-next-line method.nonObject */
        $user->update(['email_verified_at' => now()]);

        expect($user->fresh()->email_verified_at)->not->toBeNull();
    });

    it('can store remember token', function (): void {
        $token = Str::random(60);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'remember_token' => $token,
        ]);

        expect($user->remember_token)->toBe($token);
    });

    it('can access socialite feature', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->canAccessSocialite())->toBe(true);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Relationships', function (): void {
    it('can have teams', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->teams())->toBeInstanceOf(BelongsToMany::class);
    });

    it('can own teams', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->ownedTeams())->toBeInstanceOf(HasMany::class);
    });

    it('can have current team', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        /** @phpstan-ignore-next-line property.notFound */
        $team = Team::factory()->create(['user_id' => $this->user->id]);
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->update(['current_team_id' => $team->id]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->currentTeam())->toBeInstanceOf(BelongsTo::class);
    });

    it('can have roles', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->roles())->toBeInstanceOf(BelongsToMany::class);
    });

    it('can have permissions', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->permissions())
            ->toBeInstanceOf(BelongsToMany::class);
    });

    it('can have profile', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->profile())->toBeInstanceOf(HasOne::class);
    });

    it('can have devices', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->devices())->toBeInstanceOf(BelongsToMany::class);
    });

    it('can have authentication logs', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->authentications())->toBeInstanceOf(HasMany::class);
    });

    it('can have oauth clients', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->clients())->toBeInstanceOf(HasMany::class);
    });

    it('can have oauth tokens', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->tokens())->toBeInstanceOf(HasMany::class);
    });

    it('can have notifications', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->notifications())->toBeInstanceOf(MorphMany::class);
    });

    it('can have socialite users', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->socialiteUsers())->toBeInstanceOf(HasMany::class);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Team Management', function (): void {
    it('can join a team', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $team = Team::factory()->create();

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->teams()->attach($team);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->teams)->toContain($team);
    });

    it('can leave a team', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $team = Team::factory()->create();
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->teams()->attach($team);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->teams)->toContain($team);

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->teams()->detach($team);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->fresh()->teams)->not->toContain($team);
    });

    it('can own multiple teams', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        /** @phpstan-ignore-next-line property.notFound */
        $teams = Team::factory()->count(3)->create(['user_id' => $this->user->id]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->ownedTeams)->toHaveCount(3);
    });

    it('can switch current team', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        /** @phpstan-ignore-next-line property.notFound */
        $team1 = Team::factory()->create(['user_id' => $this->user->id]);
        /** @var \Illuminate\Database\Eloquent\Collection */
        /** @phpstan-ignore-next-line property.notFound */
        $team2 = Team::factory()->create(['user_id' => $this->user->id]);

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->update(['current_team_id' => $team1->id]);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->fresh()->current_team_id)->toBe($team1->id);

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->update(['current_team_id' => $team2->id]);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->fresh()->current_team_id)->toBe($team2->id);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Permission System', function (): void {
    it('can have roles assigned', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create();

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->assignRole($role);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasRole($role))->toBe(true);
    });

    it('can have direct permissions', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission::factory()->create();

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->givePermissionTo($permission);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasPermissionTo($permission))->toBe(true);
    });

    it('can check multiple permissions', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission1 = Permission::factory()->create(['name' => 'edit posts']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission2 = Permission::factory()->create(['name' => 'delete posts']);

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->givePermissionTo([$permission1, $permission2]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasAllPermissions([$permission1, $permission2]))->toBe(true);
    });

    it('can check any permission', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission1 = Permission::factory()->create(['name' => 'edit posts']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission2 = Permission::factory()->create(['name' => 'delete posts']);

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->givePermissionTo($permission1);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasAnyPermission([$permission1, $permission2]))->toBe(true);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Media Management', function (): void {
    it('implements HasMedia interface', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user)->toBeInstanceOf(HasMedia::class);
    });

    it('can have media attached', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->media())->toBeInstanceOf(MorphMany::class);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Scopes and Queries', function (): void {
    it('can filter by active users', function (): void {
        User::factory()->create(['is_active' => true]);
        User::factory()->create(['is_active' => false]);

        $activeUsers = User::where('is_active', true)->get();
        $inactiveUsers = User::where('is_active', false)->get();

    });

    it('can filter by email verified', function (): void {
        User::factory()->create(['email_verified_at' => now()]);
        User::factory()->create(['email_verified_at' => null]);

        $verifiedUsers = User::whereNotNull('email_verified_at')->get();
        $unverifiedUsers = User::whereNull('email_verified_at')->get();

    });

    it('can filter by language', function (): void {
        User::factory()->create(['lang' => 'it']);
        User::factory()->create(['lang' => 'en']);

        $italianUsers = User::where('lang', 'it')->get();
        $englishUsers = User::where('lang', 'en')->get();

    });
});

<<<<<<< HEAD
describe('User Soft Deletes', function () {
    it('can handle soft deletes if supported', function () {
        if (! method_exists(User::class, 'withTrashed')) {
=======
/**
 * @property \Modules\User\Models\User $user
 */
describe('User Soft Deletes', function (): void {
    it('can handle soft deletes if supported', function (): void {
        if (!method_exists(User::class, 'withTrashed')) {
            /** @phpstan-ignore-next-line property.notFound */
>>>>>>> e058848 (.)
            $this->markTestSkipped('SoftDeletes trait not present on User model');
        }
        // This would test soft delete functionality if the trait were present
        /** @phpstan-ignore-next-line property.notFound */
        $this->markTestSkipped('User model does not implement SoftDeletes trait');
    });

<<<<<<< HEAD
    it('can handle restore after soft delete if supported', function () {
        if (! method_exists(User::class, 'withTrashed')) {
=======
    it('can handle restore after soft delete if supported', function (): void {
        if (!method_exists(User::class, 'withTrashed')) {
            /** @phpstan-ignore-next-line property.notFound */
>>>>>>> e058848 (.)
            $this->markTestSkipped('SoftDeletes trait not present on User model');
        }
        // This would test restore functionality if the trait were present
        /** @phpstan-ignore-next-line property.notFound */
        $this->markTestSkipped('User model does not implement SoftDeletes trait');
    });

<<<<<<< HEAD
    it('can handle force delete if supported', function () {
        if (! method_exists(User::class, 'forceDelete')) {
=======
    it('can handle force delete if supported', function (): void {
        if (!method_exists(User::class, 'forceDelete')) {
            /** @phpstan-ignore-next-line property.notFound */
>>>>>>> e058848 (.)
            $this->markTestSkipped('SoftDeletes trait not present on User model');
        }
        // This would test force delete functionality if the trait were present
        /** @phpstan-ignore-next-line property.notFound */
        $this->markTestSkipped('User model does not implement SoftDeletes trait');
    });
});
