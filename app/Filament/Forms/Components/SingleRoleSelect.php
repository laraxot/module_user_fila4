<?php

declare(strict_types=1);

namespace Modules\User\Filament\Forms\Components;

use Filament\Forms\Components\Select;
use Modules\User\Models\Role;

class SingleRoleSelect extends Select
{
    protected string $optionValueProperty = 'id';

    // /*
    protected function setUp(): void
    {
        parent::setUp();
        $options = Role::all()->pluck('name', 'id')->toArray();

<<<<<<< HEAD
        $this->options(fn(): array => $options) // Ruoli dal DB
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->options(fn(): array => $options) // Ruoli dal DB
=======
        $this
            ->options(fn (): array => $options) // Ruoli dal DB
>>>>>>> a12f125f4a (.)
=======
        $this->options(fn(): array => $options) // Ruoli dal DB
>>>>>>> b93ef594b4 (.)
=======
        $this
            ->options(fn (): array => $options) // Ruoli dal DB
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // ->searchable() // Permette la ricerca
            // ->preload() // Precarica i risultati
            ->placeholder('Select a role');
    }
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // */

    public function getOptionValueProperty(): string
    {
        return $this->optionValueProperty;
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    /*
     * public static function make(string $name): static
     * {
     * return parent::make($name)
     * ->options(Role::all()->pluck('name', 'id')->toArray()) // Ruoli dal DB
     * ->searchable() // Permette la ricerca
     * ->preload() // Precarica i risultati
     * ->placeholder('Select a role');
     * }
     */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    /*
    public static function make(string $name): static
    {
        return parent::make($name)
            ->options(Role::all()->pluck('name', 'id')->toArray()) // Ruoli dal DB
            ->searchable() // Permette la ricerca
            ->preload() // Precarica i risultati
            ->placeholder('Select a role');
    }
            */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

    /*
     * public static function make(string $name): static
     * {
     * return parent::make($name)
     * ->options(Role::all()->pluck('name', 'id')->toArray()) // Ruoli dal DB
     * ->searchable() // Permette la ricerca
     * ->preload() // Precarica i risultati
     * ->placeholder('Select a role');
     * }
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
