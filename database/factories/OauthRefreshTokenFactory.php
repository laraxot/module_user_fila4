<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthRefreshToken;

/**
 * OauthRefreshToken Factory
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
 * @extends Factory<OauthRefreshToken>
 */
class OauthRefreshTokenFactory extends Factory
{
    protected $model = OauthRefreshToken::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->sha256(),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
            'access_token_id' => fn() => OauthAccessToken::create([
                'id' => $this->faker->sha256(),
                'user_id' => null,
                'client_id' => $this->faker->sha256(),
                'name' => 'Test Token',
                'scopes' => [],
                'revoked' => false,
                'expires_at' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
            ])->id,
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
            'access_token_id' => OauthAccessToken::factory(),
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
            'access_token_id' => OauthAccessToken::factory(),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'revoked' => $this->faker->boolean(5),
            'expires_at' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
        ];
    }

    public function revoked(): static
    {
        return $this->state(['revoked' => true]);
    }

    public function expired(): static
    {
        return $this->state(['expires_at' => $this->faker->dateTimeBetween('-1 month', 'now')]);
    }
}
