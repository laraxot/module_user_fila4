<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Modules\User\Models\PermissionUser;
=======
<<<<<<< HEAD
use Modules\User\Models\PermissionUser;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = PermissionUser::class;
=======
<<<<<<< HEAD
    protected $model = PermissionUser::class;
=======
    protected $model = \Modules\User\Models\PermissionUser::class;
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
