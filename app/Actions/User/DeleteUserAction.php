<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

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
>>>>>>> fbc8f8e (.)
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;
>>>>>>> 6d20fbe (.)
use Spatie\QueueableAction\QueueableAction;

class DeleteUserAction
{
    use QueueableAction;
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
    /**
     * Elimina l'utente dopo aver verificato la password.
     *
     * @param User $user L'utente da eliminare
     * @param string $confirmPassword La password di conferma
     *
     * @return array{success: bool, message: string} Risultato dell'operazione
     */
    public function execute(User $user, string $confirmPassword): array
    {
        if (!Hash::check($confirmPassword, $user->password)) {
            return [
                'success' => false,
<<<<<<< HEAD
<<<<<<< HEAD
                'message' => 'La password inserita non è corretta',
=======
                'message' => 'La password inserita non è corretta'
>>>>>>> fbc8f8e (.)
=======
                'message' => 'La password inserita non è corretta',
>>>>>>> 6d20fbe (.)
            ];
        }

        try {
            Auth::logout();
            $user->delete();

            return [
                'success' => true,
<<<<<<< HEAD
<<<<<<< HEAD
                'message' => 'Account eliminato con successo',
=======
                'message' => 'Account eliminato con successo'
>>>>>>> fbc8f8e (.)
=======
                'message' => 'Account eliminato con successo',
>>>>>>> 6d20fbe (.)
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
<<<<<<< HEAD
<<<<<<< HEAD
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account',
=======
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account'
>>>>>>> fbc8f8e (.)
=======
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account',
>>>>>>> 6d20fbe (.)
            ];
        }
    }
}
