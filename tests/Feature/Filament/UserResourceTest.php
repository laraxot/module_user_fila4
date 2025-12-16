<?php

declare(strict_types=1);

use Filament\Facades\Filament;
use Livewire\Livewire;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Filament\Resources\UserResource\Pages\EditUser;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Filament\Resources\UserResource\Pages\ViewUser;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;

beforeEach(function (): void {
    $this->admin = User::factory()->create();
    $this->user = User::factory()->create();

    // Set admin panel for testing
    Filament::setCurrentPanel('user::admin');
    /** @phpstan-ignore-next-line property.notFound, method.nonObject */
    $this->actingAs($this->admin);
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('UserResource Configuration', function (): void {
    it('has correct model class', function (): void {
        expect(UserResource::getModel())->toBe(User::class);
    });

    it('has correct slug', function (): void {
        expect(UserResource::getSlug())->toBe('users');
    });

    it('has navigation configuration', function (): void {
        $navigationBadge = UserResource::getNavigationBadge();
        expect($navigationBadge)->not->toBeNull();
    });

    it('can get navigation items', function (): void {
        $navigationItems = UserResource::getNavigationItems();
        expect($navigationItems)->toBeArray();
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('ListUsers Page', function (): void {
    it('can render list page', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $users = User::factory()->count(3)->create();

        Livewire::test(ListUsers::class)->assertSuccessful()->assertCanSeeTableRecords($users);
    });

    it('can search users by name', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $searchableUser = User::factory()->create([
            'name' => 'Searchable User Name',
        ]);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $otherUser = User::factory()->create([
            'name' => 'Other User',
        ]);

        Livewire::test(ListUsers::class)
            ->searchTable('Searchable')
            ->assertCanSeeTableRecords([$searchableUser])
            ->assertCanNotSeeTableRecords([$otherUser]);
    });

    it('can search users by email', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $searchableUser = User::factory()->create([
            'email' => 'searchable@example.com',
        ]);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $otherUser = User::factory()->create([
            'email' => 'other@example.com',
        ]);

        Livewire::test(ListUsers::class)
            ->searchTable('searchable@example.com')
            ->assertCanSeeTableRecords([$searchableUser])
            ->assertCanNotSeeTableRecords([$otherUser]);
    });

    it('can filter users by active status', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $activeUser = User::factory()->create([
            'is_active' => true,
        ]);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $inactiveUser = User::factory()->create([
            'is_active' => false,
        ]);

        Livewire::test(ListUsers::class)
            ->filterTable('is_active', true)
            ->assertCanSeeTableRecords([$activeUser])
            ->assertCanNotSeeTableRecords([$inactiveUser]);
    });

    it('can filter users by verified status', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $verifiedUser = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $unverifiedUser = User::factory()->create([
            'email_verified_at' => null,
        ]);

        Livewire::test(ListUsers::class)
            ->filterTable('email_verified_at')
            ->assertCanSeeTableRecords([$verifiedUser])
            ->assertCanNotSeeTableRecords([$unverifiedUser]);
    });

    it('can sort users by created date', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $oldUser = User::factory()->create([
            'created_at' => now()->subDays(2),
        ]);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $newUser = User::factory()->create([
            'created_at' => now(),
        ]);

        Livewire::test(ListUsers::class)->sortTable('created_at', 'desc')->assertCanSeeTableRecords(
            [$newUser, $oldUser],
            inOrder: true,
        );
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('CreateUser Page', function (): void {
    it('can render create page', function (): void {
        Livewire::test(CreateUser::class)->assertSuccessful();
    });

    it('can create a user', function (): void {
        $userData = [
            'name' => 'New User via Admin',
            'first_name' => 'New',
            'last_name' => 'User',
            'email' => 'newuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'lang' => 'it',
            'is_active' => true,
        ];

        Livewire::test(CreateUser::class)
            ->fillForm($userData)
            ->call('create')
            ->assertHasNoFormErrors();

        /** @phpstan-ignore-next-line property.notFound */
        $this->assertDatabaseHas(User::class, [
            'name' => 'New User via Admin',
            'email' => 'newuser@example.com',
            'is_active' => true,
        ]);
    });

    it('validates required fields on create', function (): void {
        Livewire::test(CreateUser::class)
            ->fillForm([
                'name' => '',
                'email' => '',
                'password' => '',
            ])
            ->call('create')
            ->assertHasFormErrors(['name', 'email', 'password']);
    });

    it('validates email uniqueness', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $existingUser = User::factory()->create([
            'email' => 'existing@example.com',
        ]);

        Livewire::test(CreateUser::class)
            ->fillForm([
                'name' => 'Test User',
                'email' => 'existing@example.com',
                'password' => 'password123',
            ])
            ->call('create')
            ->assertHasFormErrors(['email']);
    });

    it('validates password confirmation', function (): void {
        Livewire::test(CreateUser::class)
            ->fillForm([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password123',
                'password_confirmation' => 'different123',
            ])
            ->call('create')
            ->assertHasFormErrors(['password']);
    });

    it('can assign roles during creation', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'Admin']);

        $userData = [
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'roles' => [$role->id],
        ];

        Livewire::test(CreateUser::class)
            ->fillForm($userData)
            ->call('create')
            ->assertHasNoFormErrors();

        $user = User::where('email', 'admin@example.com')->first();
        expect($user->hasRole($role))->toBe(true);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('EditUser Page', function (): void {
    it('can render edit page', function (): void {
        Livewire::test(EditUser::class, [
            /** @phpstan-ignore-next-line property.notFound */
            'record' => $this->user->getRouteKey(),
        ])->assertSuccessful();
    });

    it('can retrieve user data for editing', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'name' => 'Editable User',
            'email' => 'editable@example.com',
            'first_name' => 'Editable',
            'last_name' => 'User',
        ]);

        Livewire::test(EditUser::class, [
            /** @phpstan-ignore-next-line method.nonObject */
            'record' => $user->getRouteKey(),
        ])->assertFormSet([
            'name' => 'Editable User',
            'email' => 'editable@example.com',
            'first_name' => 'Editable',
            'last_name' => 'User',
        ]);
    });

    it('can save edited user', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'name' => 'Original Name',
            'email' => 'original@example.com',
        ]);

        Livewire::test(EditUser::class, [
            /** @phpstan-ignore-next-line method.nonObject */
            'record' => $user->getRouteKey(),
        ])
            ->fillForm([
                'name' => 'Updated Name',
                'email' => 'updated@example.com',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        expect($user->fresh())->name->toBe('Updated Name')->email->toBe('updated@example.com');
    });

    it('can activate and deactivate user', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'is_active' => true,
        ]);

        Livewire::test(EditUser::class, [
            /** @phpstan-ignore-next-line method.nonObject */
            'record' => $user->getRouteKey(),
        ])
            ->fillForm([
                'is_active' => false,
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        expect($user->fresh()->is_active)->toBe(false);
    });

    it('can change user language', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'lang' => 'en',
        ]);

        Livewire::test(EditUser::class, [
            /** @phpstan-ignore-next-line method.nonObject */
            'record' => $user->getRouteKey(),
        ])
            ->fillForm([
                'lang' => 'it',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        expect($user->fresh()->lang)->toBe('it');
    });

    it('can update user roles', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role1 = Role::factory()->create(['name' => 'Admin']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role2 = Role::factory()->create(['name' => 'Editor']);

        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($role1);

        Livewire::test(EditUser::class, [
            /** @phpstan-ignore-next-line method.nonObject */
            'record' => $user->getRouteKey(),
        ])
            ->fillForm([
                'roles' => [$role2->id],
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        expect($user->fresh()->hasRole($role2))->toBe(true);
        expect($user->fresh()->hasRole($role1))->toBe(false);
    });

    it('can update user password', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        $originalPassword = $user->password;

        Livewire::test(EditUser::class, [
            /** @phpstan-ignore-next-line method.nonObject */
            'record' => $user->getRouteKey(),
        ])
            ->fillForm([
                'password' => 'newpassword123',
                'password_confirmation' => 'newpassword123',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        expect($user->fresh()->password)->not->toBe($originalPassword);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('ViewUser Page', function (): void {
    it('can render view page', function (): void {
        Livewire::test(ViewUser::class, [
            /** @phpstan-ignore-next-line property.notFound */
            'record' => $this->user->getRouteKey(),
        ])->assertSuccessful();
    });

    it('displays user information', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create([
            'name' => 'Viewable User',
            'email' => 'viewable@example.com',
            'first_name' => 'Viewable',
            'last_name' => 'User',
        ]);

        Livewire::test(ViewUser::class, [
            /** @phpstan-ignore-next-line method.nonObject */
            'record' => $user->getRouteKey(),
        ])
            ->assertSee('Viewable User')
            ->assertSee('viewable@example.com');
    });

    it('can view user with roles', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'Admin']);
        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($role);

        Livewire::test(ViewUser::class, [
            /** @phpstan-ignore-next-line method.nonObject */
            'record' => $user->getRouteKey(),
        ])->assertSuccessful();

        expect($user->roles)->toContain($role);
    });

    it('can view user with permissions', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission::factory()->create(['name' => 'edit posts']);
        /** @phpstan-ignore-next-line method.nonObject */
        $user->givePermissionTo($permission);

        Livewire::test(ViewUser::class, [
            /** @phpstan-ignore-next-line method.nonObject */
            'record' => $user->getRouteKey(),
        ])->assertSuccessful();

        expect($user->permissions)->toContain($permission);
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('UserResource Bulk Actions', function (): void {
    it('can bulk activate users', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $users = User::factory()
            ->count(3)
            ->create([
                'is_active' => false,
            ]);

        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('activate');

        /** @phpstan-ignore-next-line method.nonObject */
        $users->each(function ($user): void {
            expect($user->fresh()->is_active)->toBe(true);
        });
    });

    it('can bulk deactivate users', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $users = User::factory()
            ->count(3)
            ->create([
                'is_active' => true,
            ]);

        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('deactivate');

        /** @phpstan-ignore-next-line method.nonObject */
        $users->each(function ($user): void {
            expect($user->fresh()->is_active)->toBe(false);
        });
    });

    it('can bulk delete users', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $users = User::factory()->count(3)->create();

        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('delete');

        /** @phpstan-ignore-next-line method.nonObject */
        $users->each(function ($user): void {
            expect($user->fresh())->toBeNull();
        });
    });

    it('can bulk assign roles', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $users = User::factory()->count(2)->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'Editor']);

        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('assignRole', [
            'role_id' => $role->id,
        ]);

        /** @phpstan-ignore-next-line method.nonObject */
        $users->each(function ($user) use ($role): void {
            expect($user->fresh()->hasRole($role))->toBe(true);
        });
    });
});

/**
 * @property \Modules\User\Models\User $user
 */
describe('UserResource Security', function (): void {
    it('prevents editing super admin user', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $superAdmin = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $adminRole = Role::factory()->create(['name' => 'Super Admin']);
        /** @phpstan-ignore-next-line method.nonObject */
        $superAdmin->assignRole($adminRole);

        // Test that super admin cannot be deactivated
        Livewire::test(EditUser::class, [
            /** @phpstan-ignore-next-line method.nonObject */
            'record' => $superAdmin->getRouteKey(),
        ])
            ->fillForm([
                'is_active' => false,
            ])
            ->call('save');

        // Should still be active (assuming protection is implemented)
        expect($superAdmin->fresh()->is_active)->toBe(true);
    });

    it('validates email format', function (): void {
        Livewire::test(CreateUser::class)
            ->fillForm([
                'name' => 'Test User',
                'email' => 'invalid-email',
                'password' => 'password123',
            ])
            ->call('create')
            ->assertHasFormErrors(['email']);
    });

    it('enforces minimum password length', function (): void {
        Livewire::test(CreateUser::class)
            ->fillForm([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => '123',
                'password_confirmation' => '123',
            ])
            ->call('create')
            ->assertHasFormErrors(['password']);
    });
});
