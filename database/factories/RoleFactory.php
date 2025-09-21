<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Role;

/**
 * Factory per il modello Role del modulo User.
 *
<<<<<<< HEAD
 * @extends Factory<Role>
=======
<<<<<<< HEAD
 * @extends Factory<Role>
=======
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\User\Models\Role>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 */
class RoleFactory extends Factory
{
    /**
     * Il nome del modello corrispondente alla factory.
     *
<<<<<<< HEAD
     * @var class-string<Role>
=======
<<<<<<< HEAD
     * @var class-string<Role>
=======
     * @var class-string<\Modules\User\Models\Role>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    protected $model = Role::class;

    /**
     * Definisce lo stato di default del modello.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = [
            'admin' => 'Administrator',
            'manager' => 'Manager',
            'editor' => 'Editor',
            'user' => 'User',
            'moderator' => 'Moderator',
            'viewer' => 'Viewer',
            'contributor' => 'Contributor',
            'analyst' => 'Analyst',
            'support' => 'Support Agent',
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            'developer' => 'Developer',
        ];

        $role = $this->faker->randomElement($roles);
        $name = array_search($role, $roles, strict: true);
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
            'developer' => 'Developer'
        ];

        $role = $this->faker->randomElement($roles);
        $name = array_search($role, $roles);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            'developer' => 'Developer',
        ];

        $role = $this->faker->randomElement($roles);
        $name = array_search($role, $roles, strict: true);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        return [
            'name' => $name,
            'guard_name' => 'web',
        ];
    }

    /**
     * Crea un ruolo admin.
     *
     * @return static
     */
    public function admin(): static
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
            'name' => 'admin',
        ]);
    }

    /**
     * Crea un ruolo manager.
     *
     * @return static
     */
    public function manager(): static
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
            'name' => 'manager',
        ]);
    }

    /**
     * Crea un ruolo user.
     *
     * @return static
     */
    public function user(): static
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
            'name' => 'user',
        ]);
    }

    /**
     * Crea un ruolo con un guard specifico.
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
