<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Authentication;
use Modules\User\Models\User;

/**
 * Authentication Factory
<<<<<<< HEAD
 *
 * Factory for creating Authentication model instances for testing and seeding.
 *
=======
<<<<<<< HEAD
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * Factory for creating Authentication model instances for testing and seeding.
 *
=======
>>>>>>> a12f125f4a (.)
=======
 * Factory for creating Authentication model instances for testing and seeding.
 *
>>>>>>> b93ef594b4 (.)
=======
 * 
 * Factory for creating Authentication model instances for testing and seeding.
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @extends Factory<Authentication>
 */
class AuthenticationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     *
=======
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @var class-string<Authentication>
     */
    protected $model = Authentication::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $loginSuccessful = $this->faker->boolean(85); // 85% success rate
        $loginAt = $this->faker->dateTimeBetween('-1 year', 'now');
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        return [
            'type' => $this->faker->randomElement(['login', 'logout', 'password_reset', 'email_verification']),
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            'location' => $this->faker->optional(0.7)->city() . ', ' . $this->faker->optional(0.7)->country(),
            'login_successful' => $loginSuccessful,
            'login_at' => $loginAt,
            'logout_at' => $loginSuccessful && $this->faker->boolean(60)
                ? $this->faker->dateTimeBetween($loginAt, 'now')
                : null,
<<<<<<< HEAD
=======
=======
            'login_successful' => $loginSuccessful,
            'login_at' => $loginAt,
            'logout_at' => $loginSuccessful ? $this->faker->dateTimeBetween($loginAt, 'now') : null,
>>>>>>> a12f125f4a (.)
=======
            'location' => $this->faker->optional(0.7)->city() . ', ' . $this->faker->optional(0.7)->country(),
            'login_successful' => $loginSuccessful,
            'login_at' => $loginAt,
            'logout_at' => $loginSuccessful && $this->faker->boolean(60)
                ? $this->faker->dateTimeBetween($loginAt, 'now')
                : null,
>>>>>>> b93ef594b4 (.)
=======
            'location' => $this->faker->optional(0.7)->city() . ', ' . $this->faker->optional(0.7)->country(),
            'login_successful' => $loginSuccessful,
            'login_at' => $loginAt,
            'logout_at' => $loginSuccessful && $this->faker->boolean(60) 
                ? $this->faker->dateTimeBetween($loginAt, 'now') 
                : null,
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'authenticatable_type' => User::class,
            'authenticatable_id' => User::factory(),
        ];
    }

    /**
     * Indicate that the authentication was successful.
<<<<<<< HEAD
     */
    public function successful(): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
<<<<<<< HEAD
     */
    public function successful(): static
    {
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
     *
     * @return static
     */
    public function successful(): static
    {
        return $this->state(fn (array $attributes): array => [
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'login_successful' => true,
        ]);
    }

    /**
     * Indicate that the authentication failed.
<<<<<<< HEAD
     */
    public function failed(): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
<<<<<<< HEAD
     */
    public function failed(): static
    {
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
     *
     * @return static
     */
    public function failed(): static
    {
        return $this->state(fn (array $attributes): array => [
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'login_successful' => false,
            'logout_at' => null,
        ]);
    }

    /**
     * Set the authentication type to login.
<<<<<<< HEAD
     */
    public function login(): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
<<<<<<< HEAD
     */
    public function login(): static
    {
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
     *
     * @return static
     */
    public function login(): static
    {
        return $this->state(fn (array $attributes): array => [
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'type' => 'login',
        ]);
    }

    /**
     * Set the authentication type to logout.
<<<<<<< HEAD
     */
    public function logout(): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
<<<<<<< HEAD
     */
    public function logout(): static
    {
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
     *
     * @return static
     */
    public function logout(): static
    {
        return $this->state(fn (array $attributes): array => [
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'type' => 'logout',
            'logout_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ]);
    }

    /**
     * Create authentication record for a specific user.
<<<<<<< HEAD
     */
    public function forUser(User $user): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
<<<<<<< HEAD
     */
    public function forUser(User $user): static
    {
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
     *
     * @param User $user
     * @return static
     */
    public function forUser(User $user): static
    {
        return $this->state(fn (array $attributes): array => [
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'authenticatable_type' => User::class,
            'authenticatable_id' => $user->id,
        ]);
    }
<<<<<<< HEAD
}
=======
<<<<<<< HEAD
}
=======
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
