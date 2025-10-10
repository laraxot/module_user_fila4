<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Modules\Xot\Actions\File\ViewCopyAction;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class Email extends Component
{
    public string $email = '';

<<<<<<< HEAD
    public null|string $emailSentMessage = null;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public null|string $emailSentMessage = null;
=======
    public ?string $emailSentMessage = null;
>>>>>>> a12f125f4a (.)
=======
    public null|string $emailSentMessage = null;
>>>>>>> b93ef594b4 (.)
=======
    public ?string $emailSentMessage = null;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            $this->emailSentMessage = trans('user::' . $response);
            return;
        }

        $this->addError('email', trans('user::' . $response));
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
            $this->emailSentMessage = trans('user::'.$response);
            return;
        }

        $this->addError('email', trans('user::'.$response));
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            $this->emailSentMessage = trans('user::' . $response);
            return;
        }

        $this->addError('email', trans('user::' . $response));
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
            ->execute('user::livewire.auth.passwords.email', 'pub_theme::livewire.auth.passwords.email');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
=======
<<<<<<< HEAD
    public function render(): View|Factory
    {
<<<<<<< HEAD
<<<<<<< HEAD
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.email', 'pub_theme::livewire.auth.passwords.email');
=======
        app(ViewCopyAction::class)->execute('user::livewire.auth.passwords.email', 'pub_theme::livewire.auth.passwords.email');
>>>>>>> a12f125f4a (.)
=======
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.email', 'pub_theme::livewire.auth.passwords.email');
>>>>>>> b93ef594b4 (.)
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
=======
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::livewire.auth.passwords.email', 'pub_theme::livewire.auth.passwords.email');
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.passwords.email';

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
}
