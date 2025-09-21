<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class RedirectToLoginAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $message): RedirectResponse
    {
        // Assert::string($route_name = config('filament-socialite.login_page_route', 'filament.admin.auth.login'));
        // Route [filament.auth.login] not defined.
        $route_name = 'login';
<<<<<<< HEAD
        Assert::string($message = __('user::' . $message));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::string($message = __('user::' . $message));
=======
        Assert::string($message = __('user::'.$message));
>>>>>>> a12f125f4a (.)
=======
        Assert::string($message = __('user::' . $message));
>>>>>>> b93ef594b4 (.)
=======
        Assert::string($message = __('user::'.$message));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        Notification::make()
            ->title($message)
            ->danger()
            ->persistent()
            ->send();

        // Redirect back to the login route with an error message attached
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        return redirect()
            ->route($route_name)
            ->withErrors([
                'email' => [
                    __($message),
                ],
            ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        return redirect()->route($route_name)
            ->withErrors(
                [
                    'email' => [
                        __($message),
                    ],
                ]
            );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
