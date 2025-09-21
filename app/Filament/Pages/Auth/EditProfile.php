<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Auth;

use Filament\Forms\Form;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Modules\User\Datas\PasswordData;

class EditProfile extends \Filament\Auth\Pages\EditProfile
{
<<<<<<< HEAD
    public static null|string $title = 'Profilo Utente';
=======
<<<<<<< HEAD
<<<<<<< HEAD
    public static null|string $title = 'Profilo Utente';
=======
    public static ?string $title = 'Profilo Utente';
>>>>>>> a12f125f4a (.)
=======
    public static null|string $title = 'Profilo Utente';
>>>>>>> b93ef594b4 (.)
=======
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Modules\User\Datas\PasswordData;

class EditProfile extends BaseEditProfile
{
    public static ?string $title = 'Profilo Utente';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Costruisce il form schema per la pagina di modifica profilo.
     */
    public function getFormSchema(): array
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    {
        return [
            $this->getNameFormComponent(),
            $this->getEmailFormComponent(),
            ...PasswordData::make()->getPasswordFormComponents('new_password'),
        ];
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
{
    
        
    return [
              
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                ...PasswordData::make()->getPasswordFormComponents('new_password'),
            
      ];
}
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
