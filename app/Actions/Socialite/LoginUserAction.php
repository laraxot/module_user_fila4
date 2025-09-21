<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Models\SocialiteUser;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class LoginUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(SocialiteUser $socialiteUser): RedirectResponse
    {
<<<<<<< HEAD
        Assert::notNull($user = $socialiteUser->user, '[' . __FILE__ . '][' . __LINE__ . ']');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::notNull($user = $socialiteUser->user, '[' . __FILE__ . '][' . __LINE__ . ']');
=======
        Assert::notNull($user = $socialiteUser->user, '['.__FILE__.']['.__LINE__.']');
>>>>>>> a12f125f4a (.)
=======
        Assert::notNull($user = $socialiteUser->user, '[' . __FILE__ . '][' . __LINE__ . ']');
>>>>>>> b93ef594b4 (.)
=======
        Assert::notNull($user = $socialiteUser->user, '['.__FILE__.']['.__LINE__.']');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        Filament::auth()->login($user);
        SocialiteUserConnected::dispatch($socialiteUser);
        // session()->regenerate();

        // return redirect()->intended(Filament::getUrl());
        return redirect()->intended('/');
    }
}
