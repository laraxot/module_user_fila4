<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
<<<<<<< HEAD
use Exception;
=======
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
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
    public ?array $data = [];

    public ?string $token = null;

    public ?string $email = null;

    public string $currentState = 'form'; // form, success, error, expired

    public ?string $errorMessage = null;

    /**
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset-confirm';

    /**
     * Mount the widget with token and optional email.
     */
    public function mount(?string $token = null, ?string $email = null): void
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
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> laraxot/develop
=======
    #[\Override]
>>>>>>> a382d4f1 (.)
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete('email')
                ->maxLength(255)
<<<<<<< HEAD
<<<<<<< HEAD
                ->disabled($this->currentState !== 'form')
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> laraxot/develop
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> a382d4f1 (.)
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-envelope'),
            'password' => TextInput::make('password')
                ->password()
                ->required()
                ->revealable()
                ->minLength(8)
<<<<<<< HEAD
<<<<<<< HEAD
                ->disabled($this->currentState !== 'form')
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> laraxot/develop
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> a382d4f1 (.)
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-key'),
            'password_confirmation' => TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->same('password')
<<<<<<< HEAD
<<<<<<< HEAD
                ->disabled($this->currentState !== 'form')
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> laraxot/develop
=======
                ->disabled('form' !== $this->currentState)
>>>>>>> a382d4f1 (.)
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
<<<<<<< HEAD
        if ($this->currentState !== 'form') {
=======
        if ('form' !== $this->currentState) {
>>>>>>> laraxot/develop
=======
        if ('form' !== $this->currentState) {
>>>>>>> a382d4f1 (.)
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
                static function (Authenticatable $user, string $password): void {
                    // Use setAttribute to set password safely
                    /* @var Model&Authenticatable $user */
                    // PHPStan: instanceof always true since UserContract extends Authenticatable
                    $user->setAttribute('password', Hash::make($password));
                    $user->setRememberToken(Str::random(60));
                    $user->save();

                    event(new PasswordReset($user));
                },
            );

<<<<<<< HEAD
<<<<<<< HEAD
            if ($response === Password::PASSWORD_RESET) {
=======
            if (Password::PASSWORD_RESET === $response) {
>>>>>>> laraxot/develop
=======
            if (Password::PASSWORD_RESET === $response) {
>>>>>>> a382d4f1 (.)
                $this->currentState = 'success';

                Notification::make()
                    ->title(__('user::auth.password_reset.success.title'))
                    ->body(__('user::auth.password_reset.success.message'))
                    ->success()
                    ->duration(8000)
                    ->send();

                // Auto-login the user after successful password reset
                // $user = \Modules\Xot\Datas\XotData::make()->getUserClass()::where('email', $data['email'])->first();
                Assert::string($email = $data['email'], __FILE__.':'.__LINE__.' - '.class_basename(self::class));
                /** @var UserContract $user */
                $user = XotData::make()->getUserByEmail($email);
                Assert::isInstanceOf($user, Authenticatable::class);
                Auth::guard()->login($user);

                // Redirect after a short delay to show success message
                $this->js('setTimeout(() => { window.location.href = "'.route('login').'"; }, 3000);');
            } else {
                /* @phpstan-ignore argument.type */
                $this->handleResetError($response);
            }
<<<<<<< HEAD
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> laraxot/develop
=======
        } catch (\Exception $e) {
>>>>>>> a382d4f1 (.)
            $this->handleResetError('passwords.generic_error');
        }
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
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * Check if the form should be shown.
     */
    public function shouldShowForm(): bool
    {
        return \in_array($this->currentState, ['form', 'loading'], strict: true);
    }

    /**
     * Check if the widget is in loading state.
     */
    public function isLoading(): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->currentState === 'loading';
=======
        return 'loading' === $this->currentState;
>>>>>>> laraxot/develop
=======
        return 'loading' === $this->currentState;
>>>>>>> a382d4f1 (.)
    }

    /**
     * Check if the password reset was successful.
     */
    public function isSuccess(): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->currentState === 'success';
=======
        return 'success' === $this->currentState;
>>>>>>> laraxot/develop
=======
        return 'success' === $this->currentState;
>>>>>>> a382d4f1 (.)
    }

    /**
     * Check if there was an error.
     */
    public function hasError(): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->currentState === 'error';
=======
        return 'error' === $this->currentState;
>>>>>>> laraxot/develop
=======
        return 'error' === $this->currentState;
>>>>>>> a382d4f1 (.)
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
}
