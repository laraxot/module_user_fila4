<<<<<<< HEAD
# Convenzione Metodo getTableColumns per Filament Table

## Motivazione della Modifica
<<<<<<< HEAD
Per uniformarsi allo standard Filament e migliorare la coerenza del codice, il metodo precedentemente chiamato `getTableColumns` è stato rinominato in `getTableColumns` su tutte le risorse Filament del modulo User.

- **Vecchio nome:** `getTableColumns`
=======
Per uniformarsi allo standard Filament e migliorare la coerenza del codice, il metodo precedentemente chiamato `getListTableColumns` è stato rinominato in `getTableColumns` su tutte le risorse Filament del modulo User.

- **Vecchio nome:** `getListTableColumns`
>>>>>>> 7c0a965 (.)
- **Nuovo nome:** `getTableColumns`

Questa modifica:
- Migliora la leggibilità e la manutenibilità
- Facilita l'upgrade di Filament e l'adozione di best practice
- Rende il codice più prevedibile e standard

## Esempio di Refactoring
```php
// Prima
<<<<<<< HEAD
public function getTableColumns(): array
=======
public function getListTableColumns(): array
>>>>>>> 7c0a965 (.)
{
    return [ ... ];
}

// Dopo
public function getTableColumns(): array
{
    return [ ... ];
}
```

## Applicazione
- Tutte le Filament Table (Pages, RelationManagers, ecc.) del modulo User devono ora usare `getTableColumns`.
- Aggiornare anche override, chiamate e test.

## Collegamenti
<<<<<<< HEAD
- [Regola Generale - Modulo Xot](../../../Xot/docs/FILAMENT_TABLE_COLUMNS.md)
- [Regola Globale - Root Docs](../../../../docs/filament-table-columns.md)
=======
- [Regola Generale - Modulo Xot](../../../Xot/project_docs/FILAMENT_TABLE_COLUMNS.md)
- [Regola Globale - Root Docs](../../../../project_docs/filament-table-columns.md)
>>>>>>> 81efa49 (.)

---

**Ultimo aggiornamento:** 2025-05-13

**Link bidirezionale:** Aggiornare anche la root docs e la docs di Xot per riferimenti e cross-link.
=======
>>>>>>> 1b6d4b9 (.)
