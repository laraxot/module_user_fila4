<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> fbc8f8e (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> 6d20fbe (.)
use Exception;
use BackedEnum;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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
 *
<<<<<<< HEAD
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
=======
>>>>>>> 6d20fbe (.)
 * Segue il pattern di delegazione del RegistrationWidget:
 * - Raccoglie i dati dal form
 * - Determina dinamicamente la risorsa, il modello e l'action da eseguire
 * - Delega la logica di salvataggio a una UpdateAction specifica del modulo
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 *
=======
 * 
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 * 
>>>>>>> fbc8f8e (.)
=======
 *
 * Il widget è completamente generico e riutilizzabile per qualsiasi tipo di utente.
 *
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    public null|array $data = [];

    /** @var array<string, int|null>|int|string */
    protected int|string|array $columnSpan = 'full';

<<<<<<< HEAD
=======
    public ?array $data = [];
    
    /** @var array<string, int|null>|int|string */
    protected int | string | array $columnSpan = 'full';
    
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
     *
     * @param string $type
     * @param int|null $userId
     * @return void
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function mount(string $type, null|int $userId = null): void
=======
    public function mount(string $type, ?int $userId = null): void
>>>>>>> fbc8f8e (.)
=======
    public function mount(string $type, null|int $userId = null): void
>>>>>>> 6d20fbe (.)
    {
        $this->type = $type;
        $this->resource = XotData::make()->getUserResourceClassByType($type);
        $this->model = $this->resource::getModel();
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        $this->action = Str::of($this->model)
            ->replace('\Models\\', '\Actions\\')
            ->append('\UpdateUserAction')
            ->toString();

        $record = $this->getFormModel($userId);
        $data = $this->getFormFill();

<<<<<<< HEAD
=======
        $this->action = Str::of($this->model)->replace('\Models\\', '\Actions\\')->append('\UpdateUserAction')->toString();
        
        $record = $this->getFormModel($userId);
        $data = $this->getFormFill();
        
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
    #[Override]
    protected function getFormModel(null|int $userId = null): Model
=======
    protected function getFormModel(?int $userId = null): Model
>>>>>>> fbc8f8e (.)
=======
    #[Override]
    protected function getFormModel(null|int $userId = null): Model
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    #[Override]
    public function getFormFill(): array
    {
        $model = $this->record ?: $this->getFormModel();

<<<<<<< HEAD
=======
    public function getFormFill(): array
    {
        $model = $this->record ?? $this->getFormModel();
        
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        // Se il modello ha un ID, significa che è stato trovato nel database
        if ($model->exists) {
            try {
                return $model->toArray();
            } catch (Exception $e) {
                // Se toArray() fallisce (problemi con enum), usa getAttributes()
                Log::warning("Errore in toArray() per modello {$this->model}: " . $e->getMessage());
                $attributes = $model->getAttributes();
<<<<<<< HEAD
<<<<<<< HEAD

=======
                
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
                // Gestisci specificamente gli enum se presenti
                if (isset($attributes['type']) && ($model->type ?? null) instanceof BackedEnum) {
                    $attributes['type'] = $model->type->value;
                }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

                return $attributes;
            }
        }

<<<<<<< HEAD
=======
                
                return $attributes;
            }
        }
        
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        // Se è un nuovo modello, restituisci solo i campi fillable con valori null
        $fillable = $model->getFillable();
        $appends = $model->getAppends();
        $fields = array_merge($fillable, $appends);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        return array_fill_keys($fields, null);
    }

    /**
     * Ottiene lo schema del form dalla resource.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<int|string, Component>
     */
    #[Override]
=======
     * @return array<int|string, \Filament\Schemas\Components\Component>
     */
>>>>>>> fbc8f8e (.)
=======
     * @return array<int|string, Component>
     */
    #[Override]
>>>>>>> 6d20fbe (.)
    public function getFormSchema(): array
    {
        return $this->resource::getFormSchemaWidget();
    }

    /**
     * Gestisce il salvataggio delle modifiche delegando all'action specifica.
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

        // Delega l'aggiornamento all'action specifica
        $user = app($this->action)->execute($record, $data);

        // Notifica successo
        session()->flash('message', __('user::profile.update_success'));

        // Aggiorna il form con i nuovi dati
        $this->form->fill($this->getFormFill());

<<<<<<< HEAD
=======
       
        // Delega l'aggiornamento all'action specifica
        $user = app($this->action)->execute($record, $data);
        
        // Notifica successo
        session()->flash('message', __('user::profile.update_success'));
        
        // Aggiorna il form con i nuovi dati
        $this->form->fill($this->getFormFill());
        
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

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
        
        // L'utente può modificare solo il proprio profilo
        return $currentUser && (
            (($currentUser->id ?? null) !== null && ($this->record->id ?? null) !== null && $currentUser->id === $this->record->id) ||
            (($currentUser->id ?? null) !== null && $currentUser->id === ($this->record->user_id ?? null))
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        );
    }
}
