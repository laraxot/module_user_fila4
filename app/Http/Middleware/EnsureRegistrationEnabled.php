<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);


=======
>>>>>>> fbc8f8e (.)
=======
declare(strict_types=1);


>>>>>>> 6d20fbe (.)
namespace Modules\User\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class EnsureRegistrationEnabled
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request):Response $next
     */
    public function handle(Request $request, Closure $next): Response
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        $enabled = Config::boolean('auth.registration_enabled', true);
        // Controlla se la registrazione è disabilitata
        if (!$enabled) {
            return redirect()->route('pages.view', ['slug' => 'register_disabled']);
<<<<<<< HEAD
=======
        $enabled=Config::boolean('auth.registration_enabled', true);
        // Controlla se la registrazione è disabilitata
        if (!$enabled) {
            return redirect()->route('pages.view', ['slug'=>'register_disabled']);
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        }

        return $next($request);
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> fbc8f8e (.)
=======
}
>>>>>>> 6d20fbe (.)
