<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Modules\User\Models\SocialProvider;
=======
<<<<<<< HEAD
use Modules\User\Models\SocialProvider;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = SocialProvider::class;
=======
<<<<<<< HEAD
    protected $model = SocialProvider::class;
=======
    protected $model = \Modules\User\Models\SocialProvider::class;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
