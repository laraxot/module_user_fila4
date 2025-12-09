<?php

declare(strict_types=1);

<<<<<<< HEAD
use Filament\Facades\Filament;
use Livewire\Livewire;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Facades\Filament;
use Livewire\Livewire;
=======
namespace Modules\User\Tests\Feature\Filament\UserResourceTest;

namespace Modules\User\Tests\Unit\Widgets;

=======
>>>>>>> origin/develop
use Livewire\Livewire;
use Modules\User\Models\User;
use Modules\User\Models\Role;
use Modules\User\Models\Permission;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Filament\Facades\Filament;
use Livewire\Livewire;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Filament\Resources\UserResource\Pages\EditUser;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Filament\Resources\UserResource\Pages\ViewUser;
<<<<<<< HEAD
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;
=======

>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->user = User::factory()->create();
<<<<<<< HEAD

    // Set admin panel for testing
    Filament::setCurrentPanel('user::admin');
=======
<<<<<<< HEAD

    // Set admin panel for testing
<<<<<<< HEAD
<<<<<<< HEAD
    Filament::setCurrentPanel('user::admin');
=======
    Filament\Facades\Filament::setCurrentPanel('user::admin');
>>>>>>> a12f125f4a (.)
=======
    Filament::setCurrentPanel('user::admin');
>>>>>>> b93ef594b4 (.)
=======
    
    // Set admin panel for testing
    Filament\Facades\Filament::setCurrentPanel('user::admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    $this->actingAs($this->admin);
});

describe('UserResource Configuration', function () {
    it('has correct model class', function () {
        expect(UserResource::getModel())->toBe(User::class);
    });

    it('has correct slug', function () {
        expect(UserResource::getSlug())->toBe('users');
    });

    it('has navigation configuration', function () {
        $navigationBadge = UserResource::getNavigationBadge();
        expect($navigationBadge)->not->toBeNull();
    });

    it('can get navigation items', function () {
        $navigationItems = UserResource::getNavigationItems();
        expect($navigationItems)->toBeArray();
    });
});

describe('ListUsers Page', function () {
    it('can render list page', function () {
        $users = User::factory()->count(3)->create();

<<<<<<< HEAD
        Livewire::test(ListUsers::class)->assertSuccessful()->assertCanSeeTableRecords($users);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Livewire::test(ListUsers::class)->assertSuccessful()->assertCanSeeTableRecords($users);
=======
        Livewire::test(ListUsers::class)
            ->assertSuccessful()
            ->assertCanSeeTableRecords($users);
>>>>>>> a12f125f4a (.)
=======
        Livewire::test(ListUsers::class)->assertSuccessful()->assertCanSeeTableRecords($users);
>>>>>>> b93ef594b4 (.)
=======
        Livewire::test(ListUsers::class)
            ->assertSuccessful()
            ->assertCanSeeTableRecords($users);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('can search users by name', function () {
        $searchableUser = User::factory()->create([
            'name' => 'Searchable User Name',
        ]);

        $otherUser = User::factory()->create([
            'name' => 'Other User',
        ]);

        Livewire::test(ListUsers::class)
            ->searchTable('Searchable')
            ->assertCanSeeTableRecords([$searchableUser])
            ->assertCanNotSeeTableRecords([$otherUser]);
    });

    it('can search users by email', function () {
        $searchableUser = User::factory()->create([
            'email' => 'searchable@example.com',
        ]);

        $otherUser = User::factory()->create([
            'email' => 'other@example.com',
        ]);

        Livewire::test(ListUsers::class)
            ->searchTable('searchable@example.com')
            ->assertCanSeeTableRecords([$searchableUser])
            ->assertCanNotSeeTableRecords([$otherUser]);
    });

    it('can filter users by active status', function () {
        $activeUser = User::factory()->create([
            'is_active' => true,
        ]);

        $inactiveUser = User::factory()->create([
            'is_active' => false,
        ]);

        Livewire::test(ListUsers::class)
            ->filterTable('is_active', true)
            ->assertCanSeeTableRecords([$activeUser])
            ->assertCanNotSeeTableRecords([$inactiveUser]);
    });

    it('can filter users by verified status', function () {
        $verifiedUser = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $unverifiedUser = User::factory()->create([
            'email_verified_at' => null,
        ]);

        Livewire::test(ListUsers::class)
            ->filterTable('email_verified_at')
            ->assertCanSeeTableRecords([$verifiedUser])
            ->assertCanNotSeeTableRecords([$unverifiedUser]);
    });

    it('can sort users by created date', function () {
        $oldUser = User::factory()->create([
            'created_at' => now()->subDays(2),
        ]);

        $newUser = User::factory()->create([
            'created_at' => now(),
        ]);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        Livewire::test(ListUsers::class)->sortTable('created_at', 'desc')->assertCanSeeTableRecords(
            [$newUser, $oldUser],
            inOrder: true,
        );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        Livewire::test(ListUsers::class)
            ->sortTable('created_at', 'desc')
            ->assertCanSeeTableRecords([$newUser, $oldUser], inOrder: true);
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        Livewire::test(ListUsers::class)
            ->sortTable('created_at', 'desc')
            ->assertCanSeeTableRecords([$newUser, $oldUser], inOrder: true);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });
});

describe('CreateUser Page', function () {
    it('can render create page', function () {
<<<<<<< HEAD
        Livewire::test(CreateUser::class)->assertSuccessful();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Livewire::test(CreateUser::class)->assertSuccessful();
=======
        Livewire::test(CreateUser::class)
            ->assertSuccessful();
>>>>>>> a12f125f4a (.)
=======
        Livewire::test(CreateUser::class)->assertSuccessful();
>>>>>>> b93ef594b4 (.)
=======
        Livewire::test(CreateUser::class)
            ->assertSuccessful();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('can create a user', function () {
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

        $this->assertDatabaseHas(User::class, [
            'name' => 'New User via Admin',
            'email' => 'newuser@example.com',
            'is_active' => true,
        ]);
    });

    it('validates required fields on create', function () {
        Livewire::test(CreateUser::class)
            ->fillForm([
                'name' => '',
                'email' => '',
                'password' => '',
            ])
            ->call('create')
            ->assertHasFormErrors(['name', 'email', 'password']);
    });

    it('validates email uniqueness', function () {
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

    it('validates password confirmation', function () {
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

    it('can assign roles during creation', function () {
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

describe('EditUser Page', function () {
    it('can render edit page', function () {
        Livewire::test(EditUser::class, [
            'record' => $this->user->getRouteKey(),
<<<<<<< HEAD
        ])->assertSuccessful();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        ])->assertSuccessful();
=======
        ])
            ->assertSuccessful();
>>>>>>> a12f125f4a (.)
=======
        ])->assertSuccessful();
>>>>>>> b93ef594b4 (.)
=======
        ])
            ->assertSuccessful();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('can retrieve user data for editing', function () {
        $user = User::factory()->create([
            'name' => 'Editable User',
            'email' => 'editable@example.com',
            'first_name' => 'Editable',
            'last_name' => 'User',
        ]);

        Livewire::test(EditUser::class, [
            'record' => $user->getRouteKey(),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        ])->assertFormSet([
            'name' => 'Editable User',
            'email' => 'editable@example.com',
            'first_name' => 'Editable',
            'last_name' => 'User',
        ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        ])
            ->assertFormSet([
                'name' => 'Editable User',
                'email' => 'editable@example.com',
                'first_name' => 'Editable',
                'last_name' => 'User',
            ]);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('can save edited user', function () {
        $user = User::factory()->create([
            'name' => 'Original Name',
            'email' => 'original@example.com',
        ]);

        Livewire::test(EditUser::class, [
            'record' => $user->getRouteKey(),
        ])
            ->fillForm([
                'name' => 'Updated Name',
                'email' => 'updated@example.com',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

<<<<<<< HEAD
        expect($user->fresh())->name->toBe('Updated Name')->email->toBe('updated@example.com');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect($user->fresh())->name->toBe('Updated Name')->email->toBe('updated@example.com');
=======
        expect($user->fresh())
            ->name->toBe('Updated Name')
            ->email->toBe('updated@example.com');
>>>>>>> a12f125f4a (.)
=======
        expect($user->fresh())->name->toBe('Updated Name')->email->toBe('updated@example.com');
>>>>>>> b93ef594b4 (.)
=======
        expect($user->fresh())
            ->name->toBe('Updated Name')
            ->email->toBe('updated@example.com');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('can activate and deactivate user', function () {
        $user = User::factory()->create([
            'is_active' => true,
        ]);

        Livewire::test(EditUser::class, [
            'record' => $user->getRouteKey(),
        ])
            ->fillForm([
                'is_active' => false,
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        expect($user->fresh()->is_active)->toBe(false);
    });

    it('can change user language', function () {
        $user = User::factory()->create([
            'lang' => 'en',
        ]);

        Livewire::test(EditUser::class, [
            'record' => $user->getRouteKey(),
        ])
            ->fillForm([
                'lang' => 'it',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        expect($user->fresh()->lang)->toBe('it');
    });

    it('can update user roles', function () {
        $user = User::factory()->create();
        $role1 = Role::factory()->create(['name' => 'Admin']);
        $role2 = Role::factory()->create(['name' => 'Editor']);

        $user->assignRole($role1);

        Livewire::test(EditUser::class, [
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

    it('can update user password', function () {
        $user = User::factory()->create();
        $originalPassword = $user->password;

        Livewire::test(EditUser::class, [
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

describe('ViewUser Page', function () {
    it('can render view page', function () {
        Livewire::test(ViewUser::class, [
            'record' => $this->user->getRouteKey(),
<<<<<<< HEAD
        ])->assertSuccessful();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        ])->assertSuccessful();
=======
        ])
            ->assertSuccessful();
>>>>>>> a12f125f4a (.)
=======
        ])->assertSuccessful();
>>>>>>> b93ef594b4 (.)
=======
        ])
            ->assertSuccessful();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('displays user information', function () {
        $user = User::factory()->create([
            'name' => 'Viewable User',
            'email' => 'viewable@example.com',
            'first_name' => 'Viewable',
            'last_name' => 'User',
        ]);

        Livewire::test(ViewUser::class, [
            'record' => $user->getRouteKey(),
        ])
            ->assertSee('Viewable User')
            ->assertSee('viewable@example.com');
    });

    it('can view user with roles', function () {
        $user = User::factory()->create();
        $role = Role::factory()->create(['name' => 'Admin']);
        $user->assignRole($role);

        Livewire::test(ViewUser::class, [
            'record' => $user->getRouteKey(),
<<<<<<< HEAD
        ])->assertSuccessful();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        ])->assertSuccessful();
=======
        ])
            ->assertSuccessful();
>>>>>>> a12f125f4a (.)
=======
        ])->assertSuccessful();
>>>>>>> b93ef594b4 (.)
=======
        ])
            ->assertSuccessful();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        expect($user->roles)->toContain($role);
    });

    it('can view user with permissions', function () {
        $user = User::factory()->create();
        $permission = Permission::factory()->create(['name' => 'edit posts']);
        $user->givePermissionTo($permission);

        Livewire::test(ViewUser::class, [
            'record' => $user->getRouteKey(),
<<<<<<< HEAD
        ])->assertSuccessful();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        ])->assertSuccessful();
=======
        ])
            ->assertSuccessful();
>>>>>>> a12f125f4a (.)
=======
        ])->assertSuccessful();
>>>>>>> b93ef594b4 (.)
=======
        ])
            ->assertSuccessful();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        expect($user->permissions)->toContain($permission);
    });
});

describe('UserResource Bulk Actions', function () {
    it('can bulk activate users', function () {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $users = User::factory()
            ->count(3)
            ->create([
                'is_active' => false,
            ]);
<<<<<<< HEAD

        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('activate');
=======
<<<<<<< HEAD

        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('activate');
=======
=======
>>>>>>> origin/develop
        $users = User::factory()->count(3)->create([
            'is_active' => false,
        ]);

        Livewire::test(ListUsers::class)
            ->selectTableRecords($users)
            ->callTableBulkAction('activate');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('activate');
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        $users->each(function ($user) {
            expect($user->fresh()->is_active)->toBe(true);
        });
    });

    it('can bulk deactivate users', function () {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $users = User::factory()
            ->count(3)
            ->create([
                'is_active' => true,
            ]);
<<<<<<< HEAD

        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('deactivate');
=======
<<<<<<< HEAD

        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('deactivate');
=======
=======
>>>>>>> origin/develop
        $users = User::factory()->count(3)->create([
            'is_active' => true,
        ]);

        Livewire::test(ListUsers::class)
            ->selectTableRecords($users)
            ->callTableBulkAction('deactivate');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('deactivate');
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        $users->each(function ($user) {
            expect($user->fresh()->is_active)->toBe(false);
        });
    });

    it('can bulk delete users', function () {
        $users = User::factory()->count(3)->create();

<<<<<<< HEAD
        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('delete');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('delete');
=======
        Livewire::test(ListUsers::class)
            ->selectTableRecords($users)
            ->callTableBulkAction('delete');
>>>>>>> a12f125f4a (.)
=======
        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('delete');
>>>>>>> b93ef594b4 (.)
=======
        Livewire::test(ListUsers::class)
            ->selectTableRecords($users)
            ->callTableBulkAction('delete');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        $users->each(function ($user) {
            expect($user->fresh())->toBeNull();
        });
    });

    it('can bulk assign roles', function () {
        $users = User::factory()->count(2)->create();
        $role = Role::factory()->create(['name' => 'Editor']);

<<<<<<< HEAD
        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('assignRole', [
            'role_id' => $role->id,
        ]);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('assignRole', [
            'role_id' => $role->id,
        ]);
=======
=======
>>>>>>> origin/develop
        Livewire::test(ListUsers::class)
            ->selectTableRecords($users)
            ->callTableBulkAction('assignRole', [
                'role_id' => $role->id,
            ]);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        Livewire::test(ListUsers::class)->selectTableRecords($users)->callTableBulkAction('assignRole', [
            'role_id' => $role->id,
        ]);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        $users->each(function ($user) use ($role) {
            expect($user->fresh()->hasRole($role))->toBe(true);
        });
    });
});

describe('UserResource Security', function () {
    it('prevents editing super admin user', function () {
        $superAdmin = User::factory()->create();
        $adminRole = Role::factory()->create(['name' => 'Super Admin']);
        $superAdmin->assignRole($adminRole);

        // Test that super admin cannot be deactivated
        Livewire::test(EditUser::class, [
            'record' => $superAdmin->getRouteKey(),
        ])
            ->fillForm([
                'is_active' => false,
            ])
            ->call('save');

        // Should still be active (assuming protection is implemented)
        expect($superAdmin->fresh()->is_active)->toBe(true);
    });

    it('validates email format', function () {
        Livewire::test(CreateUser::class)
            ->fillForm([
                'name' => 'Test User',
                'email' => 'invalid-email',
                'password' => 'password123',
            ])
            ->call('create')
            ->assertHasFormErrors(['email']);
    });

    it('enforces minimum password length', function () {
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
<<<<<<< HEAD
});
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
});
=======

>>>>>>> a12f125f4a (.)
=======
});
>>>>>>> b93ef594b4 (.)
=======
});
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
