<?php

declare(strict_types=1);

/**
 * @see Jeffgreco13\FilamentBreezy\Pages
 * @see https://www.filamentcomponents.com/blog/how-to-create-a-custom-profile-page-with-filamentphp
 */

namespace Modules\User\Filament\Pages;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Exception;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
<<<<<<< HEAD
=======
=======
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Notifications\Notification;
use Filament\Pages\Auth\EditProfile;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Modules\User\Datas\PasswordData;

/**
<<<<<<< HEAD
 * @property \Filament\Schemas\Schema $form
 * @property \Filament\Schemas\Schema $editProfileForm
 * @property \Filament\Schemas\Schema $editPasswordForm
=======
<<<<<<< HEAD
 * @property \Filament\Schemas\Schema $form
 * @property \Filament\Schemas\Schema $editProfileForm
 * @property \Filament\Schemas\Schema $editPasswordForm
=======
 * @property ComponentContainer $form
 * @property ComponentContainer $editProfileForm
 * @property ComponentContainer $editPasswordForm
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 */
class MyProfilePage extends Page implements HasForms
{
    // class MyProfilePage extends EditProfile
    use InteractsWithForms;

<<<<<<< HEAD
    public null|array $profileData = [];

    public null|array $passwordData = [];
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public null|array $profileData = [];

    public null|array $passwordData = [];
=======
    public ?array $profileData = [];

    public ?array $passwordData = [];
>>>>>>> a12f125f4a (.)
=======
    public null|array $profileData = [];

    public null|array $passwordData = [];
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'user::filament.pages.my-profile';
<<<<<<< HEAD
=======
=======
    public ?array $profileData = [];

    public ?array $passwordData = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'user::filament.pages.my-profile';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    protected static bool $shouldRegisterNavigation = false;

    // public static function getSlug(): string
    // {
    //     return filament('filament-breezy')->slug();
    // }

    public static function getNavigationLabel(): string
    {
        return __('user::profile.profile');
    }

    public function mount(): void
    {
        $this->fillForms();
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public function editProfileForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile Information')
                    ->aside()
                    ->description('Update your account\'s profile information and email address.')
                    ->schema([
<<<<<<< HEAD
                        TextInput::make('name')->required(),
                        TextInput::make('email')
=======
<<<<<<< HEAD
<<<<<<< HEAD
                        TextInput::make('name')->required(),
=======
                        TextInput::make('name')
                            ->required(),
>>>>>>> a12f125f4a (.)
=======
                        TextInput::make('name')->required(),
>>>>>>> b93ef594b4 (.)
                        TextInput::make('email')
=======
    public function editProfileForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Profile Information')
                    ->aside()
                    ->description('Update your account\'s profile information and email address.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('email')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),
            ])
            ->model($this->getUser())
            ->statePath('profileData');
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public function editPasswordForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Update Password')
                    ->aside()
                    ->description('Ensure your account is using long, random password to stay secure.')
                    ->schema([
                        TextInput::make('Current password')
                            ->password()
                            ->required()
                            ->currentPassword(),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                        PasswordData::make()
                            ->getPasswordFormComponent('new_password')
                            ->dehydrateStateUsing(fn (string $value): string => Hash::make($value))
                            ->live(debounce: 500),
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                        // ->same('passwordConfirmation')
                        /*
                         * Forms\Components\TextInput::make('password')
                         * ->password()
                         * ->required()
                         * ->rule(Password::default())
                         * ->autocomplete('new-password')
                         * ->dehydrateStateUsing(fn ($state): string => Hash::make($state))
                         * ->live(debounce: 500)
                         * ->same('passwordConfirmation'),
                         */
<<<<<<< HEAD
                        TextInput::make('passwordConfirmation')
=======
=======
                        PasswordData::make()->getPasswordFormComponent('new_password')
                            ->dehydrateStateUsing(fn ($state): string => Hash::make($state))
                            ->live(debounce: 500)
=======
>>>>>>> b93ef594b4 (.)
                        // ->same('passwordConfirmation')
                        /*
<<<<<<< HEAD
=======
    public function editPasswordForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Update Password')
                    ->aside()
                    ->description('Ensure your account is using long, random password to stay secure.')
                    ->schema([
                        Forms\Components\TextInput::make('Current password')
                            ->password()
                            ->required()
                            ->currentPassword(),
                        PasswordData::make()->getPasswordFormComponent('new_password')
                            ->dehydrateStateUsing(fn ($state): string => Hash::make($state))
                            ->live(debounce: 500)
                        // ->same('passwordConfirmation')
                        ,
                        /*
>>>>>>> origin/develop
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required()
                            ->rule(Password::default())
                            ->autocomplete('new-password')
                            ->dehydrateStateUsing(fn ($state): string => Hash::make($state))
                            ->live(debounce: 500)
                            ->same('passwordConfirmation'),
                        */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
                         * Forms\Components\TextInput::make('password')
                         * ->password()
                         * ->required()
                         * ->rule(Password::default())
                         * ->autocomplete('new-password')
                         * ->dehydrateStateUsing(fn ($state): string => Hash::make($state))
                         * ->live(debounce: 500)
                         * ->same('passwordConfirmation'),
                         */
>>>>>>> b93ef594b4 (.)
                        TextInput::make('passwordConfirmation')
=======
                        Forms\Components\TextInput::make('passwordConfirmation')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                            ->password()
                            ->required()
                            ->dehydrated(false)
                            ->same('new_password'),
                    ]),
            ])
            ->model($this->getUser())
            ->statePath('passwordData');
    }

    public function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        if (!($user instanceof Model)) {
            throw new Exception(
                'The authenticated user object must be an Eloquent model to allow the profile page to update it.',
            );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        if (! $user instanceof Model) {
            throw new Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        if (! $user instanceof Model) {
            throw new \Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        return $user;
    }

    public function getTitle(): string
    {
        return __('user::profile.my_profile');
    }

    public function getHeading(): string
    {
        return __('user::profile.my_profile');
    }

<<<<<<< HEAD
    public function getSubheading(): null|string
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getSubheading(): null|string
=======
    public function getSubheading(): ?string
>>>>>>> a12f125f4a (.)
=======
    public function getSubheading(): null|string
>>>>>>> b93ef594b4 (.)
=======
    public function getSubheading(): ?string
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return __('user::profile.subheading') ?? null;
    }

    // public static function shouldRegisterNavigation(): bool
    // {
    //     return filament('filament-breezy')->shouldRegisterNavigation('myProfile');
    // }

    // public static function getNavigationGroup(): ?string
    // {
    //     return filament('filament-breezy')->getNavigationGroup('myProfile');
    // }

    // public function getRegisteredMyProfileComponents(): array
    // {
    //     return filament('filament-breezy')->getRegisteredMyProfileComponents();
    // }
    public function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            TextInput::make('name')->autofocus()->required(),
            TextInput::make('email')->required(),
        ];

<<<<<<< HEAD
=======
=======
            TextInput::make('name')
                ->autofocus()
                ->required(),
            TextInput::make('email')
                ->required(),
        ];
>>>>>>> a12f125f4a (.)
=======
            TextInput::make('name')->autofocus()->required(),
            TextInput::make('email')->required(),
        ];

>>>>>>> b93ef594b4 (.)
=======
            Forms\Components\TextInput::make('name')
                ->autofocus()
                ->required(),
            Forms\Components\TextInput::make('email')
                ->required(),
        ];
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Nota: i seguenti commenti sono stati rimossi perché non sono applicabili al metodo getFormSchema()
        // ->statePath('data')
        // ->model(auth()->user());
    }

    public function updateProfile(): void
    {
        try {
            $data = $this->editProfileForm->getState();

            $this->handleRecordUpdate($this->getUser(), $data);
        } catch (Halt $exception) {
            return;
        }

        $this->sendSuccessNotification();
    }

    public function updatePassword(): void
    {
        try {
            $data = $this->editPasswordForm->getState();

            $this->handleRecordUpdate($this->getUser(), $data);
        } catch (Halt $exception) {
            return;
        }

        if (request()->hasSession() && array_key_exists('password', $data)) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
            request()
                ->session()
                ->put([
                    'password_hash_' . Filament::getAuthGuard() => $data['password'],
                ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
            request()->session()->put([
                'password_hash_'.Filament::getAuthGuard() => $data['password'],
            
            ]);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        $this->editPasswordForm->fill();

        $this->sendSuccessNotification();
    }

    protected function getForms(): array
    {
        return [
            'editProfileForm',
            'editPasswordForm',
        ];
    }

    protected function fillForms(): void
    {
        $data = $this->getUser()->attributesToArray();

        $this->editProfileForm->fill($data);
        $this->editPasswordForm->fill();
    }

    protected function getFormActions(): array
    {
        return [
<<<<<<< HEAD
            Action::make('Update')->color('primary')->submit('Update'),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            Action::make('Update')->color('primary')->submit('Update'),
=======
            Action::make('Update')
                ->color('primary')
                ->submit('Update'),
>>>>>>> a12f125f4a (.)
=======
            Action::make('Update')->color('primary')->submit('Update'),
>>>>>>> b93ef594b4 (.)
=======
            Action::make('Update')
                ->color('primary')
                ->submit('Update'),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
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
     * public function update()
     * {
     * auth()->user()->update(
     * $this->form->getState()
     * );
     *
     * Notification::make()
     * ->title('Profile updated!')
     * ->success()
     * ->send();
     * }
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
    public function update()
    {
        auth()->user()->update(
            $this->form->getState()
        );

        Notification::make()
            ->title('Profile updated!')
            ->success()
            ->send();
    }
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    protected function getUpdateProfileFormActions(): array
    {
        return [
<<<<<<< HEAD
            Action::make('updateProfileAction')->submit('editProfileForm'),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            Action::make('updateProfileAction')->submit('editProfileForm'),
=======
            Action::make('updateProfileAction')

                ->submit('editProfileForm'),
>>>>>>> a12f125f4a (.)
=======
            Action::make('updateProfileAction')->submit('editProfileForm'),
>>>>>>> b93ef594b4 (.)
=======
            Action::make('updateProfileAction')

                ->submit('editProfileForm'),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    protected function getUpdatePasswordFormActions(): array
    {
        return [
<<<<<<< HEAD
            Action::make('updatePasswordAction')->submit('editPasswordForm'),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            Action::make('updatePasswordAction')->submit('editPasswordForm'),
=======
            Action::make('updatePasswordAction')

                ->submit('editPasswordForm'),
>>>>>>> a12f125f4a (.)
=======
            Action::make('updatePasswordAction')->submit('editPasswordForm'),
>>>>>>> b93ef594b4 (.)
=======
            Action::make('updatePasswordAction')

                ->submit('editPasswordForm'),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    // ...

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }

    private function sendSuccessNotification(): void
    {
        Notification::make()
            ->success()
            ->title(__('filament-panels::pages/auth/edit-profile.notifications.saved.title'))
            ->send();
    }
}
