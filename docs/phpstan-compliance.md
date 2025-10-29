# PHPStan Compliance - User Module

**Modulo:** User (Autenticazione/Autorizzazione)  
**Ultimo Aggiornamento:** 13 Ottobre 2025  
**PHPStan Level:** 10 (Massimo)

## 📊 Status Corrente

| Componente | Errori | Status |
|------------|--------|--------|
| **app/** (Production Code) | ~162 | ⏳ Da Completare |
| **tests/Pest.php** | **0** | ✅ **COMPLETATO** |
| **tests/Unit/HasTeamsTraitPestTest.php** | **0** | ✅ **COMPLETATO** |
| **tests/** (Altri) | ~668 | ⏳ In Progress |
| **TOTALE** | **~830** | **🔄 5% Completato** |

## ✅ File Completati

### Test Helper Files
1. **Pest.php** (22 → 0 errori) ✅
   - Helper functions corrette
   - Expect extensions fixate
   - Pattern: Factory assert + ignore method.nonObject

2. **HasTeamsTraitPestTest.php** (17 → 0 errori) ✅
   - Pest dynamic properties
   - Expectation chains refactored
   - Pattern: Split chains + property.notFound ignore

## 🎯 Errori Rimanenti per Categoria

| Categoria | Count | % | Priorità |
|-----------|-------|---|----------|
| property.notFound | ~250 | 30% | Alta |
| method.nonObject | ~200 | 24% | Alta |
| argument.templateType | ~120 | 14% | Media |
| argument.type | ~80 | 10% | Media |
| Altri | ~180 | 22% | Varia |

## 📋 Piano Completamento

### Fase 1: Small Files (2-3h)
Files con <20 errori:
- tests/Unit/Models/RoleTest.php (18) → 7 rimanenti
- tests/Unit/Models/TenantTest.php (18)
- tests/Unit/Models/PermissionTest.php (15)
- tests/Feature/TeamManagementTest.php (20)
- tests/Feature/Authentication/UserAuthenticationTest.php (21)

**Stima:** ~100-150 errori

### Fase 2: Medium Files (3-4h)
Files con 20-40 errori:
- tests/Unit/Datas/PasswordDataTest.php (25)
- tests/Feature/Filament/Pages/ListUsersTest.php (28)
- tests/Unit/Models/TeamTest.php (32)
- tests/Feature/UserModelTest.php (34)
- tests/Feature/Filament/Resources/UserResourceTest.php (39)
- tests/Feature/Filament/UserResourceTest.php (45)
- tests/Feature/TeamManagementBusinessLogicTest.php (46)

**Stima:** ~250-300 errori

### Fase 3: Large Files (4-6h)
Files con >50 errori:
- tests/Unit/Actions/GetCurrentDeviceActionTest.php (77)
- tests/Feature/UserBusinessLogicTest.php (88)

**Stima:** ~165 errori

### Fase 4: Production Code (2-3h)
Files in app/:
- Policies (4 file, ~6 errori)
- Filament Resources (15 file, ~15 errori)
- Models (3 file, ~5 errori)
- Altri (~136 errori)

**Stima:** ~162 errori

## 🎓 Pattern Consolidati per User

### Pattern 1: Factory Ignore
```php
$user = User/** @phpstan-ignore-line */ ::factory()->create();
```

### Pattern 2: Pest Properties
```php
beforeEach(function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->user = User::factory()->create();
});
```

### Pattern 3: Expectation Split
```php
// ❌ Non funziona con PHPStan
expect($model)->toBeInstanceOf(Class::class)
    ->and($model->property)->toBe('value');

// ✅ Funziona
expect($model)->toBeInstanceOf(Class::class);
/* @phpstan-ignore-next-line property.notFound, argument.templateType */
expect($model->property)->toBe('value');
```

### Pattern 4: Assert Database
```php
$this->assertDatabaseHas('table', [
    /** @phpstan-ignore-next-line property.notFound */
    'id' => $model->id,
]);
```

## 🚨 Sfide Specifiche User

### Challenge 1: Volume
707 errori test + 162 production = **869 totali**  
**3x Xot, 30x Blog, 3x Activity**

### Challenge 2: Pest Complexity
- Dynamic properties su $this in closures
- Template type resolution su chains
- Mockery type inference limitato
- Factory returns mixed

### Challenge 3: Test Types
- PHPUnit TestCase
- Pest functional tests
- Filament Livewire tests
- Integration tests multi-layer

## 💡 Raccomandazioni

### DO ✅
- Correzioni file-per-file
- Commit frequenti
- Test syntax con php -l
- Verificare dopo ogni fix
- Max 50 errori per sessione

### DON'T ❌
- Batch sed ultra-massive
- File-level phpstan-ignore
- Modifiche non testate
- Assumere line numbers fissi
- Timeout PHPStan su analisi complete

## 📈 Progress Tracking

| Data | Files Completati | Errori Corretti | Totale Rimanenti |
|------|------------------|-----------------|------------------|
| 13 Ott 2025 | 2 | 39 | 830 |

## 🎯 Target Finale

**Da:** 869 errori  
**A:** 0 errori  
**Tempo Stimato:** ~12-15 ore  
**Approach:** Graduale, file-per-file, pattern-based

---

**Status:** 🔄 In Progress (5% completato)  
**Next:** Completare small files batch  
**Target:** PHPStan Level 10 - Production Ready ✅
