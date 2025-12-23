# EditUserWidget: Widget generico per la modifica dati utente

## Scopo e filosofia
<<<<<<< HEAD

=======
>>>>>>> laraxot/develop
Il widget `EditUserWidget` è progettato per essere **completamente generico e riutilizzabile** in qualsiasi progetto che utilizza il modulo User. È il complemento del `RegistrationWidget` per la modifica dei dati utente esistenti. Non contiene logica di dominio specifica (es. Doctor, Patient, ecc.), ma si limita a:
- raccogliere i dati dal form di modifica,
- determinare dinamicamente la risorsa, il modello e l'action da eseguire,
- delegare la logica di aggiornamento a una UpdateUserAction specifica del modulo che implementa il tipo di utente.
<<<<<<< HEAD

## Pattern di delega

=======
## Pattern di delega
>>>>>>> laraxot/develop
- Il widget riceve il tipo di utente (`$type`) e opzionalmente un `$userId` per identificare l'utente da modificare.
- Se non viene fornito un `$userId`, il widget assume che si stia modificando il profilo dell'utente correntemente autenticato.
- La proprietà `$action` viene costruita sostituendo `\Models\` con `\Actions\` e aggiungendo `\UpdateUserAction`.
- L'action viene invocata tramite `app($this->action)->execute($record, $data)`.
- **Non va mai inserita logica di business o riferimenti a tipi di utente specifici nel widget.**
<<<<<<< HEAD

## Utilizzo nel tema

Il widget è utilizzato nel tema tramite Livewire come mostrato nel template `profilo-odontoiatra.blade.php`:

```blade
@livewire(\Modules\User\Filament\Widgets\EditUserWidget::class, ['type' => $type])
```

Questo permette di integrare facilmente il form di modifica in qualsiasi pagina frontend.

## Controllo dei permessi

Il widget include un controllo di sicurezza tramite il metodo `canEdit()` che verifica:
- L'utente può modificare solo il proprio profilo
- O i record associati al proprio utente (tramite `user_id`)

Se l'utente non ha i permessi, viene mostrato un messaggio di errore invece del form.

## Esempio di estensione nei moduli

Ogni modulo che implementa un tipo di utente deve fornire la propria Action di aggiornamento, ad esempio:
- `Modules\<nome modulo>\Actions\Doctor\UpdateUserAction`
- `Modules\<nome modulo>\Actions\Patient\UpdateUserAction`
- `Modules\<nome progetto>\Actions\Doctor\UpdateUserAction`
- `Modules\<nome progetto>\Actions\Patient\UpdateUserAction`

=======
## Utilizzo nel tema
Il widget è utilizzato nel tema tramite Livewire come mostrato nel template `profilo-odontoiatra.blade.php`:
```blade
@livewire(\Modules\User\Filament\Widgets\EditUserWidget::class, ['type' => $type])
```
Questo permette di integrare facilmente il form di modifica in qualsiasi pagina frontend.
## Controllo dei permessi
Il widget include un controllo di sicurezza tramite il metodo `canEdit()` che verifica:
- L'utente può modificare solo il proprio profilo
- O i record associati al proprio utente (tramite `user_id`)
Se l'utente non ha i permessi, viene mostrato un messaggio di errore invece del form.
## Esempio di estensione nei moduli
Ogni modulo che implementa un tipo di utente deve fornire la propria Action di aggiornamento, ad esempio:
- `Modules\<nome modulo>\Actions\Doctor\UpdateUserAction`
- `Modules\<nome modulo>\Actions\Patient\UpdateUserAction`
- `Modules\SaluteOra\Actions\Doctor\UpdateUserAction`
- `Modules\SaluteOra\Actions\Patient\UpdateUserAction`
>>>>>>> laraxot/develop
Queste Action devono occuparsi di:
- Validare i dati ricevuti
- Aggiornare il modello corretto (Doctor, Patient, ...)
- Gestire eventuali relazioni o campi specifici
- Registrare log di audit se necessario
- Gestire eventuali notifiche
<<<<<<< HEAD

## Best Practice

=======
## Best Practice
>>>>>>> laraxot/develop
1. **Non inserire logica di business nel widget**: tutta la logica di aggiornamento e validazione va delegata alle Action specifiche.
2. **Implementare una UpdateUserAction per ogni tipo di utente**: seguendo la convenzione dei namespace.
3. **Utilizzare controlli di sicurezza**: sempre verificare i permessi prima di permettere la modifica.
4. **Gestire gli stati di errore**: fornire feedback chiaro all'utente in caso di problemi.
5. **Non citare mai tipi di utente o logiche di dominio nel modulo User**: mantenere la massima riusabilità.
<<<<<<< HEAD

## Struttura del widget

```php
namespace Modules\User\Filament\Widgets;

=======
## Struttura del widget
```php
namespace Modules\User\Filament\Widgets;
>>>>>>> laraxot/develop
class EditUserWidget extends XotBaseWidget
{
    public ?array $data = [];
    public string $type;
    public string $resource;
    public string $model;
    public string $action;
    public Model $record;
    
    protected static string $view = 'pub_theme::filament.widgets.edit-user';
<<<<<<< HEAD

=======
>>>>>>> laraxot/develop
    public function mount(string $type, ?int $userId = null): void
    {
        // Inizializzazione dinamica basata sul tipo
    }
<<<<<<< HEAD
    
    public function updateUser(): \Illuminate\Http\RedirectResponse
    {
        // Delegazione all'action specifica
    }
    
    public function canEdit(): bool
    {
        // Controllo permessi
    }
}
```

## View template

Il template Blade utilizza i componenti Filament per mantenere la coerenza con l'interfaccia:

```blade
=======
    public function updateUser(): \Illuminate\Http\RedirectResponse
        // Delegazione all'action specifica
    public function canEdit(): bool
        // Controllo permessi
}
## View template
Il template Blade utilizza i componenti Filament per mantenere la coerenza con l'interfaccia:
>>>>>>> laraxot/develop
<x-filament-widgets::widget>
    <x-filament::section>
        @if($canEdit())
            <form wire:submit.prevent="updateUser">
                {{ $this->form }}
                <!-- Pulsanti Annulla/Salva -->
            </form>
        @else
            <!-- Messaggio di errore permessi -->
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
<<<<<<< HEAD
```

## Gestione degli errori

=======
## Gestione degli errori
>>>>>>> laraxot/develop
Il widget gestisce diversi scenari di errore:
- **Permessi insufficienti**: Mostra un messaggio esplicativo
- **Validazione fallita**: Gli errori vengono gestiti dall'action specifica
- **Utente non trovato**: Il widget usa l'utente autenticato come fallback
<<<<<<< HEAD

## Traduzioni

Tutte le etichette e i messaggi utilizzano il sistema di traduzioni di Laravel:

```php
=======
## Traduzioni
Tutte le etichette e i messaggi utilizzano il sistema di traduzioni di Laravel:
>>>>>>> laraxot/develop
// Esempi di chiavi di traduzione
__('user::profile.edit_profile_title')
__('user::profile.save_changes')
__('user::profile.update_success')
__('user::profile.no_permission')
<<<<<<< HEAD
```

## Collegamenti

=======
## Collegamenti
>>>>>>> laraxot/develop
- [EditUserWidget.php](../../app/Filament/Widgets/EditUserWidget.php)
- [UpdateUserAction.php](../../app/Actions/User/UpdateUserAction.php)
- [View Template](../../../../Themes/One/resources/views/filament/widgets/edit-user.blade.php)
- [Documentazione RegistrationWidget](./registration-widget.md)
- [Documentazione Xot sulla proprietà $data](../../../Xot/docs/filament/widgets/data-property.md)
<<<<<<< HEAD

## Esempi di implementazione specifica

### Action per Doctor
```php
namespace Modules\<nome modulo>\Actions\Doctor;
namespace Modules\<nome progetto>\Actions\Doctor;

class UpdateUserAction extends \Modules\User\Actions\User\UpdateUserAction
{
    protected function afterUpdate(Model $user, array $data): void
    {
        // Logica specifica per dottori
        // es. aggiornamento specializzazioni, studi, ecc.
    }
}
```

### Action per Patient
```php
namespace Modules\<nome modulo>\Actions\Patient;
namespace Modules\<nome progetto>\Actions\Patient;

class UpdateUserAction extends \Modules\User\Actions\User\UpdateUserAction
{
    protected function afterUpdate(Model $user, array $data): void
    {
        // Logica specifica per pazienti
        // es. aggiornamento dati medici, preferenze, ecc.
    }
}
```

---

**Nota:**
Se vuoi estendere la logica di aggiornamento per un nuovo tipo di utente, crea una nuova Action seguendo la convenzione e aggiorna la documentazione del modulo specifico. La documentazione generale delle regole e delle convenzioni si trova nel modulo Xot e va sempre collegata da qui.

*Ultimo aggiornamento: dicembre 2024* 
=======
- [Documentazione Xot sulla proprietà $data](../../../Xot/project_docs/filament/widgets/data-property.md)
## Esempi di implementazione specifica
### Action per Doctor
namespace Modules\<nome modulo>\Actions\Doctor;
namespace Modules\SaluteOra\Actions\Doctor;
class UpdateUserAction extends \Modules\User\Actions\User\UpdateUserAction
    protected function afterUpdate(Model $user, array $data): void
        // Logica specifica per dottori
        // es. aggiornamento specializzazioni, studi, ecc.
### Action per Patient
namespace Modules\<nome modulo>\Actions\Patient;
namespace Modules\SaluteOra\Actions\Patient;
        // Logica specifica per pazienti
        // es. aggiornamento dati medici, preferenze, ecc.
---
**Nota:**
Se vuoi estendere la logica di aggiornamento per un nuovo tipo di utente, crea una nuova Action seguendo la convenzione e aggiorna la documentazione del modulo specifico. La documentazione generale delle regole e delle convenzioni si trova nel modulo Xot e va sempre collegata da qui.
*Ultimo aggiornamento: dicembre 2024* 
>>>>>>> laraxot/develop
