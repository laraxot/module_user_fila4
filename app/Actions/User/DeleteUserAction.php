<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

<<<<<<< HEAD
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;
=======
<<<<<<< HEAD
use Exception;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;
=======
use Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;
>>>>>>> b93ef594b4 (.)
=======
use Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Spatie\QueueableAction\QueueableAction;

class DeleteUserAction
{
    use QueueableAction;
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
    /**
     * Elimina l'utente dopo aver verificato la password.
     *
     * @param  User  $user  L'utente da eliminare
     * @param  string  $confirmPassword  La password di conferma
     * @return array{success: bool, message: string} Risultato dell'operazione
     */
    public function execute(User $user, string $confirmPassword): array
    {
        if (! Hash::check($confirmPassword, $user->password)) {
            return [
                'success' => false,
<<<<<<< HEAD
                'message' => 'La password inserita non è corretta',
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'message' => 'La password inserita non è corretta',
=======
                'message' => 'La password inserita non è corretta'
>>>>>>> a12f125f4a (.)
=======
                'message' => 'La password inserita non è corretta',
>>>>>>> b93ef594b4 (.)
=======
                'message' => 'La password inserita non è corretta'
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            ];
        }

        try {
            Auth::logout();
            $user->delete();

            return [
                'success' => true,
<<<<<<< HEAD
                'message' => 'Account eliminato con successo',
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'message' => 'Account eliminato con successo',
=======
                'message' => 'Account eliminato con successo'
>>>>>>> a12f125f4a (.)
=======
                'message' => 'Account eliminato con successo',
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
<<<<<<< HEAD
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account',
=======
<<<<<<< HEAD
<<<<<<< HEAD
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account',
=======
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account'
>>>>>>> a12f125f4a (.)
=======
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account',
>>>>>>> b93ef594b4 (.)
=======
                'message' => 'Account eliminato con successo'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account'
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            ];
        }
    }
}
