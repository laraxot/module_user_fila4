<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Forms\Form;
use Filament\Forms\Form;
use Filament\Forms\Form;
=======
use Filament\Schemas\Schema;
use Override;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Datas\XotData;
use Exception;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Auth\Events\PasswordReset;
>>>>>>> a63f578 (.)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
<<<<<<< HEAD
=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;
>>>>>>> a63f578 (.)
use Webmozart\Assert\Assert;

/**
 * Password Reset Confirmation Widget .
 *
 * Handles the password reset confirmation flow using a token
 * from the password reset email link.
 *
<<<<<<< HEAD
 * @property Form $form
 */
class PasswordResetConfirmWidget extends XotBaseWidget
{
=======
 * @property Schema $form
 */
class PasswordResetConfirmWidget extends XotBaseWidget
{
    public null|array $data = [];
    public null|string $token = null;
    public null|string $email = null;
    public string $currentState = 'form'; // form, success, error, expired
    public null|string $errorMessage = null;
>>>>>>> a63f578 (.)

    /**
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset-confirm';

    /**
     * Mount the widget with token and optional email.
     */
<<<<<<< HEAD
=======
    public function mount(null|string $token = null, null|string $email = null): void
>>>>>>> a63f578 (.)
    {
        $this->token = $token;
        $this->email = $email;

        // Pre-fill the form if email is provided
        if ($this->email) {
            $this->form->fill(['email' => $this->email]);
        }
    }

    /**
     * Get the form schema for password reset confirmation.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete('email')
                ->maxLength(255)
<<<<<<< HEAD
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> a63f578 (.)
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-envelope'),
            'password' => TextInput::make('password')
                ->password()
                ->required()
                ->revealable()
                ->minLength(8)
<<<<<<< HEAD
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> a63f578 (.)
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-key'),
            'password_confirmation' => TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->same('password')
<<<<<<< HEAD
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> a63f578 (.)
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-key'),
        ];
    }

    /**
     * Handle the password reset confirmation.
     */
    public function confirmPasswordReset(): void
    {
<<<<<<< HEAD
=======
        if ('form' !== $this->currentState) {
>>>>>>> a63f578 (.)
            return;
        }

        $this->currentState = 'loading';

        try {
            $data = $this->form->getState();

            $response = Password::broker()->reset(
                [
                    'token' => $this->token,
                    'email' => $data['email'],
                    'password' => $data['password'],
                ],
<<<<<<< HEAD
                function (Authenticatable $user, string $password): void {
                    // Use setAttribute to set password safely
                    /** @var Model&Authenticatable $user */
=======
                function (\Illuminate\Contracts\Auth\Authenticatable $user, string $password): void {
                    // Use setAttribute to set password safely
                    /** @var \Illuminate\Database\Eloquent\Model&\Illuminate\Contracts\Auth\Authenticatable $user */
>>>>>>> a63f578 (.)
                    $user->setAttribute('password', Hash::make($password));
                    $user->setRememberToken(Str::random(60));
                    $user->save();

                    event(new PasswordReset($user));
                },
            );

<<<<<<< HEAD
=======
            if (Password::PASSWORD_RESET === $response) {
>>>>>>> a63f578 (.)
                $this->currentState = 'success';

                Notification::make()
                    ->title(__('user::auth.password_reset.success.title'))
                    ->body(__('user::auth.password_reset.success.message'))
                    ->success()
                    ->duration(8000)
                    ->send();

                // Auto-login the user after successful password reset
                // $user = \Modules\Xot\Datas\XotData::make()->getUserClass()::where('email', $data['email'])->first();
<<<<<<< HEAD
=======
                Assert::string($email = $data['email'], __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
>>>>>>> a63f578 (.)
                $user = XotData::make()->getUserByEmail($email);
                // if ($user) {
                Auth::guard()->login($user);
                // }

                // Redirect after a short delay to show success message
<<<<<<< HEAD
=======
                $this->js('setTimeout(() => { window.location.href = "' . route('login') . '"; }, 3000);');
>>>>>>> a63f578 (.)
            } else {
                /* @phpstan-ignore argument.type */
                $this->handleResetError($response);
            }
        } catch (Exception $e) {
            $this->handleResetError('passwords.generic_error');
        }
    }

    /**
     * Handle password reset errors.
     */
    protected function handleResetError(string $response): void
    {
        $this->currentState = 'error';

        // Map Laravel password reset responses to user-friendly messages
        $errorMessages = [
            Password::INVALID_TOKEN => __('user::auth.password_reset.errors.invalid_token'),
            Password::INVALID_USER => __('user::auth.password_reset.errors.invalid_user'),
            'passwords.generic_error' => __('user::auth.password_reset.errors.generic'),
        ];

        $this->errorMessage = $errorMessages[$response] ?? trans($response);

        Notification::make()
            ->title(__('user::auth.password_reset.errors.title'))
            ->body($this->errorMessage)
            ->danger()
            ->duration(10000)
            ->send();
    }

    /**
     * Reset the widget to allow another attempt.
     */
    public function resetForm(): void
    {
        $this->currentState = 'form';
        $this->errorMessage = null;
        $this->form->fill(['email' => $this->email ?? '']);
    }

    /**
     * Get the current state for the view.
     */
    public function getCurrentState(): string
    {
        return $this->currentState;
    }

    /**
     * Get the error message if any.
     */
<<<<<<< HEAD
=======
    public function getErrorMessage(): null|string
>>>>>>> a63f578 (.)
    {
        return $this->errorMessage;
    }

    /**
     * Check if the form should be shown.
     */
    public function shouldShowForm(): bool
    {
        return in_array($this->currentState, ['form', 'loading'], strict: true);
    }

    /**
     * Check if the widget is in loading state.
     */
    public function isLoading(): bool
    {
<<<<<<< HEAD
=======
        return 'loading' === $this->currentState;
>>>>>>> a63f578 (.)
    }

    /**
     * Check if the password reset was successful.
     */
    public function isSuccess(): bool
    {
<<<<<<< HEAD
=======
        return 'success' === $this->currentState;
>>>>>>> a63f578 (.)
    }

    /**
     * Check if there was an error.
     */
    public function hasError(): bool
    {
<<<<<<< HEAD
=======
        return 'error' === $this->currentState;
>>>>>>> a63f578 (.)
    }
}
