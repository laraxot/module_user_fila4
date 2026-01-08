<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\SsoProvider;
=======
>>>>>>> dd73b41a (.)

class SsoProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = SsoProvider::class;
=======
    protected $model = \Modules\User\Models\SsoProvider::class;
>>>>>>> dd73b41a (.)

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
