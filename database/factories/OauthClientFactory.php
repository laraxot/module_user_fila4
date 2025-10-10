<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;

/**
 * OauthClient Factory
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * Factory for creating OauthClient model instances for testing and seeding.
 *
=======
 * 
 * Factory for creating OauthClient model instances for testing and seeding.
 * 
>>>>>>> fbc8f8e (.)
=======
 *
 * Factory for creating OauthClient model instances for testing and seeding.
 *
>>>>>>> 6d20fbe (.)
 * @extends Factory<OauthClient>
 */
class OauthClientFactory extends Factory
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
     * @var class-string<OauthClient>
     */
    protected $model = OauthClient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'user_id' => $this->faker->optional()->randomElement([User::factory(), null]),
            'name' => $this->faker->company() . ' App',
            'secret' => $this->faker->sha256(),
            'provider' => $this->faker->optional()->randomElement(['users', 'admins']),
            'redirect' => $this->faker->url(),
            'personal_access_client' => $this->faker->boolean(20), // 20% personal access clients
            'password_client' => $this->faker->boolean(30), // 30% password clients
            'revoked' => $this->faker->boolean(5), // 5% revoked
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
            'grant_types' => $this->faker->optional()->randomElements(
                [
                    'authorization_code',
                    'client_credentials',
                    'password',
                    'refresh_token',
                ],
                $this->faker->numberBetween(1, 3),
            ),
            'scopes' => $this->faker->optional()->randomElements(
                [
                    'read',
                    'write',
                    'admin',
                    'user',
                ],
                $this->faker->numberBetween(1, 3),
            ),
<<<<<<< HEAD
=======
            'grant_types' => $this->faker->optional()->randomElements([
                'authorization_code',
                'client_credentials',
                'password',
                'refresh_token'
            ], $this->faker->numberBetween(1, 3)),
            'scopes' => $this->faker->optional()->randomElements([
                'read', 'write', 'admin', 'user'
            ], $this->faker->numberBetween(1, 3)),
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        ];
    }

    /**
     * Create a personal access client.
     *
     * @return static
     */
    public function personalAccess(): static
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
            'personal_access_client' => true,
            'password_client' => false,
            'name' => 'Personal Access Client',
        ]);
    }

    /**
     * Create a password client.
     *
     * @return static
     */
    public function password(): static
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
            'password_client' => true,
            'personal_access_client' => false,
            'name' => 'Password Grant Client',
        ]);
    }

    /**
     * Create a revoked client.
     *
     * @return static
     */
    public function revoked(): static
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
            'revoked' => true,
        ]);
    }

    /**
     * Create an active client.
     *
     * @return static
     */
    public function active(): static
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
            'revoked' => false,
        ]);
    }

    /**
     * Create client for a specific user.
     *
     * @param User $user
     * @return static
     */
    public function forUser(User $user): static
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
            'user_id' => $user->id,
        ]);
    }

    /**
     * Create client with specific redirect URI.
     *
     * @param string $redirectUri
     * @return static
     */
    public function withRedirectUri(string $redirectUri): static
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
            'redirect' => $redirectUri,
        ]);
    }

    /**
     * Create client with specific scopes.
     *
     * @param array<string> $scopes
     * @return static
     */
    public function withScopes(array $scopes): static
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        return $this->state(fn(array $_attributes): array => [
            'scopes' => $scopes,
        ]);
    }
}
<<<<<<< HEAD
=======
        return $this->state(fn (array $attributes): array => [
            'scopes' => $scopes,
        ]);
    }
}
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
