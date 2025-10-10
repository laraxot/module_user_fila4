<?php

declare(strict_types=1);

namespace Modules\User\Filament\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;

class AlwaysAskPasswordConfirmationAction extends Action
{
    protected function setUp(): void
    {
        $this->requiresConfirmation()
            ->modalHeading(__('filament-jet::jet.password_confirmation_modal.heading'))
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
            ->modalSubheading(__('filament-jet::jet.password_confirmation_modal.description'))
            ->schema([
                TextInput::make('current_password')
                    ->required()
                    ->password()
                    ->rule('current_password'),
            ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
            ->modalSubheading(
                __('filament-jet::jet.password_confirmation_modal.description')
            )
            ->schema(
=======
            ->modalSubheading(
                __('filament-jet::jet.password_confirmation_modal.description')
            )
            ->form(
>>>>>>> origin/develop
                [
                    TextInput::make('current_password')

                        ->required()
                        ->password()
                        ->rule('current_password'),
                ]
            );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
