<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Schemas\Schema;
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Actions\File\ViewCopyAction;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Component;
use Modules\Xot\Datas\XotData;

/**
 * @property Schema $form
<<<<<<< HEAD
=======
=======
=======
use Filament\Schemas\Schema;
>>>>>>> b93ef594b4 (.)
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Actions\File\ViewCopyAction;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Component;
use Modules\Xot\Datas\XotData;

/**
<<<<<<< HEAD
 * @property \Filament\Schemas\Schema $form
>>>>>>> a12f125f4a (.)
=======
 * @property Schema $form
>>>>>>> b93ef594b4 (.)
=======
use Livewire\Component;
use Modules\Xot\Datas\XotData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Filament\Forms\ComponentContainer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password as PasswordRule;

/**
 * @property ComponentContainer $form
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 */
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $passwordConfirmation = '';

    /**
     * Execute the action.
     *
<<<<<<< HEAD
     * @return RedirectResponse|Redirector
     */
    public function register(): RedirectResponse|Redirector
=======
<<<<<<< HEAD
     * @return RedirectResponse|Redirector
     */
    public function register(): RedirectResponse|Redirector
=======
     * @return RedirectResponse|\Livewire\Features\SupportRedirects\Redirector
     */
    public function register(): RedirectResponse|\Livewire\Features\SupportRedirects\Redirector
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $messages = __('user::validation');
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:user.users'],
            'password' => ['required', 'same:passwordConfirmation', PasswordRule::defaults()],
        ], $messages);
        $user_class = XotData::make()->getUserClass();

<<<<<<< HEAD
        /** @var UserContract */
=======
<<<<<<< HEAD
        /** @var UserContract */
=======
        /** @var \Modules\Xot\Contracts\UserContract */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $user = $user_class::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    /**
     * Render the component.
     *
     * In Livewire components, the render method ultimately returns a view,
     * but it's processed through Livewire's component system.
     *
     * @return mixed
     */
    public function render(): mixed
    {
        // Copy the view templates to the pub_theme location
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.register', 'pub_theme::livewire.auth.register');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

<<<<<<< HEAD
=======
=======
        app(ViewCopyAction::class)->execute('user::livewire.auth.register', 'pub_theme::livewire.auth.register');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
        
>>>>>>> a12f125f4a (.)
=======
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.register', 'pub_theme::livewire.auth.register');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

>>>>>>> b93ef594b4 (.)
=======
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::livewire.auth.register', 'pub_theme::livewire.auth.register');
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(\Modules\Xot\Actions\File\ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.register';

        // Return view with layout - Livewire specific implementation
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
