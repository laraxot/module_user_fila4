<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\Permission;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreatePermissionWithMinimalData(): void
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

    public function testCanCreatePermissionWithAllFields(): void
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

    public function testPermissionHasConnectionAttribute(): void
    {
        $permission = new Permission();

        static::assertSame('user', $permission->connection);
    }

    public function testPermissionHasKeyTypeAttribute(): void
    {
        $permission = new Permission();

        static::assertSame('string', $permission->keyType);
    }

    public function testPermissionHasFillableAttributes(): void
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

        static::assertSame($expectedFillable, $permission->getFillable());
    }

    public function testPermissionHasCasts(): void
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

        static::assertSame($expectedCasts, $permission->getCasts());
    }

    public function testCanFindPermissionByName(): void
    {
        $permission = Permission::factory()->create(['name' => 'unique.permission']);

        $foundPermission = Permission::where('name', 'unique.permission')->first();

        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
    }

    public function testCanFindPermissionByGuardName(): void
    {
        Permission::factory()->create(['guard_name' => 'web']);
        Permission::factory()->create(['guard_name' => 'api']);
        Permission::factory()->create(['guard_name' => 'web']);

        $webPermissions = Permission::where('guard_name', 'web')->get();

        static::assertCount(2, $webPermissions);
        static::assertTrue($webPermissions->every(fn ($permission) => 'web' === $permission->guard_name));
    }

    public function testCanFindPermissionByCreatedBy(): void
    {
        $permission = Permission::factory()->create(['created_by' => 'user123']);

        $foundPermission = Permission::where('created_by', 'user123')->first();

        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
    }

    public function testCanFindPermissionByUpdatedBy(): void
    {
        $permission = Permission::factory()->create(['updated_by' => 'user456']);

        $foundPermission = Permission::where('updated_by', 'user456')->first();

        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
    }

    public function testCanFindPermissionsByNamePattern(): void
    {
        Permission::factory()->create(['name' => 'user.create']);
        Permission::factory()->create(['name' => 'user.update']);
        Permission::factory()->create(['name' => 'user.delete']);
        Permission::factory()->create(['name' => 'post.read']);

        $userPermissions = Permission::where('name', 'like', 'user.%')->get();

        static::assertCount(3, $userPermissions);
        static::assertTrue($userPermissions->every(fn ($permission) => str_starts_with($permission->name, 'user.')));
    }

    public function testCanUpdatePermission(): void
    {
        $permission = Permission::factory()->create(['name' => 'old.permission']);

        $permission->update(['name' => 'new.permission']);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'name' => 'new.permission',
        ]);
    }

    public function testCanHandleNullValues(): void
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

    public function testCanFindPermissionsByMultipleCriteria(): void
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

        $permissions = Permission::where('name', 'like', 'admin.user.%')->where('created_by', 'admin')->get();

        static::assertCount(2, $permissions);
        static::assertTrue($permissions->every(
            fn ($permission) => str_starts_with($permission->name, 'admin.user.') && 'admin' === $permission->created_by,
        ));
    }

    public function testPermissionHasRolesRelationship(): void
    {
        $permission = Permission::factory()->create();

        static::assertTrue(method_exists($permission, 'roles'));
    }

    public function testPermissionHasUsersRelationship(): void
    {
        $permission = Permission::factory()->create();

        static::assertTrue(method_exists($permission, 'users'));
    }

    public function testPermissionCanUseRoleScopes(): void
    {
        $permission = Permission::factory()->create();

        static::assertTrue(method_exists($permission, 'role'));
    }

    public function testPermissionCanUsePermissionScopes(): void
    {
        $permission = Permission::factory()->create();

        static::assertTrue(method_exists($permission, 'permission'));
        static::assertTrue(method_exists($permission, 'withoutPermission'));
    }

    public function testPermissionCanUseWithoutRoleScopes(): void
    {
        $permission = Permission::factory()->create();

        static::assertTrue(method_exists($permission, 'withoutRole'));
    }

    public function testPermissionHasFactoryMethod(): void
    {
        $permission = new Permission();

        static::assertTrue(method_exists($permission, 'newFactory'));
    }

    public function testPermissionHasGetTableMethod(): void
    {
        $permission = new Permission();

        static::assertTrue(method_exists($permission, 'getTable'));
    }
}
