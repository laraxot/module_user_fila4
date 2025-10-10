<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Modules\User\Models\AuthenticationLog;
=======
<<<<<<< HEAD
use Modules\User\Models\AuthenticationLog;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthenticationLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = AuthenticationLog::class;
=======
<<<<<<< HEAD
    protected $model = AuthenticationLog::class;
=======
    protected $model = \Modules\User\Models\AuthenticationLog::class;
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
