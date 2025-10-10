<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

<<<<<<< HEAD
use Filament\Schemas\Schema;
use Exception;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
=======
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Schemas\Schema;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
>>>>>>> 4b219c8 (.)
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
<<<<<<< HEAD
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
=======
>>>>>>> 4b219c8 (.)
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Xot\Actions\File\ViewCopyAction;

/**
 * Componente Livewire per la gestione del login.
 *
 * @property Schema $form
 */
<<<<<<< HEAD
class Login extends Component implements HasActions, HasForms
=======
class Login extends Component implements HasForms, HasActions
>>>>>>> 4b219c8 (.)
{
    use InteractsWithActions;
    use InteractsWithForms;

    /**
<<<<<<< HEAD
     * Data array for form state.
     *
     * @var array<string, mixed>
     */
    public array $data = [];
=======
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
>>>>>>> 4b219c8 (.)

    /**
     * Inizializza il componente.
     */
    public function mount(): void
    {
<<<<<<< HEAD
        $this->form->fill();
=======
        $this->form = $this->form();
>>>>>>> 4b219c8 (.)
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
                ->afterStateUpdated(fn ($_state) => $this->validateOnly('email'))
=======
                ->afterStateUpdated(fn($_state) => $this->validateOnly('email'))
>>>>>>> 4b219c8 (.)
                ->dehydrated(),
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
            Checkbox::make('remember')
                ->label(__('Ricordami'))
                ->default(false)
                ->dehydrated(),
        ];
    }

    /**
<<<<<<< HEAD
     * Crea il form schema.
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components($this->getFormSchema())
            ->statePath('data');
=======
     * Crea il form.
     */
    public function form(): Schema
    {
        return Schema::make()->components($this->getFormSchema());
>>>>>>> 4b219c8 (.)
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
<<<<<<< HEAD
            $data = $this->form->getState();
=======
            $data = $this->validate();
>>>>>>> 4b219c8 (.)

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

<<<<<<< HEAD
            $this->addError('data.email', __('Le credenziali fornite non sono corrette..'));
        } catch (Exception $e) {
            $this->addError('data.email', __('Si è verificato un errore durante il login. Riprova più tardi.'));
=======
            $this->addError('email', __('Le credenziali fornite non sono corrette..'));
        } catch (Exception $e) {
            $this->addError('email', __('Si è verificato un errore durante il login. Riprova più tardi.'));
>>>>>>> 4b219c8 (.)
            report($e);
        }
    }

    /**
     * Determina l'URL di redirect appropriato per l'utente autenticato.
<<<<<<< HEAD
=======
     *
     * @return RedirectResponse
>>>>>>> 4b219c8 (.)
     */
    protected function getRedirectUrl(): RedirectResponse
    {
        $user = Auth::user();

<<<<<<< HEAD
        if (! $user) {
=======
        if (!$user) {
>>>>>>> 4b219c8 (.)
            return redirect()->to('/');
        }

        // Se l'utente ha ruoli admin, redirect al pannello appropriato
<<<<<<< HEAD
        $adminRoles = $user->roles->filter(fn ($role) => str_ends_with($role->name, '::admin'));
=======
        $adminRoles = $user->roles->filter(fn($role) => str_ends_with($role->name, '::admin'));
>>>>>>> 4b219c8 (.)

        if ($adminRoles->count() === 1) {
            // Un solo ruolo admin - redirect al modulo specifico
            $role = $adminRoles->first();
            if ($role !== null) {
                $moduleName = str_replace('::admin', '', $role->name);
<<<<<<< HEAD

=======
>>>>>>> 4b219c8 (.)
                return redirect()->to("/{$moduleName}/admin");
            }
        } elseif ($adminRoles->count() > 1) {
            // Più ruoli admin - redirect alla dashboard principale
            return redirect()->to('/admin');
        }

        // Utente senza ruoli admin - redirect alla homepage
<<<<<<< HEAD
        return redirect()->to('/'.app()->getLocale());
=======
        return redirect()->to('/' . app()->getLocale());
>>>>>>> 4b219c8 (.)
    }

    /**
     * Renderizza il componente.
<<<<<<< HEAD
     */
    public function render(): View|Factory
    {
        // app(ViewCopyAction::class)->execute('user::livewire.auth.login', 'pub_theme::livewire.auth.login');
=======
     *
     * @return View|Factory
     */
    public function render(): View|Factory
    {
        //app(ViewCopyAction::class)->execute('user::livewire.auth.login', 'pub_theme::livewire.auth.login');
>>>>>>> 4b219c8 (.)
        return view('user::livewire.auth.login');
    }
}
