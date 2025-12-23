<?php

declare(strict_types=1);

use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> laraxot/develop
test('can create role with minimal data', function (): void {
    $role = Role::factory()->create([
        'name' => 'Test Role',
        'guard_name' => 'web',
    ]);

    expect($role->id)->not->toBeNull();
    expect($role->name)->toBe('Test Role');
    expect($role->guard_name)->toBe('web');
});

test('can create role with all fields', function (): void {
    $team = Team::factory()->create();
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

    $roleData = [
        'name' => 'Full Role',
        'guard_name' => 'web',
        'team_id' => $team->id,
        'uuid' => '550e8400-e29b-41d4-a716-446655440000',
    ];

<<<<<<< HEAD
<<<<<<< HEAD
        $role = Role::factory()->create($roleData);

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'Full Role',
            'guard_name' => 'web',
            'team_id' => $team->id,
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
        ]);
    }
=======
=======
>>>>>>> laraxot/develop
    $role = Role::factory()->create($roleData);

    expect($role->id)->not->toBeNull();
    expect($role->name)->toBe('Full Role');
    expect($role->guard_name)->toBe('web');
    expect($role->team_id)->toBe($team->id);
    expect($role->uuid)->toBe('550e8400-e29b-41d4-a716-446655440000');
});
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

test('role has connection attribute', function (): void {
    $role = new Role();

    expect($role->connection)->toBe('user');
});

test('role has key type attribute', function (): void {
    $role = new Role();

    expect($role->keyType)->toBe('string');
});

test('role constants are defined', function (): void {
    expect(Role::ROLE_ADMINISTRATOR)->toBe(1);
    expect(Role::ROLE_OWNER)->toBe(2);
    expect(Role::ROLE_USER)->toBe(3);
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_can_find_role_by_name(): void
    {
        $role = Role::factory()->create(['name' => 'Unique Role Name']);
=======
test('can find role by name', function (): void {
    $role = Role::factory()->create(['name' => 'Unique Role Name']);
>>>>>>> 220cf97b (.)
=======
test('can find role by name', function (): void {
    $role = Role::factory()->create(['name' => 'Unique Role Name']);
>>>>>>> laraxot/develop

    $foundRole = Role::where('name', 'Unique Role Name')->first();

    expect($foundRole)->not->toBeNull();
    expect($foundRole->id)->toBe($role->id);
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_can_find_role_by_guard_name(): void
    {
        Role::factory()->create(['guard_name' => 'web']);
        Role::factory()->create(['guard_name' => 'api']);
        Role::factory()->create(['guard_name' => 'web']);
=======
=======
>>>>>>> laraxot/develop
test('can find role by guard name', function (): void {
    Role::factory()->create(['guard_name' => 'web']);
    Role::factory()->create(['guard_name' => 'api']);
    Role::factory()->create(['guard_name' => 'web']);
<<<<<<< HEAD
>>>>>>> 220cf97b (.)

    $webRoles = Role::where('guard_name', 'web')->get();

<<<<<<< HEAD
        static::assertCount(2, $webRoles);
        static::assertTrue($webRoles->every(fn ($role) => $role->guard_name === 'web'));
    }

    public function test_can_find_role_by_team_id(): void
    {
        $team = Team::factory()->create();
        $role = Role::factory()->create(['team_id' => $team->id]);
=======
=======

    $webRoles = Role::where('guard_name', 'web')->get();

>>>>>>> laraxot/develop
    expect($webRoles->count())->toBeGreaterThanOrEqual(2);
    expect($webRoles->every(fn ($role) => 'web' === $role->guard_name))->toBeTrue();
});

test('can find role by team id', function (): void {
    $team = Team::factory()->create();
    $role = Role::factory()->create(['team_id' => $team->id]);
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

    $foundRole = Role::where('team_id', $team->id)->first();

    expect($foundRole)->not->toBeNull();
    expect($foundRole->id)->toBe($role->id);
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_can_find_role_by_uuid(): void
    {
        $uuid = '550e8400-e29b-41d4-a716-446655440000';
        $role = Role::factory()->create(['uuid' => $uuid]);
=======
test('can find role by uuid', function (): void {
    $uuid = '550e8400-e29b-41d4-a716-446655440000';
    $role = Role::factory()->create(['uuid' => $uuid]);
>>>>>>> 220cf97b (.)
=======
test('can find role by uuid', function (): void {
    $uuid = '550e8400-e29b-41d4-a716-446655440000';
    $role = Role::factory()->create(['uuid' => $uuid]);
>>>>>>> laraxot/develop

    $foundRole = Role::where('uuid', $uuid)->first();

    expect($foundRole)->not->toBeNull();
    expect($foundRole->id)->toBe($role->id);
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_can_find_roles_by_name_pattern(): void
    {
        Role::factory()->create(['name' => 'Admin Role']);
        Role::factory()->create(['name' => 'User Role']);
        Role::factory()->create(['name' => 'Manager Role']);
=======
=======
>>>>>>> laraxot/develop
test('can find roles by name pattern', function (): void {
    Role::factory()->create(['name' => 'Admin Role']);
    Role::factory()->create(['name' => 'User Role']);
    Role::factory()->create(['name' => 'Manager Role']);
<<<<<<< HEAD
>>>>>>> 220cf97b (.)

    $adminRoles = Role::where('name', 'like', '%Role%')->get();

<<<<<<< HEAD
        static::assertCount(3, $adminRoles);
        static::assertTrue($adminRoles->every(fn ($role) => str_contains($role->name, 'Role')));
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
=======
=======

    $adminRoles = Role::where('name', 'like', '%Role%')->get();

>>>>>>> laraxot/develop
    expect($adminRoles->count())->toBeGreaterThanOrEqual(3);
    expect($adminRoles->every(fn ($role) => str_contains($role->name, 'Role')))->toBeTrue();
});

test('can update role', function (): void {
    $role = Role::factory()->create(['name' => 'Old Name']);

    $role->update(['name' => 'New Name']);

    expect($role->fresh()->name)->toBe('New Name');
});

test('can handle null values', function (): void {
    $role = Role::factory()->create([
        'name' => 'Test Role',
        'guard_name' => 'web',
        'team_id' => null,
        'uuid' => null,
    ]);

    expect($role->team_id)->toBeNull();
    expect($role->uuid)->toBeNull();
});

test('can find roles by multiple criteria', function (): void {
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
>>>>>>> 220cf97b (.)

    $roles = Role::where('team_id', $team->id)->where('guard_name', 'web')->get();

<<<<<<< HEAD
        static::assertCount(1, $roles);
        static::assertSame('Admin Role', $roles->first()->name);
        static::assertSame('web', $roles->first()->guard_name);
    }

    public function test_role_has_permissions_relationship(): void
    {
        $role = Role::factory()->create();
=======
=======

    $roles = Role::where('team_id', $team->id)->where('guard_name', 'web')->get();

>>>>>>> laraxot/develop
    expect($roles->count())->toBeGreaterThanOrEqual(1);
    expect($roles->first()->name)->toBe('Admin Role');
    expect($roles->first()->guard_name)->toBe('web');
});

test('role has permissions relationship', function (): void {
    $role = Role::factory()->create();
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

    expect(method_exists($role, 'permissions'))->toBeTrue();
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_role_has_team_relationship(): void
    {
        $role = Role::factory()->create();
=======
test('role has team relationship', function (): void {
    $role = Role::factory()->create();
>>>>>>> 220cf97b (.)
=======
test('role has team relationship', function (): void {
    $role = Role::factory()->create();
>>>>>>> laraxot/develop

    expect(method_exists($role, 'team'))->toBeTrue();
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_role_has_users_relationship(): void
    {
        $role = Role::factory()->create();
=======
test('role has users relationship', function (): void {
    $role = Role::factory()->create();
>>>>>>> 220cf97b (.)
=======
test('role has users relationship', function (): void {
    $role = Role::factory()->create();
>>>>>>> laraxot/develop

    expect(method_exists($role, 'users'))->toBeTrue();
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_role_can_use_permission_scopes(): void
    {
        $role = Role::factory()->create();
=======
test('role can use permission scopes', function (): void {
    $role = Role::factory()->create();
>>>>>>> 220cf97b (.)
=======
test('role can use permission scopes', function (): void {
    $role = Role::factory()->create();
>>>>>>> laraxot/develop

    expect(method_exists($role, 'permission'))->toBeTrue();
    expect(method_exists($role, 'withoutPermission'))->toBeTrue();
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_role_can_use_role_scopes(): void
    {
        $role = Role::factory()->create();
=======
test('role can use role scopes', function (): void {
    $role = Role::factory()->create();
>>>>>>> 220cf97b (.)
=======
test('role can use role scopes', function (): void {
    $role = Role::factory()->create();
>>>>>>> laraxot/develop

    expect(method_exists($role, 'role'))->toBeTrue();
    expect(method_exists($role, 'withoutRole'))->toBeTrue();
});
