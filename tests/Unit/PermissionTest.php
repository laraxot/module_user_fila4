<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Tests\TestCase;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;

uses(TestCase::class);
<<<<<<< HEAD
=======
=======
namespace Modules\User\Tests\Unit\PermissionTest;

namespace Modules\User\Tests\Unit\Widgets;

=======
use Tests\TestCase;
>>>>>>> b93ef594b4 (.)
use Modules\User\Models\Permission;
use Modules\User\Models\Role;

<<<<<<< HEAD
uses(Tests\TestCase::class);
>>>>>>> a12f125f4a (.)
=======
uses(TestCase::class);
>>>>>>> b93ef594b4 (.)
=======
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;

uses(Tests\TestCase::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

beforeEach(function (): void {
    $this->permission = Permission::factory()->create([
        'name' => 'test-permission',
        'guard_name' => 'web',
    ]);
});

test('permission can be created', function (): void {
    expect($this->permission)->toBeInstanceOf(Permission::class);
    expect($this->permission->name)->toBe('test-permission');
    expect($this->permission->guard_name)->toBe('web');
});

test('permission has correct fillable attributes', function (): void {
    $fillable = $this->permission->getFillable();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($fillable)->toContain('id');
    expect($fillable)->toContain('name');
    expect($fillable)->toContain('guard_name');
    expect($fillable)->toContain('created_at');
    expect($fillable)->toContain('updated_at');
    expect($fillable)->toContain('created_by');
    expect($fillable)->toContain('updated_by');
});

test('permission has correct table configuration', function (): void {
    $table = $this->permission->getTable();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($table)->toBeString();
    expect($table)->not->toBeEmpty();
});

test('permission has correct casts', function (): void {
    $casts = $this->permission->getCasts();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($casts)->toHaveKey('id');
    expect($casts)->toHaveKey('uuid');
    expect($casts)->toHaveKey('name');
    expect($casts)->toHaveKey('guard_name');
    expect($casts)->toHaveKey('created_at');
    expect($casts)->toHaveKey('updated_at');
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($casts['id'])->toBe('string');
    expect($casts['uuid'])->toBe('string');
    expect($casts['name'])->toBe('string');
    expect($casts['guard_name'])->toBe('string');
    expect($casts['created_at'])->toBe('datetime');
    expect($casts['updated_at'])->toBe('datetime');
});

test('permission can be updated', function (): void {
    $this->permission->update([
        'name' => 'updated-permission',
        'guard_name' => 'api',
    ]);
<<<<<<< HEAD

    $this->permission->refresh();

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    $this->permission->refresh();

=======
>>>>>>> a12f125f4a (.)
=======
    $this->permission->refresh();

>>>>>>> b93ef594b4 (.)
=======
    
    $this->permission->refresh();
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->permission->name)->toBe('updated-permission');
    expect($this->permission->guard_name)->toBe('api');
});

test('permission can be deleted', function (): void {
    $permissionId = $this->permission->id;
<<<<<<< HEAD

    $this->permission->delete();

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    $this->permission->delete();

=======
>>>>>>> a12f125f4a (.)
=======
    $this->permission->delete();

>>>>>>> b93ef594b4 (.)
=======
    
    $this->permission->delete();
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect(Permission::find($permissionId))->toBeNull();
});

test('permission can be assigned to roles', function (): void {
    $role = Role::factory()->create([
        'name' => 'test-role',
        'guard_name' => 'web',
    ]);
<<<<<<< HEAD

    $role->givePermissionTo($this->permission);

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    $role->givePermissionTo($this->permission);

=======
>>>>>>> a12f125f4a (.)
=======
    $role->givePermissionTo($this->permission);

>>>>>>> b93ef594b4 (.)
=======
    
    $role->givePermissionTo($this->permission);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($role->hasPermissionTo($this->permission))->toBeTrue();
    expect($this->permission->roles)->toHaveCount(1);
});

test('permission can be assigned to multiple roles', function (): void {
    $role1 = Role::factory()->create(['name' => 'role-1']);
    $role2 = Role::factory()->create(['name' => 'role-2']);
<<<<<<< HEAD

    $this->permission->assignRole($role1);
    $this->permission->assignRole($role2);

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    $this->permission->assignRole($role1);
    $this->permission->assignRole($role2);

=======
>>>>>>> a12f125f4a (.)
=======
    $this->permission->assignRole($role1);
    $this->permission->assignRole($role2);

>>>>>>> b93ef594b4 (.)
=======
    
    $this->permission->assignRole($role1);
    $this->permission->assignRole($role2);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->permission->roles)->toHaveCount(2);
    expect($this->permission->hasRole($role1))->toBeTrue();
    expect($this->permission->hasRole($role2))->toBeTrue();
});

test('permission can be found by name', function (): void {
    $foundPermission = Permission::where('name', 'test-permission')->first();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($foundPermission)->toBeInstanceOf(Permission::class);
    expect($foundPermission->id)->toBe($this->permission->id);
});

test('permission can be found by guard', function (): void {
    $webPermissions = Permission::where('guard_name', 'web')->get();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($webPermissions)->toHaveCount(1);
    expect($webPermissions->first()->id)->toBe($this->permission->id);
});

test('permission has timestamps', function (): void {
    expect($this->permission->created_at)->not->toBeNull();
    expect($this->permission->updated_at)->not->toBeNull();
});

test('permission can be created with factory', function (): void {
    $permission = Permission::factory()->create();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($permission)->toBeInstanceOf(Permission::class);
    expect($permission->name)->not->toBeEmpty();
    expect($permission->guard_name)->not->toBeEmpty();
});

test('permission can be created with specific attributes', function (): void {
    $permission = Permission::factory()->create([
        'name' => 'custom-permission',
        'guard_name' => 'custom-guard',
    ]);
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($permission->name)->toBe('custom-permission');
    expect($permission->guard_name)->toBe('custom-guard');
});

test('permission can check if it has role', function (): void {
    $role = Role::factory()->create(['name' => 'test-role']);
<<<<<<< HEAD

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    expect($this->permission->hasRole($role))->toBeFalse();

    $this->permission->assignRole($role);

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    
    expect($this->permission->hasRole($role))->toBeFalse();
    
    $this->permission->assignRole($role);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->permission->hasRole($role))->toBeTrue();
});

test('permission can check if it has any roles', function (): void {
    expect($this->permission->hasAnyRole([]))->toBeFalse();
<<<<<<< HEAD

    $role = Role::factory()->create(['name' => 'test-role']);
    $this->permission->assignRole($role);

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    $role = Role::factory()->create(['name' => 'test-role']);
    $this->permission->assignRole($role);

=======
>>>>>>> a12f125f4a (.)
=======
    $role = Role::factory()->create(['name' => 'test-role']);
    $this->permission->assignRole($role);

>>>>>>> b93ef594b4 (.)
=======
    
    $role = Role::factory()->create(['name' => 'test-role']);
    $this->permission->assignRole($role);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->permission->hasAnyRole([$role]))->toBeTrue();
});

test('permission can check if it has all roles', function (): void {
    $role1 = Role::factory()->create(['name' => 'role-1']);
    $role2 = Role::factory()->create(['name' => 'role-2']);
<<<<<<< HEAD

    $this->permission->syncRoles([$role1, $role2]);

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    $this->permission->syncRoles([$role1, $role2]);

=======
>>>>>>> a12f125f4a (.)
=======
    $this->permission->syncRoles([$role1, $role2]);

>>>>>>> b93ef594b4 (.)
=======
    
    $this->permission->syncRoles([$role1, $role2]);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->permission->hasAllRoles([$role1, $role2]))->toBeTrue();
    expect($this->permission->hasAllRoles([$role1]))->toBeTrue();
    expect($this->permission->hasAllRoles([$role1, $role2, 'non-existent']))->toBeFalse();
});

test('permission can be revoked from role', function (): void {
    $role = Role::factory()->create(['name' => 'test-role']);
<<<<<<< HEAD

    $this->permission->assignRole($role);
    expect($this->permission->hasRole($role))->toBeTrue();

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    $this->permission->assignRole($role);
    expect($this->permission->hasRole($role))->toBeTrue();

=======
>>>>>>> a12f125f4a (.)
=======
    $this->permission->assignRole($role);
    expect($this->permission->hasRole($role))->toBeTrue();

>>>>>>> b93ef594b4 (.)
=======
    
    $this->permission->assignRole($role);
    expect($this->permission->hasRole($role))->toBeTrue();
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    $this->permission->removeRole($role);
    expect($this->permission->hasRole($role))->toBeFalse();
});

test('permission can be synced with roles', function (): void {
    $role1 = Role::factory()->create(['name' => 'role-1']);
    $role2 = Role::factory()->create(['name' => 'role-2']);
    $role3 = Role::factory()->create(['name' => 'role-3']);
<<<<<<< HEAD

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    // Initially assign role1 and role2
    $this->permission->syncRoles([$role1, $role2]);
    expect($this->permission->roles)->toHaveCount(2);

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    
    // Initially assign role1 and role2
    $this->permission->syncRoles([$role1, $role2]);
    expect($this->permission->roles)->toHaveCount(2);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Sync to only role2 and role3
    $this->permission->syncRoles([$role2, $role3]);
    expect($this->permission->roles)->toHaveCount(2);
    expect($this->permission->hasRole($role1))->toBeFalse();
    expect($this->permission->hasRole($role2))->toBeTrue();
    expect($this->permission->hasRole($role3))->toBeTrue();
});
