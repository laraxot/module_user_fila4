<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Schemas\Components\Component;
use Override;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput as FormsTextInput;
use Illuminate\Support\Facades\Password;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * @property Schema $form
<<<<<<< HEAD
=======
=======
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> b93ef594b4 (.)
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput as FormsTextInput;
use Illuminate\Support\Facades\Password;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
<<<<<<< HEAD
 * @property \Filament\Schemas\Schema $form
>>>>>>> a12f125f4a (.)
=======
 * @property Schema $form
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
 */
class ForgotPasswordWidget extends XotBaseWidget
{
    protected string $view = 'user::widgets.auth.forgot-password-widget';
<<<<<<< HEAD
=======
=======
use Filament\Forms\Form;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Password;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Filament\Forms\Components\TextInput as FormsTextInput;

/**
 * @property ComponentContainer $form
 */
class ForgotPasswordWidget extends XotBaseWidget
{
    protected static string $view = 'user::widgets.auth.forgot-password-widget';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Get the form schema for this widget.
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
                ->maxLength(255),
        ];
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()
                ->schema([
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                ])
                ->columns(1),
        ])->statePath('data');
<<<<<<< HEAD
=======
=======
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
=======
    public function form(Form $form): Form
    {
        return $form
            ->schema([
>>>>>>> origin/develop
                Section::make()
                    ->schema([
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(1),
            ])
            ->statePath('data');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()
                ->schema([
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                ])
                ->columns(1),
        ])->statePath('data');
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function sendResetLink(): void
    {
        $data = $this->form->getState();

<<<<<<< HEAD
        $status = Password::sendResetLink(['email' => $data['email']]);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $status = Password::sendResetLink(['email' => $data['email']]);
=======
        $status = Password::sendResetLink(
            ['email' => $data['email']]
        );
>>>>>>> a12f125f4a (.)
=======
        $status = Password::sendResetLink(['email' => $data['email']]);
>>>>>>> b93ef594b4 (.)
=======
        $status = Password::sendResetLink(
            ['email' => $data['email']]
        );
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('status', __($status));
        } else {
            $this->addError('email', __($status));
        }
    }
}
