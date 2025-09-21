<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Override;
use Illuminate\Database\Eloquent\Model;
use Filament\Schemas\Components\Component;
use Modules\User\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Form as FilamentForm;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Widgets\Widget;
use Illuminate\Auth\Events\PasswordReset as PasswordResetResponseEvent;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\User\Http\Response\PasswordResetResponse;
use Modules\User\Rules\CheckOtpExpiredRule;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
=======
=======
=======
use Override;
>>>>>>> b93ef594b4 (.)
use Illuminate\Database\Eloquent\Model;
use Filament\Schemas\Components\Component;
use Modules\User\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Form as FilamentForm;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Widgets\Widget;
use Illuminate\Auth\Events\PasswordReset as PasswordResetResponseEvent;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Password as PasswordRule;
<<<<<<< HEAD
use Illuminate\Auth\Events\PasswordReset as PasswordResetResponseEvent; 

>>>>>>> a12f125f4a (.)
=======
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\User\Http\Response\PasswordResetResponse;
use Modules\User\Rules\CheckOtpExpiredRule;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

/**
 * Widget for handling expired password reset.
 *
 * @property \Filament\Schemas\Schema $form
<<<<<<< HEAD
=======
=======
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Filament\Actions\Action;
use Filament\Widgets\Widget;
use Webmozart\Assert\Assert;
use Filament\Facades\Filament;
use Filament\Actions\ActionGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Schema;
use Modules\User\Events\NewPasswordSet;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form as FilamentForm;
use Filament\Notifications\Notification;
use Modules\User\Rules\CheckOtpExpiredRule;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Forms\Concerns\InteractsWithForms;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Modules\User\Http\Response\PasswordResetResponse;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Auth\Events\PasswordReset as PasswordResetResponseEvent; 


/**
 * Widget for handling expired password reset.
 * 
 * @property ComponentContainer $form
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property string|null $current_password
 * @property string|null $password
 * @property string|null $passwordConfirmation
 * @property array<string, mixed>|null $data
 */
class PasswordExpiredWidget extends XotBaseWidget implements HasForms
{
    use InteractsWithForms;
    use TransTrait;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public null|string $current_password = '';
    public null|string $password = '';
    public null|string $passwordConfirmation = '';

    /** @var array<string, mixed>|null */
    public null|array $data = [];
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    public ?string $current_password = '';
    public ?string $password = '';
    public ?string $passwordConfirmation = '';

    /** @var array<string, mixed>|null */
    public ?array $data = [];
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    public null|string $current_password = '';
    public null|string $password = '';
    public null|string $passwordConfirmation = '';

    /** @var array<string, mixed>|null */
    public null|array $data = [];
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * @var view-string
     */
<<<<<<< HEAD
    protected string $view = 'user::filament.widgets.password-expired';
=======
<<<<<<< HEAD
    protected string $view = 'user::filament.widgets.password-expired';
=======
    protected static string $view = 'user::filament.widgets.password-expired';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    protected static bool $shouldRegisterNavigation = false;

    /**
     * Get the form schema for password reset.
     *
<<<<<<< HEAD
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return array<int, \Filament\Schemas\Components\Component>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return array<int, Component>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getFormSchema(): array
    {
        return [
            $this->getCurrentPasswordFormComponent(),
            ...PasswordData::make()->getPasswordFormComponents('password'),
        ];
    }

    /**
     * Get the reset password form action.
     *
     * @return Action
     */
    public function getResetPasswordFormAction(): Action
    {
<<<<<<< HEAD
        return Action::make('resetPassword')->submit('resetPassword');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return Action::make('resetPassword')->submit('resetPassword');
=======
        return Action::make('resetPassword')
            ->submit('resetPassword');
>>>>>>> a12f125f4a (.)
=======
        return Action::make('resetPassword')->submit('resetPassword');
>>>>>>> b93ef594b4 (.)
=======
        return Action::make('resetPassword')
            ->submit('resetPassword');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Check if the widget should display a logo.
     *
     * @return bool
     */
    public function hasLogo(): bool
    {
        return false;
    }

    /**
     * Reset the user's password.
     *
     * @return PasswordResetResponse|null
     */
<<<<<<< HEAD
    public function resetPassword(): null|PasswordResetResponse
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function resetPassword(): null|PasswordResetResponse
=======
    public function resetPassword(): ?PasswordResetResponse
>>>>>>> a12f125f4a (.)
=======
    public function resetPassword(): null|PasswordResetResponse
>>>>>>> b93ef594b4 (.)
=======
    public function resetPassword(): ?PasswordResetResponse
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $this->validate();

        $user = Auth::user();
<<<<<<< HEAD
        if (!$user || !($user instanceof Model)) {
=======
<<<<<<< HEAD
        if (!$user || !($user instanceof Model)) {
=======
        if (!$user || !($user instanceof \Illuminate\Database\Eloquent\Model)) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            $this->addError('current_password', __('user::auth.user_not_found'));
            return null;
        }

        // Cast e verifica esistenza dei dati del form
        $data = $this->data ?? [];
        $currentPassword = SafeStringCastAction::cast($data['current_password'] ?? '');
        $newPassword = SafeStringCastAction::cast($data['password'] ?? '');
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        if (empty($currentPassword) || empty($newPassword)) {
            $this->addError('current_password', __('user::auth.password_fields_required'));
            return null;
        }

        $userPassword = SafeStringCastAction::cast($user->getAttribute('password'));
        // Cast esplicito di mixed a string per PHPStan
        $userPasswordString = $userPassword;
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        if (!Hash::check($currentPassword, $userPasswordString)) {
            $this->addError('current_password', __('user::auth.password_current_incorrect'));
            return null;
        }

        $user->setAttribute('password', Hash::make($newPassword));
        $user->save();

        return new PasswordResetResponse();
    }

    /**
     * Get the current password form component.
     *
<<<<<<< HEAD
     * @return \Filament\Schemas\Components\Component
=======
<<<<<<< HEAD
     * @return \Filament\Schemas\Components\Component
=======
     * @return Component
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    protected function getCurrentPasswordFormComponent(): Component
    {
        $authUser = Filament::auth()->user();

<<<<<<< HEAD
        if ($authUser instanceof User) {
=======
<<<<<<< HEAD
        if ($authUser instanceof User) {
=======
        if ($authUser instanceof \Modules\User\Models\User) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            return TextInput::make('current_password')
                ->password()
                ->revealable()
                ->required()
                ->rule(new CheckOtpExpiredRule($authUser))
                ->validationAttribute(static::trans('fields.current_password.validation_attribute'));
        }

        // Fallback nel caso l'utente non sia del tipo corretto
        return TextInput::make('current_password')
            ->password()
            ->revealable()
            ->required()
            ->validationAttribute(static::trans('fields.current_password.validation_attribute'));
    }

    /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
     * protected function getPasswordFormComponent(): Component
     * {
     * $validation_messages = __('user::validation');
     *
     * return TextInput::make('password')
     * ->password()
     * // ->revealable(filament()->arePasswordsRevealable())
     * ->revealable()
     * ->required()
     * ->rule(PasswordRule::default())
     * ->same('passwordConfirmation')
     * ->validationMessages($validation_messages)
     * ->validationAttribute(static::trans('fields.password.validation_attribute'));
     * }
     *
     * protected function getPasswordConfirmationFormComponent(): Component
     * {
     * return TextInput::make('passwordConfirmation')
     * ->password()
     * // ->revealable(filament()->arePasswordsRevealable())
     * ->revealable()
     * ->required()
     * ->dehydrated(false);
     * }
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
    protected function getPasswordFormComponent(): Component
    {
        $validation_messages = __('user::validation');

        return TextInput::make('password')
            ->password()
            // ->revealable(filament()->arePasswordsRevealable())
            ->revealable()
            ->required()
            ->rule(PasswordRule::default())
            ->same('passwordConfirmation')
            ->validationMessages($validation_messages)
            ->validationAttribute(static::trans('fields.password.validation_attribute'));
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return TextInput::make('passwordConfirmation')
            ->password()
            // ->revealable(filament()->arePasswordsRevealable())
            ->revealable()
            ->required()
            ->dehydrated(false);
    }
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Get the form actions.
     *
     * @return array<int, Action|ActionGroup>
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    protected function getFormActions(): array
    {
        return [
            $this->getResetPasswordFormAction(),
        ];
    }
}
