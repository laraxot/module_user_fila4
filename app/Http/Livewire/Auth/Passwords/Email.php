<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Modules\Xot\Actions\File\ViewCopyAction;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class Email extends Component
{
    public string $email = '';

<<<<<<< HEAD
<<<<<<< HEAD
    public null|string $emailSentMessage = null;
=======
    public ?string $emailSentMessage = null;
>>>>>>> fbc8f8e (.)
=======
    public null|string $emailSentMessage = null;
>>>>>>> 6d20fbe (.)

    /**
     * Invia il link per il reset della password.
     */
    public function sendResetPasswordLink(): void
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $broker = $this->broker();
        $response = $broker->sendResetLink(['email' => $this->email]);

        if ($response === Password::RESET_LINK_SENT) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
            $this->emailSentMessage = trans('user::' . $response);
            return;
        }

        $this->addError('email', trans('user::' . $response));
<<<<<<< HEAD
=======
            $this->emailSentMessage = trans('user::'.$response);
            return;
        }

        $this->addError('email', trans('user::'.$response));
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.email', 'pub_theme::livewire.auth.passwords.email');
=======
        app(ViewCopyAction::class)->execute('user::livewire.auth.passwords.email', 'pub_theme::livewire.auth.passwords.email');
>>>>>>> fbc8f8e (.)
=======
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.email', 'pub_theme::livewire.auth.passwords.email');
>>>>>>> 6d20fbe (.)
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.passwords.email';

        return view($view, [
<<<<<<< HEAD
<<<<<<< HEAD
            'layout' => 'pub_theme::layouts.auth',
=======
            'layout' => 'pub_theme::layouts.auth'
>>>>>>> fbc8f8e (.)
=======
            'layout' => 'pub_theme::layouts.auth',
>>>>>>> 6d20fbe (.)
        ]);
    }
}
