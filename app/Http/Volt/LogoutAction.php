<?php

declare(strict_types=1);

namespace Modules\User\Http\Volt;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/*
 * Attribute class Volt\Routing\Attribute\Post does not exist.
 *
 * #[Post('/logout', name: 'logout', middleware: ['web', 'auth'])]
 */
<<<<<<< HEAD
=======
=======
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> b93ef594b4 (.)
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Volt\Routing\Attribute\Post;

/*
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Volt\Routing\Attribute\Post;

/*
>>>>>>> origin/develop
Attribute class Volt\Routing\Attribute\Post does not exist.

#[Post('/logout', name: 'logout', middleware: ['web', 'auth'])]
*/
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
 * Attribute class Volt\Routing\Attribute\Post does not exist.
 *
 * #[Post('/logout', name: 'logout', middleware: ['web', 'auth'])]
 */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
final class LogoutAction
{
    public function __invoke(): RedirectResponse
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home');
    }
}
