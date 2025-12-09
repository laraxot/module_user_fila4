<?php

declare(strict_types=1);

namespace Modules\User\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Webmozart\Assert\Assert;

/**
 * Two-Factor Authentication Middleware
 * 
 * Ensures users with 2FA enabled complete the verification
 */
class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Skip if no user authenticated
        if (! $user) {
            $response = $next($request);
            Assert::isInstanceOf($response, Response::class);
            return $response;
        }

        // Skip if 2FA not enabled for user
        if (! method_exists($user, 'hasTwoFactorEnabled') || ! $user->hasTwoFactorEnabled()) {
            $response = $next($request);
            Assert::isInstanceOf($response, Response::class);
            return $response;
        }

        // Skip if already verified in this session
        if (session('2fa_verified') === true) {
            $response = $next($request);
            Assert::isInstanceOf($response, Response::class);
            return $response;
        }

        // Skip if on 2FA verification routes
        if ($this->isExemptRoute($request)) {
            $response = $next($request);
            Assert::isInstanceOf($response, Response::class);
            return $response;
        }

        // Redirect to 2FA verification page
        return redirect()->route('2fa.verify')
            ->with('2fa_required', true)
            ->with('intended_url', $request->fullUrl());
    }

    /**
     * Check if route is exempt from 2FA verification
     */
    protected function isExemptRoute(Request $request): bool
    {
        $exemptRoutes = [
            '2fa.verify',
            '2fa.verify.post',
            '2fa.recovery',
            'logout',
        ];

        return in_array($request->route()?->getName(), $exemptRoutes, true);
    }
}
