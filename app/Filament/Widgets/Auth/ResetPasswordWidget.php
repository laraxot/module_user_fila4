<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Filament\Schemas\Components\Component;
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> 634583fb55 (.)
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Illuminate\Http\RedirectResponse;
use Filament\Forms;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
<<<<<<< HEAD
=======
=======
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> b93ef594b4 (.)
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Support\Str;
>>>>>>> b93ef594b4 (.)
=======
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Password;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * Reset password widget for user password reset functionality.
 *
 * Handles password reset functionality with token validation,
 * proper security measures, and user feedback. Follows Laraxot
 * architectural patterns and security best practices.
 *
<<<<<<< HEAD
 * @property Schema $form Form container from XotBaseWidget
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property Schema $form Form container from XotBaseWidget
=======
 * @property \Filament\Schemas\Schema $form Form container from XotBaseWidget
>>>>>>> a12f125f4a (.)
=======
 * @property Schema $form Form container from XotBaseWidget
>>>>>>> b93ef594b4 (.)
=======
 * @property ComponentContainer $form Form container from XotBaseWidget
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 */
class ResetPasswordWidget extends XotBaseWidget
{
    /**
     * The view for this widget.
     *
     * @var view-string
     */
<<<<<<< HEAD
    protected string $view = 'user::widgets.auth.reset-password-widget';
=======
<<<<<<< HEAD
    protected string $view = 'user::widgets.auth.reset-password-widget';
=======
    protected static string $view = 'user::widgets.auth.reset-password-widget';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Get the form schema for password reset.
     *
     * Uses string keys for Filament form compatibility and follows
     * the pattern established in widget documentation.
     *
<<<<<<< HEAD
     * @return array<string, Component>
     */
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, Component>
     */
    #[Override]
=======
     * @return array<string, \Filament\Schemas\Components\Component>
     */
>>>>>>> a12f125f4a (.)
=======
     * @return array<string, Component>
     */
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, \Filament\Forms\Components\Component>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete('email'),
            'password' => TextInput::make('password')
                ->password()
                ->required()
                ->minLength(8)
                ->same('password_confirmation')
                ->autocomplete('new-password'),
            'password_confirmation' => TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->autocomplete('new-password'),
        ];
    }

    /**
     * Mount the widget and initialize the form.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Configure the form for this widget.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @param Schema $schema
     * @return Schema
     */
    #[Override]
    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->schema($this->getFormSchema())->columns(1),
        ])->statePath('data');
<<<<<<< HEAD
=======
=======
     * @param \Filament\Schemas\Schema $schema
     * @return \Filament\Schemas\Schema
=======
     * @param Schema $schema
     * @return Schema
>>>>>>> b93ef594b4 (.)
     */
    #[Override]
    public function form(Schema $schema): Schema
    {
<<<<<<< HEAD
        return $schema
            ->components([
=======
     * @param \Filament\Forms\Form $form
     * @return \Filament\Forms\Form
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
>>>>>>> origin/develop
                Section::make()
                    ->schema($this->getFormSchema())
                    ->columns(1),
            ])
            ->statePath('data');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        return $schema->components([
            Section::make()->schema($this->getFormSchema())->columns(1),
        ])->statePath('data');
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Handle password reset with proper security and error handling.
     *
     * Implements Laravel's password reset functionality with explicit
     * type casting for security and proper error feedback.
     *
<<<<<<< HEAD
     * @return RedirectResponse|void
=======
<<<<<<< HEAD
     * @return RedirectResponse|void
=======
     * @return \Illuminate\Http\RedirectResponse|void
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function resetPassword()
    {
        $data = $this->form->getState();

<<<<<<< HEAD
        $reset_data = Arr::only($data, ['email', 'password', 'password_confirmation', 'token']);
        $status = Password::reset($reset_data, function (Authenticatable $user, string $password): void {
            /** @var Model&Authenticatable $user */
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $reset_data = Arr::only($data, ['email', 'password', 'password_confirmation', 'token']);
        $status = Password::reset($reset_data, function (\Illuminate\Contracts\Auth\Authenticatable $user, string $password): void {
            /** @var \Illuminate\Database\Eloquent\Model&\Illuminate\Contracts\Auth\Authenticatable $user */
=======
        $reset_data = Arr::only($data, ['email', 'password', 'password_confirmation', 'token']);
<<<<<<< HEAD
        $status = Password::reset($reset_data, function (Authenticatable $user, string $password): void {
            /** @var Model&Authenticatable $user */
>>>>>>> b93ef594b4 (.)
=======
        $status = Password::reset($reset_data, function (\Illuminate\Contracts\Auth\Authenticatable $user, string $password): void {
            /** @var \Illuminate\Database\Eloquent\Model&\Illuminate\Contracts\Auth\Authenticatable $user */
>>>>>>> 634583fb55 (.)
>>>>>>> 81efa49 (.)
            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();
        });
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        $reset_data =Arr::only($data,['email','password','password_confirmation','token']);
        $status = Password::reset( $reset_data,
            function ($user, $password): void {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('status', __($status));
            return redirect()->route('login');
        } else {
            /** @phpstan-ignore-next-line */
            $this->addError('email', __($status));
        }
    }
}
