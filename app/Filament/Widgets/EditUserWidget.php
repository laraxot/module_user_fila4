<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use BackedEnum;
use Exception;
use Filament\Schemas\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
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
 * Segue il pattern di delegazione del RegistrationWidget:
 * - Raccoglie i dati dal form
 * - Determina dinamicamente la risorsa, il modello e l'action da eseguire
 * - Delega la logica di salvataggio a una UpdateAction specifica del modulo
 *
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 *
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
    public ?array $data = [];

    /** @var array<string, int|null>|int|string */
    protected int | string | array $columnSpan = 'full';
    
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
    public function mount(string $type, ?int $userId = null): void
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);

        $modelClass = $this->resource::getModel();
        Assert::string($modelClass, 'Model class must be a string');
        $this->model = $modelClass;

        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\UpdateUserAction')
            ->toString();

        $record = $this->getFormModel($userId);
        $data = $this->getFormFill();

        $this->form->fill($data);
        $this->form->model($record);
        $this->data = $data;
        $this->record = $record;
    }

    /**
     * Ottiene il modello per il form.
     * Se viene fornito un userId, carica quell'utente, altrimenti usa l'utente autenticato.
     */
    #[Override]
    protected function getFormModel(?int $userId = null): Model
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
    #[Override]
    public function getFormFill(): array
    {
        $model = $this->record ?: $this->getFormModel();

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

                // Gestisci specificamente gli enum se presenti
                if (isset($attributes['type']) && ($model->type ?? null) instanceof BackedEnum) {
                    $attributes['type'] = $model->type->value;
                }

                return $attributes;
            }
        }

        // Se è un nuovo modello, restituisci solo i campi fillable con valori null
        $fillable = $model->getFillable();
        $appends = $model->getAppends();
        $fields = array_merge($fillable, $appends);

        /** @var array<string, mixed> $result */
        $result = array_fill_keys($fields, null);

        return $result;
    }

    /**
     * Ottiene lo schema del form dalla resource.
     *
     * @return array<int|string, Component>
     */
    #[Override]
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

        return redirect()->back();
    }

    /**
     * Controlla se l'utente può modificare il record corrente.
     */
    public function canEdit(): bool
    {
        $currentUser = Auth::user();

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

