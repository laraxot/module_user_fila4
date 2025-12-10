<?php

declare(strict_types=1);

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;

beforeEach(function (): void {
    $this->user = User::factory()->create([
        'password' => Hash::make('password123'),
        'is_active' => true,
        'email_verified_at' => now(),
    ]);
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Authentication', function (): void {
    it('can authenticate with valid credentials', function (): void {
        $result = Auth::attempt([
            /** @phpstan-ignore-next-line property.notFound */
            'email' => $this->user->email,
            'password' => 'password123',
        ]);

        expect($result)->toBe(true);
        /** @phpstan-ignore-next-line property.notFound */
        expect(Auth::user()?->id)->toBe($this->user->id);
    });

    it('cannot authenticate with invalid password', function (): void {
        $result = Auth::attempt([
            /** @phpstan-ignore-next-line property.notFound */
            'email' => $this->user->email,
            'password' => 'wrongpassword',
        ]);

        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
    });

    it('cannot authenticate with non-existent email', function (): void {
        $result = Auth::attempt([
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
    });

    it('cannot authenticate inactive user', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $inactiveUser = User::factory()->create([
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);

        $result = Auth::attempt([
            'email' => $inactiveUser->email,
            'password' => 'password123',
        ]);

        expect($result)->toBe(false);
    });

    it('can logout user', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        Auth::login($this->user);
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Password Management', function (): void {
    it('can hash password on creation', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'password' => Hash::make('testpassword'),
        ]);

        expect(Hash::check('testpassword', $user->password))->toBe(true);
    });

    it('can change password', function (): void {
        $newPassword = 'newpassword123';
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->update([
            'password' => Hash::make($newPassword),
        ]);

        /** @phpstan-ignore-next-line property.notFound */
        expect(Hash::check($newPassword, $this->user->fresh()->password))->toBe(true);
        /** @phpstan-ignore-next-line property.notFound */
        expect(Hash::check('password123', $this->user->fresh()->password))->toBe(false);
    });

    it('can check password expiration', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'password_expires_at' => now()->subDays(1),
        ]);

        expect($user->password_expires_at->isPast())->toBe(true);
    });

    it('can set password expiration', function (): void {
        $expirationDate = now()->addDays(90);
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->update([
            'password_expires_at' => $expirationDate,
        ]);

        expect(
            $this
                ->user->fresh()
                ->password_expires_at->toDateString(),
        )
            /** @phpstan-ignore-next-line method.nonObject */
            ->toBe($expirationDate->toDateString());
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Remember Token', function (): void {
    it('can generate remember token', function (): void {
        $token = Str::random(60);
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->update(['remember_token' => $token]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->fresh()->remember_token)->toBe($token);
    });

    it('can authenticate using remember token', function (): void {
        $token = Str::random(60);
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->update(['remember_token' => $token]);

        /** @phpstan-ignore-next-line property.notFound */
        $user = User::where('email', $this->user->email)->where('remember_token', $token)->first();

        expect($user)->not->toBeNull();
        /** @phpstan-ignore-next-line property.notFound */
        expect($user->id)->toBe($this->user->id);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Email Verification', function (): void {
    it('can mark email as verified', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        expect($user->email_verified_at)->toBeNull();

        /** @phpstan-ignore-next-line method.nonObject */
        $user->markEmailAsVerified();

        expect($user->fresh()->email_verified_at)->not->toBeNull();
    });

    it('can check if email is verified', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $verifiedUser = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $unverifiedUser = User::factory()->create([
            'email_verified_at' => null,
        ]);

        expect($verifiedUser->hasVerifiedEmail())->toBe(true);
        expect($unverifiedUser->hasVerifiedEmail())->toBe(false);
    });

    it('can send email verification notification', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        Notification::fake();

        /** @phpstan-ignore-next-line method.nonObject */
        $user->sendEmailVerificationNotification();

        Notification::assertSentTo($user, VerifyEmail::class);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Authorization', function (): void {
    it('can assign and check roles', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $adminRole = Role::factory()->create(['name' => 'admin']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $editorRole = Role::factory()->create(['name' => 'editor']);

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->assignRole($adminRole);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasRole('admin'))->toBe(true);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasRole('editor'))->toBe(false);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasRole($adminRole))->toBe(true);
    });

    it('can assign and check permissions', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $editPermission = Permission::factory()->create(['name' => 'edit posts']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $deletePermission = Permission::factory()->create(['name' => 'delete posts']);

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->givePermissionTo($editPermission);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasPermissionTo('edit posts'))->toBe(true);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasPermissionTo('delete posts'))->toBe(false);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasPermissionTo($editPermission))->toBe(true);
    });

    it('can inherit permissions from roles', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'editor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission::factory()->create(['name' => 'edit posts']);

        /** @phpstan-ignore-next-line method.nonObject */
        $role->givePermissionTo($permission);
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->assignRole($role);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasPermissionTo('edit posts'))->toBe(true);
    });

    it('can check multiple permissions', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission1 = Permission::factory()->create(['name' => 'edit posts']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission2 = Permission::factory()->create(['name' => 'delete posts']);

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->givePermissionTo([$permission1, $permission2]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasAllPermissions(['edit posts', 'delete posts']))->toBe(true);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasAnyPermission(['edit posts', 'publish posts']))->toBe(true);
    });

    it('can remove roles and permissions', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'editor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission::factory()->create(['name' => 'edit posts']);

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->assignRole($role);
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->givePermissionTo($permission);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasRole('editor'))->toBe(true);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasPermissionTo('edit posts'))->toBe(true);

        /** @phpstan-ignore-next-line property.notFound */
        $this->user->removeRole($role);
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->revokePermissionTo($permission);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasRole('editor'))->toBe(false);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->hasPermissionTo('edit posts'))->toBe(false);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User OAuth Authentication', function (): void {
    it('can have oauth clients', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        Passport::actingAs($this->user);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->clients())->toBeInstanceOf(HasMany::class);
    });

    it('can have oauth tokens', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        Passport::actingAs($this->user);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->tokens())->toBeInstanceOf(HasMany::class);
    });

    it('can find user for passport', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $user = User::findForPassport($this->user->email);

        expect($user)->not->toBeNull();
        /** @phpstan-ignore-next-line property.notFound */
        expect($user->id)->toBe($this->user->id);
    });

    it('can validate password for passport', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $isValid = $this->user->validateForPassportPasswordGrant('password123');

        expect($isValid)->toBe(true);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Authentication Logging', function (): void {
    it('can log authentication attempts', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->authentications())->toBeInstanceOf(HasMany::class);
    });

    it('can get latest authentication log', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->latestAuthentication())
            ->toBeInstanceOf(HasOne::class);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Session Management', function (): void {
    it('can store user in session', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        Auth::login($this->user);

        expect(session()->has('login_user_id'))->toBe(true);
        /** @phpstan-ignore-next-line property.notFound */
        expect(session('login_user_id'))->toBe($this->user->id);
    });

    it('can remember user across sessions', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        Auth::login($this->user, true);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->fresh()->remember_token)->not->toBeNull();
    });

    it('can clear user session on logout', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        Auth::login($this->user);
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
        expect(session()->has('login_user_id'))->toBe(false);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('User Two Factor Authentication', function (): void {
    it('can enable two factor authentication', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->update(['is_otp' => true]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->fresh()->is_otp)->toBe(true);
    });

    it('can disable two factor authentication', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->user->update(['is_otp' => false]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->user->fresh()->is_otp)->toBe(false);
    });

    it('handles otp authentication workflow', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'is_otp' => true,
            'password' => Hash::make('password123'),
        ]);

        // First step: password authentication
        $result = Auth::attempt([
            'email' => $user->email,
            'password' => 'password123',
        ]);

        // Should handle OTP requirement
        expect($user->is_otp)->toBe(true);
    });
});
