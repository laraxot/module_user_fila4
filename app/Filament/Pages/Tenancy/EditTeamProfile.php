<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Form;
=======
>>>>>>> a63f578 (.)
=======
>>>>>>> 041533e (.)
=======
>>>>>>> 00a34d0 (.)
use Filament\Pages\Tenancy\EditTenantProfile;

class EditTeamProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Team profile';
    }

    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            // ...
        ];
    }
}
