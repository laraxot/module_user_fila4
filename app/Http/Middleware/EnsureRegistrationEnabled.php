<?php

<<<<<<< HEAD
declare(strict_types=1);


=======
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);


=======
>>>>>>> a12f125f4a (.)
=======
declare(strict_types=1);


>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $enabled = Config::boolean('auth.registration_enabled', true);
        // Controlla se la registrazione è disabilitata
        if (!$enabled) {
            return redirect()->route('pages.view', ['slug' => 'register_disabled']);
<<<<<<< HEAD
=======
=======
        $enabled=Config::boolean('auth.registration_enabled', true);
        // Controlla se la registrazione è disabilitata
        if (!$enabled) {
            return redirect()->route('pages.view', ['slug'=>'register_disabled']);
>>>>>>> a12f125f4a (.)
=======
        $enabled = Config::boolean('auth.registration_enabled', true);
        // Controlla se la registrazione è disabilitata
        if (!$enabled) {
            return redirect()->route('pages.view', ['slug' => 'register_disabled']);
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        }

        return $next($request);
    }
<<<<<<< HEAD
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> a12f125f4a (.)
=======
}
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
