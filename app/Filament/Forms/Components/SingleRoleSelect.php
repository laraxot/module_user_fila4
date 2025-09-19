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
<<<<<<< HEAD
        $this->options(fn(): array => $options) // Ruoli dal DB
=======
        $this
            ->options(fn (): array => $options) // Ruoli dal DB
>>>>>>> fbc8f8e (.)
=======
        $this->options(fn(): array => $options) // Ruoli dal DB
>>>>>>> 6d20fbe (.)
            // ->searchable() // Permette la ricerca
            // ->preload() // Precarica i risultati
            ->placeholder('Select a role');
    }
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
    // */

    public function getOptionValueProperty(): string
    {
        return $this->optionValueProperty;
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

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
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
}
