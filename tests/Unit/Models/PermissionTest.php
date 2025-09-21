<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\Permission;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

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

    public function test_can_create_permission_with_all_fields(): void
    {
        $permissionData = [
            'name' => 'full.permission',
            'guard_name' => 'web',
            'created_by' => 'user123',
            'updated_by' => 'user456',
        ];

        $permission = Permission::factory()->create($permissionData);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'name' => 'full.permission',
            'guard_name' => 'web',
            'created_by' => 'user123',
            'updated_by' => 'user456',
        ]);
    }

    public function test_permission_has_connection_attribute(): void
    {
        $permission = new Permission();

<<<<<<< HEAD
        static::assertSame('user', $permission->connection);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame('user', $permission->connection);
=======
        $this->assertEquals('user', $permission->connection);
>>>>>>> a12f125f4a (.)
=======
        static::assertSame('user', $permission->connection);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertEquals('user', $permission->connection);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_permission_has_key_type_attribute(): void
    {
        $permission = new Permission();

<<<<<<< HEAD
        static::assertSame('string', $permission->keyType);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame('string', $permission->keyType);
=======
        $this->assertEquals('string', $permission->keyType);
>>>>>>> a12f125f4a (.)
=======
        static::assertSame('string', $permission->keyType);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertEquals('string', $permission->keyType);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_permission_has_fillable_attributes(): void
    {
        $permission = new Permission();

        $expectedFillable = [
            'id',
            'name',
            'guard_name',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ];

<<<<<<< HEAD
        static::assertSame($expectedFillable, $permission->getFillable());
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame($expectedFillable, $permission->getFillable());
=======
        $this->assertEquals($expectedFillable, $permission->getFillable());
>>>>>>> a12f125f4a (.)
=======
        static::assertSame($expectedFillable, $permission->getFillable());
>>>>>>> b93ef594b4 (.)
=======
        $this->assertEquals($expectedFillable, $permission->getFillable());
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_permission_has_casts(): void
    {
        $permission = new Permission();

        $expectedCasts = [
            'id' => 'string',
            'uuid' => 'string',
            'name' => 'string',
            'guard_name' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];

<<<<<<< HEAD
        static::assertSame($expectedCasts, $permission->getCasts());
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame($expectedCasts, $permission->getCasts());
=======
        $this->assertEquals($expectedCasts, $permission->getCasts());
>>>>>>> a12f125f4a (.)
=======
        static::assertSame($expectedCasts, $permission->getCasts());
>>>>>>> b93ef594b4 (.)
=======
        $this->assertEquals($expectedCasts, $permission->getCasts());
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_permission_by_name(): void
    {
        $permission = Permission::factory()->create(['name' => 'unique.permission']);

        $foundPermission = Permission::where('name', 'unique.permission')->first();

<<<<<<< HEAD
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
=======
        $this->assertNotNull($foundPermission);
        $this->assertEquals($permission->id, $foundPermission->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundPermission);
        $this->assertEquals($permission->id, $foundPermission->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_permission_by_guard_name(): void
    {
        Permission::factory()->create(['guard_name' => 'web']);
        Permission::factory()->create(['guard_name' => 'api']);
        Permission::factory()->create(['guard_name' => 'web']);

        $webPermissions = Permission::where('guard_name', 'web')->get();

<<<<<<< HEAD
        static::assertCount(2, $webPermissions);
        static::assertTrue($webPermissions->every(fn($permission) => $permission->guard_name === 'web'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $webPermissions);
        static::assertTrue($webPermissions->every(fn($permission) => $permission->guard_name === 'web'));
=======
        $this->assertCount(2, $webPermissions);
        $this->assertTrue($webPermissions->every(fn ($permission) => $permission->guard_name === 'web'));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $webPermissions);
        static::assertTrue($webPermissions->every(fn($permission) => $permission->guard_name === 'web'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $webPermissions);
        $this->assertTrue($webPermissions->every(fn ($permission) => $permission->guard_name === 'web'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_permission_by_created_by(): void
    {
        $permission = Permission::factory()->create(['created_by' => 'user123']);

        $foundPermission = Permission::where('created_by', 'user123')->first();

<<<<<<< HEAD
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
=======
        $this->assertNotNull($foundPermission);
        $this->assertEquals($permission->id, $foundPermission->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundPermission);
        $this->assertEquals($permission->id, $foundPermission->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_permission_by_updated_by(): void
    {
        $permission = Permission::factory()->create(['updated_by' => 'user456']);

        $foundPermission = Permission::where('updated_by', 'user456')->first();

<<<<<<< HEAD
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
=======
        $this->assertNotNull($foundPermission);
        $this->assertEquals($permission->id, $foundPermission->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundPermission);
        $this->assertEquals($permission->id, $foundPermission->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_permissions_by_name_pattern(): void
    {
        Permission::factory()->create(['name' => 'user.create']);
        Permission::factory()->create(['name' => 'user.update']);
        Permission::factory()->create(['name' => 'user.delete']);
        Permission::factory()->create(['name' => 'post.read']);

        $userPermissions = Permission::where('name', 'like', 'user.%')->get();

<<<<<<< HEAD
        static::assertCount(3, $userPermissions);
        static::assertTrue($userPermissions->every(fn($permission) => str_starts_with($permission->name, 'user.')));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(3, $userPermissions);
        static::assertTrue($userPermissions->every(fn($permission) => str_starts_with($permission->name, 'user.')));
=======
        $this->assertCount(3, $userPermissions);
        $this->assertTrue($userPermissions->every(fn ($permission) => str_starts_with($permission->name, 'user.')));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(3, $userPermissions);
        static::assertTrue($userPermissions->every(fn($permission) => str_starts_with($permission->name, 'user.')));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(3, $userPermissions);
        $this->assertTrue($userPermissions->every(fn ($permission) => str_starts_with($permission->name, 'user.')));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $permissions = Permission::where('name', 'like', 'admin.user.%')->where('created_by', 'admin')->get();

        static::assertCount(2, $permissions);
        static::assertTrue($permissions->every(
            fn($permission) => str_starts_with($permission->name, 'admin.user.') && $permission->created_by === 'admin',
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $permissions = Permission::where('name', 'like', 'admin.user.%')
            ->where('created_by', 'admin')
            ->get();

        $this->assertCount(2, $permissions);
        $this->assertTrue($permissions->every(fn ($permission) => 
            str_starts_with($permission->name, 'admin.user.') && $permission->created_by === 'admin'
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $permissions = Permission::where('name', 'like', 'admin.user.%')->where('created_by', 'admin')->get();

        static::assertCount(2, $permissions);
        static::assertTrue($permissions->every(
            fn($permission) => str_starts_with($permission->name, 'admin.user.') && $permission->created_by === 'admin',
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ));
    }

    public function test_permission_has_roles_relationship(): void
    {
        $permission = Permission::factory()->create();

<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'roles'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'roles'));
=======
        $this->assertTrue(method_exists($permission, 'roles'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($permission, 'roles'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($permission, 'roles'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_permission_has_users_relationship(): void
    {
        $permission = Permission::factory()->create();

<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'users'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'users'));
=======
        $this->assertTrue(method_exists($permission, 'users'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($permission, 'users'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($permission, 'users'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_permission_can_use_role_scopes(): void
    {
        $permission = Permission::factory()->create();

<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'role'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'role'));
=======
        $this->assertTrue(method_exists($permission, 'role'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($permission, 'role'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($permission, 'role'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_permission_can_use_permission_scopes(): void
    {
        $permission = Permission::factory()->create();

<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'permission'));
        static::assertTrue(method_exists($permission, 'withoutPermission'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'permission'));
        static::assertTrue(method_exists($permission, 'withoutPermission'));
=======
        $this->assertTrue(method_exists($permission, 'permission'));
        $this->assertTrue(method_exists($permission, 'withoutPermission'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($permission, 'permission'));
        static::assertTrue(method_exists($permission, 'withoutPermission'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($permission, 'permission'));
        $this->assertTrue(method_exists($permission, 'withoutPermission'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_permission_can_use_without_role_scopes(): void
    {
        $permission = Permission::factory()->create();

<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'withoutRole'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'withoutRole'));
=======
        $this->assertTrue(method_exists($permission, 'withoutRole'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($permission, 'withoutRole'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($permission, 'withoutRole'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_permission_has_factory_method(): void
    {
        $permission = new Permission();

<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'newFactory'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'newFactory'));
=======
        $this->assertTrue(method_exists($permission, 'newFactory'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($permission, 'newFactory'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($permission, 'newFactory'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_permission_has_get_table_method(): void
    {
        $permission = new Permission();

<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'getTable'));
    }
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($permission, 'getTable'));
    }
}
=======
=======
>>>>>>> origin/develop
        $this->assertTrue(method_exists($permission, 'getTable'));
    }
}







<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($permission, 'getTable'));
    }
}
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
