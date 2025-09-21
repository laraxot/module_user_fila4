<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Profile;

<<<<<<< HEAD
use Modules\User\Models\User;
=======
<<<<<<< HEAD
use Modules\User\Models\User;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\User\Actions\User\DeleteUserAction;
use Modules\User\Contracts\UserContract;

class DeleteAccount extends Component
{
    public string $delete_confirm_password = '';

    public function render(): View
    {
        return view('user::livewire.profile.delete-account');
    }

    public function destroy(): void
    {
<<<<<<< HEAD
        /** @var User|null $user */
=======
<<<<<<< HEAD
        /** @var User|null $user */
=======
        /** @var \Modules\User\Models\User|null $user */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $user = Auth::user();
        if (!$user) {
            $this->dispatch('toast', [
                'message' => 'Utente non trovato',
<<<<<<< HEAD
                'type' => 'error',
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'type' => 'error',
=======
                'type' => 'error'
>>>>>>> a12f125f4a (.)
=======
                'type' => 'error',
>>>>>>> b93ef594b4 (.)
=======
                'type' => 'error'
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            ]);
            return;
        }

        // Assicuriamoci che sia del tipo corretto per l'action
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        if (!($user instanceof UserContract)) {
            $this->dispatch('toast', [
                'message' => 'Tipo di utente non supportato',
                'type' => 'error',
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        if (!$user instanceof UserContract) {
            $this->dispatch('toast', [
                'message' => 'Tipo di utente non supportato',
                'type' => 'error'
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        if (!($user instanceof UserContract)) {
            $this->dispatch('toast', [
                'message' => 'Tipo di utente non supportato',
                'type' => 'error',
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            ]);
            return;
        }

        $result = app(DeleteUserAction::class)->execute($user, $this->delete_confirm_password);

        if (!$result['success']) {
            $this->dispatch('toast', [
                'message' => $result['message'],
<<<<<<< HEAD
                'type' => 'error',
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'type' => 'error',
=======
                'type' => 'error'
>>>>>>> a12f125f4a (.)
=======
                'type' => 'error',
>>>>>>> b93ef594b4 (.)
=======
                'type' => 'error'
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            ]);
            $this->reset(['delete_confirm_password']);
            return;
        }

        $this->redirect('/');
    }
}
