<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Auth;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Filament\Schemas\Components\Component;
=======
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
>>>>>>> 220cf97b (.)
=======
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
>>>>>>> laraxot/develop
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema as DatabaseSchema;
<<<<<<< HEAD
<<<<<<< HEAD
use InvalidArgumentException;
=======
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\User\Http\Response\PasswordResetResponse;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\Xot\Filament\Pages\XotBasePage;
>>>>>>> 220cf97b (.)
=======
use Modules\Xot\Filament\Pages\XotBasePage;
>>>>>>> laraxot/develop
use Modules\Xot\Filament\Traits\NavigationPageLabelTrait;
use Webmozart\Assert\Assert;

/**
 * @property \Filament\Schemas\Schema $form
 * @property \Filament\Schemas\Schema $editProfileForm
 * @property \Filament\Schemas\Schema $editPasswordForm
 */
class PasswordExpired extends XotBasePage
{
    use InteractsWithFormActions;
<<<<<<< HEAD
<<<<<<< HEAD
    use InteractsWithForms;
    use NavigationPageLabelTrait;

    public ?string $current_password = '';

    public ?string $password = '';

    public ?string $passwordConfirmation = '';
=======
    use NavigationPageLabelTrait;
>>>>>>> 220cf97b (.)

=======
    use NavigationPageLabelTrait;

>>>>>>> laraxot/develop
    /**
     * @var view-string
     */
    protected string $view = 'user::filament.auth.pages.password-expired';

    protected static bool $shouldRegisterNavigation = false;

<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @return array<int, TextInput>
     */
>>>>>>> 220cf97b (.)
=======
    /**
     * @return array<int, TextInput>
     */
>>>>>>> laraxot/develop
    public function getFormSchema(): array
    {
        return array_values(array_merge(
            $this->getCurrentPasswordFormComponent(),
            PasswordData::make()->getPasswordFormComponents('password'),
        ));
    }

    public function getResetPasswordFormAction(): Action
    {
        return Action::make('resetPassword')->submit('resetPassword');
    }

    public function hasLogo(): bool
    {
        return false;
    }

    public function resetPassword(): ?PasswordResetResponse
    {
        $pwd = PasswordData::make();
        $data = $this->form->getState();
        Assert::string($currentPassword = Arr::get($data, 'current_password'));
        Assert::string($password = Arr::get($data, 'password'));
        $user = Auth::user();
        if (null === $user) {
            return null;
        }

        // check if current password is correct
<<<<<<< HEAD
<<<<<<< HEAD
        if ($user->password === null || ! Hash::check($current_password, $user->password)) {
=======
        if (null === $user->password || ! Hash::check($currentPassword, $user->password)) {
>>>>>>> 220cf97b (.)
=======
        if (null === $user->password || ! Hash::check($currentPassword, $user->password)) {
>>>>>>> laraxot/develop
            Notification::make()
                ->title(__('user::otp.notifications.wrong_password.title'))
                ->body(__('user::otp.notifications.wrong_password.body'))
                ->danger()
                ->send();

            return null;
        }

        // check if new password is different from the current password
        if (null !== $user->password && Hash::check($password, $user->password)) {
            Notification::make()
                ->title(__('user::otp.notifications.same_password.title'))
                ->body(__('user::otp.notifications.same_password.body'))
                ->danger()
                ->send();

            return null;
        }

        // check if both required columns exist in the database
        if (! DatabaseSchema::hasColumn('users', 'password_expires_at')) {
            Notification::make()
                ->title(__('user::otp.notifications.column_not_found.title'))
                ->body(__('user::otp.notifications.column_not_found.body', [
                    'column_name' => 'password_expires_at',
                    'password_column_name' => 'password',
                    'table_name' => 'users',
                ]))
                ->danger()
                ->send();

            return null;
        }

        // get password expiry date and time
        $passwordExpiryDateTime = now()->addDays($pwd->expires_in);

        // Verificare che l'utente esistante e che sia un modello Eloquent
        if (! ($user instanceof Model)) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new InvalidArgumentException('L\'utente deve essere un modello Eloquent con il metodo update');
=======
            throw new \InvalidArgumentException('L\'utente deve essere un modello Eloquent con il metodo update');
>>>>>>> 220cf97b (.)
=======
            throw new \InvalidArgumentException('L\'utente deve essere un modello Eloquent con il metodo update');
>>>>>>> laraxot/develop
        }

        // set password expiry date and time
        $user->update([
            'password_expires_at' => $passwordExpiryDateTime,
            'is_otp' => false,
            'password' => Hash::make($password),
        ]);

        // Verificare che l'utente implementi l'interfaccia UserContract prima di passarlo all'evento
        if (! ($user instanceof UserContract)) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
=======
            throw new \InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
>>>>>>> 220cf97b (.)
=======
            throw new \InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
>>>>>>> laraxot/develop
        }

        event(new NewPasswordSet($user));

        Notification::make()
            ->title(__('user::otp.notifications.password_reset.success'))
            ->success()
            ->send();

<<<<<<< HEAD
        return new PasswordResetResponse;
=======
        return new PasswordResetResponse();
>>>>>>> laraxot/develop
    }

    /**
     * @return array<int, TextInput>
     */
    protected function getCurrentPasswordFormComponent(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return TextInput::make('current_password')
            ->password()
            ->revealable()
            ->required()
            ->validationAttribute(static::trans('fields.current_password.validation_attribute'));
=======
=======
>>>>>>> laraxot/develop
        return [
            TextInput::make('current_password')
                ->password()
                ->revealable()
                ->required()
                ->validationAttribute(static::trans('fields.current_password.validation_attribute')),
        ];
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop
    }

    /**
     * @return array<Action|ActionGroup>
     */
    protected function getFormActions(): array
    {
        return [
            $this->getResetPasswordFormAction(),
        ];
    }
}
