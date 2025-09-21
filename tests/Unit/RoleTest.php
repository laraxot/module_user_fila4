<?php

declare(strict_types=1);

<<<<<<< HEAD
use Tests\TestCase;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;

uses(TestCase::class);
=======
<<<<<<< HEAD
use Tests\TestCase;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
=======
use Modules\User\Models\Role;
use Modules\User\Models\Permission;
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
>>>>>>> b93ef594b4 (.)
use Modules\User\Models\User;

uses(TestCase::class);
=======
use Modules\User\Models\Role;
use Modules\User\Models\Permission;
use Modules\User\Models\User;

uses(Tests\TestCase::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

beforeEach(function (): void {
    $this->role = Role::factory()->create([
        'name' => 'test-role',
        'guard_name' => 'web',
    ]);
});

test('role can be created', function (): void {
    expect($this->role)->toBeInstanceOf(Role::class);
    expect($this->role->name)->toBe('test-role');
    expect($this->role->guard_name)->toBe('web');
});

test('role has correct constants', function (): void {
    expect(Role::ROLE_ADMINISTRATOR)->toBe(1);
    expect(Role::ROLE_OWNER)->toBe(2);
    expect(Role::ROLE_USER)->toBe(3);
});

test('role has correct table configuration', function (): void {
    $table = $this->role->getTable();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($table)->toBeString();
    expect($table)->not->toBeEmpty();
});

test('role has correct casts', function (): void {
    $casts = $this->role->getCasts();
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

test('role can be updated', function (): void {
    $this->role->update([
        'name' => 'updated-role',
        'guard_name' => 'api',
    ]);
<<<<<<< HEAD

    $this->role->refresh();

=======
<<<<<<< HEAD

    $this->role->refresh();

=======
    
    $this->role->refresh();
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->role->name)->toBe('updated-role');
    expect($this->role->guard_name)->toBe('api');
});

test('role can be deleted', function (): void {
    $roleId = $this->role->id;
<<<<<<< HEAD

    $this->role->delete();

=======
<<<<<<< HEAD

    $this->role->delete();

=======
    
    $this->role->delete();
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect(Role::find($roleId))->toBeNull();
});

test('role can have permissions', function (): void {
    $permission = Permission::factory()->create([
        'name' => 'test-permission',
        'guard_name' => 'web',
    ]);
<<<<<<< HEAD

    $this->role->givePermissionTo($permission);

=======
<<<<<<< HEAD

    $this->role->givePermissionTo($permission);

=======
    
    $this->role->givePermissionTo($permission);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->role->hasPermissionTo($permission))->toBeTrue();
    expect($this->role->permissions)->toHaveCount(1);
});

test('role can have multiple permissions', function (): void {
    $permission1 = Permission::factory()->create(['name' => 'permission-1']);
    $permission2 = Permission::factory()->create(['name' => 'permission-2']);
<<<<<<< HEAD

    $this->role->syncPermissions([$permission1, $permission2]);

=======
<<<<<<< HEAD

    $this->role->syncPermissions([$permission1, $permission2]);

=======
    
    $this->role->syncPermissions([$permission1, $permission2]);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->role->permissions)->toHaveCount(2);
    expect($this->role->hasPermissionTo($permission1))->toBeTrue();
    expect($this->role->hasPermissionTo($permission2))->toBeTrue();
});

test('role can revoke permissions', function (): void {
    $permission = Permission::factory()->create(['name' => 'test-permission']);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    $this->role->givePermissionTo($permission);
    expect($this->role->hasPermissionTo($permission))->toBeTrue();

<<<<<<< HEAD
=======
=======
    
    $this->role->givePermissionTo($permission);
    expect($this->role->hasPermissionTo($permission))->toBeTrue();
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    $this->role->revokePermissionTo($permission);
    expect($this->role->hasPermissionTo($permission))->toBeFalse();
});

test('role can be found by name', function (): void {
    $foundRole = Role::where('name', 'test-role')->first();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($foundRole)->toBeInstanceOf(Role::class);
    expect($foundRole->id)->toBe($this->role->id);
});

test('role can be found by guard', function (): void {
    $webRoles = Role::where('guard_name', 'web')->get();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($webRoles)->toHaveCount(1);
    expect($webRoles->first()->id)->toBe($this->role->id);
});

test('role has timestamps', function (): void {
    expect($this->role->created_at)->not->toBeNull();
    expect($this->role->updated_at)->not->toBeNull();
});

test('role can be created with factory', function (): void {
    $role = Role::factory()->create();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($role)->toBeInstanceOf(Role::class);
    expect($role->name)->not->toBeEmpty();
    expect($role->guard_name)->not->toBeEmpty();
});

test('role can be created with specific attributes', function (): void {
    $role = Role::factory()->create([
        'name' => 'custom-role',
        'guard_name' => 'custom-guard',
    ]);
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($role->name)->toBe('custom-role');
    expect($role->guard_name)->toBe('custom-guard');
});

test('role can check if it has any permissions', function (): void {
    expect($this->role->hasAnyPermission([]))->toBeFalse();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    $permission = Permission::factory()->create(['name' => 'test-permission']);
    $this->role->givePermissionTo($permission);

<<<<<<< HEAD
=======
=======
    
    $permission = Permission::factory()->create(['name' => 'test-permission']);
    $this->role->givePermissionTo($permission);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->role->hasAnyPermission([$permission]))->toBeTrue();
});

test('role can check if it has all permissions', function (): void {
    $permission1 = Permission::factory()->create(['name' => 'permission-1']);
    $permission2 = Permission::factory()->create(['name' => 'permission-2']);
<<<<<<< HEAD

    $this->role->syncPermissions([$permission1, $permission2]);

=======
<<<<<<< HEAD

    $this->role->syncPermissions([$permission1, $permission2]);

=======
    
    $this->role->syncPermissions([$permission1, $permission2]);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->role->hasAllPermissions([$permission1, $permission2]))->toBeTrue();
    expect($this->role->hasAllPermissions([$permission1]))->toBeTrue();
    expect($this->role->hasAllPermissions([$permission1, $permission2, 'non-existent']))->toBeFalse();
});
