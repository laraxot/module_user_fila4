<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/develop
=======
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Livewire\Features\SupportRedirects\Redirector;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Modules\Xot\Actions\File\ViewCopyAction;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Auth\Events\PasswordReset;
>>>>>>> 44e65d8 (.)
>>>>>>> laraxot/develop
=======
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Component;
<<<<<<< HEAD
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Actions\File\ViewCopyAction;
=======
<<<<<<< HEAD
<<<<<<< HEAD
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Actions\File\ViewCopyAction;
=======
<<<<<<< HEAD
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Actions\File\ViewCopyAction;
=======
>>>>>>> 44e65d8 (.)
>>>>>>> laraxot/develop
=======
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Actions\File\ViewCopyAction;
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
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
    public function resetPassword(): Redirector|RedirectResponse|null
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
            function (Authenticatable $user, string $password): void {
                /* @var Model&Authenticatable $user */
                $user->setAttribute('password', Hash::make($password));
                $user->setRememberToken(Str::random(60));
                $user->save();

                event(new PasswordReset($user));

                $this->guard()->login($user);
            },
        );

        /* @phpstan-ignore argument.type */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/develop
>>>>>>> e4cd89fa (.)
        Assert::string($response_lang = trans((string) $response));

        if (Password::PASSWORD_RESET === $response) {
            session()->flash($response_lang);

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
        Assert::string($response_lang = trans($response));

        if ($response === Password::PASSWORD_RESET) {
            session()->flash($response_lang);
>>>>>>> 44e65d8 (.)
>>>>>>> laraxot/develop
=======
        Assert::string($response_lang = trans((string) $response));

        if ($response === Password::PASSWORD_RESET) {
            session()->flash($response_lang);

>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
            return redirect(route('home'));
        }

        $this->addError('email', $response_lang);
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> 44e65d8 (.)
>>>>>>> laraxot/develop
=======

>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
        return null;
    }

    /**
     * Get the broker to be used during password reset.
     */
    public function broker(): PasswordBroker
    {
        return Password::broker();
    }

    public function render(): View|Factory
    {
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.reset', 'pub_theme::livewire.auth.passwords.reset');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.passwords.reset';

        return view($view, [
            'layout' => 'pub_theme::layouts.auth',
        ]);
    }

    /**
     * Get the guard to be used during password reset.
     */
    protected function guard(): StatefulGuard
    {
        return Auth::guard();
    }
}
