<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

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
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Webmozart\Assert\Assert;

class Verify extends Component
{
    public function resend(): void
    {
<<<<<<< HEAD
        Assert::notNull($user = Auth::user(), '[' . __LINE__ . '][' . class_basename($this) . ']');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::notNull($user = Auth::user(), '[' . __LINE__ . '][' . class_basename($this) . ']');
=======
        Assert::notNull($user = Auth::user(), '['.__LINE__.']['.class_basename($this).']');
>>>>>>> a12f125f4a (.)
=======
        Assert::notNull($user = Auth::user(), '[' . __LINE__ . '][' . class_basename($this) . ']');
>>>>>>> b93ef594b4 (.)
=======
        Assert::notNull($user = Auth::user(), '['.__LINE__.']['.class_basename($this).']');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        if ($user->hasVerifiedEmail()) {
            redirect(route('home'));
        }

        $user->sendEmailVerificationNotification();

        $this->dispatch('resent');

        session()->flash('resent');
    }

<<<<<<< HEAD
    public function render(): View|Factory
    {
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.verify', 'pub_theme::livewire.auth.verify');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
=======
<<<<<<< HEAD
    public function render(): View|Factory
    {
<<<<<<< HEAD
<<<<<<< HEAD
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.verify', 'pub_theme::livewire.auth.verify');
=======
        app(ViewCopyAction::class)->execute('user::livewire.auth.verify', 'pub_theme::livewire.auth.verify');
>>>>>>> a12f125f4a (.)
=======
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.verify', 'pub_theme::livewire.auth.verify');
>>>>>>> b93ef594b4 (.)
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
=======
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::livewire.auth.verify', 'pub_theme::livewire.auth.verify');
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.verify';

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
