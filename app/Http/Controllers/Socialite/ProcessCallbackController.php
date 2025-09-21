<?php

declare(strict_types=1);

/**
 * @see DutchCodingCompany\FilamentSocialite.
 */

namespace Modules\User\Http\Controllers\Socialite;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
=======
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Facades\Request;
use Modules\User\Actions\Socialite\IsProviderConfiguredAction;
use Modules\User\Actions\Socialite\IsRegistrationEnabledAction;
use Modules\User\Actions\Socialite\IsUserAllowedAction;
use Modules\User\Actions\Socialite\LoginUserAction;
use Modules\User\Actions\Socialite\RedirectToLoginAction;
use Modules\User\Actions\Socialite\RegisterOauthUserAction;
use Modules\User\Actions\Socialite\RegisterSocialiteUserAction;
use Modules\User\Actions\Socialite\RetrieveOauthUserAction;
use Modules\User\Actions\Socialite\RetrieveSocialiteUserAction;
use Modules\User\Actions\Socialite\SetDefaultRolesBySocialiteUserAction;
use Modules\User\Actions\Socialite\ValidateProviderAction;
use Modules\User\Events\RegistrationNotEnabled;
use Modules\User\Events\UserNotAllowed;
use Modules\User\Exceptions\ProviderNotConfigured;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class ProcessCallbackController extends Controller
{
    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function __invoke(Request $_request, string $provider): RedirectResponse
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function __invoke(Request $_request, string $provider): RedirectResponse
=======
    public function __invoke(Request $request, string $provider): RedirectResponse
>>>>>>> a12f125f4a (.)
=======
    public function __invoke(Request $_request, string $provider): RedirectResponse
>>>>>>> b93ef594b4 (.)
=======
    public function __invoke(Request $request, string $provider): RedirectResponse
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        // See if provider exists
        // if (! app(IsProviderConfiguredAction::class)->execute($provider)) {
        //    throw ProviderNotConfigured::make($provider);
        // }
        app(ValidateProviderAction::class)->execute($provider);

        // Try to retrieve existing user
        $oauthUser = app(RetrieveOauthUserAction::class)->execute($provider);
        if ($oauthUser === null) {
            return app(RedirectToLoginAction::class)->execute('auth.login-failed');
        }

        // Verify if user is allowed
<<<<<<< HEAD
        if (!app(IsUserAllowedAction::class)->execute($oauthUser)) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!app(IsUserAllowedAction::class)->execute($oauthUser)) {
=======
        if (! app(IsUserAllowedAction::class)->execute($oauthUser)) {
>>>>>>> a12f125f4a (.)
=======
        if (!app(IsUserAllowedAction::class)->execute($oauthUser)) {
>>>>>>> b93ef594b4 (.)
=======
        if (! app(IsUserAllowedAction::class)->execute($oauthUser)) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            UserNotAllowed::dispatch($oauthUser);

            return app(RedirectToLoginAction::class)->execute('auth.user-not-allowed');
        }

        // Try to find a socialite user
        $socialiteUser = app(RetrieveSocialiteUserAction::class)->execute($provider, $oauthUser);
        if ($socialiteUser) {
            $socialiteUserObj = $socialiteUser->user;
            if ($socialiteUserObj === null || !$socialiteUserObj->canAccessSocialite()) {
                return app(RedirectToLoginAction::class)->execute('auth.user-not-allowed');
            }
            // Associate default roles to the existing "real" user, if needed
<<<<<<< HEAD
            app(SetDefaultRolesBySocialiteUserAction::class, [
                'provider' => $provider,
            ])->execute($socialiteUserObj, $oauthUser);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            app(SetDefaultRolesBySocialiteUserAction::class, [
                'provider' => $provider,
            ])->execute($socialiteUserObj, $oauthUser);
=======
=======
>>>>>>> origin/develop
            app(
                SetDefaultRolesBySocialiteUserAction::class,
                [
                    'provider' => $provider,
                ]
            )->execute($socialiteUserObj, $oauthUser);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            app(SetDefaultRolesBySocialiteUserAction::class, [
                'provider' => $provider,
            ])->execute($socialiteUserObj, $oauthUser);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

            return app(LoginUserAction::class)->execute($socialiteUser);
        }

        // See if registration is allowed
<<<<<<< HEAD
        if (!app(IsRegistrationEnabledAction::class)->execute()) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!app(IsRegistrationEnabledAction::class)->execute()) {
=======
        if (! app(IsRegistrationEnabledAction::class)->execute()) {
>>>>>>> a12f125f4a (.)
=======
        if (!app(IsRegistrationEnabledAction::class)->execute()) {
>>>>>>> b93ef594b4 (.)
=======
        if (! app(IsRegistrationEnabledAction::class)->execute()) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            RegistrationNotEnabled::dispatch($provider, $oauthUser);

            return app(RedirectToLoginAction::class)->execute('auth.registration-not-enabled');
        }

        $user_class = XotData::make()->getUserClass();
        // See if a user already exists, but not for this socialite provider
        // $user = app()->call($this->socialite->getUserResolver(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'socialite' => $this->socialite]);
<<<<<<< HEAD
        /** @var UserContract|null */
=======
<<<<<<< HEAD
        /** @var UserContract|null */
=======
        /** @var \Modules\Xot\Contracts\UserContract|null */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $user = $user_class::query()->firstWhere(['email' => $oauthUser->getEmail()]);

        // Handle registration
        if ($user !== null) {
            $socialiteUser = app(RegisterSocialiteUserAction::class)->execute($provider, $oauthUser, $user);
        } else {
            $socialiteUser = app(RegisterOauthUserAction::class)->execute($provider, $oauthUser);
        }

        $socialiteUserObj = $socialiteUser->user;
        if ($socialiteUserObj === null || !$socialiteUserObj->canAccessSocialite()) {
            return app(RedirectToLoginAction::class)->execute('auth.user-not-allowed');
        }

        // Verifichiamo prima se l'utente può accedere al socialite
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        /** @var UserContract|null $authUser */
        $authUser = Auth::user();
        if ($authUser !== null && method_exists($authUser, 'canAccessSocialite') && !$authUser->canAccessSocialite()) {
            return redirect()->route(
<<<<<<< HEAD
                optional(Auth::check()) ? 'filament.user.pages.dashboard' : 'filament.user.auth.login',
=======
<<<<<<< HEAD
<<<<<<< HEAD
                optional(Auth::check()) ? 'filament.user.pages.dashboard' : 'filament.user.auth.login',
=======
                optional(Auth::check()) ? 'filament.user.pages.dashboard' : 'filament.user.auth.login'
>>>>>>> a12f125f4a (.)
=======
                optional(Auth::check()) ? 'filament.user.pages.dashboard' : 'filament.user.auth.login',
>>>>>>> b93ef594b4 (.)
=======
        /** @var \Modules\Xot\Contracts\UserContract|null $authUser */
        $authUser = Auth::user();
        if ($authUser !== null && method_exists($authUser, 'canAccessSocialite') && !$authUser->canAccessSocialite()) {
            return redirect()->route(
                optional(Auth::check()) ? 'filament.user.pages.dashboard' : 'filament.user.auth.login'
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            );
        }

        return app(LoginUserAction::class)->execute($socialiteUser);
    }
}
