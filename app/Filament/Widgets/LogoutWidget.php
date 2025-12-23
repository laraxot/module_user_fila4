<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
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
>>>>>>> 81efa49 (.)
use Filament\Schemas\Components\View;
use RuntimeException;
use Exception;
use Filament\Actions\Action;
<<<<<<< HEAD
=======
=======
use Exception;
use Filament\Actions\Action;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\View;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Throwable;

/**
 * Provides a widget for user logout functionality within Filament admin panels.
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 *
 * This widget handles the user logout process including session invalidation,
 * event dispatching, and proper redirection with localization support.
 *
 * @method void mount() Initialize the widget and form state.
<<<<<<< HEAD
 * @method array<string, Component> getFormSchema() Define the form schema for the logout confirmation.
=======
<<<<<<< HEAD
<<<<<<< HEAD
 * @method array<string, Component> getFormSchema() Define the form schema for the logout confirmation.
=======
 * @method array<string, \Filament\Schemas\Components\Component> getFormSchema() Define the form schema for the logout confirmation.
>>>>>>> a12f125f4a (.)
=======
 * @method array<string, Component> getFormSchema() Define the form schema for the logout confirmation.
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
 * @method void logout() Handle the user logout process.
 * @method array<string, Action> getFormActions() Define the form actions (logout and cancel buttons).
 * @method array<string, string> getViewData() Get additional data to pass to the view.
 *
<<<<<<< HEAD
=======
=======
 * 
 * This widget handles the user logout process including session invalidation,
 * event dispatching, and proper redirection with localization support.
 * 
 * @method void mount() Initialize the widget and form state.
 * @method array<string, Component> getFormSchema() Define the form schema for the logout confirmation.
 * @method void logout() Handle the user logout process.
 * @method array<string, Action> getFormActions() Define the form actions (logout and cancel buttons).
 * @method array<string, string> getViewData() Get additional data to pass to the view.
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property array<string, mixed>|null $data Widget data array managed by XotBaseWidget.
 * @property bool $isLoggingOut Flag indicating if logout is in progress.
 */
class LogoutWidget extends XotBaseWidget
{
    /**
     * The view that should be used to render the widget.
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     *
     * IMPORTANT: When using @livewire() directly in Blade templates,
     * the path should be without the module namespace.
     *
     * @var string
     *
     * @phpstan-ignore property.phpDocType
<<<<<<< HEAD
=======
=======
     * 
=======
     *
>>>>>>> b93ef594b4 (.)
     * IMPORTANT: When using @livewire() directly in Blade templates,
     * the path should be without the module namespace.
     *
     * @var string
<<<<<<< HEAD
     * 
     * @phpstan-ignore property.phpDocType 
>>>>>>> a12f125f4a (.)
=======
     *
     * @phpstan-ignore property.phpDocType
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
     */
    protected string $view = 'user::widgets.logout';

    /**
     * Widget data array.
<<<<<<< HEAD
     *
=======
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> a12f125f4a (.)
=======
     *
>>>>>>> b93ef594b4 (.)
=======
     * 
     * IMPORTANT: When using @livewire() directly in Blade templates,
     * the path should be without the module namespace.
     * 
     * @var string
     * 
     * @phpstan-ignore property.phpDocType 
     */
    protected static string $view = 'user::widgets.logout';

    /**
     * Widget data array.
     * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * CRITICAL: This property is managed by XotBaseWidget.
     * Do not remove or redeclare it.
     *
     * @var array<string, mixed>|null
     */
<<<<<<< HEAD
    public null|array $data = [];
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public null|array $data = [];
=======
    public ?array $data = [];
>>>>>>> a12f125f4a (.)
=======
    public null|array $data = [];
>>>>>>> b93ef594b4 (.)
=======
    public ?array $data = [];
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Indicates if the logout process is in progress.
     *
     * @var bool
     */
    public bool $isLoggingOut = false;

    /**
     * Mount the widget and initialize the form.
<<<<<<< HEAD
     *
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> a12f125f4a (.)
=======
     *
>>>>>>> b93ef594b4 (.)
=======
     * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @return void
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Get the form schema for the logout confirmation.
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     *
     * This method implements the abstract method from XotBaseWidget.
     * Do not override the form() method as it's declared as final.
     *
<<<<<<< HEAD
=======
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
            'message' => View::make($view)->columnSpanFull(),
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
            'message' => View::make($view)
                ->columnSpanFull(),
>>>>>>> a12f125f4a (.)
=======
            'message' => View::make($view)->columnSpanFull(),
>>>>>>> b93ef594b4 (.)
=======
     * 
     * This method implements the abstract method from XotBaseWidget.
     * Do not override the form() method as it's declared as final.
     *
     * @return array<string, Component>
     */
    public function getFormSchema(): array
    {
        $view='filament.widgets.auth.logout-message';
        //@phpstan-ignore-next-line
        if(!view()->exists($view)){
            throw new \Exception('View '.$view.' not found');
        }
        return [
            'message' => View::make($view)
                ->columnSpanFull(),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
     * Handle the user logout process.
<<<<<<< HEAD
     *
=======
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * This method performs the following actions:
     * 1. Validates the current user session
     * 2. Dispatches pre-logout events
     * 3. Performs the actual logout
     * 4. Invalidates the session
     * 5. Dispatches post-logout events
     * 6. Logs the operation
     * 7. Handles redirection with proper localization
     *
     * @return void
<<<<<<< HEAD
     *
     * @throws RuntimeException If the logout process fails
=======
<<<<<<< HEAD
     *
     * @throws RuntimeException If the logout process fails
=======
     * 
     * @throws \RuntimeException If the logout process fails
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function logout(): void
    {
        try {
            $this->isLoggingOut = true;

            // Get the authenticated user before logging out
            $user = $this->getAuthenticatedUser();
            if ($user === null) {
                $this->handleNoUserScenario();
                return;
            }

            $this->dispatchPreLogoutEvent($user);
            $this->performLogout();
            $this->dispatchPostLogoutEvent();
            $this->logLogoutSuccess($user);
            $this->redirectAfterLogout();
        } catch (Throwable $e) {
            $this->handleLogoutError($e);
        }
    }

    /**
     * Get the form actions for the widget.
     *
     * @return array<string, Action>
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getFormActions(): array
    {
        return [
            'logout' => $this->getLogoutAction(),
            'cancel' => $this->getCancelAction(),
        ];
    }

    /**
     * Get the logout action configuration.
     *
     * @return Action
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
     * Get the cancel action configuration.
     *
     * @return Action
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
     * Get localized home URL based on current locale.
     *
     * @return string
     */
    protected function getLocalizedHomeUrl(): string
    {
        $locale = App::getLocale();
        return '/' . ltrim($locale, '/');
    }

    /**
     * Get the authenticated user instance.
     *
<<<<<<< HEAD
     * @return Authenticatable|null
     */
    protected function getAuthenticatedUser(): null|Authenticatable
=======
<<<<<<< HEAD
     * @return Authenticatable|null
     */
<<<<<<< HEAD
<<<<<<< HEAD
    protected function getAuthenticatedUser(): null|Authenticatable
=======
    protected function getAuthenticatedUser(): ?Authenticatable
>>>>>>> a12f125f4a (.)
=======
    protected function getAuthenticatedUser(): null|Authenticatable
>>>>>>> b93ef594b4 (.)
=======
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected function getAuthenticatedUser(): ?Authenticatable
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return Auth::user();
    }

    /**
     * Handle scenario when no user is authenticated.
     *
     * @return void
     */
    protected function handleNoUserScenario(): void
    {
        $this->isLoggingOut = false;
        Log::warning('Logout attempted with no authenticated user');
    }

    /**
     * Dispatch pre-logout events.
     *
<<<<<<< HEAD
     * @param Authenticatable $user
=======
<<<<<<< HEAD
     * @param Authenticatable $user
=======
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @return void
     */
    protected function dispatchPreLogoutEvent(Authenticatable $user): void
    {
        Event::dispatch('auth.logout.attempting', [$user]);
    }

    /**
     * Perform the actual logout operations.
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
     * Dispatch post-logout events.
     *
     * @return void
     */
    protected function dispatchPostLogoutEvent(): void
    {
        Event::dispatch('auth.logout.successful');
    }

    /**
     * Log successful logout operation.
     *
<<<<<<< HEAD
     * @param Authenticatable $user
=======
<<<<<<< HEAD
     * @param Authenticatable $user
=======
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
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
     * Handle redirect after successful logout.
     *
     * @return void
     */
    protected function redirectAfterLogout(): void
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $redirect = redirect($this->getLocalizedHomeUrl())->with('success', __('user::auth.logout_success'));

        $redirect->send();
        exit();
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $redirect = redirect($this->getLocalizedHomeUrl())
            ->with('success', __('user::auth.logout_success'));
            
        $redirect->send();
        exit;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $redirect = redirect($this->getLocalizedHomeUrl())->with('success', __('user::auth.logout_success'));

        $redirect->send();
        exit();
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Handle any errors that occur during logout.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @param Throwable $e
     * @return void
     *
     * @throws RuntimeException
<<<<<<< HEAD
=======
=======
     * @param  \Throwable  $e
     * @return void
     * 
     * @throws \RuntimeException
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    protected function handleLogoutError(Throwable $e): void
    {
        Log::error('Logout error: ' . $e->getMessage(), [
            'exception' => get_class($e),
            'trace' => $e->getTraceAsString(),
        ]);

        $this->isLoggingOut = false;
        Session::flash('error', __('user::auth.logout_error'));
    }

    /**
     * Get view data for the widget.
     *
     * @return array{
     *     title: string,
     *     description: string
     * }
     */
    protected function getViewData(): array
    {
        return [
            'title' => __('user::auth.logout_title'),
            'description' => __('user::auth.logout_confirmation'),
        ];
    }
}
