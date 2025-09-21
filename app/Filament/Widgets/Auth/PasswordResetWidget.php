<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Schemas\Schema;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Schema;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Schemas\Schema;
use Override;
>>>>>>> b93ef594b4 (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms;
=======
use Filament\Forms;
use Filament\Forms\ComponentContainer;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\HtmlString;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * Password Reset Widget .
 *
 * Handles password reset request flow using Filament forms
 * with improved UX and validation.
 *
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Schema $form
 */
class PasswordResetWidget extends XotBaseWidget
{
    public null|array $data = [];
<<<<<<< HEAD
=======
=======
 * @property \Filament\Schemas\Schema $form
=======
 * @property ComponentContainer $form
>>>>>>> origin/develop
 */
class PasswordResetWidget extends XotBaseWidget
{
    public ?array $data = [];
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
 * @property Schema $form
 */
class PasswordResetWidget extends XotBaseWidget
{
    public null|array $data = [];
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public bool $emailSent = false;

    /**
     * @phpstan-ignore-next-line
     */
<<<<<<< HEAD
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset';
=======
<<<<<<< HEAD
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset';
=======
    protected static string $view = 'pub_theme::filament.widgets.auth.password.reset';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Get the form schema for password reset.
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
>>>>>>> 81efa49 (.)
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
<<<<<<< HEAD
=======
=======
    public function getFormSchema(): array
    {
        return [
            'email' => Forms\Components\TextInput::make('email')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->email()
                ->required()
                ->autocomplete('email')
                ->maxLength(255)
                ->extraInputAttributes(['class' => 'text-center']),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            'error_display' => Placeholder::make('error_display')
                ->label('')
                ->content(function ($_get) {
                    $error = Session::get('error');

                    if ($error && is_string($error)) {
                        $str =
                            '<div class="text-red-600 font-medium bg-red-50 p-3 rounded-md border border-red-200">' .
                            $error .
                            '</div>';
<<<<<<< HEAD
=======
=======

=======
>>>>>>> b93ef594b4 (.)
            'error_display' => Placeholder::make('error_display')
                ->label('')
                ->content(function ($_get) {
                    $error = Session::get('error');

                    if ($error && is_string($error)) {
<<<<<<< HEAD
                        $str = '<div class="text-red-600 font-medium bg-red-50 p-3 rounded-md border border-red-200">'.$error.'</div>';
>>>>>>> a12f125f4a (.)
=======
                        $str =
                            '<div class="text-red-600 font-medium bg-red-50 p-3 rounded-md border border-red-200">' .
                            $error .
                            '</div>';
>>>>>>> b93ef594b4 (.)
=======

            'error_display' => Forms\Components\Placeholder::make('error_display')
                ->label('')
                ->content(function ($get) {
                    $error = Session::get('error');

                    if ($error && is_string($error)) {
                        $str = '<div class="text-red-600 font-medium bg-red-50 p-3 rounded-md border border-red-200">'.$error.'</div>';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

                        return new HtmlString($str);
                    }

                    return null;
                })
                ->reactive(),
        ];
    }

    /**
     * Handle password reset link sending.
     */
    public function sendResetPasswordLink(): void
    {
        // try {
        $data = $this->form->getState();
        $password_broker = Password::broker();

        $response = $password_broker->sendResetLink([
            'email' => $data['email'],
        ]);

        if (Password::RESET_LINK_SENT === $response) {
            $this->emailSent = true;

            Notification::make()
                ->title(__('user::auth.password_reset.email_sent.title'))
                ->body(__('user::auth.password_reset.email_sent.message'))
                ->success()
                ->duration(10000)
                ->send();

            // Clear the form
            $this->form->fill();
        } else {
<<<<<<< HEAD
            Session::flash('error', trans('user::errors.' . $response . '.label'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            Session::flash('error', trans('user::errors.' . $response . '.label'));
=======
            Session::flash('error', trans('user::errors.'.$response.'.label'));
>>>>>>> a12f125f4a (.)
=======
            Session::flash('error', trans('user::errors.' . $response . '.label'));
>>>>>>> b93ef594b4 (.)
=======
            Session::flash('error', trans('user::errors.'.$response.'.label'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            Notification::make()
                ->title(__('user::auth.password_reset.email_failed.title'))
                ->body(trans($response))
                ->danger()
                ->send();
        }
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        /*} catch (\Exception $e) {
         * Notification::make()
         * ->title(__('user::auth.password_reset.email_failed.title'))
         * ->body(__('user::auth.password_reset.email_failed.generic'))
         * ->danger()
         * ->send();
         * }
         */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        /*} catch (\Exception $e) {
            Notification::make()
                ->title(__('user::auth.password_reset.email_failed.title'))
                ->body(__('user::auth.password_reset.email_failed.generic'))
                ->danger()
                ->send();
        }
                */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        /*} catch (\Exception $e) {
         * Notification::make()
         * ->title(__('user::auth.password_reset.email_failed.title'))
         * ->body(__('user::auth.password_reset.email_failed.generic'))
         * ->danger()
         * ->send();
         * }
         */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Reset the widget state to show form again.
     */
    public function resetForm(): void
    {
        $this->emailSent = false;
        $this->form->fill();
    }

    /**
     * Send another reset link.
     */
    public function sendAnotherLink(): void
    {
        $this->emailSent = false;
        $this->form->fill(['email' => '']);
    }

    /**
     * Check email status (for compatibility with old view).
     */
    public function checkEmailStatus(): void
    {
        // This method is kept for compatibility but redirects to login
        $this->redirect(route('login'));
    }
}
