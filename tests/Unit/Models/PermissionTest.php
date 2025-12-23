<?php

declare(strict_types=1);

use Modules\User\Models\Permission;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_can_create_permission_with_minimal_data(): void
    {
        $permission = Permission::factory()->create([
            'name' => 'test.permission',
            'guard_name' => 'web',
        ]);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'name' => 'test.permission',
            'guard_name' => 'web',
        ]);
    }
=======
=======
>>>>>>> laraxot/develop
test('can create permission with minimal data', function (): void {
    $permission = Permission::factory()->create([
        'name' => 'test.permission',
        'guard_name' => 'web',
    ]);

    expect($permission->id)->not->toBeNull();
    expect($permission->name)->toBe('test.permission');
    expect($permission->guard_name)->toBe('web');
});
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

test('can create permission with all fields', function (): void {
    $permissionData = [
        'name' => 'full.permission',
        'guard_name' => 'web',
        'created_by' => 'user123',
        'updated_by' => 'user456',
    ];

<<<<<<< HEAD
<<<<<<< HEAD
        $permission = Permission::factory()->create($permissionData);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'name' => 'full.permission',
            'guard_name' => 'web',
            'created_by' => 'user123',
            'updated_by' => 'user456',
        ]);
    }
=======
=======
>>>>>>> laraxot/develop
    $permission = Permission::factory()->create($permissionData);

    expect($permission->id)->not->toBeNull();
    expect($permission->name)->toBe('full.permission');
    expect($permission->guard_name)->toBe('web');
    expect($permission->created_by)->toBe('user123');
    expect($permission->updated_by)->toBe('user456');
});
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

test('permission has connection attribute', function (): void {
    $permission = new Permission();

<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame('user', $permission->connection);
    }
=======
    expect($permission->connection)->toBe('user');
});
>>>>>>> 220cf97b (.)
=======
    expect($permission->connection)->toBe('user');
});
>>>>>>> laraxot/develop

test('permission has key type attribute', function (): void {
    $permission = new Permission();

<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame('string', $permission->keyType);
    }
=======
    expect($permission->keyType)->toBe('string');
});
>>>>>>> 220cf97b (.)
=======
    expect($permission->keyType)->toBe('string');
});
>>>>>>> laraxot/develop

test('permission has fillable attributes', function (): void {
    $permission = new Permission();

    $fillable = $permission->getFillable();

<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame($expectedFillable, $permission->getFillable());
    }
=======
=======
>>>>>>> laraxot/develop
    expect($fillable)->toContain('id');
    expect($fillable)->toContain('name');
    expect($fillable)->toContain('guard_name');
});
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

test('permission has casts', function (): void {
    $permission = new Permission();

    $casts = $permission->getCasts();

<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame($expectedCasts, $permission->getCasts());
    }

    public function test_can_find_permission_by_name(): void
    {
        $permission = Permission::factory()->create(['name' => 'unique.permission']);
=======
=======
>>>>>>> laraxot/develop
    expect($casts)->toHaveKey('id');
    expect($casts)->toHaveKey('name');
    expect($casts)->toHaveKey('guard_name');
    expect($casts)->toHaveKey('created_at');
    expect($casts)->toHaveKey('updated_at');
});

test('can find permission by name', function (): void {
    $permission = Permission::factory()->create(['name' => 'unique.permission']);
<<<<<<< HEAD
>>>>>>> 220cf97b (.)

    $foundPermission = Permission::where('name', 'unique.permission')->first();

<<<<<<< HEAD
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
    }

    public function test_can_find_permission_by_guard_name(): void
    {
        Permission::factory()->create(['guard_name' => 'web']);
        Permission::factory()->create(['guard_name' => 'api']);
        Permission::factory()->create(['guard_name' => 'web']);
=======
=======

    $foundPermission = Permission::where('name', 'unique.permission')->first();

>>>>>>> laraxot/develop
    expect($foundPermission)->not->toBeNull();
    expect($foundPermission->id)->toBe($permission->id);
});

test('can find permission by guard name', function (): void {
    Permission::factory()->create(['guard_name' => 'web']);
    Permission::factory()->create(['guard_name' => 'api']);
    Permission::factory()->create(['guard_name' => 'web']);
<<<<<<< HEAD
>>>>>>> 220cf97b (.)

    $webPermissions = Permission::where('guard_name', 'web')->get();

<<<<<<< HEAD
        static::assertCount(2, $webPermissions);
        static::assertTrue($webPermissions->every(fn ($permission) => $permission->guard_name === 'web'));
    }

    public function test_can_find_permission_by_created_by(): void
    {
        $permission = Permission::factory()->create(['created_by' => 'user123']);
=======
=======

    $webPermissions = Permission::where('guard_name', 'web')->get();

>>>>>>> laraxot/develop
    expect($webPermissions->count())->toBeGreaterThanOrEqual(2);
    expect($webPermissions->every(fn ($permission) => 'web' === $permission->guard_name))->toBeTrue();
});

test('can find permission by created by', function (): void {
    $permission = Permission::factory()->create(['created_by' => 'user123']);
<<<<<<< HEAD
>>>>>>> 220cf97b (.)

    $foundPermission = Permission::where('created_by', 'user123')->first();

<<<<<<< HEAD
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
    }

    public function test_can_find_permission_by_updated_by(): void
    {
        $permission = Permission::factory()->create(['updated_by' => 'user456']);
=======
=======

    $foundPermission = Permission::where('created_by', 'user123')->first();

>>>>>>> laraxot/develop
    expect($foundPermission)->not->toBeNull();
    expect($foundPermission->id)->toBe($permission->id);
});

test('can find permission by updated by', function (): void {
    $permission = Permission::factory()->create(['updated_by' => 'user456']);
<<<<<<< HEAD
>>>>>>> 220cf97b (.)

    $foundPermission = Permission::where('updated_by', 'user456')->first();

<<<<<<< HEAD
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
    }

    public function test_can_find_permissions_by_name_pattern(): void
    {
        Permission::factory()->create(['name' => 'user.create']);
        Permission::factory()->create(['name' => 'user.update']);
        Permission::factory()->create(['name' => 'user.delete']);
        Permission::factory()->create(['name' => 'post.read']);
=======
=======

    $foundPermission = Permission::where('updated_by', 'user456')->first();

>>>>>>> laraxot/develop
    expect($foundPermission)->not->toBeNull();
    expect($foundPermission->id)->toBe($permission->id);
});

test('can find permissions by name pattern', function (): void {
    Permission::factory()->create(['name' => 'user.create']);
    Permission::factory()->create(['name' => 'user.update']);
    Permission::factory()->create(['name' => 'user.delete']);
    Permission::factory()->create(['name' => 'post.read']);
<<<<<<< HEAD
>>>>>>> 220cf97b (.)

    $userPermissions = Permission::where('name', 'like', 'user.%')->get();

<<<<<<< HEAD
        static::assertCount(3, $userPermissions);
        static::assertTrue($userPermissions->every(fn ($permission) => str_starts_with($permission->name, 'user.')));
    }

    public function test_can_update_permission(): void
    {
        $permission = Permission::factory()->create(['name' => 'old.permission']);

        $permission->update(['name' => 'new.permission']);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'name' => 'new.permission',
        ]);
    }

    public function test_can_handle_null_values(): void
    {
        $permission = Permission::factory()->create([
            'name' => 'test.permission',
            'guard_name' => 'web',
            'created_by' => null,
            'updated_by' => null,
        ]);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'created_by' => null,
            'updated_by' => null,
        ]);
    }

    public function test_can_find_permissions_by_multiple_criteria(): void
    {
        Permission::factory()->create([
            'name' => 'admin.user.create',
            'guard_name' => 'web',
            'created_by' => 'admin',
        ]);

        Permission::factory()->create([
            'name' => 'admin.user.update',
            'guard_name' => 'api',
            'created_by' => 'admin',
        ]);
=======
=======

    $userPermissions = Permission::where('name', 'like', 'user.%')->get();

>>>>>>> laraxot/develop
    expect($userPermissions->count())->toBeGreaterThanOrEqual(3);
    expect($userPermissions->every(fn ($permission) => str_starts_with($permission->name, 'user.')))->toBeTrue();
});

test('can update permission', function (): void {
    $permission = Permission::factory()->create(['name' => 'old.permission']);

    $permission->update(['name' => 'new.permission']);

    expect($permission->fresh()->name)->toBe('new.permission');
});

test('can handle null values', function (): void {
    $permission = Permission::factory()->create([
        'name' => 'test.permission',
        'guard_name' => 'web',
        'created_by' => null,
        'updated_by' => null,
    ]);

    expect($permission->created_by)->toBeNull();
    expect($permission->updated_by)->toBeNull();
});

test('can find permissions by multiple criteria', function (): void {
    Permission::factory()->create([
        'name' => 'admin.user.create',
        'guard_name' => 'web',
        'created_by' => 'admin',
    ]);

    Permission::factory()->create([
        'name' => 'admin.user.update',
        'guard_name' => 'api',
        'created_by' => 'admin',
    ]);
<<<<<<< HEAD
>>>>>>> 220cf97b (.)

    $permissions = Permission::where('name', 'like', 'admin.user.%')->where('created_by', 'admin')->get();

<<<<<<< HEAD
        static::assertCount(2, $permissions);
        static::assertTrue($permissions->every(
            fn ($permission) => str_starts_with($permission->name, 'admin.user.') && $permission->created_by === 'admin',
        ));
    }

    public function test_permission_has_roles_relationship(): void
    {
        $permission = Permission::factory()->create();
=======
=======

    $permissions = Permission::where('name', 'like', 'admin.user.%')->where('created_by', 'admin')->get();

>>>>>>> laraxot/develop
    expect($permissions->count())->toBeGreaterThanOrEqual(2);
    expect($permissions->every(
        fn ($permission) => str_starts_with($permission->name, 'admin.user.') && 'admin' === $permission->created_by,
    ))->toBeTrue();
});

test('permission has roles relationship', function (): void {
    $permission = Permission::factory()->create();
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

    expect(method_exists($permission, 'roles'))->toBeTrue();
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_permission_has_users_relationship(): void
    {
        $permission = Permission::factory()->create();
=======
test('permission has users relationship', function (): void {
    $permission = Permission::factory()->create();
>>>>>>> 220cf97b (.)
=======
test('permission has users relationship', function (): void {
    $permission = Permission::factory()->create();
>>>>>>> laraxot/develop

    expect(method_exists($permission, 'users'))->toBeTrue();
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_permission_can_use_role_scopes(): void
    {
        $permission = Permission::factory()->create();
=======
test('permission can use role scopes', function (): void {
    $permission = Permission::factory()->create();
>>>>>>> 220cf97b (.)
=======
test('permission can use role scopes', function (): void {
    $permission = Permission::factory()->create();
>>>>>>> laraxot/develop

    expect(method_exists($permission, 'role'))->toBeTrue();
});

<<<<<<< HEAD
<<<<<<< HEAD
    public function test_permission_can_use_permission_scopes(): void
    {
        $permission = Permission::factory()->create();

        static::assertTrue(method_exists($permission, 'permission'));
        static::assertTrue(method_exists($permission, 'withoutPermission'));
    }

    public function test_permission_can_use_without_role_scopes(): void
    {
        $permission = Permission::factory()->create();
=======
=======
>>>>>>> laraxot/develop
test('permission can use permission scopes', function (): void {
    $permission = Permission::factory()->create();

    expect(method_exists($permission, 'permission'))->toBeTrue();
    expect(method_exists($permission, 'withoutPermission'))->toBeTrue();
});

test('permission can use without role scopes', function (): void {
    $permission = Permission::factory()->create();
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

    expect(method_exists($permission, 'withoutRole'))->toBeTrue();
});

test('permission has factory method', function (): void {
    $permission = new Permission();

<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'newFactory'));
    }
=======
    expect(method_exists($permission, 'newFactory'))->toBeTrue();
});
>>>>>>> 220cf97b (.)
=======
    expect(method_exists($permission, 'newFactory'))->toBeTrue();
});
>>>>>>> laraxot/develop

test('permission has get table method', function (): void {
    $permission = new Permission();

<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'getTable'));
    }
}
=======
    expect(method_exists($permission, 'getTable'))->toBeTrue();
});
>>>>>>> 220cf97b (.)
=======
    expect(method_exists($permission, 'getTable'))->toBeTrue();
});
>>>>>>> laraxot/develop
