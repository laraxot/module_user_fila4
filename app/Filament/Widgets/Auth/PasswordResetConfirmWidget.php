<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Filament\Schemas\Schema;
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Schema;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> 634583fb55 (.)
use Filament\Schemas\Schema;
use Override;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Modules\Xot\Datas\XotData;
use Exception;
use Filament\Forms;
<<<<<<< HEAD
=======
=======
use Filament\Forms;
use Filament\Forms\ComponentContainer;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

/**
 * Password Reset Confirmation Widget .
 *
 * Handles the password reset confirmation flow using a token
 * from the password reset email link.
 *
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Schema $form
 */
class PasswordResetConfirmWidget extends XotBaseWidget
{
    public null|array $data = [];
    public null|string $token = null;
    public null|string $email = null;
    public string $currentState = 'form'; // form, success, error, expired
    public null|string $errorMessage = null;
<<<<<<< HEAD
=======
=======
 * @property \Filament\Schemas\Schema $form
=======
 * @property Schema $form
>>>>>>> b93ef594b4 (.)
 */
class PasswordResetConfirmWidget extends XotBaseWidget
{
    public null|array $data = [];
    public null|string $token = null;
    public null|string $email = null;
    public string $currentState = 'form'; // form, success, error, expired
<<<<<<< HEAD
    public ?string $errorMessage = null;
>>>>>>> a12f125f4a (.)
=======
    public null|string $errorMessage = null;
>>>>>>> b93ef594b4 (.)
=======
 * @property ComponentContainer $form
 */
class PasswordResetConfirmWidget extends XotBaseWidget
{
    public ?array $data = [];
    public ?string $token = null;
    public ?string $email = null;
    public string $currentState = 'form'; // form, success, error, expired
    public ?string $errorMessage = null;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * @phpstan-ignore-next-line
     */
<<<<<<< HEAD
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset-confirm';
=======
<<<<<<< HEAD
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset-confirm';
=======
    protected static string $view = 'pub_theme::filament.widgets.auth.password.reset-confirm';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Mount the widget with token and optional email.
     */
<<<<<<< HEAD
    public function mount(null|string $token = null, null|string $email = null): void
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function mount(null|string $token = null, null|string $email = null): void
=======
    public function mount(?string $token = null, ?string $email = null): void
>>>>>>> a12f125f4a (.)
=======
    public function mount(null|string $token = null, null|string $email = null): void
>>>>>>> b93ef594b4 (.)
=======
    public function mount(?string $token = null, ?string $email = null): void
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
                ->disabled('form' !== $this->currentState)
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-envelope'),
<<<<<<< HEAD
            'password' => TextInput::make('password')
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
            'password' => TextInput::make('password')
=======

            'password' => Forms\Components\TextInput::make('password')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->password()
                ->required()
                ->revealable()
                ->minLength(8)
                ->disabled('form' !== $this->currentState)
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-key'),
<<<<<<< HEAD
            'password_confirmation' => TextInput::make('password_confirmation')
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
            'password_confirmation' => TextInput::make('password_confirmation')
=======

            'password_confirmation' => Forms\Components\TextInput::make('password_confirmation')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->password()
                ->required()
                ->same('password')
                ->disabled('form' !== $this->currentState)
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-key'),
        ];
    }

    /**
     * Handle the password reset confirmation.
     */
    public function confirmPasswordReset(): void
    {
        if ('form' !== $this->currentState) {
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
                    $user->setAttribute('password', Hash::make($password));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                function (\Illuminate\Contracts\Auth\Authenticatable $user, string $password): void {
                    // Use setAttribute to set password safely
                    /** @var \Illuminate\Database\Eloquent\Model&\Illuminate\Contracts\Auth\Authenticatable $user */
                    $user->setAttribute('password', Hash::make($password));
=======
                function ($user, $password) {
                    $user->password = Hash::make($password);
>>>>>>> a12f125f4a (.)
=======
                function (Authenticatable $user, string $password): void {
=======
                function (\Illuminate\Contracts\Auth\Authenticatable $user, string $password): void {
>>>>>>> 634583fb55 (.)
                    // Use setAttribute to set password safely
                    /** @var \Illuminate\Database\Eloquent\Model&\Illuminate\Contracts\Auth\Authenticatable $user */
                    $user->setAttribute('password', Hash::make($password));
>>>>>>> b93ef594b4 (.)
=======
                function ($user, $password) {
                    $user->password = Hash::make($password);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                    $user->setRememberToken(Str::random(60));
                    $user->save();

                    event(new PasswordReset($user));
<<<<<<< HEAD
                },
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                },
=======
                }
>>>>>>> a12f125f4a (.)
=======
                },
>>>>>>> b93ef594b4 (.)
=======
                }
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            );

            if (Password::PASSWORD_RESET === $response) {
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
                Assert::string($email = $data['email'], __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
                $user = XotData::make()->getUserByEmail($email);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                Assert::string($email = $data['email'], __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
=======
                Assert::string($email = $data['email']);
>>>>>>> a12f125f4a (.)
=======
                Assert::string($email = $data['email'], __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
>>>>>>> b93ef594b4 (.)
                $user = XotData::make()->getUserByEmail($email);
=======
                Assert::string($email = $data['email']);
                $user = \Modules\Xot\Datas\XotData::make()->getUserByEmail($email);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                // if ($user) {
                Auth::guard()->login($user);
                // }

                // Redirect after a short delay to show success message
<<<<<<< HEAD
                $this->js('setTimeout(() => { window.location.href = "' . route('login') . '"; }, 3000);');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                $this->js('setTimeout(() => { window.location.href = "' . route('login') . '"; }, 3000);');
=======
                $this->js('setTimeout(() => { window.location.href = "'.route('login').'"; }, 3000);');
>>>>>>> a12f125f4a (.)
=======
                $this->js('setTimeout(() => { window.location.href = "' . route('login') . '"; }, 3000);');
>>>>>>> b93ef594b4 (.)
=======
                $this->js('setTimeout(() => { window.location.href = "'.route('login').'"; }, 3000);');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            } else {
                /* @phpstan-ignore argument.type */
                $this->handleResetError($response);
            }
<<<<<<< HEAD
        } catch (Exception $e) {
=======
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
    public function getErrorMessage(): null|string
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getErrorMessage(): null|string
=======
    public function getErrorMessage(): ?string
>>>>>>> a12f125f4a (.)
=======
    public function getErrorMessage(): null|string
>>>>>>> b93ef594b4 (.)
=======
    public function getErrorMessage(): ?string
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return $this->errorMessage;
    }

    /**
     * Check if the form should be shown.
     */
    public function shouldShowForm(): bool
    {
<<<<<<< HEAD
        return in_array($this->currentState, ['form', 'loading'], strict: true);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return in_array($this->currentState, ['form', 'loading'], strict: true);
=======
        return in_array($this->currentState, ['form', 'loading']);
>>>>>>> a12f125f4a (.)
=======
        return in_array($this->currentState, ['form', 'loading'], strict: true);
>>>>>>> b93ef594b4 (.)
=======
        return in_array($this->currentState, ['form', 'loading']);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Check if the widget is in loading state.
     */
    public function isLoading(): bool
    {
        return 'loading' === $this->currentState;
    }

    /**
     * Check if the password reset was successful.
     */
    public function isSuccess(): bool
    {
        return 'success' === $this->currentState;
    }

    /**
     * Check if there was an error.
     */
    public function hasError(): bool
    {
        return 'error' === $this->currentState;
    }
}
