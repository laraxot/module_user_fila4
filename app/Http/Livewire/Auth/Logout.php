<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

<<<<<<< HEAD
use Exception;
=======
<<<<<<< HEAD
use Exception;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
<<<<<<< HEAD
=======
=======
use Livewire\Component;
=======
>>>>>>> b93ef594b4 (.)
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
>>>>>>> b93ef594b4 (.)
=======
use Livewire\Component;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

/**
 * Componente Livewire per la gestione del logout.
 *
 * Questo componente gestisce il processo di logout in modo sicuro:
 * - Emette eventi pre e post logout
 * - Gestisce gli errori in modo robusto
 * - Mantiene un log delle operazioni
 * - Invalida e rigenera la sessione
 */
class Logout extends Component
{
    use WithRateLimiting;

    /**
     * Esegui logout, invalidazione sessione e redirect.
<<<<<<< HEAD
     * @return RedirectResponse|null
=======
<<<<<<< HEAD
     * @return RedirectResponse|null
=======
     * @return \Illuminate\Http\RedirectResponse|null
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function mount()
    {
        try {
            // Rate limit
            $this->rateLimit(5);

            // Ottieni l'utente prima del logout per il logging
            $user = Auth::user();

            // Emetti evento pre-logout
            Event::dispatch('auth.logout.attempting', [$user]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

            // Esegui logout
            Auth::logout();

            // Invalida e rigenera la sessione
            session()->invalidate();
            session()->regenerateToken();

            // Emetti evento post-logout
            Event::dispatch('auth.logout.successful');

<<<<<<< HEAD
=======
=======
            
=======

>>>>>>> b93ef594b4 (.)
            // Esegui logout
            Auth::logout();

            // Invalida e rigenera la sessione
            session()->invalidate();
            session()->regenerateToken();

            // Emetti evento post-logout
            Event::dispatch('auth.logout.successful');
<<<<<<< HEAD
            
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
            
            // Esegui logout
            Auth::logout();
            
            // Invalida e rigenera la sessione
            session()->invalidate();
            session()->regenerateToken();
            
            // Emetti evento post-logout
            Event::dispatch('auth.logout.successful');
            
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Log per audit
            if ($user) {
                Log::info('User logged out successfully', [
                    'user_id' => $user->id,
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                    'email' => $user->email,
                ]);
            }

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
                    'email' => $user->email
                ]);
            }
            
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
                    'email' => $user->email,
                ]);
            }

>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
            // Redirect alla pagina di login
            return redirect()->route('login');
        } catch (Exception $e) {
            Log::error('Logout failed', [
                'error' => $e->getMessage(),
<<<<<<< HEAD
                'user_id' => Auth::id(),
=======
<<<<<<< HEAD
<<<<<<< HEAD
                'user_id' => Auth::id(),
=======
                'user_id' => Auth::id()
>>>>>>> a12f125f4a (.)
=======
                'user_id' => Auth::id(),
>>>>>>> b93ef594b4 (.)
=======
            // Redirect alla pagina di login
            return redirect()->route('login');
        } catch (\Exception $e) {
            Log::error('Logout failed', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id()
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            ]);

            session()->flash('error', __('Si è verificato un errore durante il logout'));
            return redirect()->back();
        }
    }

    /**
     * Renderizza il componente.
     *
<<<<<<< HEAD
     * @return View
=======
<<<<<<< HEAD
     * @return View
=======
     * @return \Illuminate\Contracts\View\View
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function render(): View
    {
        return view('user::livewire.auth.logout');
    }
}
