<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditTeamProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Team profile';
    }

    /**
     * @return array<string, mixed>
     */
    /** @phpstan-ignore-next-line return.type */
    public function getFormSchema(): array
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    {
        return [
            TextInput::make('name'),
            // ...
        ];
    }
<<<<<<< HEAD
=======
{
    
        
    return [
              
                    TextInput::make('name'),
                    // ...
                
      ];
}
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
}
