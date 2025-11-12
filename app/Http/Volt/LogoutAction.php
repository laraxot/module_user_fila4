<?php

declare(strict_types=1);

namespace Modules\User\Http\Volt;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Volt\Routing\Attribute\Post;

/*
 * Attribute class Volt\Routing\Attribute\Post does not exist.
 *
 * #[Post('/logout', name: 'logout', middleware: ['web', 'auth'])]
 */
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Volt\Routing\Attribute\Post;

/*
Attribute class Volt\Routing\Attribute\Post does not exist.

#[Post('/logout', name: 'logout', middleware: ['web', 'auth'])]
*/
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
