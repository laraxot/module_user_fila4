<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

<<<<<<< HEAD
use Livewire\Component;
use Filament\Schemas\Schema;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\XotData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Modules\Xot\Contracts\UserContract;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Contracts\HasSchemas;
use Modules\Xot\Actions\File\ViewCopyAction;
use Livewire\Features\SupportRedirects\Redirector;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Illuminate\Validation\Rules\Password as PasswordRule;
=======
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
>>>>>>> 4b219c8 (.)

/**
 * @property Schema $form
 */
<<<<<<< HEAD
class Register extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    /**
     * Data array for form state.
     *
     * @var array<string, mixed>
     */
    public array $data = [];

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Define the form schema.
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label(__('Name'))
                    ->placeholder(__('Enter your name'))
                    ->autofocus(),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->label(__('Email'))
                    ->placeholder(__('Enter your email'))
                    ->unique('users', 'email'),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->label(__('Password'))
                    ->placeholder(__('Enter your password'))
                    ->rules([PasswordRule::defaults()])
                    ->revealable(),
                TextInput::make('password_confirmation')
                    ->password()
                    ->required()
                    ->label(__('Confirm Password'))
                    ->placeholder(__('Confirm your password'))
                    ->same('password')
                    ->revealable(),
            ])
            ->statePath('data');
    }

    /**
     * Execute the action.
     */
    public function register(): RedirectResponse|Redirector
    {
        $data = $this->form->getState();
        $user_class = XotData::make()->getUserClass();

        Assert::string($data['password']);

        /** @var UserContract */
        $user = $user_class::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
=======
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $passwordConfirmation = '';

    /**
     * Execute the action.
     *
     * @return RedirectResponse|Redirector
     */
    public function register(): RedirectResponse|Redirector
    {
        $messages = __('user::validation');
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:user.users'],
            'password' => ['required', 'same:passwordConfirmation', PasswordRule::defaults()],
        ], $messages);
        $user_class = XotData::make()->getUserClass();

        /** @var UserContract */
        $user = $user_class::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
>>>>>>> 4b219c8 (.)
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
<<<<<<< HEAD
=======
     *
     * @return mixed
>>>>>>> 4b219c8 (.)
     */
    public function render(): mixed
    {
        // Copy the view templates to the pub_theme location
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.register', 'pub_theme::livewire.auth.register');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.register';

        // Return view with layout - Livewire specific implementation
        return view($view)->extends('pub_theme::layouts.auth');
    }
}
