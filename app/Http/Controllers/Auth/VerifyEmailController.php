<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Auth;

<<<<<<< HEAD
use InvalidArgumentException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
=======
<<<<<<< HEAD
use InvalidArgumentException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use App\Http\Controllers\Controller;
use Filament\Facades\Filament;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = Auth::user();
        if ($user === null) {
            return redirect()->route('filament.user.auth.login');
        }

        // Ottieni il valore hash in modo sicuro
        $routeHash = $request->route('hash');
        if ($routeHash === null) {
<<<<<<< HEAD
            throw new InvalidArgumentException('Hash di verifica mancante');
        }
=======
<<<<<<< HEAD
            throw new InvalidArgumentException('Hash di verifica mancante');
        }
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        $stringRouteHash = is_string($routeHash) ? $routeHash : '';

        // Utilizziamo getEmailForVerification() solo se disponibile
        $userEmail = method_exists($user, 'getEmailForVerification')
            ? $user->getEmailForVerification()
            : ($user->email ?? '');

        if (!hash_equals(sha1($userEmail), $stringRouteHash)) {
            throw new AuthorizationException();
        }

<<<<<<< HEAD
=======
=======
        
=======

>>>>>>> b93ef594b4 (.)
        $stringRouteHash = is_string($routeHash) ? $routeHash : '';

        // Utilizziamo getEmailForVerification() solo se disponibile
        $userEmail = method_exists($user, 'getEmailForVerification')
            ? $user->getEmailForVerification()
            : ($user->email ?? '');

        if (!hash_equals(sha1($userEmail), $stringRouteHash)) {
            throw new AuthorizationException();
        }
<<<<<<< HEAD
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
            throw new \InvalidArgumentException('Hash di verifica mancante');
        }
        
        $stringRouteHash = is_string($routeHash) ? $routeHash : '';
        
        // Utilizziamo getEmailForVerification() solo se disponibile
        $userEmail = method_exists($user, 'getEmailForVerification') 
            ? $user->getEmailForVerification() 
            : ($user->email ?? '');
        
        if (! hash_equals(sha1($userEmail), $stringRouteHash)) {
            throw new AuthorizationException();
        }
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Verifichiamo l'email solo se il metodo esiste
        if (method_exists($user, 'hasVerifiedEmail') && $user->hasVerifiedEmail()) {
            return redirect()->intended(Filament::getUrl());
        }
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
        // Contrassegna l'email come verificata solo se il metodo esiste
        if (method_exists($user, 'markEmailAsVerified')) {
            $user->markEmailAsVerified();
        }

        // Verificare che l'utente implementi l'interfaccia MustVerifyEmail
<<<<<<< HEAD
        if (!($user instanceof MustVerifyEmail)) {
            throw new InvalidArgumentException('L\'utente deve implementare l\'interfaccia MustVerifyEmail');
=======
<<<<<<< HEAD
        if (!($user instanceof MustVerifyEmail)) {
            throw new InvalidArgumentException('L\'utente deve implementare l\'interfaccia MustVerifyEmail');
=======
        if (!($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail)) {
            throw new \InvalidArgumentException('L\'utente deve implementare l\'interfaccia MustVerifyEmail');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        event(new Verified($user));

<<<<<<< HEAD
        return redirect()->intended(route('dashboard', absolute: false) . '?verified=1');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return redirect()->intended(route('dashboard', absolute: false) . '?verified=1');
=======
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
>>>>>>> a12f125f4a (.)
=======
        return redirect()->intended(route('dashboard', absolute: false) . '?verified=1');
>>>>>>> b93ef594b4 (.)
=======
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
