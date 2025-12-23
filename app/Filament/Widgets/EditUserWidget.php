<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
use Exception;
use BackedEnum;
=======
>>>>>>> 220cf97b (.)
use Filament\Support\Components\Component;
=======
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget;
>>>>>>> laraxot/develop
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

/**
 * EditUserWidget: Widget generico per la modifica dati utente.
 *
 * Segue il pattern di delegazione del RegistrationWidget:
 * - Raccoglie i dati dal form
 * - Determina dinamicamente la risorsa, il modello e l'action da eseguire
 * - Delega la logica di salvataggio a una UpdateAction specifica del modulo
 *
<<<<<<< HEAD
=======
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 *
>>>>>>> laraxot/develop
 * @property string     $type
 * @property string     $resource
 * @property string     $model
 * @property string     $action
 * @property Model      $record
 * @property array|null $data
 */
class EditUserWidget extends XotBaseWidget
{
<<<<<<< HEAD
    public string $type;

    public string $resource;

    public string $model;

    public string $action;

    public Model $record;

    /** @var array<string, mixed>|null */
    public ?array $data = null;
=======
    /** @var array<string, mixed>|null */
    public ?array $data = [];

    /** @var array<string, int|null>|int|string */
    protected int|string|array $columnSpan = 'full';

    public string $type;
    public string $resource;
    public string $model;
    public string $action;
    public Model $record;
>>>>>>> laraxot/develop

    /**
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.edit-user';

    /**
     * Initialize the widget with user type and optional user ID.
     */
<<<<<<< HEAD
    public function mount(string $type, ?string $userId = null): void
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);
        $modelClass = $this->resource::getModel();
        Assert::string($modelClass, 'Resource getModel() must return string');
        $this->model = $modelClass;

        $this->action = Str::of($this->model)
            ->replace('\\Models\\', '\\Actions\\')
            ->append('\\UpdateUserAction')
=======
    public function mount(string $type, ?int $userId = null): void
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);
        Assert::classExists($this->resource);
        $modelClass = $this->resource::getModel();
        Assert::string($modelClass);
        $this->model = $modelClass;
        Assert::string($this->model);
        $this->action = Str::of($this->model)
            ->replace('\Models\\', '\Actions\\')
            ->append('\UpdateUserAction')
>>>>>>> laraxot/develop
            ->toString();

        $record = $this->getFormModel($userId);
        $data = $this->getFormFill();

        $this->form->fill($data);
        $this->form->model($record);
        $this->data = $data;
        $this->record = $record;
    }

    /**
<<<<<<< HEAD
=======
     * Ottiene il modello per il form.
     * Se viene fornito un userId, carica quell'utente, altrimenti usa l'utente autenticato.
     */
    #[\Override]
    protected function getFormModel(?int $userId = null): Model
    {
        Assert::string($this->model);
        Assert::classExists($this->model);
        /** @var class-string<Model> $modelClass */
        $modelClass = $this->model;

        if ($userId) {
            $user = $modelClass::findOrFail($userId);
            Assert::isInstanceOf($user, Model::class);

            return $user;
        }

        // Se non è specificato un userId, usa l'utente correntemente autenticato
        $currentUser = Auth::user();
        if ($currentUser && $currentUser instanceof $modelClass) {
            return $currentUser;
        }

        // Fallback: cerca un utente del tipo corretto associato all'utente autenticato
        if ($currentUser) {
            $user = $modelClass::where('user_id', $currentUser->id)->first();
            if (null !== $user) {
                Assert::isInstanceOf($user, Model::class);

                return $user;
            }
        }

        // Ultimo fallback: nuovo modello
        $newModel = app($modelClass);
        Assert::isInstanceOf($newModel, Model::class);

        return $newModel;
    }

    /**
>>>>>>> laraxot/develop
     * Ottiene i dati per il riempimento del form.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
    public function getFormFill(): array
    {
        $model = $this->record;
        // Se il modello ha un ID, significa che è stato trovato nel database
        if ($model->exists) {
            try {
                /** @var array<string, mixed> $result */
                $result = $model->toArray();

                return $result;
            } catch (Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                Log::warning("Errore in toArray() per modello {$this->model}: ".$e->getMessage());

                /** @var array<string, mixed> $result */
                $result = $model->getAttributes();
                // Gestisci specificamente gli enum se presenti
<<<<<<< HEAD
                if (isset($result['type']) && ($model->type ?? null) instanceof BackedEnum) {
=======
                if (isset($result['type']) && ($model->type ?? null) instanceof \BackedEnum) {
>>>>>>> 220cf97b (.)
                    $result['type'] = $model->type->value;
                }

                return $result;
            }
        }
        // Se è un nuovo modello, restituisci solo i campi fillable con valori null
        $fillable = $model->getFillable();
        $appends = $model->getAppends();
        $fields = array_merge($fillable, $appends);

        /** @var array<string, mixed> */
=======
    #[\Override]
    public function getFormFill(): array
    {
        $model = $this->record ?: $this->getFormModel();

        // Se il modello ha un ID, significa che è stato trovato nel database
        if ($model->exists) {
            try {
                $array = $model->toArray();
                Assert::isArray($array);

                /* @var array<string, mixed> $array */
                return $array;
            } catch (\Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                Log::warning("Errore in toArray() per modello {$this->model}: ".$e->getMessage());
                $attributes = $model->getAttributes();
                Assert::isArray($attributes);
                /** @var array<string, mixed> $attributes */

                // Gestisci specificamente gli enum se presenti
                if (isset($attributes['type']) && ($model->type ?? null) instanceof \BackedEnum) {
                    $attributes['type'] = $model->type->value;
                }

                return $attributes;
            }
        }

        // Se è un nuovo modello, restituisci solo i campi fillable con valori null
        $fillable = $model->getFillable();
        $appends = $model->getAppends();
        Assert::isArray($fillable);
        Assert::isArray($appends);
        /** @var array<int, string> $fields */
        $fields = array_merge($fillable, $appends);

        /** @var array<string, mixed> $result */
>>>>>>> laraxot/develop
        $result = array_fill_keys($fields, null);

        return $result;
    }

    /**
     * Ottiene lo schema del form dalla resource.
     *
     * @return array<int|string, Component>
     */
<<<<<<< HEAD
    public function getFormSchema(): array
    {
        $schema = $this->resource::getFormSchemaWidget();
        Assert::isArray($schema, 'Schema must be array');

        /** @var array<int|string, Component> $result */
        $result = $schema;

        return $result;
=======
    #[\Override]
    public function getFormSchema(): array
    {
        Assert::classExists($this->resource);
        $schema = $this->resource::getFormSchemaWidget();
        Assert::isArray($schema);
        /* @var array<int|string, Component> $schema */

        return $schema;
>>>>>>> laraxot/develop
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
=======
        // Delega l'aggiornamento all'action specifica
        Assert::string($this->action);
        Assert::classExists($this->action);
        $actionInstance = app($this->action);
        if (! \is_object($actionInstance)) {
            throw new \RuntimeException('Action instance must be an object');
        }
        if (! method_exists($actionInstance, 'execute')) {
            throw new \RuntimeException('Action instance must have execute method');
        }
        /** @var callable $execute */
        $execute = [$actionInstance, 'execute'];
        $user = $execute($record, $data);
        Assert::isInstanceOf($user, Model::class);

        // Notifica successo
        session()->flash('message', __('user::profile.update_success'));

        // Aggiorna il form con i nuovi dati
        $this->form->fill($this->getFormFill());

>>>>>>> laraxot/develop
        return redirect()->back();
    }

    /**
     * Controlla se l'utente può modificare il record corrente.
     */
    public function canEdit(): bool
    {
        $currentUser = Auth::user();

<<<<<<< HEAD
        return $currentUser
            && (($currentUser->id ?? null) !== null
                        && ($this->record->id ?? null) !== null
                        && $currentUser->id === $this->record->id
                    || ($currentUser->id ?? null) !== null && $currentUser->id === ($this->record->user_id ?? null));
    }

    /**
     * Ottiene il modello per il form.
     * Se viene fornito un userId, carica quell'utente, altrimenti usa l'utente autenticato.
     */
    protected function getFormModel(?string $userId = null): Model
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = $this->model;
        if ($userId) {
            /** @var Model $user */
            $user = $this->model::findOrFail($userId);

            return $user;
        }

        // Se non è specificato un userId, usa l'utente correntemente autenticato
        $currentUser = Auth::user();
        if ($currentUser && \is_string($this->model) && $currentUser instanceof $this->model) {
            /** @var Model $user */
            $user = $currentUser;

            return $user;
        }

        // Fallback: cerca un utente del tipo corretto associato all'utente autenticato
        if ($currentUser && \is_string($this->model)) {
            $query = $this->model::where('user_id', $currentUser->id);

            if (\is_object($query) && method_exists($query, 'first')) {
                $user = $query->first();

                if ($user instanceof Model) {
                    /* @var Model $user */
                    return $user;
                }
            }
        }

        // Ultimo fallback: nuovo modello
        /** @var Model $user */
        $user = app($this->model);

        return $user;
=======
        // L'utente può modificare solo il proprio profilo
        return
            $currentUser
            && (
                ($currentUser->id ?? null) !== null
                        && ($this->record->id ?? null) !== null
                        && $currentUser->id === $this->record->id
                    || ($currentUser->id ?? null) !== null && $currentUser->id === ($this->record->user_id ?? null)
            )
        ;
>>>>>>> laraxot/develop
    }
}
