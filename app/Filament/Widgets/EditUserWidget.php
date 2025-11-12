<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
use BackedEnum;
use Exception;
use Filament\Schemas\Components\Component;
=======
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> fbc8f8e (.)
use Exception;
use BackedEnum;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
<<<<<<< HEAD
>>>>>>> 4cdb5c7 (.)
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Schemas\Components\Wizard\Step;
=======
use Filament\Forms\Components\Wizard\Step;
>>>>>>> 4b219c8 (.)
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
<<<<<<< HEAD
use Filament\Schemas\Schema;
=======
use Filament\Forms\Form;
>>>>>>> 2805232 (.)
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Override;
use Webmozart\Assert\Assert;

/**
 * EditUserWidget: Widget generico per la modifica dati utente.
 *
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
>>>>>>> fbc8f8e (.)
 * Segue il pattern di delegazione del RegistrationWidget:
 * - Raccoglie i dati dal form
 * - Determina dinamicamente la risorsa, il modello e l'action da eseguire
 * - Delega la logica di salvataggio a una UpdateAction specifica del modulo
<<<<<<< HEAD
 *
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 *
=======
 * 
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 * 
>>>>>>> fbc8f8e (.)
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
    public ?array $data = [];

    /** @var array<string, int|null>|int|string */
    protected int | string | array $columnSpan = 'full';
    
=======
<<<<<<< HEAD
    public null|array $data = [];

    /** @var array<string, int|null>|int|string */
    protected int|string|array $columnSpan = 'full';

=======
    public ?array $data = [];
    
    /** @var array<string, int|null>|int|string */
    protected int | string | array $columnSpan = 'full';
    
>>>>>>> fbc8f8e (.)
>>>>>>> 4cdb5c7 (.)
    public string $type;

    public string $resource;

    public string $model;

    public string $action;

    public Model $record;

    /**
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.edit-user';

    /**
     * Initialize the widget with user type and optional user ID.
     */
<<<<<<< HEAD
    public function mount(string $type, ?int $userId = null): void
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);

        $modelClass = $this->resource::getModel();
        Assert::string($modelClass, 'Model class must be a string');
        $this->model = $modelClass;

=======
<<<<<<< HEAD
    public function mount(string $type, null|int $userId = null): void
=======
    public function mount(string $type, ?int $userId = null): void
>>>>>>> fbc8f8e (.)
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);
        $this->model = $this->resource::getModel();
<<<<<<< HEAD
>>>>>>> 4cdb5c7 (.)
        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\UpdateUserAction')
            ->toString();

        $record = $this->getFormModel($userId);
        $data = $this->getFormFill();

=======
        $this->action = Str::of($this->model)->replace('\Models\\', '\Actions\\')->append('\UpdateUserAction')->toString();
        
        $record = $this->getFormModel($userId);
        $data = $this->getFormFill();
        
>>>>>>> fbc8f8e (.)
        $this->form->fill($data);
        $this->form->model($record);
        $this->data = $data;
        $this->record = $record;
    }

    /**
     * Ottiene il modello per il form.
     * Se viene fornito un userId, carica quell'utente, altrimenti usa l'utente autenticato.
     */
<<<<<<< HEAD
    #[Override]
<<<<<<< HEAD
    protected function getFormModel(?int $userId = null): Model
=======
    protected function getFormModel(null|int $userId = null): Model
=======
    protected function getFormModel(?int $userId = null): Model
>>>>>>> fbc8f8e (.)
>>>>>>> 4cdb5c7 (.)
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = $this->model;
        if ($userId) {
            /** @var \Illuminate\Database\Eloquent\Model $user */
            $user = $this->model::findOrFail($userId);

            return $user;
        }

        // Se non è specificato un userId, usa l'utente correntemente autenticato
        $currentUser = Auth::user();
        if ($currentUser && is_string($this->model) && $currentUser instanceof $this->model) {
            return $currentUser;
        }

        // Fallback: cerca un utente del tipo corretto associato all'utente autenticato
        if ($currentUser && is_string($this->model)) {
            $query = $this->model::where('user_id', $currentUser->id);

            if (is_object($query) && method_exists($query, 'first')) {
                $user = $query->first();

                if ($user instanceof Model) {
                    return $user;
                }
            }
        }

        // Ultimo fallback: nuovo modello
        /** @var \Illuminate\Database\Eloquent\Model $modelInstance */
        $modelInstance = app($this->model);

        return $modelInstance;
    }

    /**
     * Ottiene i dati per il riempimento del form.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
    #[Override]
    public function getFormFill(): array
    {
        $model = $this->record ?: $this->getFormModel();

=======
    public function getFormFill(): array
    {
        $model = $this->record ?? $this->getFormModel();
        
>>>>>>> fbc8f8e (.)
        // Se il modello ha un ID, significa che è stato trovato nel database
        if ($model->exists) {
            try {
                /** @var array<string, mixed> $arrayData */
                $arrayData = $model->toArray();

                return $arrayData;
            } catch (Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                Log::warning("Errore in toArray() per modello {$this->model}: ".$e->getMessage());

                /** @var array<string, mixed> $attributes */
                $attributes = $model->getAttributes();
<<<<<<< HEAD

=======
                
>>>>>>> fbc8f8e (.)
                // Gestisci specificamente gli enum se presenti
                if (isset($attributes['type']) && ($model->type ?? null) instanceof BackedEnum) {
                    $attributes['type'] = $model->type->value;
                }
<<<<<<< HEAD

                return $attributes;
            }
        }

=======
                
                return $attributes;
            }
        }
        
>>>>>>> fbc8f8e (.)
        // Se è un nuovo modello, restituisci solo i campi fillable con valori null
        $fillable = $model->getFillable();
        $appends = $model->getAppends();
        $fields = array_merge($fillable, $appends);
<<<<<<< HEAD

<<<<<<< HEAD
        /** @var array<string, mixed> $result */
        $result = array_fill_keys($fields, null);

        return $result;
=======
=======
        
>>>>>>> fbc8f8e (.)
        return array_fill_keys($fields, null);
>>>>>>> 4cdb5c7 (.)
    }

    /**
     * Ottiene lo schema del form dalla resource.
     *
<<<<<<< HEAD
     * @return array<int|string, Component>
     */
    #[Override]
=======
     * @return array<int|string, \Filament\Schemas\Components\Component>
     */
>>>>>>> fbc8f8e (.)
    public function getFormSchema(): array
    {
        /** @var array<int|string, Component> $schema */
        $schema = $this->resource::getFormSchemaWidget();

        return $schema;
    }

    /**
     * Gestisce il salvataggio delle modifiche delegando all'action specifica.
     *
     * @see https://filamentphp.com/docs/3.x/forms/adding-a-form-to-a-livewire-component
     */
    public function updateUser(): RedirectResponse|Redirector
    {
        $data = $this->form->getState();
        $record = $this->record;
<<<<<<< HEAD

        // Delega l'aggiornamento all'action specifica
        $actionInstance = app($this->action);

        // PHPStan Level 10: Type guard for action instance
        if (! is_object($actionInstance) || ! method_exists($actionInstance, 'execute')) {
            throw new \RuntimeException('Action must be an object with execute method');
        }

        /** @var callable $executeMethod */
        $executeMethod = [$actionInstance, 'execute'];
        $user = $executeMethod($record, $data);

        // Notifica successo
        session()->flash('message', __('user::profile.update_success'));

        // Aggiorna il form con i nuovi dati
        $this->form->fill($this->getFormFill());

=======
       
        // Delega l'aggiornamento all'action specifica
        $user = app($this->action)->execute($record, $data);
        
        // Notifica successo
        session()->flash('message', __('user::profile.update_success'));
        
        // Aggiorna il form con i nuovi dati
        $this->form->fill($this->getFormFill());
        
>>>>>>> fbc8f8e (.)
        return redirect()->back();
    }

    /**
     * Controlla se l'utente può modificare il record corrente.
     */
    public function canEdit(): bool
    {
        $currentUser = Auth::user();
<<<<<<< HEAD

        // L'utente può modificare solo il proprio profilo
<<<<<<< HEAD
        return $currentUser && (
            (
                ($currentUser->id ?? null) !== null &&
                ($this->record->id ?? null) !== null &&
                $currentUser->id === $this->record->id
            ) ||
            (
                ($currentUser->id ?? null) !== null &&
                $currentUser->id === ($this->record->user_id ?? null)
            )
=======
        
        // L'utente può modificare solo il proprio profilo
        return $currentUser && (
            (($currentUser->id ?? null) !== null && ($this->record->id ?? null) !== null && $currentUser->id === $this->record->id) ||
            (($currentUser->id ?? null) !== null && $currentUser->id === ($this->record->user_id ?? null))
>>>>>>> fbc8f8e (.)
        );
=======
        return
            $currentUser &&
            (
                ($currentUser->id ?? null) !== null &&
                        ($this->record->id ?? null) !== null &&
                        $currentUser->id === $this->record->id ||
                    ($currentUser->id ?? null) !== null && $currentUser->id === ($this->record->user_id ?? null)
            );
>>>>>>> 6849bc76 (.)
    }
}

