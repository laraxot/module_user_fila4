<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

/**
 * Factory per il modello Team del modulo User.
 *
<<<<<<< HEAD
 * @extends Factory<Team>
=======
<<<<<<< HEAD
 * @extends Factory<Team>
=======
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\User\Models\Team>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 */
class TeamFactory extends Factory
{
    /**
     * Il nome del modello corrispondente alla factory.
     *
<<<<<<< HEAD
     * @var class-string<Team>
=======
<<<<<<< HEAD
     * @var class-string<Team>
=======
     * @var class-string<\Modules\User\Models\Team>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    protected $model = Team::class;

    /**
     * Definisce lo stato di default del modello.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $teamTypes = [
            'Amministrazione',
            'Sviluppo',
            'Marketing',
            'Vendite',
            'Supporto Clienti',
            'Risorse Umane',
            'Contabilità',
            'Produzione',
            'Qualità',
<<<<<<< HEAD
            'Logistica',
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'Logistica',
=======
            'Logistica'
>>>>>>> a12f125f4a (.)
=======
            'Logistica',
>>>>>>> b93ef594b4 (.)
=======
            'Logistica'
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];

        return [
            'name' => app(SafeStringCastAction::class)->execute($this->faker->randomElement($teamTypes)) . ' Team',
            'user_id' => User::factory(),
            'personal_team' => false,
        ];
    }

    /**
     * Indica che il team è un team personale.
     *
     * @return static
     */
    public function personal(): static
    {
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> a12f125f4a (.)
=======
        return $this->state(fn(array $_attributes) => [
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'personal_team' => true,
            'name' => $this->faker->firstName() . "'s Team",
        ]);
    }

    /**
     * Crea un team con un owner specifico.
     *
     * @param int $userId
     * @return static
     */
    public function ownedBy(int $userId): static
    {
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state(fn(array $_attributes) => [
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> a12f125f4a (.)
=======
        return $this->state(fn(array $_attributes) => [
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes) => [
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'user_id' => $userId,
        ]);
    }

    /**
     * Crea un team con un nome specifico.
     *
     * @param string $name
     * @return static
     */
    public function withName(string $name): static
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        return $this->state(fn(array $_attributes) => [
            'name' => $name . ' Team',
        ]);
    }
}
<<<<<<< HEAD
=======
=======
        return $this->state(fn (array $attributes) => [
=======
        return $this->state(fn(array $_attributes) => [
>>>>>>> b93ef594b4 (.)
            'name' => $name . ' Team',
        ]);
    }
}
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $this->state(fn (array $attributes) => [
            'name' => $name . ' Team',
        ]);
    }
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
