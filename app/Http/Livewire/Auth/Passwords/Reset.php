<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Livewire\Features\SupportRedirects\Redirector;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Modules\Xot\Actions\File\ViewCopyAction;
use Illuminate\Contracts\Auth\StatefulGuard;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Component;
use Webmozart\Assert\Assert;

class Reset extends Component
{
    public string $token = '';

    public string $email = '';

    public string $password = '';

    public string $passwordConfirmation = '';

    public function mount(string $token): void
    {
        Assert::string($email = request()->query('email', ''));
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Reimposta la password dell'utente.
     */
<<<<<<< HEAD
    public function resetPassword(): Redirector|RedirectResponse|null
=======
<<<<<<< HEAD
    public function resetPassword(): Redirector|RedirectResponse|null
=======
    public function resetPassword(): \Livewire\Features\SupportRedirects\Redirector|RedirectResponse|null
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $messages = __('user::validation');

        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'same:passwordConfirmation', PasswordRule::defaults()],
        ], $messages);

        $response = $this->broker()->reset(
            [
                'token' => $this->token,
                'email' => $this->email,
                'password' => $this->password,
            ],
<<<<<<< HEAD
            function (Authenticatable $user, string $password): void {
                /** @var Model&Authenticatable $user */
                $user->setAttribute('password', Hash::make($password));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            function (\Illuminate\Contracts\Auth\Authenticatable $user, string $password): void {
                /** @var \Illuminate\Database\Eloquent\Model&\Illuminate\Contracts\Auth\Authenticatable $user */
                $user->setAttribute('password', Hash::make($password));
=======
            function ($user, $password): void {
                $user->password = Hash::make($password);
>>>>>>> a12f125f4a (.)
=======
            function (Authenticatable $user, string $password): void {
                /** @var Model&Authenticatable $user */
=======
            function (\Illuminate\Contracts\Auth\Authenticatable $user, string $password): void {
                /** @var \Illuminate\Database\Eloquent\Model&\Illuminate\Contracts\Auth\Authenticatable $user */
>>>>>>> 634583fb55 (.)
                $user->setAttribute('password', Hash::make($password));
>>>>>>> b93ef594b4 (.)
=======
            function ($user, $password): void {
                $user->password = Hash::make($password);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                $user->setRememberToken(Str::random(60));
                $user->save();

                event(new PasswordReset($user));

                $this->guard()->login($user);
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

        /* @phpstan-ignore argument.type */
        Assert::string($response_lang = trans($response));

        if ($response === Password::PASSWORD_RESET) {
            session()->flash($response_lang);
            return redirect(route('home'));
        }

        $this->addError('email', $response_lang);
        return null;
    }

    /**
     * Get the broker to be used during password reset.
     */
<<<<<<< HEAD
    public function broker(): PasswordBroker
=======
<<<<<<< HEAD
    public function broker(): PasswordBroker
=======
    public function broker(): \Illuminate\Contracts\Auth\PasswordBroker
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return Password::broker();
    }

<<<<<<< HEAD
    public function render(): View|Factory
    {
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.reset', 'pub_theme::livewire.auth.passwords.reset');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
=======
<<<<<<< HEAD
    public function render(): View|Factory
    {
<<<<<<< HEAD
<<<<<<< HEAD
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.reset', 'pub_theme::livewire.auth.passwords.reset');
=======
        app(ViewCopyAction::class)->execute('user::livewire.auth.passwords.reset', 'pub_theme::livewire.auth.passwords.reset');
>>>>>>> a12f125f4a (.)
=======
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.reset', 'pub_theme::livewire.auth.passwords.reset');
>>>>>>> b93ef594b4 (.)
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
=======
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::livewire.auth.passwords.reset', 'pub_theme::livewire.auth.passwords.reset');
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.passwords.reset';

        return view($view, [
<<<<<<< HEAD
            'layout' => 'pub_theme::layouts.auth',
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'layout' => 'pub_theme::layouts.auth',
=======
            'layout' => 'pub_theme::layouts.auth'
>>>>>>> a12f125f4a (.)
=======
            'layout' => 'pub_theme::layouts.auth',
>>>>>>> b93ef594b4 (.)
=======
            'layout' => 'pub_theme::layouts.auth'
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ]);
    }

    /**
     * Get the guard to be used during password reset.
     */
<<<<<<< HEAD
    protected function guard(): StatefulGuard
=======
<<<<<<< HEAD
    protected function guard(): StatefulGuard
=======
    protected function guard(): \Illuminate\Contracts\Auth\StatefulGuard
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return Auth::guard();
    }
}
