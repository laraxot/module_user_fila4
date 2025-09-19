<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Permission;
use Modules\User\Models\PermissionRole;
=======
use Modules\User\Models\PermissionRole;
use Modules\User\Models\Permission;
>>>>>>> fbc8f8e (.)
=======
use Modules\User\Models\Permission;
use Modules\User\Models\PermissionRole;
>>>>>>> 6d20fbe (.)
use Modules\User\Models\Role;

/**
 * PermissionRole Factory
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * Factory for creating PermissionRole model instances for testing and seeding.
 *
=======
 * 
 * Factory for creating PermissionRole model instances for testing and seeding.
 * 
>>>>>>> fbc8f8e (.)
=======
 *
 * Factory for creating PermissionRole model instances for testing and seeding.
 *
>>>>>>> 6d20fbe (.)
 * @extends Factory<PermissionRole>
 */
class PermissionRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> fbc8f8e (.)
=======
     *
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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
            'permission_id' => Permission::factory(),
            'role_id' => Role::factory(),
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
        return $this->state(fn(array $_attributes): array => [
=======
        return $this->state(fn (array $attributes): array => [
>>>>>>> fbc8f8e (.)
=======
        return $this->state(fn(array $_attributes): array => [
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        return $this->state(fn(array $_attributes): array => [
            'role_id' => $role->id,
        ]);
    }
}
<<<<<<< HEAD
=======
        return $this->state(fn (array $attributes): array => [
            'role_id' => $role->id,
        ]);
    }
}
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
