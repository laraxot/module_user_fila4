<?php

declare(strict_types=1);

namespace Modules\User\Http\Middleware;

<<<<<<< HEAD
use Closure;
=======
<<<<<<< HEAD
use Closure;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PasswordExpiryMiddleware
{
<<<<<<< HEAD
    public function handle(Request $request, Closure $next): Response|RedirectResponse
=======
<<<<<<< HEAD
    public function handle(Request $request, Closure $next): Response|RedirectResponse
=======
    public function handle(Request $request, \Closure $next): Response|RedirectResponse
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        if ($request->routeIs('password.change') || $request->routeIs('password.update')) {
            return $next($request);
        }

        if ($request->routeIs($this->getPasswordExpiryRoute()) || $request->routeIs('*.auth.*')) {
            return $next($request);
        }

        if ($this->passwordHasExpired()) {
            return redirect(route($this->getPasswordExpiryRoute()));
        }

        return $next($request);
    }

    public function getPasswordExpiryRoute(): string
    {
        return 'errors.password-expired';
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        /*
         * $route = Filament::getCurrentPanel()->generateRouteName(
         * // config('password-expiry.password_expiry_route')
         * // 'password-expiry.reset-password'
         * // 'password.expired'
         * 'pages.password-expired'
         * ) ?? '#';
         *
         * return $route;
         * // */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        /*
        $route = Filament::getCurrentPanel()->generateRouteName(
            // config('password-expiry.password_expiry_route')
            // 'password-expiry.reset-password'
            // 'password.expired'
            'pages.password-expired'
        ) ?? '#';

        return $route;
        // */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        /*
         * $route = Filament::getCurrentPanel()->generateRouteName(
         * // config('password-expiry.password_expiry_route')
         * // 'password-expiry.reset-password'
         * // 'password.expired'
         * 'pages.password-expired'
         * ) ?? '#';
         *
         * return $route;
         * // */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // return 'filament.admin.auth.password-reset.request';
    }

    protected function passwordHasExpired(): bool
    {
        $user = Auth::user();
<<<<<<< HEAD
        if (!$user) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!$user) {
=======
        if (! $user) {
>>>>>>> a12f125f4a (.)
=======
        if (!$user) {
>>>>>>> b93ef594b4 (.)
=======
        if (! $user) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            return false;
        }

        if ($user->is_otp) {
            return true;
        }
        if (blank($user->password)) {
            return false;
        }

        if (blank($user->password_expires_at)) {
            return false;
        }

        if (now()->isAfter($user->password_expires_at)) {
            return true;
        }

        return false;
    }
}
