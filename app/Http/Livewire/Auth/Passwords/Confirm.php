<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

<<<<<<< HEAD
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Modules\Xot\Actions\File\ViewCopyAction;
=======
<<<<<<< HEAD
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Modules\Xot\Actions\File\ViewCopyAction;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class Confirm extends Component
{
    public string $password = '';

    public function confirm(): RedirectResponse
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home'));
    }

<<<<<<< HEAD
    public function render(): View|Factory
    {
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.confirm', 'pub_theme::livewire.auth.passwords.confirm');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
=======
<<<<<<< HEAD
    public function render(): View|Factory
    {
<<<<<<< HEAD
<<<<<<< HEAD
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.confirm', 'pub_theme::livewire.auth.passwords.confirm');
=======
        app(ViewCopyAction::class)->execute('user::livewire.auth.passwords.confirm', 'pub_theme::livewire.auth.passwords.confirm');
>>>>>>> a12f125f4a (.)
=======
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.confirm', 'pub_theme::livewire.auth.passwords.confirm');
>>>>>>> b93ef594b4 (.)
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
=======
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::livewire.auth.passwords.confirm', 'pub_theme::livewire.auth.passwords.confirm');
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.passwords.confirm';

<<<<<<< HEAD
        return view($view)->extends('pub_theme::layouts.auth');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return view($view)->extends('pub_theme::layouts.auth');
=======
        return view($view)
            ->extends('pub_theme::layouts.auth');
>>>>>>> a12f125f4a (.)
=======
        return view($view)->extends('pub_theme::layouts.auth');
>>>>>>> b93ef594b4 (.)
=======
        return view($view)
            ->extends('pub_theme::layouts.auth');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
