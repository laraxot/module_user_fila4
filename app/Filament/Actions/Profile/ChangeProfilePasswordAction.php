<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\User\Filament\Actions\Profile;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

/**
 * ---.
 */
class ChangeProfilePasswordAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->icon('heroicon-o-key')
            ->action(static function (ProfileContract $record, array $data): void {
                // Retrieve related user model (not the relation object)
                /** @var \Illuminate\Database\Eloquent\Model|null $user */
                $user = $record->user;
                /** @var array<string, mixed> $profile_data */
                $profile_data = Arr::except($record->toArray(), ['id']);

                if (! $user instanceof \Illuminate\Database\Eloquent\Model) {
                    $userClass = XotData::make()->getUserClass();
                    $email = $record->email ?? '';
                    $existing = XotData::make()->getUserByEmail($email);
                    if (! $existing instanceof \Illuminate\Database\Eloquent\Model) {
                        // Create a new user model and associate it to the profile via belongsTo
                        /** @var class-string<\Illuminate\Database\Eloquent\Model> $userClass */
                        $user = $userClass::query()->create($profile_data);
                    } else {
                        $user = $existing;
                    }

                    // Associate and persist the relation (belongsTo)
                    if ($user instanceof \Illuminate\Database\Eloquent\Model && $user instanceof \Modules\Xot\Contracts\UserContract) {
                        $record->user()->associate($user);
                    }
                    $record->save();
                } else {
                    // User already exists, we can proceed with password update
                }

                $newPassword = $data['new_password'] ?? null;
                if (is_string($newPassword) && $newPassword !== '') {
                    $user->update([
                        'password' => Hash::make($newPassword),
                    ]);
                    Notification::make()->success()->title('Password changed successfully.');
                }
            })
            ->schema([
                /*
                 * TextInput::make('new_password')
                 * ->password()
                 * ->required()
                 * ->rule(Password::default()),
                 */
                PasswordData::make()->getPasswordFormComponent('new_password'),
                TextInput::make('new_password_confirmation')
                    ->password()
                    ->rule('required', static function (callable $get): bool {
                        return (bool) $get('new_password');
                    })
                    ->same('new_password'),
            ]);
    }

    public static function getDefaultName(): ?string
    {
        return 'changePassword';
    }
}

/*
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
