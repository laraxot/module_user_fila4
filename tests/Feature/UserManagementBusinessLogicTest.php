<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use function Safe\json_encode;


use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Tests\TestCase;

use function Safe\json_encode;

class UserManagementBusinessLogicTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itCanCreateUserWithProfile(): void
    {
        // Arrange
        $userData = [
            'name' => 'Mario Rossi',
            'email' => 'mario.rossi@example.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ];

        $profileData = [
            'phone' => '+39 123 456 7890',
            'address' => 'Via Roma 123, Milano',
            'birth_date' => '1990-05-15',
            'gender' => 'M',
        ];

        // Act
        $user = User::create($userData);
        /** @phpstan-ignore-next-line method.nonObject */
        $profile = $user->profile()->create($profileData);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Mario Rossi',
            'email' => 'mario.rossi@example.com',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'user_id' => $user->id,
            'phone' => '+39 123 456 7890',
            'address' => 'Via Roma 123, Milano',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(Profile::class, $user->profile);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals($user->id, $profile->user_id);
    }

    /** @test */
    public function itCanAssignRoleToUser(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'doctor']);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($role);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole('doctor'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole($role));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertContains($role->name, $user->getRoleNames()->toArray());
    }

    /** @test */
    public function itCanAssignMultipleRolesToUser(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role1 = Role::factory()->create(['name' => 'doctor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role2 = Role::factory()->create(['name' => 'admin']);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole([$role1, $role2]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole('doctor'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole('admin'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole($role1));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole($role2));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(2, $user->getRoleNames());
    }

    /** @test */
    public function itCanRemoveRoleFromUser(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'doctor']);
        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($role);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->removeRole($role);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($user->hasRole('doctor'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($user->hasRole($role));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(0, $user->getRoleNames());
    }

    /** @test */
    public function itCanSyncUserRoles(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role1 = Role::factory()->create(['name' => 'doctor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role2 = Role::factory()->create(['name' => 'admin']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role3 = Role::factory()->create(['name' => 'nurse']);

        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole([$role1, $role2]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->syncRoles([$role2, $role3]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($user->hasRole('doctor'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole('admin'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole('nurse'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(2, $user->getRoleNames());
    }

    /** @test */
    public function itCanCheckUserPermissions(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'doctor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission::factory()->create(['name' => 'patients.read']);

        /** @phpstan-ignore-next-line method.nonObject */
        $role->givePermissionTo($permission);
        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($role);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasPermissionTo('patients.read'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasPermissionTo($permission));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->can('patients.read'));
    }

    /** @test */
    public function itCanAssignDirectPermissionToUser(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission::factory()->create(['name' => 'special.permission']);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->givePermissionTo($permission);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasPermissionTo('special.permission'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasPermissionTo($permission));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->can('special.permission'));
    }

    /** @test */
    public function itCanRevokeDirectPermissionFromUser(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission::factory()->create(['name' => 'special.permission']);
        /** @phpstan-ignore-next-line method.nonObject */
        $user->givePermissionTo($permission);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->revokePermissionTo($permission);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($user->hasPermissionTo('special.permission'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($user->hasPermissionTo($permission));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($user->can('special.permission'));
    }

    /** @test */
    public function itCanCheckUserHasAnyRole(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role1 = Role::factory()->create(['name' => 'doctor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role2 = Role::factory()->create(['name' => 'nurse']);

        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($role1);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasAnyRole(['doctor', 'nurse']));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasAnyRole(['nurse', 'admin']));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($user->hasAnyRole(['nurse', 'admin']));
    }

    /** @test */
    public function itCanCheckUserHasAllRoles(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role1 = Role::factory()->create(['name' => 'doctor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role2 = Role::factory()->create(['name' => 'admin']);

        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole([$role1, $role2]);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasAllRoles(['doctor', 'admin']));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($user->hasAllRoles(['doctor', 'nurse']));
    }

    /** @test */
    public function itCanGetUserPermissions(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'doctor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission1 = Permission::factory()->create(['name' => 'patients.read']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission2 = Permission::factory()->create(['name' => 'patients.write']);

        /** @phpstan-ignore-next-line method.nonObject */
        $role->givePermissionTo([$permission1, $permission2]);
        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($role);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $permissions = $user->getAllPermissions();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(2, $permissions);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($permissions->contains($permission1));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($permissions->contains($permission2));
    }

    /** @test */
    public function itCanGetUserRoles(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role1 = Role::factory()->create(['name' => 'doctor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role2 = Role::factory()->create(['name' => 'admin']);

        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole([$role1, $role2]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $roles = $user->getRoleNames();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(2, $roles);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertContains('doctor', $roles);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertContains('admin', $roles);
    }

    /** @test */
    public function itCanCheckUserIsSuperAdmin(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $superAdminRole = Role::factory()->create(['name' => 'super-admin']);

        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($superAdminRole);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole('super-admin'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->isSuperAdmin());
    }

    /** @test */
    public function itCanCheckUserIsAdmin(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $adminRole = Role::factory()->create(['name' => 'admin']);

        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($adminRole);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole('admin'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->isAdmin());
    }

    /** @test */
    public function itCanCheckUserIsDoctor(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $doctorRole = Role::factory()->create(['name' => 'doctor']);

        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($doctorRole);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole('doctor'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->isDoctor());
    }

    /** @test */
    public function itCanCheckUserIsPatient(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $patientRole = Role::factory()->create(['name' => 'patient']);

        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($patientRole);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasRole('patient'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->isPatient());
    }

    /** @test */
    public function itCanUpdateUserProfile(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $profile = $user->profile()->create([
            'phone' => '+39 123 456 7890',
            'address' => 'Via Roma 123, Milano',
        ]);

        $updatedData = [
            'phone' => '+39 987 654 3210',
            'address' => 'Via Milano 456, Roma',
            'birth_date' => '1985-10-20',
        ];

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $profile->update($updatedData);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'phone' => '+39 987 654 3210',
            'address' => 'Via Milano 456, Roma',
            'birth_date' => '1985-10-20',
        ]);
    }

    /** @test */
    public function itCanDeleteUserWithProfile(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $profile = $user->profile()->create([
            'phone' => '+39 123 456 7890',
        ]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->delete();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('profiles', ['id' => $profile->id]);
    }

    /** @test */
    public function itCanSoftDeleteUser(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->delete();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertSoftDeleted('users', ['id' => $user->id]);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    /** @test */
    public function itCanRestoreSoftDeletedUser(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $user->delete();

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->restore();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotSoftDeleted('users', ['id' => $user->id]);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    /** @test */
    public function itCanForceDeleteUser(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $profile = $user->profile()->create([
            'phone' => '+39 123 456 7890',
        ]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->forceDelete();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('profiles', ['id' => $profile->id]);
    }

    /** @test */
    public function itCanSearchUsersByName(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user1 = User::factory()->create(['name' => 'Mario Rossi']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user2 = User::factory()->create(['name' => 'Giulia Bianchi']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user3 = User::factory()->create(['name' => 'Marco Rossi']);

        // Act
        $results = User::where('name', 'like', '%Rossi%')->get();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(2, $results);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($results->contains($user1));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($results->contains($user3));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($results->contains($user2));
    }

    /** @test */
    public function itCanSearchUsersByEmail(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user1 = User::factory()->create(['email' => 'mario@example.com']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user2 = User::factory()->create(['email' => 'giulia@test.com']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user3 = User::factory()->create(['email' => 'marco@example.org']);

        // Act
        $results = User::where('email', 'like', '%@example%')->get();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(2, $results);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($results->contains($user1));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($results->contains($user3));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($results->contains($user2));
    }

    /** @test */
    public function itCanFilterUsersByRole(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $doctorRole = Role::factory()->create(['name' => 'doctor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $nurseRole = Role::factory()->create(['name' => 'nurse']);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $user1 = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user2 = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user3 = User::factory()->create();

        /** @phpstan-ignore-next-line method.nonObject */
        $user1->assignRole($doctorRole);
        /** @phpstan-ignore-next-line method.nonObject */
        $user2->assignRole($nurseRole);
        /** @phpstan-ignore-next-line method.nonObject */
        $user3->assignRole($doctorRole);

        // Act
        $doctors = User::role('doctor')->get();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(2, $doctors);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($doctors->contains($user1));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($doctors->contains($user3));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($doctors->contains($user2));
    }

    /** @test */
    public function itCanFilterUsersByPermission(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'doctor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission::factory()->create(['name' => 'patients.read']);

        /** @phpstan-ignore-next-line method.nonObject */
        $role->givePermissionTo($permission);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $user1 = User::factory()->create();
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user2 = User::factory()->create();

        /** @phpstan-ignore-next-line method.nonObject */
        $user1->assignRole($role);

        // Act
        $usersWithPermission = User::permission('patients.read')->get();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(1, $usersWithPermission);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($usersWithPermission->contains($user1));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($usersWithPermission->contains($user2));
    }

    /** @test */
    public function itCanGetUsersWithRolesAndPermissions(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role::factory()->create(['name' => 'doctor']);
        /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission::factory()->create(['name' => 'patients.read']);

        /** @phpstan-ignore-next-line method.nonObject */
        $role->givePermissionTo($permission);

        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $user->assignRole($role);

        // Act
        $userWithRelations = User::with(['roles', 'permissions'])->find($user->id);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotNull($userWithRelations);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($userWithRelations->relationLoaded('roles'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($userWithRelations->relationLoaded('permissions'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(1, $userWithRelations->roles);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(1, $userWithRelations->permissions);
    }

    /** @test */
    public function itCanValidateUserEmailUniqueness(): void
    {
        // Arrange
        User::factory()->create(['email' => 'test@example.com']);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->expectException(QueryException::class);

        User::create([
            'name' => 'Another User',
            'email' => 'test@example.com', // Same email
            'password' => Hash::make('password123'),
        ]);
    }

    /** @test */
    public function itCanValidateUserPasswordStrength(): void
    {
        // Arrange
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'weak', // Weak password
        ];

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->expectException(ValidationException::class);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->post('/register', $userData);
    }

    /** @test */
    public function itCanHandleUserPasswordReset(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        $token = 'reset-token-123';

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->update(['password_reset_token' => $token]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'password_reset_token' => $token,
        ]);
    }

    /** @test */
    public function itCanHandleUserEmailVerification(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create(['email_verified_at' => null]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->markEmailAsVerified();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotNull($user->email_verified_at);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->hasVerifiedEmail());
    }

    /** @test */
    public function itCanHandleUserLastLogin(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        $lastLogin = now();

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->update(['last_login_at' => $lastLogin]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'last_login_at' => $lastLogin,
        ]);
    }

    /** @test */
    public function itCanHandleUserStatusChanges(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create(['status' => 'active']);

        // Act - Deactivate user
        /** @phpstan-ignore-next-line method.nonObject */
        $user->update(['status' => 'inactive']);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('inactive', $user->fresh()->status);

        // Act - Activate user
        /** @phpstan-ignore-next-line method.nonObject */
        $user->update(['status' => 'active']);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('active', $user->fresh()->status);
    }

    /** @test */
    public function itCanHandleUserPreferences(): void
    {
        // Arrange
        /** @var \Illuminate\Database\Eloquent\Collection */
        $user = User::factory()->create();
        $preferences = [
            'language' => 'it',
            'timezone' => 'Europe/Rome',
            'notifications' => true,
            'theme' => 'dark',
        ];

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $user->update(['preferences' => $preferences]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'preferences' => json_encode($preferences),
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('it', $user->fresh()->preferences['language']);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('Europe/Rome', $user->fresh()->preferences['timezone']);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->fresh()->preferences['notifications']);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('dark', $user->fresh()->preferences['theme']);
    }
}
