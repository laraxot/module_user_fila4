<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Auth;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Form;
=======
use Filament\Schemas\Schema;
>>>>>>> 1724879 (.)
=======
use Filament\Schemas\Schema;
>>>>>>> cebb28c (.)
use Modules\User\Datas\PasswordData;

class EditProfile extends \Filament\Auth\Pages\EditProfile
{
    public static ?string $title = 'Profilo Utente';

    /**
     * Costruisce il form schema per la pagina di modifica profilo.
     */
    public function getFormSchema(): array
    {
        return [
            $this->getNameFormComponent(),
            $this->getEmailFormComponent(),
            ...PasswordData::make()->getPasswordFormComponents('new_password'),
        ];
    }
}
