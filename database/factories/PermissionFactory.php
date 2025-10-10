<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Permission;
use Modules\Xot\Actions\Cast\SafeStringCastAction;

/**
 * Factory per il modello Permission del modulo User.
 *
<<<<<<< HEAD
 * @extends Factory<Permission>
=======
<<<<<<< HEAD
 * @extends Factory<Permission>
=======
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\User\Models\Permission>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 */
class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
     * @var class-string<Permission>
=======
<<<<<<< HEAD
     * @var class-string<Permission>
=======
     * @var class-string<\Modules\User\Models\Permission>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
        $resources = ['users', 'posts', 'comments', 'pages', 'settings', 'reports', 'analytics', 'teams', 'roles', 'permissions'];
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        $resources = ['users', 'posts', 'comments', 'pages', 'settings', 'reports', 'analytics', 'teams', 'roles', 'permissions'];
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        return $this->state(fn(array $_attributes) => [
            'name' =>

                    SafeStringCastAction::cast($this->faker->randomElement(['create', 'read', 'update', 'delete'])) .
                    ' ' .
                    $resource
                ,
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        return $this->state(fn (array $attributes) => [
            'name' => SafeStringCastAction::cast($this->faker->randomElement(['create', 'read', 'update', 'delete'])) . ' ' . $resource,
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes) => [
            'name' => SafeStringCastAction::cast($this->faker->randomElement(['create', 'read', 'update', 'delete'])) . ' ' . $resource,
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        return $this->state(fn(array $_attributes) => [
            'name' =>

                    'read ' .
                    SafeStringCastAction::cast($this->faker->randomElement(['users', 'posts', 'comments', 'pages']))
                ,
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        return $this->state(fn (array $attributes) => [
            'name' => 'read ' . SafeStringCastAction::cast($this->faker->randomElement(['users', 'posts', 'comments', 'pages'])),
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes) => [
            'name' => 'read ' . SafeStringCastAction::cast($this->faker->randomElement(['users', 'posts', 'comments', 'pages'])),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        return $this->state(fn(array $_attributes) => [
            'name' =>

                    SafeStringCastAction::cast($this->faker->randomElement(['create', 'update', 'delete'])) .
                    ' ' .
                    SafeStringCastAction::cast($this->faker->randomElement(['users', 'posts', 'comments', 'pages']))
                ,
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        return $this->state(fn (array $attributes) => [
            'name' => SafeStringCastAction::cast($this->faker->randomElement(['create', 'update', 'delete'])) . ' ' . SafeStringCastAction::cast($this->faker->randomElement(['users', 'posts', 'comments', 'pages'])),
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes) => [
            'name' => SafeStringCastAction::cast($this->faker->randomElement(['create', 'update', 'delete'])) . ' ' . SafeStringCastAction::cast($this->faker->randomElement(['users', 'posts', 'comments', 'pages'])),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
        return $this->state(fn (array $attributes) => [
            'name' => 'manage ' . SafeStringCastAction::cast($this->faker->randomElement(['users', 'system', 'settings', 'permissions'])),
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes) => [
            'name' => 'manage ' . SafeStringCastAction::cast($this->faker->randomElement(['users', 'system', 'settings', 'permissions'])),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
        return $this->state(fn(array $_attributes) => [
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> a12f125f4a (.)
=======
        return $this->state(fn(array $_attributes) => [
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'guard_name' => $guard,
        ]);
    }
}
