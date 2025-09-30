<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Forms\Form;
=======
use Filament\Schemas\Schema;
>>>>>>> 1724879 (.)
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
