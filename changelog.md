# Changelog

Tutte le modifiche notevoli a questo modulo saranno documentate in questo file.

Il formato è basato su [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
e questo progetto aderisce al [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Fixed
- **Architettura Modelli: Correzione Ereditarietà Classi Base (15 Ottobre 2025)**
  - `Tenant.php`: Ora estende `BaseModel` invece di `Model`
  - `TeamUser.php`: Ora estende `BasePivot` invece di `Model`
  - `SsoProvider.php`: Ora estende `BaseModel` invece di `Model`
  - `TeamInvitation.php`: Ora estende `BaseModel` invece di `Model`
  - `TeamPermission.php`: Ora estende `BasePivot` invece di `Model`
  - `Authentication.php`: Cleanup import, confermata estensione `BaseModel`
  - Rimosso proprietà ridondante `$connection = 'user'` (automatica da BaseModel)
  - Rimossi traits ridondanti già presenti in BaseModel (HasFactory, Updater)
  - **Benefici:** ~50 righe duplicate eliminate, gerarchia consistente
  - **Docs:** `docs/models/base-classes-hierarchy.md`, `docs/fixes/base-classes-corrections-2025-10-15.md`
- Rimosso il modificatore `static` dal metodo `getTableColumns()` in `TeamsRelationManager` per risolvere l'errore di compatibilità con Filament
- Aggiornata la documentazione degli errori comuni di Filament
- Aggiunta checklist per la correzione degli errori nei RelationManager
- Rimosso il modificatore `static` dal metodo `getFormSchema()` in `LoginWidget` per risolvere l'errore di compatibilità con Filament
- Aggiornata la documentazione degli errori comuni di Filament
- Aggiunta checklist per la correzione degli errori nei Widget

### Added
- Nuova documentazione dettagliata sugli errori comuni di Filament nel modulo
- Esempi di implementazione corretta per i RelationManager
- Checklist per la verifica delle correzioni
- Esempi di implementazione corretta per i Widget
- Checklist per la verifica delle correzioni

### Changed
- Migliorata la struttura della documentazione Filament
- Aggiornate le best practices per i metodi di RelationManager
- Aggiunte note sulla verifica del codice e la manutenibilità
- Migliorata la struttura della documentazione Filament
- Aggiornate le best practices per i metodi di Widget
- Aggiunte note sulla verifica del codice e la manutenibilità

## [1.0.0] - 2024-03-XX

### Added
- Implementazione iniziale del modulo User
- Risorse Filament per User e Team
- Gestione delle relazioni tra User e Team
- Documentazione base del modulo
- Widget per il login e la registrazione
- Gestione delle autenticazioni
- Documentazione base del modulo 