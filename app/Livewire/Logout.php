<?php
<<<<<<< HEAD

=======
>>>>>>> fbc8f8e (.)
declare(strict_types=1);

namespace Modules\User\Livewire;

use Exception;
<<<<<<< HEAD
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
=======
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
>>>>>>> fbc8f8e (.)

/**
 * Logout component for handling user logout functionality.
 */
class Logout extends Component
{
    /**
     * Processing state indicator.
     */
    public bool $processing = false;

    /**
     * Handle user logout process.
     */
<<<<<<< HEAD
    public function logout(): null|RedirectResponse
=======
    public function logout(): ?RedirectResponse
>>>>>>> fbc8f8e (.)
    {
        $this->processing = true;

        try {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();

            return redirect()->route('home');
        } catch (Exception $e) {
            $this->processing = false;
            session()->flash('error', __('Errore durante il logout. Riprova.'));
            return null;
        }
    }

    /**
     * Render the logout component view.
     */
    public function render(): View
    {
        return view('user::livewire.logout');
    }
}
