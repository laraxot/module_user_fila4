<?php

/**
 * Handles the email verification process for authenticated users.
 *
 * This controller method is responsible for verifying a user's email address
 * when they click on a verification link. It checks that the user is
 * authenticated, that the provided ID and hash match the user's information,
 * and that the email has not already been verified. If the verification is
 * successful, it marks the email as verified and dispatches a Verified event.
 *
 * @param  string $id  the ID of the user to be verified
 * @param  string $hash  the hash of the user's email address
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @return RedirectResponse a redirect response to the home page
 *
 * @throws AuthorizationException if the verification fails
 */
<<<<<<< HEAD
=======
=======
 * @return \Illuminate\Http\RedirectResponse a redirect response to the home page
 *
 * @throws \Illuminate\Auth\Access\AuthorizationException if the verification fails
 */

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
declare(strict_types=1);

namespace Modules\User\Http\Controllers\Auth;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\MustVerifyEmail;
use InvalidArgumentException;
=======
<<<<<<< HEAD
use Illuminate\Contracts\Auth\MustVerifyEmail;
use InvalidArgumentException;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Modules\User\Http\Controllers\Controller;

class EmailVerificationController extends Controller
{
    public function __invoke(string $id, string $hash): RedirectResponse
    {
        $user = Auth::user();
        if ($user === null) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            throw new AuthorizationException();
        }

        if (!hash_equals($id, (string) Auth::id())) {
            throw new AuthorizationException();
        }

        if (!hash_equals($hash, sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException();
<<<<<<< HEAD
=======
=======
            throw new AuthorizationException;
=======
            throw new AuthorizationException();
>>>>>>> b93ef594b4 (.)
        }

        if (!hash_equals($id, (string) Auth::id())) {
            throw new AuthorizationException();
        }

<<<<<<< HEAD
        if (! hash_equals($hash, sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
>>>>>>> a12f125f4a (.)
=======
        if (!hash_equals($hash, sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException();
>>>>>>> b93ef594b4 (.)
=======
            throw new AuthorizationException;
        }

        if (! hash_equals($id, (string) Auth::id())) {
            throw new AuthorizationException;
        }

        if (! hash_equals($hash, sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        if ($user->hasVerifiedEmail()) {
            return redirect(route('home'));
        }

        $user->markEmailAsVerified();

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

        return redirect(route('home'));
    }
}
