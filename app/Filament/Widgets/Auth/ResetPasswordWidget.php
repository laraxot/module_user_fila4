<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Form;
use Filament\Forms\Form;
=======
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 041533e (.)
use Filament\Schemas\Components\Component;
use Override;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Illuminate\Http\RedirectResponse;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
>>>>>>> a63f578 (.)
=======
>>>>>>> 041533e (.)
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * Reset password widget for user password reset functionality.
 *
 * Handles password reset functionality with token validation,
 * proper security measures, and user feedback. Follows Laraxot
 * architectural patterns and security best practices.
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @property Form $form Form container from XotBaseWidget
=======
 * @property Schema $form Form container from XotBaseWidget
>>>>>>> a63f578 (.)
=======
 * @property Schema $form Form container from XotBaseWidget
>>>>>>> 041533e (.)
 */
class ResetPasswordWidget extends XotBaseWidget
{
    /**
     * The view for this widget.
     *
     * @var view-string
     */
    protected string $view = 'user::widgets.auth.reset-password-widget';

    /**
     * Get the form schema for password reset.
     *
     * Uses string keys for Filament form compatibility and follows
     * the pattern established in widget documentation.
     *
     * @return array<string, Component>
     */
    #[Override]
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> a63f578 (.)
=======
     *
     * @return void
>>>>>>> 041533e (.)
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Configure the form for this widget.
<<<<<<< HEAD
<<<<<<< HEAD
     */
    #[Override]
    public function form(Form $form): Form
    {
        return $form->schema([
=======
=======
>>>>>>> 041533e (.)
     *
     * @param Schema $schema
     * @return Schema
     */
    #[Override]
    public function form(Schema $schema): Schema
    {
        return $schema->components([
<<<<<<< HEAD
>>>>>>> a63f578 (.)
=======
>>>>>>> 041533e (.)
            Section::make()->schema($this->getFormSchema())->columns(1),
        ])->statePath('data');
    }

    /**
     * Handle password reset with proper security and error handling.
     *
     * Implements Laravel's password reset functionality with explicit
     * type casting for security and proper error feedback.
     *
     * @return RedirectResponse|void
     */
    public function resetPassword()
    {
        $data = $this->form->getState();

        $reset_data = Arr::only($data, ['email', 'password', 'password_confirmation', 'token']);
<<<<<<< HEAD
<<<<<<< HEAD
        $status = Password::reset($reset_data, function (Authenticatable $user, string $password): void {
            /** @var Model&Authenticatable $user */
=======
        $status = Password::reset($reset_data, function (\Illuminate\Contracts\Auth\Authenticatable $user, string $password): void {
            /** @var \Illuminate\Database\Eloquent\Model&\Illuminate\Contracts\Auth\Authenticatable $user */
>>>>>>> a63f578 (.)
=======
        $status = Password::reset($reset_data, function (Authenticatable $user, string $password): void {
            /** @var Model&Authenticatable $user */
>>>>>>> 041533e (.)
            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();
        });

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('status', __($status));
            return redirect()->route('login');
        } else {
            /** @phpstan-ignore-next-line */
            $this->addError('email', __($status));
        }
    }
}
