<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Permission;
use Modules\Xot\Actions\Cast\SafeStringCastAction;

/**
 * Factory per il modello Permission del modulo User.
 *
 * @extends Factory<Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Permission>
     */
    protected $model = Permission::class;

    /**
     * Definisce lo stato di default del modello.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $actions = ['create', 'read', 'update', 'delete', 'manage', 'view', 'edit'];
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        $resources = [
            'users',
            'posts',
            'comments',
            'pages',
            'settings',
            'reports',
            'analytics',
            'teams',
            'roles',
            'permissions',
        ];
<<<<<<< HEAD
=======
        $resources = ['users', 'posts', 'comments', 'pages', 'settings', 'reports', 'analytics', 'teams', 'roles', 'permissions'];
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

        $action = SafeStringCastAction::cast($this->faker->randomElement($actions));
        $resource = SafeStringCastAction::cast($this->faker->randomElement($resources));

        return [
            'name' => $action . ' ' . $resource,
            'guard_name' => 'web',
        ];
    }

    /**
     * Crea un set di permessi CRUD per una risorsa.
     *
     * @param string $resource
     * @return static
     */
    public function forResource(string $resource): static
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        return $this->state(fn(array $_attributes) => [
            'name' =>

                    SafeStringCastAction::cast($this->faker->randomElement(['create', 'read', 'update', 'delete'])) .
                    ' ' .
                    $resource
                ,
<<<<<<< HEAD
=======
        return $this->state(fn (array $attributes) => [
            'name' => SafeStringCastAction::cast($this->faker->randomElement(['create', 'read', 'update', 'delete'])) . ' ' . $resource,
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        ]);
    }

    /**
     * Crea un permesso di lettura.
     *
     * @return static
     */
    public function read(): static
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        return $this->state(fn(array $_attributes) => [
            'name' =>

                    'read ' .
                    SafeStringCastAction::cast($this->faker->randomElement(['users', 'posts', 'comments', 'pages']))
                ,
<<<<<<< HEAD
=======
        return $this->state(fn (array $attributes) => [
            'name' => 'read ' . SafeStringCastAction::cast($this->faker->randomElement(['users', 'posts', 'comments', 'pages'])),
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        ]);
    }

    /**
     * Crea un permesso di scrittura.
     *
     * @return static
     */
    public function write(): static
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        return $this->state(fn(array $_attributes) => [
            'name' =>

                    SafeStringCastAction::cast($this->faker->randomElement(['create', 'update', 'delete'])) .
                    ' ' .
                    SafeStringCastAction::cast($this->faker->randomElement(['users', 'posts', 'comments', 'pages']))
                ,
<<<<<<< HEAD
=======
        return $this->state(fn (array $attributes) => [
            'name' => SafeStringCastAction::cast($this->faker->randomElement(['create', 'update', 'delete'])) . ' ' . SafeStringCastAction::cast($this->faker->randomElement(['users', 'posts', 'comments', 'pages'])),
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        ]);
    }

    /**
     * Crea un permesso admin.
     *
     * @return static
     */
    public function admin(): static
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        return $this->state(fn(array $_attributes) => [
            'name' =>

                    'manage ' .
                    SafeStringCastAction::cast($this->faker->randomElement([
                        'users',
                        'system',
                        'settings',
                        'permissions',
                    ]))
                ,
<<<<<<< HEAD
=======
        return $this->state(fn (array $attributes) => [
            'name' => 'manage ' . SafeStringCastAction::cast($this->faker->randomElement(['users', 'system', 'settings', 'permissions'])),
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        ]);
    }

    /**
     * Crea un permesso con un guard specifico.
     *
     * @param string $guard
     * @return static
     */
    public function withGuard(string $guard): static
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> fbc8f8e (.)
=======
        return $this->state(fn(array $_attributes) => [
>>>>>>> 6d20fbe (.)
            'guard_name' => $guard,
        ]);
    }
}
