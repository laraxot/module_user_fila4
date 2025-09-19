<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Auth;

use Filament\Forms\Form;
use Modules\User\Datas\PasswordData;

class EditProfile extends \Filament\Auth\Pages\EditProfile
{
<<<<<<< HEAD
<<<<<<< HEAD
    public static null|string $title = 'Profilo Utente';
=======
    public static ?string $title = 'Profilo Utente';
>>>>>>> fbc8f8e (.)
=======
    public static null|string $title = 'Profilo Utente';
>>>>>>> 6d20fbe (.)

    /**
     * Costruisce il form schema per la pagina di modifica profilo.
     */
    public function getFormSchema(): array
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    {
        return [
            $this->getNameFormComponent(),
            $this->getEmailFormComponent(),
            ...PasswordData::make()->getPasswordFormComponents('new_password'),
        ];
    }
<<<<<<< HEAD
=======
{
    
        
    return [
              
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                ...PasswordData::make()->getPasswordFormComponents('new_password'),
            
      ];
}
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
}
