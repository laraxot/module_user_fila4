<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;

/**
 * OauthAccessToken Factory
<<<<<<< HEAD
 *
 * Factory for creating OauthAccessToken model instances for testing and seeding.
 *
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * Factory for creating OauthAccessToken model instances for testing and seeding.
 *
=======
 * 
 * Factory for creating OauthAccessToken model instances for testing and seeding.
 * 
>>>>>>> a12f125f4a (.)
=======
 *
 * Factory for creating OauthAccessToken model instances for testing and seeding.
 *
>>>>>>> b93ef594b4 (.)
=======
 * 
 * Factory for creating OauthAccessToken model instances for testing and seeding.
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @extends Factory<OauthAccessToken>
 */
class OauthAccessTokenFactory extends Factory
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
     * @var class-string<OauthAccessToken>
     */
    protected $model = OauthAccessToken::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'user_id' => User::factory(),
            'client_id' => OauthClient::factory(),
            'name' => $this->faker->optional()->words(2, true),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
            'scopes' => $this->faker->optional()->randomElements([
                'read', 'write', 'admin', 'user'
            ], $this->faker->numberBetween(1, 3)),
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
            'scopes' => $this->faker->optional()->randomElements([
                'read', 'write', 'admin', 'user'
            ], $this->faker->numberBetween(1, 3)),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'revoked' => $this->faker->boolean(10), // 10% revoked
            'expires_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }

    /**
     * Create a revoked token.
     *
     * @return static
     */
    public function revoked(): static
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
            'revoked' => true,
        ]);
    }

    /**
     * Create an active token.
     *
     * @return static
     */
    public function active(): static
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
            'revoked' => false,
            'expires_at' => $this->faker->dateTimeBetween('+1 day', '+1 year'),
        ]);
    }

    /**
     * Create token for a specific user.
     *
     * @param User $user
     * @return static
     */
    public function forUser(User $user): static
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
            'user_id' => $user->id,
        ]);
    }

    /**
     * Create token for a specific client.
     *
     * @param OauthClient $client
     * @return static
     */
    public function forClient(OauthClient $client): static
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
            'client_id' => $client->id,
        ]);
    }

    /**
     * Create token with specific scopes.
     *
     * @param array<string> $scopes
     * @return static
     */
    public function withScopes(array $scopes): static
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        return $this->state(fn(array $_attributes): array => [
            'scopes' => $scopes,
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
            'scopes' => $scopes,
        ]);
    }
}
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes): array => [
            'scopes' => $scopes,
        ]);
    }
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
