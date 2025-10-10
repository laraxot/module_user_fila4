<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\User\Filament\Actions\Header;

use Filament\Actions\Action;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
=======
=======
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\UserContract;
=======
>>>>>>> b93ef594b4 (.)
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\UserContract;
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\UserContract;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rules\Password;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class ChangePasswordHeaderAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->icon('heroicon-o-key')
            ->action(function (UserContract $record, array $data): void {
                $old_password = $record->getAttribute('password');
<<<<<<< HEAD
                $res = tap($record)->update([
                    'password' => Hash::make($data['new_password']),
                ]);

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                $res = tap($record)->update([
=======
                $res=tap($record)->update([
>>>>>>> a12f125f4a (.)
=======
                $res = tap($record)->update([
>>>>>>> b93ef594b4 (.)
                    'password' => Hash::make($data['new_password']),
                ]);

=======
                $res=tap($record)->update([
                    'password' => Hash::make($data['new_password']),
                ]);
                
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                Notification::make()
                    ->success()
                    ->title(__('user::notifications.password_changed_successfully.title'))
                    ->body(__('user::notifications.password_changed_successfully.message'));
            })
<<<<<<< HEAD
            ->schema([
                /*
=======
<<<<<<< HEAD
            ->schema([
                /*
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                 * TextInput::make('new_password')
                 * ->password()
                 *
                 * ->placeholder(__('user::fields.new_password.placeholder'))
                 * ->required()
                 * ->rule(Password::default()),
                 */
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                PasswordData::make()->getPasswordFormComponent('new_password'),
                TextInput::make('new_password_confirmation')
                    ->password()
                    ->placeholder(__('user::fields.confirm_password.placeholder'))
                    ->rule('required', static fn($get): bool => (bool) $get('new_password'))
<<<<<<< HEAD
=======
=======
=======
            ->form([
                /*
>>>>>>> origin/develop
                    TextInput::make('new_password')
                        ->password()

                        ->placeholder(__('user::fields.new_password.placeholder'))
                        ->required()
                        ->rule(Password::default()),
                    */
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
                PasswordData::make()->getPasswordFormComponent('new_password'),
                TextInput::make('new_password_confirmation')
                    ->password()
                    ->placeholder(__('user::fields.confirm_password.placeholder'))
<<<<<<< HEAD
                    ->rule('required', static fn ($get): bool => (bool) $get('new_password'))
>>>>>>> a12f125f4a (.)
=======
                    ->rule('required', static fn($get): bool => (bool) $get('new_password'))
>>>>>>> b93ef594b4 (.)
=======
                PasswordData::make()->getPasswordFormComponent('new_password'),
                TextInput::make('new_password_confirmation')
                    ->password()

                    ->placeholder(__('user::fields.confirm_password.placeholder'))
                    ->rule('required', static fn ($get): bool => (bool) $get('new_password'))
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                    ->same('new_password'),
            ]);
    }

<<<<<<< HEAD
    public static function getDefaultName(): null|string
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public static function getDefaultName(): null|string
=======
    public static function getDefaultName(): ?string
>>>>>>> a12f125f4a (.)
=======
    public static function getDefaultName(): null|string
>>>>>>> b93ef594b4 (.)
=======
    public static function getDefaultName(): ?string
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return 'changePassword';
    }
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
 * Action::make('changePassword')
 * ->action(function (UserContract $user, array $data): void {
 * $user->update([
 * 'password' => Hash::make($data['new_password']),
 * ]);
 * Notification::make()->success()->title('Password changed successfully.');
 * })
 * ->form([
 * TextInput::make('new_password')
 * ->password()
 * ->required()
 * ->rule(Password::default()),
 * TextInput::make('new_password_confirmation')
 * ->password()
 * ->rule('required', fn ($get): bool => (bool) $get('new_password'))
 * ->same('new_password'),
 * ])
 * ->icon('heroicon-o-key')
 * // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
 */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
Action::make('changePassword')
                    ->action(function (UserContract $user, array $data): void {
                        $user->update([
                            'password' => Hash::make($data['new_password']),
                        ]);
                        Notification::make()->success()->title('Password changed successfully.');
                    })
                    ->form([
                        TextInput::make('new_password')
                            ->password()
                            ->required()
                            ->rule(Password::default()),
                        TextInput::make('new_password_confirmation')
                            ->password()
                            ->rule('required', fn ($get): bool => (bool) $get('new_password'))
                            ->same('new_password'),
                    ])
                    ->icon('heroicon-o-key')
                // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
*/
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
