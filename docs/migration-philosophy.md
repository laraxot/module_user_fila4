# Laraxot Migration Philosophy

## Core Principle: One Migration Per Table Per Module

**🚨 CRITICAL RULE**: In the Laraxot architecture, we **NEVER** create multiple migration files for the same table within the same module.

### Why This Rule Exists

1. **Database Consistency**: Multiple migrations for the same table create confusion about the authoritative schema definition
2. **Migration Order Issues**: Different timestamps can cause unpredictable execution order in different environments
3. **Maintenance Complexity**: Multiple files for the same table make it difficult to track schema changes
4. **DRY Violation**: Duplicate migrations violate the "Don't Repeat Yourself" principle
5. **Single Source of Truth**: Each table should have exactly one authoritative migration file

### The Problem: Duplicate Roles Table Migrations

Currently, the User module contains **THREE** migration files for the `roles` table:

```
Modules/User/database/migrations/
├── 2023_01_01_000011_create_roles_table.php  ❌ DUPLICATE
├── 2023_01_01_000012_create_roles_table.php  ❌ DUPLICATE
└── 2024_01_01_000011_create_roles_table.php  ✅ AUTHORITATIVE
```

### Solution: Consolidate to Single Migration

1. **Identify the authoritative migration** - The most recent file (`2024_01_01_000011_create_roles_table.php`)
2. **Remove duplicates** - Delete the older migration files
3. **Update dependencies** - Ensure all references point to the authoritative file

### Migration Naming Convention

For each table, create exactly ONE migration following this pattern:

```
{YYYY_MM_DD_HHMMSS}_create_{table_name}_table.php
```

### When to Create New Migrations

- **New Table**: Create new migration file
- **Schema Changes**: Create new migration file (e.g., `add_column_to_table.php`)
- **Same Table**: NEVER create new `create_table` migration - modify existing one

### XotBaseMigration Benefits

The `XotBaseMigration` class provides:

- **Idempotent Operations**: `tableCreate()` and `tableUpdate()` methods handle existing tables gracefully
- **Auto-Discovery**: Automatically detects model class and connection from namespace
- **Safe Schema Changes**: Built-in checks for column existence before modification

### Best Practices

1. **One Table, One Migration**: Each table gets exactly one `create_table` migration
2. **Schema Evolution**: Use separate migration files for schema changes (add/remove columns)
3. **Consolidate Early**: If you discover duplicates, consolidate immediately
4. **Document Changes**: Use migration comments to explain schema evolution

### Example: Correct Migration Structure

```
Modules/User/database/migrations/
├── 2024_01_01_000001_create_users_table.php
├── 2024_01_01_000011_create_roles_table.php           # Single authoritative file
├── 2024_01_01_000021_create_permissions_table.php
├── 2024_06_15_143000_add_email_verified_to_users.php  # Schema change
└── 2024_07_20_092000_add_team_id_to_roles.php         # Schema change
```

### Violation Consequences

- **Database Inconsistency**: Different environments may apply migrations in different orders
- **Development Confusion**: Developers unsure which migration is authoritative
- **Deployment Risks**: Potential for migration conflicts during deployment
- **Maintenance Overhead**: Multiple files to track and update

### Migration Cleanup Process

1. Identify duplicate migration files
2. Determine the authoritative file (most complete/current)
3. Remove duplicate files
4. Update any model or configuration references
5. Test migration rollback and re-run

### Roles schema extensions (display_name, description)

Starting from **2025-09-18**, the `roles` table receives Laraxot-specific
extensions (`display_name`, `description`) while preserving Spatie
compatibility:

- **Authoritative create migration**: `2024_01_01_000011_create_roles_table.php`
  - Defines base schema: `id`, `team_id`, `name`, `guard_name`
  - Uses `XotBaseMigration::tableCreate()` + `tableUpdate()` with
    `updateTimestamps()`
- **Schema change migration**: `2025_09_18_000000_create_roles_table.php`
  - Despite the legacy filename, this file MUST behave as a **schema
    extension**, **not** as a second "create" migration
  - Extends `XotBaseMigration` and uses **only** `tableUpdate()` with
    `hasColumn()` checks to add:
    - `display_name` (nullable string)
    - `description` (nullable text)
- **NEVER** call `Schema::create('roles', ...)` directly in Laraxot modules:
  creation is always delegated to `XotBaseMigration::tableCreate()` in the
  authoritative migration.

This keeps the **single source of truth** for the table while allowing
evolution over time via idempotent schema-change migrations.

---

**Remember**: In Laraxot philosophy, simplicity and clarity trump
flexibility. One table, one authoritative *create* migration, and only
idempotent schema changes on top of it.

## Da migliorare (DRY + KISS)

- **Pulizia migrazioni roles storiche**  
  Il documento evidenzia i duplicati `2023_01_01_000011/12_create_roles_table.php` ma nel
  codice sono ancora presenti per ragioni di compatibilità storica.  
  *Da fare*: pianificare una cleanup controllata (anche solo in nuovi progetti) eliminando
  le migrazioni legacy, lasciando `2024_01_01_000011_create_roles_table.php` come unica
  create + la migrazione di estensione `2025_09_18_000000_create_roles_table.php`.

- **Estendere l'esempio anche a permissions e pivot Spatie**  
  La filosofia è descritta bene per `roles`, ma non è esplicitata per:
  `permissions`, `model_has_roles`, `model_has_permissions`, `role_has_permissions`.  
  *Da fare*: aggiungere una sezione che mostri la stessa logica (un'unica create autorevole,
  più migrazioni di estensione idempotenti) anche per queste tabelle.

- **Linee guida esplicite per migrazioni di schema-change**  
  Si consiglia di creare file come `add_column_to_table.php`, ma non sono riportati esempi
  XotBaseMigration-ready.  
  *Da fare*: aggiungere uno snippet standard che mostri l'uso di `tableUpdate()` + `hasColumn()`
  per aggiungere/rinominare colonne in modo sicuro e DRY.