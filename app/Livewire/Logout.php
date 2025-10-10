<?php
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
declare(strict_types=1);

namespace Modules\User\Livewire;

<<<<<<< HEAD
use Exception;
=======
<<<<<<< HEAD
use Exception;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function logout(): null|RedirectResponse
=======
    public function logout(): ?RedirectResponse
>>>>>>> a12f125f4a (.)
=======
    public function logout(): null|RedirectResponse
>>>>>>> b93ef594b4 (.)
=======
    public function logout(): ?RedirectResponse
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $this->processing = true;

        try {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();

            return redirect()->route('home');
<<<<<<< HEAD
        } catch (Exception $e) {
=======
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
