# User Module - PHPStan Level 10 Errors Resolution Roadmap

## 📊 Stato Attuale

**Data Analisi**: Gennaio 2025  
**PHPStan Level**: 10  
**Totale Errori**: 339 errori in 97 file  
**Comando**: `./vendor/bin/phpstan analyse Modules/User --level=10`

## 🎯 Obiettivo

Ridurre gli errori PHPStan a **0** mantenendo la funzionalità esistente e rispettando i principi DRY + KISS.

## 📈 Distribuzione Errori per Tipo

1. **argument.type**: 135 errori (39.8%) - Problemi con tipi degli argomenti
2. **staticMethod.notFound**: 50 errori (14.7%) - Metodi statici non trovati
3. **method.nonObject**: 43 errori (12.7%) - Chiamate a metodi su mixed
4. **method.notFound**: 32 errori (9.4%) - Metodi non trovati
5. **return.type**: 26 errori (7.7%) - Problemi con tipi di ritorno
6. **Altri**: 53 errori (15.6%)

## 🔍 Top 15 File con Più Errori

1. `RegisterWidget.php` - 18 errori
2. `DeviceResource.php` - 15 errori
3. `Login.php` - 14 errori
4. `PasswordExpired.php` - 13 errori
5. `Register.php` - 12 errori
6. `OtherDeviceLogoutListener.php` - 10 errori
7. `LogoutUserAction.php` - 9 errori
8. `PasswordResetConfirmWidget.php` - 7 errori
9. `GetCurrentDeviceAction.php` - 6 errori
10. `CreateTeamCommand.php` - 6 errori
11. `CreateTenantCommand.php` - 6 errori
12. `Change.php` - 6 errori
13. `UserMassSeeder.php` - 6 errori
14. `GetUserTeamsOptionAction.php` - 5 errori
15. `ShowTenantListCommand.php` - 5 errori

## 🎯 Pattern di Errori Identificati

### Pattern 1: Problemi con Tipi degli Argomenti (135 errori - 39.8%)

**Problema**: Argomenti di tipo `array|string|null` passati dove è richiesto `string` o tipi specifici.

**Causa**: 
- Traduzioni che possono restituire array o string
- Configurazioni Filament che accettano array ma richiedono string
- Parametri opzionali che possono essere null

**Soluzione**:
- Usare `SafeStringCastAction` per le traduzioni
- Aggiungere type casting esplicito con `(string)` o `strval()`
- Verificare null safety prima di passare argomenti
- Usare union types appropriati nei type hints

**File più interessati**:
- `RegisterWidget.php` - Widget di registrazione
- `DeviceResource.php` - Resource Filament
- `Login.php` - Componente login
- `PasswordExpired.php` - Widget password scaduta

### Pattern 2: Metodi Statici Non Riconosciuti (50 errori - 14.7%)

**Problema**: PHPStan non riconosce metodi statici come `User::where()`, `Device::find()`, ecc.

**Causa**: 
- Modelli che non estendono correttamente `Illuminate\Database\Eloquent\Model`
- Mancanza di `@mixin \Eloquent` nei PHPDoc
- Configurazione Larastan non corretta

**Soluzione**:
- Verificare che tutti i modelli estendano `Model` o `BaseUser`
- Aggiungere `@mixin \Eloquent` nei PHPDoc dei modelli
- Verificare configurazione Larastan in `phpstan.neon`
- Aggiungere type hints espliciti per i risultati delle query

**Esempio**:
```php
// ❌ PRIMA
$user = User::where('email', $email)->first();
$user->update(['name' => $name]); // staticMethod.notFound

// ✅ DOPO
/** @var User|null $user */
$user = User::where('email', $email)->first();
if ($user !== null) {
    $user->update(['name' => $name]);
}
```

### Pattern 3: Chiamate a Metodi su Mixed (43 errori - 12.7%)

**Problema**: Metodi chiamati su variabili di tipo `mixed`.

**Causa**: 
- Query builder che restituiscono `mixed` invece di tipi specifici
- Variabili senza type hints
- Risultati di metodi che restituiscono `mixed`

**Soluzione**:
- Aggiungere type hints espliciti ai risultati delle query
- Usare `@var` annotations per specificare i tipi
- Implementare type casting appropriato
- Verificare null safety prima di chiamare metodi

### Pattern 4: Metodi Non Trovati (32 errori - 9.4%)

**Problema**: Metodi chiamati su oggetti che PHPStan non riconosce.

**Causa**: 
- Metodi definiti in trait non riconosciuti
- Metodi dinamici non documentati
- Metodi su classi base non estese correttamente

**Soluzione**:
- Aggiungere `@method` annotations nei PHPDoc
- Verificare che i trait siano importati correttamente
- Aggiungere type hints per i metodi dinamici
- Verificare estensioni delle classi base

### Pattern 5: Problemi con Tipi di Ritorno (26 errori - 7.7%)

**Problema**: Metodi che dovrebbero restituire un tipo specifico ma restituiscono `mixed` o tipi più ampi.

**Causa**: 
- Metodi senza return type hints
- Closure anonime senza type hints
- Query builder che restituiscono tipi generici

**Soluzione**:
- Aggiungere return type hints espliciti
- Usare type casting per i risultati delle query
- Verificare che i metodi restituiscano sempre il tipo atteso

## 🗺️ Roadmap di Risoluzione

### Fase 1: Fix Widgets Critici (Priorità Alta)

**Obiettivo**: Risolvere errori nei widget più utilizzati.

**Task**:
1. `RegisterWidget.php` (18 errori)
   - Fix tipi degli argomenti per traduzioni
   - Fix metodi statici non riconosciuti
   - Fix return types
2. `PasswordExpired.php` (13 errori)
   - Fix tipi degli argomenti
   - Fix metodi su mixed
3. `PasswordResetConfirmWidget.php` (7 errori)
   - Fix return types
   - Fix type hints

**Tempo stimato**: 4-6 ore

### Fase 2: Fix Componenti Auth (Priorità Alta)

**Obiettivo**: Risolvere errori nei componenti di autenticazione.

**Task**:
1. `Login.php` (14 errori)
2. `Register.php` (12 errori)
3. `OtherDeviceLogoutListener.php` (10 errori)

**Tempo stimato**: 3-4 ore

### Fase 3: Fix Resources Filament (Priorità Media)

**Obiettivo**: Risolvere errori nelle Resources Filament.

**Task**:
1. `DeviceResource.php` (15 errori)
2. Altri Resource con errori minori

**Tempo stimato**: 2-3 ore

### Fase 4: Fix Actions (Priorità Media)

**Obiettivo**: Risolvere errori nelle Actions.

**Task**:
1. `LogoutUserAction.php` (9 errori)
2. `GetCurrentDeviceAction.php` (6 errori)
3. `GetUserTeamsOptionAction.php` (5 errori)
4. Altri Actions con errori minori

**Tempo stimato**: 2-3 ore

### Fase 5: Fix Commands (Priorità Media)

**Obiettivo**: Risolvere errori nei Commands.

**Task**:
1. `CreateTeamCommand.php` (6 errori)
2. `CreateTenantCommand.php` (6 errori)
3. `ShowTenantListCommand.php` (5 errori)
4. Altri Commands con errori minori

**Tempo stimato**: 2-3 ore

### Fase 6: Fix Modelli Base (Priorità Media)

**Obiettivo**: Risolvere i problemi con i metodi statici non riconosciuti.

**Task**:
1. Verificare che `User`, `Device`, ecc. estendano correttamente `Model` o `BaseUser`
2. Aggiungere `@mixin \Eloquent` nei PHPDoc
3. Verificare configurazione Larastan
4. Aggiungere type hints espliciti

**Tempo stimato**: 2-3 ore

### Fase 7: Fix File Rimanenti (Priorità Bassa)

**Obiettivo**: Risolvere errori rimanenti.

**Task**:
1. `Change.php` (6 errori)
2. `UserMassSeeder.php` (6 errori)
3. Altri file con errori minori

**Tempo stimato**: 3-4 ore

### Fase 8: Verifica Finale e Testing

**Obiettivo**: Verificare che tutti gli errori siano risolti.

**Task**:
1. Eseguire PHPStan completo sul modulo
2. Verificare che non ci siano regressioni
3. Eseguire test funzionali
4. Aggiornare documentazione

**Tempo stimato**: 1-2 ore

## 📝 Best Practices da Applicare

1. **Sempre usare type hints espliciti** per parametri e return types
2. **Usare `@var` annotations** per variabili di tipo mixed
3. **Verificare null safety** prima di chiamare metodi su oggetti
4. **Usare `SafeStringCastAction`** per le traduzioni
5. **Aggiungere `@mixin \Eloquent`** nei modelli
6. **Testare dopo ogni fix** per evitare regressioni
7. **Usare union types** quando appropriato (`string|null`, `array|string`, ecc.)

## 🔗 Collegamenti Correlati

- [PHPStan Errors Roadmap](./phpstan-errors-roadmap.md) - Roadmap precedente (datata)
- [Xot PHPStan Patterns](../../Xot/docs/phpstan-patterns-dec-2025.md)
- [Employee PHPStan Roadmap](../../Employee/docs/phpstan-level10-errors-analysis.md)

## ✅ Checklist di Verifica

Prima di considerare completata la risoluzione:

- [ ] Tutti i file elencati sono stati corretti
- [ ] PHPStan Level 10 passa senza errori
- [ ] Test funzionali passano
- [ ] Documentazione aggiornata
- [ ] Code review completata
- [ ] Verificato che non ci siano regressioni

---

*Roadmap creata il: Gennaio 2025*  
*Ultimo aggiornamento: Gennaio 2025*
