<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Exception;
use BackedEnum;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

/**
 * EditUserWidget: Widget generico per la modifica dati utente.
 *
<<<<<<< HEAD
=======
=======
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Filament\Widgets\Widget;
use Illuminate\Http\Request;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\XotData;
use Livewire\Attributes\Validate;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> b93ef594b4 (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

/**
 * EditUserWidget: Widget generico per la modifica dati utente.
<<<<<<< HEAD
 * 
>>>>>>> a12f125f4a (.)
=======
 *
>>>>>>> b93ef594b4 (.)
=======
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Filament\Widgets\Widget;
use Illuminate\Http\Request;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\XotData;
use Livewire\Attributes\Validate;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Contracts\UserContract;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Illuminate\Support\Facades\Log;

/**
 * EditUserWidget: Widget generico per la modifica dati utente.
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * Segue il pattern di delegazione del RegistrationWidget:
 * - Raccoglie i dati dal form
 * - Determina dinamicamente la risorsa, il modello e l'action da eseguire
 * - Delega la logica di salvataggio a una UpdateAction specifica del modulo
<<<<<<< HEAD
 *
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 *
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 *
=======
 * 
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 * 
>>>>>>> a12f125f4a (.)
=======
 *
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 *
>>>>>>> b93ef594b4 (.)
=======
 * 
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property-read string $type
 * @property-read string $resource
 * @property-read string $model
 * @property-read string $action
 * @property-read Model $record
 * @property array|null $data
 */
class EditUserWidget extends XotBaseWidget
{
    /** @var array<string, mixed>|null */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public null|array $data = [];

    /** @var array<string, int|null>|int|string */
    protected int|string|array $columnSpan = 'full';

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    public ?array $data = [];
    
    /** @var array<string, int|null>|int|string */
    protected int | string | array $columnSpan = 'full';
    
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    public null|array $data = [];

    /** @var array<string, int|null>|int|string */
    protected int|string|array $columnSpan = 'full';

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public string $type;
    public string $resource;
    public string $model;
    public string $action;
    public Model $record;

    /**
     * @phpstan-ignore-next-line
     */
<<<<<<< HEAD
    protected string $view = 'pub_theme::filament.widgets.edit-user';
=======
<<<<<<< HEAD
    protected string $view = 'pub_theme::filament.widgets.edit-user';
=======
    protected static string $view = 'pub_theme::filament.widgets.edit-user';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Initialize the widget with user type and optional user ID.
     *
     * @param string $type
     * @param int|null $userId
     * @return void
     */
<<<<<<< HEAD
    public function mount(string $type, null|int $userId = null): void
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function mount(string $type, null|int $userId = null): void
=======
    public function mount(string $type, ?int $userId = null): void
>>>>>>> a12f125f4a (.)
=======
    public function mount(string $type, null|int $userId = null): void
>>>>>>> b93ef594b4 (.)
=======
    public function mount(string $type, ?int $userId = null): void
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);
        $this->model = $this->resource::getModel();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $this->action = Str::of($this->model)
            ->replace('\Models\\', '\Actions\\')
            ->append('\UpdateUserAction')
            ->toString();

<<<<<<< HEAD
        $record = $this->getFormModel($userId);
        $data = $this->getFormFill();

=======
<<<<<<< HEAD
        $record = $this->getFormModel($userId);
        $data = $this->getFormFill();

=======
=======
>>>>>>> origin/develop
        $this->action = Str::of($this->model)->replace('\Models\\', '\Actions\\')->append('\UpdateUserAction')->toString();
        
        $record = $this->getFormModel($userId);
        $data = $this->getFormFill();
        
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $record = $this->getFormModel($userId);
        $data = $this->getFormFill();

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $this->form->fill($data);
        $this->form->model($record);
        $this->data = $data;
        $this->record = $record;
    }

    /**
     * Ottiene il modello per il form.
     * Se viene fornito un userId, carica quell'utente, altrimenti usa l'utente autenticato.
     *
     * @param int|null $userId
     * @return Model
     */
<<<<<<< HEAD
    #[Override]
    protected function getFormModel(null|int $userId = null): Model
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
    protected function getFormModel(null|int $userId = null): Model
=======
    protected function getFormModel(?int $userId = null): Model
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    protected function getFormModel(null|int $userId = null): Model
>>>>>>> b93ef594b4 (.)
=======
    protected function getFormModel(?int $userId = null): Model
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        if ($userId) {
            $user = $this->model::findOrFail($userId);
            return $user;
        }

        // Se non è specificato un userId, usa l'utente correntemente autenticato
        $currentUser = Auth::user();
        if ($currentUser && $currentUser instanceof $this->model) {
            return $currentUser;
        }

        // Fallback: cerca un utente del tipo corretto associato all'utente autenticato
        if ($currentUser) {
            $user = $this->model::where('user_id', $currentUser->id)->first();
            if ($user) {
                return $user;
            }
        }

        // Ultimo fallback: nuovo modello
        return app($this->model);
    }

    /**
     * Ottiene i dati per il riempimento del form.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function getFormFill(): array
    {
        $model = $this->record ?: $this->getFormModel();

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    public function getFormFill(): array
    {
        $model = $this->record ?? $this->getFormModel();
        
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function getFormFill(): array
    {
        $model = $this->record ?: $this->getFormModel();

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Se il modello ha un ID, significa che è stato trovato nel database
        if ($model->exists) {
            try {
                return $model->toArray();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            } catch (Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                Log::warning("Errore in toArray() per modello {$this->model}: " . $e->getMessage());
                $attributes = $model->getAttributes();
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD

=======
                
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                // Gestisci specificamente gli enum se presenti
                if (isset($attributes['type']) && ($model->type ?? null) instanceof BackedEnum) {
                    $attributes['type'] = $model->type->value;
                }
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

                return $attributes;
            }
        }

<<<<<<< HEAD
=======
=======
=======
            } catch (\Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                Log::warning("Errore in toArray() per modello {$this->model}: " . $e->getMessage());
                $attributes = $model->getAttributes();
                
                // Gestisci specificamente gli enum se presenti
                if (isset($attributes['type']) && ($model->type ?? null) instanceof \BackedEnum) {
                    $attributes['type'] = $model->type->value;
                }
>>>>>>> origin/develop
                
                return $attributes;
            }
        }
        
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

                return $attributes;
            }
        }

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Se è un nuovo modello, restituisci solo i campi fillable con valori null
        $fillable = $model->getFillable();
        $appends = $model->getAppends();
        $fields = array_merge($fillable, $appends);
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
        return array_fill_keys($fields, null);
    }

    /**
     * Ottiene lo schema del form dalla resource.
     *
<<<<<<< HEAD
     * @return array<int|string, Component>
     */
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<int|string, Component>
     */
    #[Override]
=======
     * @return array<int|string, \Filament\Schemas\Components\Component>
     */
>>>>>>> a12f125f4a (.)
=======
     * @return array<int|string, Component>
     */
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return array<int|string, \Filament\Forms\Components\Component>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getFormSchema(): array
    {
        return $this->resource::getFormSchemaWidget();
    }

    /**
     * Gestisce il salvataggio delle modifiche delegando all'action specifica.
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     *
     * @see https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component
     *
     * @return RedirectResponse|Redirector
     */
    public function updateUser(): RedirectResponse|Redirector
    {
        $data = $this->form->getState();
        $record = $this->record;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // Delega l'aggiornamento all'action specifica
        $user = app($this->action)->execute($record, $data);

        // Notifica successo
        session()->flash('message', __('user::profile.update_success'));

        // Aggiorna il form con i nuovi dati
        $this->form->fill($this->getFormFill());

<<<<<<< HEAD
=======
=======
       
=======

>>>>>>> b93ef594b4 (.)
        // Delega l'aggiornamento all'action specifica
        $user = app($this->action)->execute($record, $data);

        // Notifica successo
        session()->flash('message', __('user::profile.update_success'));

        // Aggiorna il form con i nuovi dati
        $this->form->fill($this->getFormFill());
<<<<<<< HEAD
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
     * 
     * @see https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component
     *
     * @return \Illuminate\Http\RedirectResponse|\Livewire\Features\SupportRedirects\Redirector
     */
    public function updateUser(): \Illuminate\Http\RedirectResponse|\Livewire\Features\SupportRedirects\Redirector
    {
        $data = $this->form->getState();
        $record = $this->record;
       
        // Delega l'aggiornamento all'action specifica
        $user = app($this->action)->execute($record, $data);
        
        // Notifica successo
        session()->flash('message', __('user::profile.update_success'));
        
        // Aggiorna il form con i nuovi dati
        $this->form->fill($this->getFormFill());
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        return redirect()->back();
    }

    /**
     * Controlla se l'utente può modificare il record corrente.
     *
     * @return bool
     */
    public function canEdit(): bool
    {
        $currentUser = Auth::user();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // L'utente può modificare solo il proprio profilo
        return (
            $currentUser &&
            (
                ($currentUser->id ?? null) !== null &&
                        ($this->record->id ?? null) !== null &&
                        $currentUser->id === $this->record->id ||
                    ($currentUser->id ?? null) !== null && $currentUser->id === ($this->record->user_id ?? null)
            )
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        
        // L'utente può modificare solo il proprio profilo
        return $currentUser && (
            (($currentUser->id ?? null) !== null && ($this->record->id ?? null) !== null && $currentUser->id === $this->record->id) ||
            (($currentUser->id ?? null) !== null && $currentUser->id === ($this->record->user_id ?? null))
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        // L'utente può modificare solo il proprio profilo
        return (
            $currentUser &&
            (
                ($currentUser->id ?? null) !== null &&
                        ($this->record->id ?? null) !== null &&
                        $currentUser->id === $this->record->id ||
                    ($currentUser->id ?? null) !== null && $currentUser->id === ($this->record->user_id ?? null)
            )
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        );
    }
}
