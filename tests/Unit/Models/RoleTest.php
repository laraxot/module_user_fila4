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
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'Test Role',
            'guard_name' => 'web',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'Test Role',
            'guard_name' => 'web',
        ]);
    }

    public function test_can_create_role_with_all_fields(): void
    {
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();

        $roleData = [
            'name' => 'Full Role',
            'guard_name' => 'web',
            'team_id' => $team->id,
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
        ];

        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create($roleData);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
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
        $role = new Role;

        static::assertSame('user', $role->connection);
    }

    public function test_role_has_key_type_attribute(): void
    {
        $role = new Role;

        static::assertSame('string', $role->keyType);
    }

    public function test_role_constants_are_defined(): void
    {
        static::assertSame(1, Role::ROLE_ADMINISTRATOR);
        static::assertSame(2, Role::ROLE_OWNER);
        static::assertSame(3, Role::ROLE_USER);
    }

    public function test_can_find_role_by_name(): void
    {
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Unique Role Name']);

        $foundRole = Role::where('name', 'Unique Role Name')->first();

        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
    }

    public function test_can_find_role_by_guard_name(): void
    {
        Role/** @phpstan-ignore-line */ ::factory()->create(['guard_name' => 'web']);
        Role/** @phpstan-ignore-line */ ::factory()->create(['guard_name' => 'api']);
        Role/** @phpstan-ignore-line */ ::factory()->create(['guard_name' => 'web']);

        $webRoles = Role::where('guard_name', 'web')->get();

        static::assertCount(2, $webRoles);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertTrue($webRoles->every(fn ($role) => $role->guard_name === 'web'));
    }

    public function test_can_find_role_by_team_id(): void
    {
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create(['team_id' => $team->id]);

        $foundRole = Role::where('team_id', $team->id)->first();

        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
    }

    public function test_can_find_role_by_uuid(): void
    {
        $uuid = '550e8400-e29b-41d4-a716-446655440000';
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create(['uuid' => $uuid]);

        $foundRole = Role::where('uuid', $uuid)->first();

        static::assertNotNull($foundRole);
        static::assertSame($role->id, $foundRole->id);
    }

    public function test_can_find_roles_by_name_pattern(): void
    {
        Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Admin Role']);
        Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'User Role']);
        Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Manager Role']);

        $adminRoles = Role::where('name', 'like', '%Role%')->get();

        static::assertCount(3, $adminRoles);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertTrue($adminRoles->every(fn ($role) => str_contains($role->name, 'Role')));
    }

    public function test_can_update_role(): void
    {
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Old Name']);

        /** @phpstan-ignore-next-line method.nonObject */
        $role->update(['name' => 'New Name']);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'New Name',
        ]);
    }

    public function test_can_handle_null_values(): void
    {
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'Test Role',
            'guard_name' => 'web',
            'team_id' => null,
            'uuid' => null,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'team_id' => null,
            'uuid' => null,
        ]);
    }

    public function test_can_find_roles_by_multiple_criteria(): void
    {
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        Role/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'Admin Role',
            'guard_name' => 'web',
            'team_id' => $team->id,
        ]);

        Role/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'User Role',
            'guard_name' => 'api',
            'team_id' => $team->id,
        ]);

        $roles = Role::where('team_id', $team->id)->where('guard_name', 'web')->get();

        static::assertCount(1, $roles);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame('Admin Role', $roles->first()->name);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame('web', $roles->first()->guard_name);
    }

    public function test_role_has_permissions_relationship(): void
    {
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create();

        static::assertTrue(method_exists($role, 'permissions'));
    }

    public function test_role_has_team_relationship(): void
    {
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create();

        static::assertTrue(method_exists($role, 'team'));
    }

    public function test_role_has_users_relationship(): void
    {
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create();

        static::assertTrue(method_exists($role, 'users'));
    }

    public function test_role_can_use_permission_scopes(): void
    {
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create();

        static::assertTrue(method_exists($role, 'permission'));
        static::assertTrue(method_exists($role, 'withoutPermission'));
    }

    public function test_role_can_use_role_scopes(): void
    {
        /** @var Role */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create();

        static::assertTrue(method_exists($role, 'role'));
        static::assertTrue(method_exists($role, 'withoutRole'));
    }
}
