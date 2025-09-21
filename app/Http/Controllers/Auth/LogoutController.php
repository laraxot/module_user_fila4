<?php

declare(strict_types=1);

/**
 * Logs out the current user and redirects to the home page.
 *
<<<<<<< HEAD
 * @return RedirectResponse
 */
=======
<<<<<<< HEAD
 * @return RedirectResponse
 */
=======
 * @return \Illuminate\Http\RedirectResponse
 */

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
namespace Modules\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Esegue il logout dell'utente.
     */
    public function __invoke(): RedirectResponse
    {
        // Esegui il logout
        Auth::logout();

        // Invalida la sessione
        Session::invalidate();

        // Rigenera il token CSRF
        Session::regenerateToken();

        // Redirect alla home
        return redirect()->route('home');
    }
}
