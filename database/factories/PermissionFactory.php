<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Permission;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\User\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Modules\User\Models\Permission>
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->slug(),
            'guard_name' => 'web',
            'display_name' => $this->faker->words(2, true),
            'description' => $this->faker->sentence(),
        ];
    }
}