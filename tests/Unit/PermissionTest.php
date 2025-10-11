<?php

declare(strict_types=1);

use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    $this->permission = Permission/** @phpstan-ignore-line */ ::factory()->create([
        'name' => 'test-permission',
        'guard_name' => 'web',
    ]);
});

test('permission can be created', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission)->toBeInstanceOf(Permission::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->name)->toBe('test-permission');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->guard_name)->toBe('web');
});

test('permission has correct fillable attributes', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $fillable = $this->permission->getFillable();

    expect($fillable)->toContain('id');
    expect($fillable)->toContain('name');
    expect($fillable)->toContain('guard_name');
    expect($fillable)->toContain('created_at');
    expect($fillable)->toContain('updated_at');
    expect($fillable)->toContain('created_by');
    expect($fillable)->toContain('updated_by');
});

test('permission has correct table configuration', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $table = $this->permission->getTable();

    expect($table)->toBeString();
    expect($table)->not->toBeEmpty();
});

test('permission has correct casts', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $casts = $this->permission->getCasts();

    expect($casts)->toHaveKey('id');
    expect($casts)->toHaveKey('uuid');
    expect($casts)->toHaveKey('name');
    expect($casts)->toHaveKey('guard_name');
    expect($casts)->toHaveKey('created_at');
    expect($casts)->toHaveKey('updated_at');

    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($casts['id'])->toBe('string');
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($casts['uuid'])->toBe('string');
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($casts['name'])->toBe('string');
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($casts['guard_name'])->toBe('string');
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($casts['created_at'])->toBe('datetime');
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($casts['updated_at'])->toBe('datetime');
});

test('permission can be updated', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->update([
        'name' => 'updated-permission',
        'guard_name' => 'api',
    ]);

    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->refresh();

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->name)->toBe('updated-permission');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->guard_name)->toBe('api');
});

test('permission can be deleted', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $permissionId = $this->permission->id;

    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->delete();

    expect(Permission::find($permissionId))->toBeNull();
});

test('permission can be assigned to roles', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create([
        'name' => 'test-role',
        'guard_name' => 'web',
    ]);

    /** @phpstan-ignore-next-line property.notFound */
    $role->givePermissionTo($this->permission);

    /** @phpstan-ignore-next-line property.notFound */
    expect($role->hasPermissionTo($this->permission))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->roles)->toHaveCount(1);
});

test('permission can be assigned to multiple roles', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $role1 = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'role-1']);
    /** @var \Illuminate\Database\Eloquent\Collection */
        $role2 = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'role-2']);

    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->assignRole($role1);
    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->assignRole($role2);

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->roles)->toHaveCount(2);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasRole($role1))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasRole($role2))->toBeTrue();
});

test('permission can be found by name', function (): void {
    $foundPermission = Permission::where('name', 'test-permission')->first();

    expect($foundPermission)->toBeInstanceOf(Permission::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($foundPermission->id)->toBe($this->permission->id);
});

test('permission can be found by guard', function (): void {
    $webPermissions = Permission::where('guard_name', 'web')->get();

    expect($webPermissions)->toHaveCount(1);
    /** @phpstan-ignore-next-line property.notFound */
    expect($webPermissions->first()->id)->toBe($this->permission->id);
});

test('permission has timestamps', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->created_at)->not->toBeNull();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->updated_at)->not->toBeNull();
});

test('permission can be created with factory', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission/** @phpstan-ignore-line */ ::factory()->create();

    expect($permission)->toBeInstanceOf(Permission::class);
    expect($permission->name)->not->toBeEmpty();
    expect($permission->guard_name)->not->toBeEmpty();
});

test('permission can be created with specific attributes', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $permission = Permission/** @phpstan-ignore-line */ ::factory()->create([
        'name' => 'custom-permission',
        'guard_name' => 'custom-guard',
    ]);

    expect($permission->name)->toBe('custom-permission');
    expect($permission->guard_name)->toBe('custom-guard');
});

test('permission can check if it has role', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'test-role']);

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasRole($role))->toBeFalse();

    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->assignRole($role);

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasRole($role))->toBeTrue();
});

test('permission can check if it has any roles', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasAnyRole([]))->toBeFalse();

    /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'test-role']);
    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->assignRole($role);

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasAnyRole([$role]))->toBeTrue();
});

test('permission can check if it has all roles', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $role1 = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'role-1']);
    /** @var \Illuminate\Database\Eloquent\Collection */
        $role2 = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'role-2']);

    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->syncRoles([$role1, $role2]);

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasAllRoles([$role1, $role2]))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasAllRoles([$role1]))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasAllRoles([$role1, $role2, 'non-existent']))->toBeFalse();
});

test('permission can be revoked from role', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $role = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'test-role']);

    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->assignRole($role);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasRole($role))->toBeTrue();

    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->removeRole($role);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasRole($role))->toBeFalse();
});

test('permission can be synced with roles', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $role1 = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'role-1']);
    /** @var \Illuminate\Database\Eloquent\Collection */
        $role2 = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'role-2']);
    /** @var \Illuminate\Database\Eloquent\Collection */
        $role3 = Role/** @phpstan-ignore-line */ ::factory()->create(['name' => 'role-3']);

    // Initially assign role1 and role2
    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->syncRoles([$role1, $role2]);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->roles)->toHaveCount(2);

    // Sync to only role2 and role3
    /** @phpstan-ignore-next-line property.notFound */
    $this->permission->syncRoles([$role2, $role3]);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->roles)->toHaveCount(2);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasRole($role1))->toBeFalse();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasRole($role2))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->permission->hasRole($role3))->toBeTrue();
});
