<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Filament\Schemas\Schema;
use Override;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Datas\XotData;
use Exception;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Auth\Events\PasswordReset;
>>>>>>> 2805232 (.)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Override;
=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;
>>>>>>> 2805232 (.)
use Webmozart\Assert\Assert;

/**
 * Password Reset Confirmation Widget .
 *
 * Handles the password reset confirmation flow using a token
 * from the password reset email link.
 *
 * @property Schema $form
 */
class PasswordResetConfirmWidget extends XotBaseWidget
{
<<<<<<< HEAD
    public ?array $data = [];

    public ?string $token = null;

    public ?string $email = null;

    public string $currentState = 'form'; // form, success, error, expired

    public ?string $errorMessage = null;
=======
    public null|array $data = [];
    public null|string $token = null;
    public null|string $email = null;
    public string $currentState = 'form'; // form, success, error, expired
    public null|string $errorMessage = null;
>>>>>>> 2805232 (.)

    /**
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset-confirm';

    /**
     * Mount the widget with token and optional email.
     */
<<<<<<< HEAD
    public function mount(?string $token = null, ?string $email = null): void
=======
    public function mount(null|string $token = null, null|string $email = null): void
>>>>>>> 2805232 (.)
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
                ->disabled($this->currentState !== 'form')
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> 2805232 (.)
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-envelope'),
            'password' => TextInput::make('password')
                ->password()
                ->required()
                ->revealable()
                ->minLength(8)
<<<<<<< HEAD
                ->disabled($this->currentState !== 'form')
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> 2805232 (.)
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-key'),
            'password_confirmation' => TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->same('password')
<<<<<<< HEAD
                ->disabled($this->currentState !== 'form')
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> 2805232 (.)
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
        if ($this->currentState !== 'form') {
=======
        if ('form' !== $this->currentState) {
>>>>>>> 2805232 (.)
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
                function (Authenticatable $user, string $password): void {
                    // Use setAttribute to set password safely
                    /** @var Model&Authenticatable $user */
                    $user->setAttribute('password', Hash::make($password));
                    $user->setRememberToken(Str::random(60));
                    $user->save();

                    event(new PasswordReset($user));
                },
            );

<<<<<<< HEAD
            if ($response === Password::PASSWORD_RESET) {
=======
            if (Password::PASSWORD_RESET === $response) {
>>>>>>> 2805232 (.)
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
                Assert::string($email = $data['email'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));
=======
                Assert::string($email = $data['email'], __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
>>>>>>> 2805232 (.)
                $user = XotData::make()->getUserByEmail($email);
                // if ($user) {
                Auth::guard()->login($user);
                // }

                // Redirect after a short delay to show success message
<<<<<<< HEAD
                $this->js('setTimeout(() => { window.location.href = "'.route('login').'"; }, 3000);');
=======
                $this->js('setTimeout(() => { window.location.href = "' . route('login') . '"; }, 3000);');
>>>>>>> 2805232 (.)
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
    public function getErrorMessage(): ?string
=======
    public function getErrorMessage(): null|string
>>>>>>> 2805232 (.)
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
        return $this->currentState === 'loading';
=======
        return 'loading' === $this->currentState;
>>>>>>> 2805232 (.)
    }

    /**
     * Check if the password reset was successful.
     */
    public function isSuccess(): bool
    {
<<<<<<< HEAD
        return $this->currentState === 'success';
=======
        return 'success' === $this->currentState;
>>>>>>> 2805232 (.)
    }

    /**
     * Check if there was an error.
     */
    public function hasError(): bool
    {
<<<<<<< HEAD
        return $this->currentState === 'error';
=======
        return 'error' === $this->currentState;
>>>>>>> 2805232 (.)
    }
}
