<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Schemas\Schema;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
<<<<<<< HEAD
=======
=======
use Filament\Forms\ComponentContainer;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use Filament\Forms\Form;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Xot\Actions\File\ViewCopyAction;

/**
 * Componente Livewire per la gestione del login.
 *
<<<<<<< HEAD
 * @property Schema $form
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property Schema $form
=======
 * @property \Filament\Schemas\Schema $form
>>>>>>> a12f125f4a (.)
=======
 * @property Schema $form
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
 */
class Login extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
<<<<<<< HEAD
=======
=======
 * @property ComponentContainer $form
 */
class Login extends Component implements HasForms
{
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    use InteractsWithForms;

    /**
     * Regole di validazione.
     *
     * @var array<string, array<string|object>>
     */
    protected array $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
        'remember' => ['boolean'],
    ];

    /**
     * Email dell'utente.
     */
    public string $email = '';

    /**
     * Password dell'utente.
     */
    public string $password = '';

    /**
     * Flag per ricordare l'utente.
     */
    public bool $remember = false;

    /**
     * Inizializza il componente.
     */
    public function mount(): void
    {
        $this->form = $this->form();
    }

    /**
     * Definisce lo schema del form.
     *
     * @return array<TextInput|Checkbox>
     */
    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->email()
                ->required()
                ->label(__('Email'))
                ->placeholder(__('Inserisci la tua email'))
                ->suffixIcon('heroicon-m-envelope')
                ->autofocus()
                ->live()
<<<<<<< HEAD
                ->afterStateUpdated(fn($_state) => $this->validateOnly('email'))
                ->dehydrated(),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                ->afterStateUpdated(fn($_state) => $this->validateOnly('email'))
                ->dehydrated(),
=======
                ->afterStateUpdated(fn ($state) => $this->validateOnly('email'))
                ->dehydrated(),

>>>>>>> a12f125f4a (.)
=======
                ->afterStateUpdated(fn($_state) => $this->validateOnly('email'))
                ->dehydrated(),
>>>>>>> b93ef594b4 (.)
=======
                ->afterStateUpdated(fn ($state) => $this->validateOnly('email'))
                ->dehydrated(),

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            TextInput::make('password')
                ->password()
                ->required()
                ->label(__('Password'))
                ->placeholder(__('Inserisci la tua password'))
                ->suffixIcon('heroicon-m-key')
                ->revealable()
                ->minLength(8)
                ->maxLength(255)
                ->dehydrated(),
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
            Checkbox::make('remember')
                ->label(__('Ricordami'))
                ->default(false)
                ->dehydrated(),
        ];
    }

    /**
     * Crea il form.
     */
<<<<<<< HEAD
    public function form(): Schema
    {
        return Schema::make()->components($this->getFormSchema());
=======
<<<<<<< HEAD
    public function form(): Schema
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return Schema::make()->components($this->getFormSchema());
=======
        return $this->makeForm()
            ->components($this->getFormSchema());
>>>>>>> a12f125f4a (.)
=======
        return Schema::make()->components($this->getFormSchema());
>>>>>>> b93ef594b4 (.)
=======
    public function form(): Form
    {
        return $this->makeForm()
            ->schema($this->getFormSchema());
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Esegue l'autenticazione dell'utente.
     *
     * @return RedirectResponse|void
     */
    public function authenticate()
    {
        try {
            /** @var array{email: string, password: string, remember?: bool} $data */
            $data = $this->validate();

            // Estrai remember dal data array e assicurati che sia un booleano
            $remember = $data['remember'] ?? false;
            // Converto esplicitamente a bool per PHPStan livello 10
            $remember = (bool) $remember;
            unset($data['remember']);

            if (Auth::attempt($data, $remember)) {
                session()->regenerate();

                // Redirect intelligente basato sui ruoli dell'utente
                return $this->getRedirectUrl();
            }

            $this->addError('email', __('Le credenziali fornite non sono corrette..'));
<<<<<<< HEAD
        } catch (Exception $e) {
=======
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            $this->addError('email', __('Si è verificato un errore durante il login. Riprova più tardi.'));
            report($e);
        }
    }

    /**
     * Determina l'URL di redirect appropriato per l'utente autenticato.
     *
     * @return RedirectResponse
     */
    protected function getRedirectUrl(): RedirectResponse
    {
        $user = Auth::user();
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
        if (!$user) {
            return redirect()->to('/');
        }

        // Se l'utente ha ruoli admin, redirect al pannello appropriato
<<<<<<< HEAD
        $adminRoles = $user->roles->filter(fn($role) => str_ends_with($role->name, '::admin'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $adminRoles = $user->roles->filter(fn($role) => str_ends_with($role->name, '::admin'));
=======
        $adminRoles = $user->roles->filter(function ($role) {
            return str_ends_with($role->name, '::admin');
        });
>>>>>>> a12f125f4a (.)
=======
        $adminRoles = $user->roles->filter(fn($role) => str_ends_with($role->name, '::admin'));
>>>>>>> b93ef594b4 (.)
=======
        $adminRoles = $user->roles->filter(function ($role) {
            return str_ends_with($role->name, '::admin');
        });
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        if ($adminRoles->count() === 1) {
            // Un solo ruolo admin - redirect al modulo specifico
            $role = $adminRoles->first();
            if ($role !== null) {
                $moduleName = str_replace('::admin', '', $role->name);
                return redirect()->to("/{$moduleName}/admin");
            }
        } elseif ($adminRoles->count() > 1) {
            // Più ruoli admin - redirect alla dashboard principale
            return redirect()->to('/admin');
        }

        // Utente senza ruoli admin - redirect alla homepage
        return redirect()->to('/' . app()->getLocale());
    }

    /**
     * Renderizza il componente.
     *
<<<<<<< HEAD
     * @return View|Factory
     */
    public function render(): View|Factory
=======
<<<<<<< HEAD
     * @return View|Factory
     */
    public function render(): View|Factory
=======
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        //app(ViewCopyAction::class)->execute('user::livewire.auth.login', 'pub_theme::livewire.auth.login');
        return view('user::livewire.auth.login');
    }
}
