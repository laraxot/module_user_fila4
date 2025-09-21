<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\Permission;
use Modules\User\Models\PermissionRole;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Permission;
use Modules\User\Models\PermissionRole;
=======
use Modules\User\Models\PermissionRole;
use Modules\User\Models\Permission;
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\Permission;
use Modules\User\Models\PermissionRole;
>>>>>>> b93ef594b4 (.)
=======
use Modules\User\Models\PermissionRole;
use Modules\User\Models\Permission;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\User\Models\Role;

/**
 * PermissionRole Factory
<<<<<<< HEAD
 *
 * Factory for creating PermissionRole model instances for testing and seeding.
 *
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * Factory for creating PermissionRole model instances for testing and seeding.
 *
=======
 * 
 * Factory for creating PermissionRole model instances for testing and seeding.
 * 
>>>>>>> a12f125f4a (.)
=======
 *
 * Factory for creating PermissionRole model instances for testing and seeding.
 *
>>>>>>> b93ef594b4 (.)
=======
 * 
 * Factory for creating PermissionRole model instances for testing and seeding.
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @extends Factory<PermissionRole>
 */
class PermissionRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     *
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> a12f125f4a (.)
=======
     *
>>>>>>> b93ef594b4 (.)
=======
     * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @var class-string<PermissionRole>
     */
    protected $model = PermissionRole::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
            'permission_id' => fn() => Permission::create([
                'name' => fake()->unique()->slug(),
                'guard_name' => 'web',
            ])->id,
            'role_id' => fn() => Role::create([
                'name' => fake()->unique()->slug(),
                'guard_name' => 'web',
            ])->id,
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
            'permission_id' => Permission::factory(),
            'role_id' => Role::factory(),
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
            'permission_id' => Permission::factory(),
            'role_id' => Role::factory(),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
     * Create permission-role relationship for a specific permission.
     *
     * @param Permission $permission
     * @return static
     */
    public function forPermission(Permission $permission): static
    {
<<<<<<< HEAD
        return $this->state(fn(array $_attributes): array => [
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state(fn(array $_attributes): array => [
=======
        return $this->state(fn (array $attributes): array => [
>>>>>>> a12f125f4a (.)
=======
        return $this->state(fn(array $_attributes): array => [
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes): array => [
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'permission_id' => $permission->id,
        ]);
    }

    /**
     * Create permission-role relationship for a specific role.
     *
     * @param Role $role
     * @return static
     */
    public function forRole(Role $role): static
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        return $this->state(fn(array $_attributes): array => [
            'role_id' => $role->id,
        ]);
    }
}
<<<<<<< HEAD
=======
=======
        return $this->state(fn (array $attributes): array => [
=======
        return $this->state(fn(array $_attributes): array => [
>>>>>>> b93ef594b4 (.)
            'role_id' => $role->id,
        ]);
    }
}
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes): array => [
            'role_id' => $role->id,
        ]);
    }
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
