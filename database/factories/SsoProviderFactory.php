<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Modules\User\Models\SsoProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SsoProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = SsoProvider::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
