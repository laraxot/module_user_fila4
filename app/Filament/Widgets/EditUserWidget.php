<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Schemas\Components\Component;
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
 * @property string $type
 * @property string $resource
 * @property string $model
 * @property string $action
 * @property Model $record
 * @property array|null $data
 */
class EditUserWidget extends XotBaseWidget
{
    /** @var array<string, mixed>|null */
    public ?array $data = [];

    /** @var array<string, int|null>|int|string */
    protected int|string|array $columnSpan = 'full';

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
        $this->model = (string) $this->resource::getModel();
        $this->action = Str::of($this->model)
            ->replace('\Models\\', '\Actions\\')
            ->append('\UpdateUserAction')
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
    #[\Override]
    protected function getFormModel(?int $userId = null): Model
    {
        if ($userId) {
            $user = $this->model::findOrFail($userId);
            Assert::isInstanceOf($user, Model::class);

            return $user;
        }

        // Se non è specificato un userId, usa l'utente correntemente autenticato
        $currentUser = Auth::user();
        if ($currentUser && $currentUser instanceof $this->model) {
            Assert::isInstanceOf($currentUser, Model::class);

            return $currentUser;
        }

        // Fallback: cerca un utente del tipo corretto associato all'utente autenticato
        if ($currentUser) {
            $query = $this->model::where('user_id', $currentUser->id);
            Assert::isInstanceOf($query, \Illuminate\Database\Eloquent\Builder::class);
            $user = $query->first();
            if ($user) {
                Assert::isInstanceOf($user, Model::class);

                return $user;
            }
        }

        // Ultimo fallback: nuovo modello
        $model = app($this->model);
        Assert::isInstanceOf($model, Model::class);

        return $model;
    }

    /**
     * Ottiene i dati per il riempimento del form.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    /**
     * @return array<string, mixed>
     */
    public function getFormFill(): array
    {
        $model = $this->record ?: $this->getFormModel();

        // Se il modello ha un ID, significa che è stato trovato nel database
        if ($model->exists) {
            try {
                $data = $model->toArray();
                Assert::isArray($data);

                /** @var array<string, mixed> $result */
                $result = $data;

                return $result;
            } catch (\Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                Log::warning("Errore in toArray() per modello {$this->model}: ".$e->getMessage());
                $attributes = $model->getAttributes();
                Assert::isArray($attributes);

                // Gestisci specificamente gli enum se presenti
                if (isset($attributes['type']) && ($model->type ?? null) instanceof \BackedEnum) {
                    $attributes['type'] = $model->type->value;
                }

                /** @var array<string, mixed> $attributesResult */
                $attributesResult = $attributes;

                return $attributesResult;
            }
        }

        // Se è un nuovo modello, restituisci solo i campi fillable con valori null
        $fillable = $model->getFillable();
        $appends = $model->getAppends();
        $fields = array_merge($fillable, $appends);
        $data = array_fill_keys($fields, null);
        Assert::isArray($data);

        /** @var array<string, mixed> $finalResult */
        $finalResult = $data;

        return $finalResult;
    }

    /**
     * Ottiene lo schema del form dalla resource.
     *
     * @return array<int|string, Component>
     */
    #[\Override]
    /**
     * @return array<string, mixed>
     */
    public function getFormSchema(): array
    {
        $schema = $this->resource::getFormSchemaWidget();
        Assert::isArray($schema);

        /** @var array<int|string, Component> $result */
        $result = $schema;

        return $result;
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
        $action = app($this->action);
        Assert::object($action);
        if (! method_exists($action, 'execute')) {
            throw new \RuntimeException('Action must have execute method');
        }
        $user = $action->execute($record, $data);

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
        return
            $currentUser
            && (
                ($currentUser->id ?? null) !== null
                        && ($this->record->id ?? null) !== null
                        && $currentUser->id === $this->record->id
                    || ($currentUser->id ?? null) !== null && $currentUser->id === ($this->record->user_id ?? null)
            );
    }
}
