<?php
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> fbc8f8e (.)
=======
use Override;
>>>>>>> 6d20fbe (.)
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Exception;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use RuntimeException;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\TextInput;
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
    protected string $view = 'user::widgets.auth.register-widget';
<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|int $sort = 2;
    protected static null|string $maxHeight = '600px';
=======
    protected static ?int $sort = 2;
    protected static ?string $maxHeight = '600px';
>>>>>>> fbc8f8e (.)
=======
    protected static null|int $sort = 2;
    protected static null|string $maxHeight = '600px';
>>>>>>> 6d20fbe (.)

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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components($this->getFormSchema())
            ->statePath('data')
            ->operation('create');
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    }

    public function submit(): void
    {
        try {
            $validatedData = $this->validateForm();
            $this->logRegistrationAttempt($validatedData);
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
            $user = DB::transaction(function () use ($validatedData) {
                $user = $this->createUser($validatedData);
                $this->afterUserCreated($user);
                return $user;
            });
<<<<<<< HEAD
<<<<<<< HEAD

            $this->handleSuccessfulRegistration($user);
=======
            
            $this->handleSuccessfulRegistration($user);
            
>>>>>>> fbc8f8e (.)
=======

            $this->handleSuccessfulRegistration($user);
>>>>>>> 6d20fbe (.)
        } catch (ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
            $this->handleRegistrationError($e);
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    /**
     * @return array<string, mixed>
     */
    protected function validateForm(): array
    {
        $data = $this->form->getState();

<<<<<<< HEAD
=======
    protected function validateForm(): array
    {
        $data = $this->form->getState();
        
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        return [
            'first_name' => app(SafeStringCastAction::class)->execute($data['first_name']),
            'last_name' => app(SafeStringCastAction::class)->execute($data['last_name']),
            'email' => app(SafeStringCastAction::class)->execute($data['email']),
<<<<<<< HEAD
<<<<<<< HEAD
            'password' => Hash::make(
                app(SafeStringCastAction::class)->execute($data['password']),
            ),
=======
            'password' => Hash::make(app(SafeStringCastAction::class)->execute($data['password'])),
>>>>>>> fbc8f8e (.)
=======
            'password' => Hash::make(
                app(SafeStringCastAction::class)->execute($data['password']),
            ),
>>>>>>> 6d20fbe (.)
            'type' => 'standard',
            'state' => 'pending',
            'email_verified_at' => null,
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @param array<string, mixed> $data
     */
=======
>>>>>>> fbc8f8e (.)
=======
    /**
     * @param array<string, mixed> $data
     */
>>>>>>> 6d20fbe (.)
    protected function logRegistrationAttempt(array $data): void
    {
        $email = app(SafeStringCastAction::class)->execute($data['email']);
        Log::info('Registration attempt', [
            'email_hash' => hash('sha256', $email),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @param array<string, mixed> $data
     */
=======
>>>>>>> fbc8f8e (.)
=======
    /**
     * @param array<string, mixed> $data
     */
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        Notification::make()
            ->title(__('user::auth.registration.success'))
            ->success()
            ->send();
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        $this->redirect(route('dashboard'));
    }

    protected function handleRegistrationError(Exception $e): void
    {
        Log::error('Registration failed: ' . $e->getMessage(), [
            'exception' => $e,
            'trace' => $e->getTraceAsString(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        throw new RuntimeException(__('user::auth.registration.error_occurred'));
    }
}
