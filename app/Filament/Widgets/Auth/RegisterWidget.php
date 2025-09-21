<?php
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
declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Exception;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use RuntimeException;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
=======
=======
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Modules\User\Models\User;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

class RegisterWidget extends XotBaseWidget
{
<<<<<<< HEAD
    protected string $view = 'user::widgets.auth.register-widget';
    protected static null|int $sort = 2;
    protected static null|string $maxHeight = '600px';
=======
<<<<<<< HEAD
    protected string $view = 'user::widgets.auth.register-widget';
<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|int $sort = 2;
    protected static null|string $maxHeight = '600px';
=======
    protected static ?int $sort = 2;
    protected static ?string $maxHeight = '600px';
>>>>>>> a12f125f4a (.)
=======
    protected static null|int $sort = 2;
    protected static null|string $maxHeight = '600px';
>>>>>>> b93ef594b4 (.)
=======
    protected static string $view = 'user::widgets.auth.register-widget';
    protected static ?int $sort = 2;
    protected static ?string $maxHeight = '600px';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    public static function canView(): bool
    {
        return !Auth::check();
    }

    public function mount(): void
    {
        $this->form->fill([]);
        Log::debug('Registration form initialized', [
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'user_info' => Section::make()->schema([
                'first_name' => TextInput::make('first_name')
                    ->label(__('user::auth.fields.first_name'))
                    ->required()
                    ->string()
                    ->minLength(2)
                    ->maxLength(255)
                    ->autocomplete('given-name')
                    ->validationAttribute(__('user::auth.fields.first_name')),
                'last_name' => TextInput::make('last_name')
                    ->label(__('user::auth.fields.last_name'))
                    ->required()
                    ->string()
                    ->minLength(2)
                    ->maxLength(255)
                    ->autocomplete('family-name')
                    ->validationAttribute(__('user::auth.fields.last_name')),
                'email' => TextInput::make('email')
                    ->label(__('user::auth.fields.email'))
                    ->required()
                    ->email()
                    ->maxLength(255)
                    ->unique(User::class, 'email')
                    ->autocomplete('email')
                    ->validationAttribute(__('user::auth.fields.email'))
                    ->helperText(__('user::auth.help.email')),
                'password_grid' => Grid::make(2)->schema([
                    'password' => TextInput::make('password')
                        ->label(__('user::auth.fields.password'))
                        ->password()
                        ->required()
                        ->string()
                        ->minLength(12)
                        ->maxLength(255)
                        ->rules([
                            'required',
                            'string',
                            'min:12',
                            'regex:/[A-Z]/',
                            'regex:/[a-z]/',
                            'regex:/[0-9]/',
                            'regex:/[^A-Za-z0-9]/',
                        ])
                        ->validationMessages([
                            'password.regex' => __('user::auth.validation.password.complexity'),
                        ])
                        ->autocomplete('new-password')
                        ->validationAttribute(__('user::auth.fields.password'))
                        ->helperText(__('user::auth.help.password'))
                        ->confirmed(),
                    'password_confirmation' => TextInput::make('password_confirmation')
                        ->label(__('user::auth.fields.password_confirmation'))
                        ->password()
                        ->required()
                        ->string()
                        ->minLength(12)
                        ->maxLength(255)
                        ->autocomplete('new-password')
                        ->validationAttribute(__('user::auth.fields.password_confirmation'))
                        ->dehydrated(false)
                        ->same('password'),
                ]),
            ]),
        ];
    }

    #[Override]
    public function form(Schema $schema): Schema
    {
        return $schema->components($this->getFormSchema())->statePath('data')->operation('create');
<<<<<<< HEAD
=======
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public function getFormSchema(): array
    {
        return [
            'user_info' => Section::make()->schema([
                'first_name' => TextInput::make('first_name')
                    ->label(__('user::auth.fields.first_name'))
                    ->required()
                    ->string()
                    ->minLength(2)
                    ->maxLength(255)
                    ->autocomplete('given-name')
                    ->validationAttribute(__('user::auth.fields.first_name')),
                'last_name' => TextInput::make('last_name')
                    ->label(__('user::auth.fields.last_name'))
                    ->required()
                    ->string()
                    ->minLength(2)
                    ->maxLength(255)
                    ->autocomplete('family-name')
                    ->validationAttribute(__('user::auth.fields.last_name')),
                'email' => TextInput::make('email')
                    ->label(__('user::auth.fields.email'))
                    ->required()
                    ->email()
                    ->maxLength(255)
                    ->unique(User::class, 'email')
                    ->autocomplete('email')
                    ->validationAttribute(__('user::auth.fields.email'))
                    ->helperText(__('user::auth.help.email')),
                'password_grid' => Grid::make(2)->schema([
                    'password' => TextInput::make('password')
                        ->label(__('user::auth.fields.password'))
                        ->password()
                        ->required()
                        ->string()
                        ->minLength(12)
                        ->maxLength(255)
                        ->rules([
                            'required',
                            'string',
                            'min:12',
                            'regex:/[A-Z]/',
                            'regex:/[a-z]/',
                            'regex:/[0-9]/',
                            'regex:/[^A-Za-z0-9]/',
                        ])
                        ->validationMessages([
                            'password.regex' => __('user::auth.validation.password.complexity'),
                        ])
                        ->autocomplete('new-password')
                        ->validationAttribute(__('user::auth.fields.password'))
                        ->helperText(__('user::auth.help.password'))
                        ->confirmed(),
                    'password_confirmation' => TextInput::make('password_confirmation')
                        ->label(__('user::auth.fields.password_confirmation'))
                        ->password()
                        ->required()
                        ->string()
                        ->minLength(12)
                        ->maxLength(255)
                        ->autocomplete('new-password')
                        ->validationAttribute(__('user::auth.fields.password_confirmation'))
                        ->dehydrated(false)
                        ->same('password'),
                ]),
            ]),
        ];
    }

    #[Override]
    public function form(Schema $schema): Schema
    {
<<<<<<< HEAD
        return $schema
            ->components($this->getFormSchema())
            ->statePath('data')
            ->operation('create');
>>>>>>> a12f125f4a (.)
=======
        return $schema->components($this->getFormSchema())->statePath('data')->operation('create');
>>>>>>> b93ef594b4 (.)
=======
    public function getFormSchema(): array
    {
        return [
            'user_info' => Section::make()
                ->schema([
                    'first_name' => TextInput::make('first_name')
                        ->label(__('user::auth.fields.first_name'))
                        ->required()
                        ->string()
                        ->minLength(2)
                        ->maxLength(255)
                        ->autocomplete('given-name')
                        ->validationAttribute(__('user::auth.fields.first_name')),
                    
                    'last_name' => TextInput::make('last_name')
                        ->label(__('user::auth.fields.last_name'))
                        ->required()
                        ->string()
                        ->minLength(2)
                        ->maxLength(255)
                        ->autocomplete('family-name')
                        ->validationAttribute(__('user::auth.fields.last_name')),
                    
                    'email' => TextInput::make('email')
                        ->label(__('user::auth.fields.email'))
                        ->required()
                        ->email()
                        ->maxLength(255)
                        ->unique(User::class, 'email')
                        ->autocomplete('email')
                        ->validationAttribute(__('user::auth.fields.email'))
                        ->helperText(__('user::auth.help.email')),
                    
                    'password_grid' => Grid::make(2)
                        ->schema([
                            'password' => TextInput::make('password')
                                ->label(__('user::auth.fields.password'))
                                ->password()
                                ->required()
                                ->string()
                                ->minLength(12)
                                ->maxLength(255)
                                ->rules([
                                    'required',
                                    'string',
                                    'min:12',
                                    'regex:/[A-Z]/',
                                    'regex:/[a-z]/',
                                    'regex:/[0-9]/',
                                    'regex:/[^A-Za-z0-9]/'
                                ])
                                ->validationMessages([
                                    'password.regex' => __('user::auth.validation.password.complexity'),
                                ])
                                ->autocomplete('new-password')
                                ->validationAttribute(__('user::auth.fields.password'))
                                ->helperText(__('user::auth.help.password'))
                                ->confirmed(),
                            
                            'password_confirmation' => TextInput::make('password_confirmation')
                                ->label(__('user::auth.fields.password_confirmation'))
                                ->password()
                                ->required()
                                ->string()
                                ->minLength(12)
                                ->maxLength(255)
                                ->autocomplete('new-password')
                                ->validationAttribute(__('user::auth.fields.password_confirmation'))
                                ->dehydrated(false)
                                ->same('password'),
                        ]),
                ]),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
            ->statePath('data')
            ->operation('create');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function submit(): void
    {
        try {
            $validatedData = $this->validateForm();
            $this->logRegistrationAttempt($validatedData);
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
            $user = DB::transaction(function () use ($validatedData) {
                $user = $this->createUser($validatedData);
                $this->afterUserCreated($user);
                return $user;
            });
<<<<<<< HEAD

            $this->handleSuccessfulRegistration($user);
        } catch (ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

            $this->handleSuccessfulRegistration($user);
=======
            
            $this->handleSuccessfulRegistration($user);
            
>>>>>>> a12f125f4a (.)
=======

            $this->handleSuccessfulRegistration($user);
>>>>>>> b93ef594b4 (.)
        } catch (ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
=======
            
            $this->handleSuccessfulRegistration($user);
            
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            $this->handleRegistrationError($e);
        }
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    /**
     * @return array<string, mixed>
     */
    protected function validateForm(): array
    {
        $data = $this->form->getState();

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    protected function validateForm(): array
    {
        $data = $this->form->getState();
        
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    /**
     * @return array<string, mixed>
     */
    protected function validateForm(): array
    {
        $data = $this->form->getState();

>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        return [
            'first_name' => app(SafeStringCastAction::class)->execute($data['first_name']),
            'last_name' => app(SafeStringCastAction::class)->execute($data['last_name']),
            'email' => app(SafeStringCastAction::class)->execute($data['email']),
<<<<<<< HEAD
            'password' => Hash::make(
                app(SafeStringCastAction::class)->execute($data['password']),
            ),
=======
<<<<<<< HEAD
<<<<<<< HEAD
            'password' => Hash::make(
                app(SafeStringCastAction::class)->execute($data['password']),
            ),
=======
            'password' => Hash::make(app(SafeStringCastAction::class)->execute($data['password'])),
>>>>>>> a12f125f4a (.)
=======
            'password' => Hash::make(
                app(SafeStringCastAction::class)->execute($data['password']),
            ),
>>>>>>> b93ef594b4 (.)
=======
        return [
            'first_name' => app(\Modules\Xot\Actions\Cast\SafeStringCastAction::class)->execute($data['first_name']),
            'last_name' => app(\Modules\Xot\Actions\Cast\SafeStringCastAction::class)->execute($data['last_name']),
            'email' => app(\Modules\Xot\Actions\Cast\SafeStringCastAction::class)->execute($data['email']),
            'password' => Hash::make(app(\Modules\Xot\Actions\Cast\SafeStringCastAction::class)->execute($data['password'])),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'type' => 'standard',
            'state' => 'pending',
            'email_verified_at' => null,
        ];
    }

<<<<<<< HEAD
    /**
     * @param array<string, mixed> $data
     */
    protected function logRegistrationAttempt(array $data): void
    {
        $email = app(SafeStringCastAction::class)->execute($data['email']);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @param array<string, mixed> $data
     */
=======
>>>>>>> a12f125f4a (.)
=======
    /**
     * @param array<string, mixed> $data
     */
>>>>>>> b93ef594b4 (.)
    protected function logRegistrationAttempt(array $data): void
    {
        $email = app(SafeStringCastAction::class)->execute($data['email']);
=======
    protected function logRegistrationAttempt(array $data): void
    {
        $email = app(\Modules\Xot\Actions\Cast\SafeStringCastAction::class)->execute($data['email']);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        Log::info('Registration attempt', [
            'email_hash' => hash('sha256', $email),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

<<<<<<< HEAD
    /**
     * @param array<string, mixed> $data
     */
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @param array<string, mixed> $data
     */
=======
>>>>>>> a12f125f4a (.)
=======
    /**
     * @param array<string, mixed> $data
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    protected function createUser(array $data): User
    {
        return User::create($data);
    }

    protected function afterUserCreated(User $user): void
    {
        activity()
            ->causedBy($user)
            ->performedOn($user)
            ->withProperties([
                'type' => $user->type,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ])
            ->log('User registered via RegisterWidget');
    }

    protected function handleSuccessfulRegistration(User $user): void
    {
        if (config('auth.must_verify_email')) {
            $user->sendEmailVerificationNotification();
        }

        Auth::login($user);
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
        Notification::make()
            ->title(__('user::auth.registration.success'))
            ->success()
            ->send();
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $this->redirect(route('dashboard'));
    }

    protected function handleRegistrationError(Exception $e): void
<<<<<<< HEAD
=======
=======
            
        $this->redirect(route('dashboard'));
    }

    protected function handleRegistrationError(\Exception $e): void
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        Log::error('Registration failed: ' . $e->getMessage(), [
            'exception' => $e,
            'trace' => $e->getTraceAsString(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

<<<<<<< HEAD
        throw new RuntimeException(__('user::auth.registration.error_occurred'));
=======
<<<<<<< HEAD
        throw new RuntimeException(__('user::auth.registration.error_occurred'));
=======
        throw new \RuntimeException(__('user::auth.registration.error_occurred'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
