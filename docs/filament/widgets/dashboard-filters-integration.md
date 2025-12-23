# Dashboard Filters Integration per Widget Filament

## Problema Risolto
<<<<<<< HEAD

### Descrizione del Bug
Il widget `UserTypeRegistrationsChartWidget` non riceveva correttamente i filtri dalla Dashboard, causando errori di accesso a `$this->filters` che risultava `null` nel metodo `getData()`.

=======
### Descrizione del Bug
Il widget `UserTypeRegistrationsChartWidget` non riceveva correttamente i filtri dalla Dashboard, causando errori di accesso a `$this->filters` che risultava `null` nel metodo `getData()`.
>>>>>>> laraxot/develop
### Causa Tecnica
- **Dashboard**: Estende `XotBaseDashboard` che usa il trait `HasFiltersForm`
- **Widget**: Estende `XotBaseChartWidget` che usa il trait `InteractsWithPageFilters`
- **Problema**: La propagazione automatica dei filtri tra Dashboard e Widget non funzionava correttamente
<<<<<<< HEAD

=======
>>>>>>> laraxot/develop
### Sintomi
```php
// Nel metodo getData() del widget
$startDate = $this->filters['startDate']; // ❌ $this->filters era null
$endDate = $this->filters['endDate'];     // ❌ Causava errori PHP
```
<<<<<<< HEAD

## Soluzione Implementata

### Pattern di Accesso Sicuro ai Filtri
```php
=======
## Soluzione Implementata
### Pattern di Accesso Sicuro ai Filtri
>>>>>>> laraxot/develop
protected function getData(): array
{
    // Accesso sicuro ai filtri della pagina con fallback appropriati
    $startDate = null;
    $endDate = null;
    
    // Verifica se i filtri sono disponibili e validi
    if (is_array($this->filters) && !empty($this->filters)) {
        $startDate = !empty($this->filters['startDate']) ? 
            Carbon::parse($this->filters['startDate']) : null;
        $endDate = !empty($this->filters['endDate']) ? 
            Carbon::parse($this->filters['endDate']) : null;
    }
<<<<<<< HEAD
    
    // Fallback ai valori di default se i filtri non sono disponibili
    if ($startDate === null) {
        $startDate = now()->subDays(30);
    }
    if ($endDate === null) {
        $endDate = now();
    }
    
    // Resto della logica...
}
```

=======
    // Fallback ai valori di default se i filtri non sono disponibili
    if ($startDate === null) {
        $startDate = now()->subDays(30);
    if ($endDate === null) {
        $endDate = now();
    // Resto della logica...
}
>>>>>>> laraxot/develop
### Vantaggi della Soluzione
1. **Robustezza**: Gestisce correttamente i casi in cui `$this->filters` è `null` o vuoto
2. **Fallback Intelligenti**: Usa valori di default sensati quando i filtri non sono disponibili
3. **Compatibilità**: Funziona sia con filtri presenti che assenti
4. **Sicurezza**: Evita errori PHP per accesso a proprietà null
<<<<<<< HEAD

## Best Practices per Widget con Filtri

### ✅ Pattern Corretto
```php
// Sempre verificare l'esistenza dei filtri prima dell'accesso
if (is_array($this->filters) && !empty($this->filters)) {
    $filterValue = $this->filters['key'] ?? null;
}

// Usare fallback appropriati
$startDate = $filterValue ? Carbon::parse($filterValue) : now()->subDays(30);
```

### ❌ Anti-Pattern da Evitare
```php
// Mai accedere direttamente ai filtri senza controlli
$startDate = $this->filters['startDate']; // Può causare errori

// Mai assumere che i filtri siano sempre presenti
$endDate = Carbon::parse($this->filters['endDate']); // Pericoloso
```

## Architettura dei Filtri Dashboard-Widget

### Flusso di Propagazione
```
=======
## Best Practices per Widget con Filtri
### ✅ Pattern Corretto
// Sempre verificare l'esistenza dei filtri prima dell'accesso
if (is_array($this->filters) && !empty($this->filters)) {
    $filterValue = $this->filters['key'] ?? null;
// Usare fallback appropriati
$startDate = $filterValue ? Carbon::parse($filterValue) : now()->subDays(30);
### ❌ Anti-Pattern da Evitare
// Mai accedere direttamente ai filtri senza controlli
$startDate = $this->filters['startDate']; // Può causare errori
// Mai assumere che i filtri siano sempre presenti
$endDate = Carbon::parse($this->filters['endDate']); // Pericoloso
## Architettura dei Filtri Dashboard-Widget
### Flusso di Propagazione
>>>>>>> laraxot/develop
Dashboard (HasFiltersForm)
    ↓ (form filters)
    ↓ 
Widget (InteractsWithPageFilters)
    ↓ ($this->filters)
    ↓
getData() method
<<<<<<< HEAD
```

### Trait Coinvolti
- **HasFiltersForm**: Gestisce il form dei filtri nella Dashboard
- **InteractsWithPageFilters**: Permette ai widget di accedere ai filtri della pagina

### Configurazione Dashboard
```php
// In Dashboard.php
public function getFiltersFormSchema(): array
{
=======
### Trait Coinvolti
- **HasFiltersForm**: Gestisce il form dei filtri nella Dashboard
- **InteractsWithPageFilters**: Permette ai widget di accedere ai filtri della pagina
### Configurazione Dashboard
// In Dashboard.php
public function getFiltersFormSchema(): array
>>>>>>> laraxot/develop
    return [
        DatePicker::make('startDate')
            ->maxDate(fn (Get $get) => $get('endDate') ?: now()),
        DatePicker::make('endDate')
            ->minDate(fn (Get $get) => $get('startDate') ?: now())
            ->maxDate(now()),
    ];
<<<<<<< HEAD
}
```

## Testing e Validazione

=======
## Testing e Validazione
>>>>>>> laraxot/develop
### Test Cases da Verificare
1. **Con Filtri Presenti**: Widget riceve e usa correttamente i filtri
2. **Senza Filtri**: Widget usa i fallback di default
3. **Filtri Parziali**: Widget gestisce filtri incompleti
4. **Filtri Invalidi**: Widget ignora valori non validi e usa fallback
<<<<<<< HEAD

### Debug dei Filtri
```php
// Per debug, aggiungere nel metodo getData()
$filters = $this->getFilters();
\Log::info('Widget filters:', ['filters' => $filters]);
```

## Problema Aggiuntivo Risolto: Parametri Widget

### Descrizione del Bug
Il widget `UserTypeRegistrationsChartWidget` non riusciva ad accedere ai parametri passati tramite `make(['model' => Patient::class])`.

### Causa Tecnica
Il widget aveva una proprietà `public string $model;` ma non aveva un metodo per inizializzarla con i parametri passati tramite `make()`.

### Soluzione Implementata
```php
=======
### Debug dei Filtri
// Per debug, aggiungere nel metodo getData()
$filters = $this->getFilters();
\Log::info('Widget filters:', ['filters' => $filters]);
## Problema Aggiuntivo Risolto: Parametri Widget
Il widget `UserTypeRegistrationsChartWidget` non riusciva ad accedere ai parametri passati tramite `make(['model' => Patient::class])`.
Il widget aveva una proprietà `public string $model;` ma non aveva un metodo per inizializzarla con i parametri passati tramite `make()`.
### Soluzione Implementata
>>>>>>> laraxot/develop
/**
 * Inizializza il widget con i parametri passati tramite make().
 *
 * @param array<string, mixed> $parameters
 */
public function mount(array $parameters = []): void
<<<<<<< HEAD
{
    parent::mount();
    
    // Inizializza la proprietà model dai parametri
    $this->model = $parameters['model'] ?? Patient::class;
}
```

### Utilizzo Corretto
```php
// In Dashboard.php
protected function getFooterWidgets(): array
{
    return [
        UserTypeRegistrationsChartWidget::make(['model' => Patient::class]),
        UserTypeRegistrationsChartWidget::make(['model' => Doctor::class]),
        UserTypeRegistrationsChartWidget::make(['model' => Admin::class]),
    ];
}
```

### Vantaggi della Soluzione
=======
    parent::mount();
    // Inizializza la proprietà model dai parametri
    $this->model = $parameters['model'] ?? Patient::class;
### Utilizzo Corretto
protected function getFooterWidgets(): array
        UserTypeRegistrationsChartWidget::make(['model' => Patient::class]),
        UserTypeRegistrationsChartWidget::make(['model' => Doctor::class]),
        UserTypeRegistrationsChartWidget::make(['model' => Admin::class]),
>>>>>>> laraxot/develop
1. **Flessibilità**: Il widget può essere riutilizzato con modelli diversi
2. **Robustezza**: Fallback appropriato se il parametro non è fornito
3. **Compatibilità**: Mantiene la compatibilità con l'API esistente
4. **Documentazione**: PHPDoc completo per i parametri
<<<<<<< HEAD

## Checklist Completa per Widget con Filtri e Parametri

=======
## Checklist Completa per Widget con Filtri e Parametri
>>>>>>> laraxot/develop
### ✅ Implementazione Corretta
- [ ] Widget estende `XotBaseChartWidget`
- [ ] Widget usa il trait `InteractsWithPageFilters`
- [ ] Metodo `getData()` verifica l'esistenza dei filtri
- [ ] Fallback appropriati per valori mancanti
- [ ] Metodo `mount()` gestisce i parametri
- [ ] Proprietà pubbliche inizializzate correttamente
- [ ] Error handling senza logging inutile
<<<<<<< HEAD

=======
>>>>>>> laraxot/develop
### ✅ Dashboard Configurata
- [ ] Dashboard estende `XotBaseDashboard`
- [ ] Metodo `getFiltersFormSchema()` implementato
- [ ] Widget istanziati con parametri corretti
- [ ] Vista Blade non commentata
<<<<<<< HEAD

=======
>>>>>>> laraxot/develop
### ✅ Testing
- [ ] Widget funziona con filtri presenti
- [ ] Widget funziona senza filtri
- [ ] Widget funziona con parametri diversi
- [ ] Fallback appropriati attivati
<<<<<<< HEAD

## Riferimenti e Collegamenti

### Documentazione Correlata
- [Modules/User/docs/best-practices/filament-widgets.md](../best-practices/filament-widgets.md)
- [Modules/Xot/docs/filament/widgets/base-chart-widget.md](../../../Xot/docs/filament/widgets/base-chart-widget.md)
- [Modules/<nome modulo>/docs/dashboard-implementation.md](../../../<nome modulo>/docs/dashboard-implementation.md)

### Widget Correlati
- `UsersChartWidget`: Esempio di implementazione corretta dei filtri
- Altri widget che estendono `XotBaseChartWidget`

## Note di Implementazione

=======
## Riferimenti e Collegamenti
### Documentazione Correlata
- [Modules/User/docs/best-practices/filament-widgets.md](../best-practices/filament-widgets.md)
- [Modules/Xot/docs/filament/widgets/base-chart-widget.md](../../../Xot/docs/filament/widgets/base-chart-widget.md)
- [Modules/SaluteMo/docs/dashboard-implementation.md](../../../SaluteMo/docs/dashboard-implementation.md)
- [Modules/User/project_docs/best-practices/filament-widgets.md](../best-practices/filament-widgets.md)
- [Modules/Xot/project_docs/filament/widgets/base-chart-widget.md](../../../Xot/project_docs/filament/widgets/base-chart-widget.md)
- [Modules/SaluteMo/project_docs/dashboard-implementation.md](../../../SaluteMo/project_docs/dashboard-implementation.md)
### Widget Correlati
- `UsersChartWidget`: Esempio di implementazione corretta dei filtri
- Altri widget che estendono `XotBaseChartWidget`
## Note di Implementazione
>>>>>>> laraxot/develop
### Considerazioni Future
- Valutare l'implementazione di un helper method in `XotBaseChartWidget` per standardizzare l'accesso ai filtri
- Documentare pattern comuni per altri widget che necessitano di filtri
- Considerare l'aggiunta di validazione automatica dei filtri
<<<<<<< HEAD

=======
>>>>>>> laraxot/develop
### Memoria Storica
- **Data Correzione**: 2025-01-27
- **Problema**: Widget non riceveva filtri Dashboard
- **Soluzione**: Accesso sicuro con fallback appropriati
- **Impatto**: Risolto per tutti i widget che usano lo stesso pattern
<<<<<<< HEAD

=======
>>>>>>> laraxot/develop
*Ultimo aggiornamento: Gennaio 2025*
