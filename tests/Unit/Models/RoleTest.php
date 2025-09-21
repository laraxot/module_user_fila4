<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_role_with_minimal_data(): void
    {
        $role = Role::factory()->create([
            'name' => 'Test Role',
            'guard_name' => 'web',
        ]);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'Test Role',
            'guard_name' => 'web',
        ]);
    }

    public function test_can_create_role_with_all_fields(): void
    {
        $team = Team::factory()->create();
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $roleData = [
            'name' => 'Full Role',
            'guard_name' => 'web',
            'team_id' => $team->id,
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
        ];

        $role = Role::factory()->create($roleData);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'Full Role',
            'guard_name' => 'web',
            'team_id' => $team->id,
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
        ]);
    }

    public function test_role_has_connection_attribute(): void
    {
        $role = new Role();

<<<<<<< HEAD
        static::assertSame('user', $role->connection);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame('user', $role->connection);
=======
        $this->assertEquals('user', $role->connection);
>>>>>>> a12f125f4a (.)
=======
        static::assertSame('user', $role->connection);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertEquals('user', $role->connection);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_role_has_key_type_attribute(): void
    {
        $role = new Role();

<<<<<<< HEAD
        static::assertSame('string', $role->keyType);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame('string', $role->keyType);
=======
        $this->assertEquals('string', $role->keyType);
>>>>>>> a12f125f4a (.)
=======
        static::assertSame('string', $role->keyType);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertEquals('string', $role->keyType);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_role_constants_are_defined(): void
    {
<<<<<<< HEAD
        static::assertSame(1, Role::ROLE_ADMINISTRATOR);
        static::assertSame(2, Role::ROLE_OWNER);
        static::assertSame(3, Role::ROLE_USER);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame(1, Role::ROLE_ADMINISTRATOR);
        static::assertSame(2, Role::ROLE_OWNER);
        static::assertSame(3, Role::ROLE_USER);
=======
        $this->assertEquals(1, Role::ROLE_ADMINISTRATOR);
        $this->assertEquals(2, Role::ROLE_OWNER);
        $this->assertEquals(3, Role::ROLE_USER);
>>>>>>> a12f125f4a (.)
=======
        static::assertSame(1, Role::ROLE_ADMINISTRATOR);
        static::assertSame(2, Role::ROLE_OWNER);
        static::assertSame(3, Role::ROLE_USER);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertEquals(1, Role::ROLE_ADMINISTRATOR);
        $this->assertEquals(2, Role::ROLE_OWNER);
        $this->assertEquals(3, Role::ROLE_USER);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_role_by_name(): void
    {
        $role = Role::factory()->create(['name' => 'Unique Role Name']);

        $foundRole = Role::where('name', 'Unique Role Name')->first();

<<<<<<< HEAD
        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
=======
        $this->assertNotNull($foundRole);
        $this->assertEquals($role->id, $foundRole->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundRole);
        $this->assertEquals($role->id, $foundRole->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_role_by_guard_name(): void
    {
        Role::factory()->create(['guard_name' => 'web']);
        Role::factory()->create(['guard_name' => 'api']);
        Role::factory()->create(['guard_name' => 'web']);

        $webRoles = Role::where('guard_name', 'web')->get();

<<<<<<< HEAD
        static::assertCount(2, $webRoles);
        static::assertTrue($webRoles->every(fn($role) => $role->guard_name === 'web'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $webRoles);
        static::assertTrue($webRoles->every(fn($role) => $role->guard_name === 'web'));
=======
        $this->assertCount(2, $webRoles);
        $this->assertTrue($webRoles->every(fn ($role) => $role->guard_name === 'web'));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $webRoles);
        static::assertTrue($webRoles->every(fn($role) => $role->guard_name === 'web'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $webRoles);
        $this->assertTrue($webRoles->every(fn ($role) => $role->guard_name === 'web'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_role_by_team_id(): void
    {
        $team = Team::factory()->create();
        $role = Role::factory()->create(['team_id' => $team->id]);

        $foundRole = Role::where('team_id', $team->id)->first();

<<<<<<< HEAD
        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
=======
        $this->assertNotNull($foundRole);
        $this->assertEquals($role->id, $foundRole->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundRole);
        $this->assertEquals($role->id, $foundRole->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_role_by_uuid(): void
    {
        $uuid = '550e8400-e29b-41d4-a716-446655440000';
        $role = Role::factory()->create(['uuid' => $uuid]);

        $foundRole = Role::where('uuid', $uuid)->first();

<<<<<<< HEAD
        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
=======
        $this->assertNotNull($foundRole);
        $this->assertEquals($role->id, $foundRole->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundRole);
        $this->assertEquals($role->id, $foundRole->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_roles_by_name_pattern(): void
    {
        Role::factory()->create(['name' => 'Admin Role']);
        Role::factory()->create(['name' => 'User Role']);
        Role::factory()->create(['name' => 'Manager Role']);

        $adminRoles = Role::where('name', 'like', '%Role%')->get();

<<<<<<< HEAD
        static::assertCount(3, $adminRoles);
        static::assertTrue($adminRoles->every(fn($role) => str_contains($role->name, 'Role')));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(3, $adminRoles);
        static::assertTrue($adminRoles->every(fn($role) => str_contains($role->name, 'Role')));
=======
        $this->assertCount(3, $adminRoles);
        $this->assertTrue($adminRoles->every(fn ($role) => str_contains($role->name, 'Role')));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(3, $adminRoles);
        static::assertTrue($adminRoles->every(fn($role) => str_contains($role->name, 'Role')));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(3, $adminRoles);
        $this->assertTrue($adminRoles->every(fn ($role) => str_contains($role->name, 'Role')));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_update_role(): void
    {
        $role = Role::factory()->create(['name' => 'Old Name']);

        $role->update(['name' => 'New Name']);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'New Name',
        ]);
    }

    public function test_can_handle_null_values(): void
    {
        $role = Role::factory()->create([
            'name' => 'Test Role',
            'guard_name' => 'web',
            'team_id' => null,
            'uuid' => null,
        ]);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'team_id' => null,
            'uuid' => null,
        ]);
    }

    public function test_can_find_roles_by_multiple_criteria(): void
    {
        $team = Team::factory()->create();
        Role::factory()->create([
            'name' => 'Admin Role',
            'guard_name' => 'web',
            'team_id' => $team->id,
        ]);

        Role::factory()->create([
            'name' => 'User Role',
            'guard_name' => 'api',
            'team_id' => $team->id,
        ]);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $roles = Role::where('team_id', $team->id)->where('guard_name', 'web')->get();

        static::assertCount(1, $roles);
        static::assertSame('Admin Role', $roles->first()->name);
        static::assertSame('web', $roles->first()->guard_name);
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $roles = Role::where('team_id', $team->id)
            ->where('guard_name', 'web')
            ->get();

        $this->assertCount(1, $roles);
        $this->assertEquals('Admin Role', $roles->first()->name);
        $this->assertEquals('web', $roles->first()->guard_name);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $roles = Role::where('team_id', $team->id)->where('guard_name', 'web')->get();

        static::assertCount(1, $roles);
        static::assertSame('Admin Role', $roles->first()->name);
        static::assertSame('web', $roles->first()->guard_name);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_role_has_permissions_relationship(): void
    {
        $role = Role::factory()->create();

<<<<<<< HEAD
        static::assertTrue(method_exists($role, 'permissions'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($role, 'permissions'));
=======
        $this->assertTrue(method_exists($role, 'permissions'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($role, 'permissions'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($role, 'permissions'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_role_has_team_relationship(): void
    {
        $role = Role::factory()->create();

<<<<<<< HEAD
        static::assertTrue(method_exists($role, 'team'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($role, 'team'));
=======
        $this->assertTrue(method_exists($role, 'team'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($role, 'team'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($role, 'team'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_role_has_users_relationship(): void
    {
        $role = Role::factory()->create();

<<<<<<< HEAD
        static::assertTrue(method_exists($role, 'users'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($role, 'users'));
=======
        $this->assertTrue(method_exists($role, 'users'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($role, 'users'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($role, 'users'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_role_can_use_permission_scopes(): void
    {
        $role = Role::factory()->create();

<<<<<<< HEAD
        static::assertTrue(method_exists($role, 'permission'));
        static::assertTrue(method_exists($role, 'withoutPermission'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($role, 'permission'));
        static::assertTrue(method_exists($role, 'withoutPermission'));
=======
        $this->assertTrue(method_exists($role, 'permission'));
        $this->assertTrue(method_exists($role, 'withoutPermission'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($role, 'permission'));
        static::assertTrue(method_exists($role, 'withoutPermission'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($role, 'permission'));
        $this->assertTrue(method_exists($role, 'withoutPermission'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_role_can_use_role_scopes(): void
    {
        $role = Role::factory()->create();

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        static::assertTrue(method_exists($role, 'role'));
        static::assertTrue(method_exists($role, 'withoutRole'));
    }
}
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $this->assertTrue(method_exists($role, 'role'));
        $this->assertTrue(method_exists($role, 'withoutRole'));
    }
}







<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($role, 'role'));
        static::assertTrue(method_exists($role, 'withoutRole'));
    }
}
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
