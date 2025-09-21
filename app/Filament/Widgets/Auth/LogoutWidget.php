<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Exception;
use Filament\Schemas\Components\View;
use Filament\Actions\Action;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> b93ef594b4 (.)
use Exception;
use Filament\Schemas\Components\View;
use Filament\Actions\Action;
=======
use Filament\Actions\Action;
use Filament\Forms\Components\View;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * Logout widget for user session termination.
 *
 * Handles secure logout process with proper session management,
 * event dispatching, and audit logging following Laraxot
 * architectural patterns and security best practices.
 */
class LogoutWidget extends XotBaseWidget
{
    /**
     * The view for this widget.
     * @phpstan-ignore property.defaultValue
     */
<<<<<<< HEAD
    protected string $view = 'user::widgets.auth.logout-widget';
=======
<<<<<<< HEAD
    protected string $view = 'user::widgets.auth.logout-widget';
=======
    protected static string $view = 'user::widgets.auth.logout-widget';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Mount the widget and initialize the form.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Get the form schema for logout interface.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @return array<string, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        $view = 'filament.widgets.auth.logout-message';
        //@phpstan-ignore-next-line
        if (!view()->exists($view)) {
            throw new Exception('View ' . $view . ' not found');
        }
        return [
            'logout_message' => View::make($view)->columnSpanFull(),
<<<<<<< HEAD
=======
=======
     * @return array<string, \Filament\Schemas\Components\Component>
=======
     * @return array<string, Component>
>>>>>>> b93ef594b4 (.)
     */
    #[Override]
    public function getFormSchema(): array
    {
        $view = 'filament.widgets.auth.logout-message';
        //@phpstan-ignore-next-line
        if (!view()->exists($view)) {
            throw new Exception('View ' . $view . ' not found');
        }
        return [
<<<<<<< HEAD
            'logout_message' => View::make($view)
                ->columnSpanFull(),
>>>>>>> a12f125f4a (.)
=======
            'logout_message' => View::make($view)->columnSpanFull(),
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        $view='filament.widgets.auth.logout-message';
        //@phpstan-ignore-next-line
        if(!view()->exists($view)){
            throw new \Exception('View '.$view.' not found');
        }
        return [
            'logout_message' => View::make($view)
                ->columnSpanFull(),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
     * Get form actions for logout widget.
     *
<<<<<<< HEAD
     * @return array<Action>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return array<Action>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return array<\Filament\Actions\Action>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getFormActions(): array
    {
        return [
            $this->getLogoutAction(),
            $this->getCancelAction(),
        ];
    }

    /**
     * Handle user logout with proper security and auditing.
     *
     * Implements secure logout process with session invalidation,
     * event dispatching, and comprehensive audit logging.
     *
     * @return void
     */
    public function logout(): void
    {
        $user = Auth::user();

        if (!$user) {
            Log::warning('Logout attempted with no authenticated user');
            return;
        }

        $this->dispatchPreLogoutEvent($user);
        $this->performLogout();
        $this->dispatchPostLogoutEvent();
        $this->logLogoutSuccess($user);
        $this->redirectAfterLogout();
    }

    /**
     * Get logout action button configuration.
     *
<<<<<<< HEAD
     * @return Action
=======
<<<<<<< HEAD
     * @return Action
=======
     * @return \Filament\Actions\Action
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    protected function getLogoutAction(): Action
    {
        return Action::make('logout')
            ->translateLabel()
            ->color('danger')
            ->size('lg')
            ->extraAttributes(['class' => 'w-full justify-center'])
<<<<<<< HEAD
            ->action($this->logout(...));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            ->action($this->logout(...));
=======
            ->action(fn () => $this->logout());
>>>>>>> a12f125f4a (.)
=======
            ->action($this->logout(...));
>>>>>>> b93ef594b4 (.)
=======
            ->action(fn () => $this->logout());
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Get cancel action button configuration.
     *
<<<<<<< HEAD
     * @return Action
=======
<<<<<<< HEAD
     * @return Action
=======
     * @return \Filament\Actions\Action
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    protected function getCancelAction(): Action
    {
        return Action::make('cancel')
            ->translateLabel()
            ->color('gray')
            ->size('lg')
            ->extraAttributes(['class' => 'w-full justify-center mt-2'])
            ->url($this->getLocalizedHomeUrl());
    }

    /**
     * Get localized home URL.
     *
     * @return string
     */
    protected function getLocalizedHomeUrl(): string
    {
        return '/' . App::getLocale();
    }

    /**
     * Dispatch pre-logout event.
     *
<<<<<<< HEAD
     * @param Authenticatable $user
=======
<<<<<<< HEAD
     * @param Authenticatable $user
=======
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @return void
     */
    protected function dispatchPreLogoutEvent(Authenticatable $user): void
    {
        Event::dispatch('auth.logout.attempting', [$user]);
    }

    /**
     * Perform secure logout process.
     *
     * @return void
     */
    protected function performLogout(): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
    }

    /**
     * Dispatch post-logout event.
     *
     * @return void
     */
    protected function dispatchPostLogoutEvent(): void
    {
        Event::dispatch('auth.logout.successful');
    }

    /**
     * Log successful logout for audit trail.
     *
<<<<<<< HEAD
     * @param Authenticatable $user
=======
<<<<<<< HEAD
     * @param Authenticatable $user
=======
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @return void
     */
    protected function logLogoutSuccess(Authenticatable $user): void
    {
        Log::info('User logged out', [
            'user_id' => $user->getAuthIdentifier(),
            'timestamp' => now()->toDateTimeString(),
        ]);
    }

    /**
     * Redirect user after successful logout.
     *
     * @return void
     */
    protected function redirectAfterLogout(): void
    {
<<<<<<< HEAD
        redirect($this->getLocalizedHomeUrl())->with('success', __('user::auth.logout_success'))->send();
        exit();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        redirect($this->getLocalizedHomeUrl())->with('success', __('user::auth.logout_success'))->send();
        exit();
=======
=======
>>>>>>> origin/develop
        redirect($this->getLocalizedHomeUrl())
            ->with('success', __('user::auth.logout_success'))
            ->send();
        exit;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        redirect($this->getLocalizedHomeUrl())->with('success', __('user::auth.logout_success'))->send();
        exit();
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Get view data for the widget.
     *
     * @return array<string, string>
     */
    protected function getViewData(): array
    {
        return [
            'title' => __('user::auth.logout_title'),
            'description' => __('user::auth.logout_confirmation'),
        ];
    }
<<<<<<< HEAD
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> a12f125f4a (.)
=======
}
>>>>>>> b93ef594b4 (.)
=======
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
