# PHPStan Level 10 Fixes - Session 2026-01-05

## Module: User (21 errors)

### Priority: HIGH - Authentication and user management module

## Group 1: OauthClientResource.php (7 errors)

### Errors 1-7: Grid component usage and schema type mismatch
**Location:** `app/Filament/Resources/OauthClientResource.php:38-56`

**Analysis:**
1. The `schema()` method expects `array<Illuminate\Contracts\Support\Htmlable|string>|Closure` but receives an associative array with keys like `grid_1`, `grid_2`, `grid_3`
2. `Filament\Forms\Components\Grid` class is not found (wrong namespace in Filament 4)
3. Multiple method calls on mixed types

**Root Cause:**
In Filament 4, the Grid component has been moved to `Filament\Forms\Components\Grid` and the schema method signature has changed. The array should be indexed, not associative.

**Solution:**
1. Change import from `Filament\Forms\Components\Grid` to correct namespace
2. Convert associative array to indexed array for schema
3. Ensure proper type annotations

```php
// Before:
return $form->schema([
    Section::make('OAuth Client Information')
        ->schema([
            Grid::make(2)
                ->schema([
                    'grid_1' => TextInput::make('name'),
                    'grid_2' => TextInput::make('email'),
                ]),
        ]),
]);

// After:
use Filament\Forms\Components\Grid;

return $form->schema([
    Section::make('OAuth Client Information')
        ->schema([
            Grid::make(2)
                ->schema([
                    TextInput::make('name'),
                    TextInput::make('email'),
                ]),
        ]),
]);
```

---

## Group 2: ListOauthClients.php (3 errors)

### Errors 8-10: Return type incompatibility
**Location:** `app/Filament/Resources/OauthClientResource/Pages/ListOauthClients.php:22-24`

**Analysis:**
The `getHeaderActions()` method has incorrect return type:
- Declared as: `Filament\Actions\ActionInterface` (class not found)
- Should be: `array<string, Filament\Actions\Action>` to match parent `XotBaseListRecords`
- Returns: `array<int, Filament\Actions\CreateAction>`

**Root Cause:**
The method signature doesn't match the parent class `XotBaseListRecords::getHeaderActions()` which requires associative array with string keys.

**Solution:**
Change return type and use associative array with string keys.

```php
// Before:
public function getHeaderActions(): array
{
    return [
        CreateAction::make(),
        ImportAction::make(),
    ];
}

// After:
/**
 * @return array<string, Filament\Actions\Action>
 */
public function getHeaderActions(): array
{
    return [
        'create' => CreateAction::make(),
        'import' => ImportAction::make(),
    ];
}
```

---

## Group 3: ViewOauthClient.php (11 errors)

### Errors 11-21: TextEntry and IconEntry usage
**Location:** `app/Filament/Resources/OauthClientResource/Pages/ViewOauthClient.php:25-34`

**Analysis:**
1. Schema method receives associative array with field names as keys instead of indexed array
2. `Filament\Schemas\Components\TextEntry` and `IconEntry` classes not found
3. Method calls on mixed types

**Root Cause:**
In Filament 4, entry components have been moved to `Filament\Infolists\Components\TextEntry` and `IconEntry`. Also, Infolist components should be in an indexed array.

**Solution:**
1. Correct imports to use `Filament\Infolists\Components\*`
2. Convert to indexed array
3. Add proper type annotations

```php
// Before:
use Filament\Schemas\Components\TextEntry;
use Filament\Schemas\Components\IconEntry;

public function getInfolistSchema(): array
{
    return [
        'name' => TextEntry::make('name'),
        'user' => TextEntry::make('user.name'),
        // ...
    ];
}

// After:
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;

public function getInfolistSchema(): array
{
    return [
        TextEntry::make('name'),
        TextEntry::make('user.name'),
        IconEntry::make('personal_access_client')->boolean(),
        IconEntry::make('password_client')->boolean(),
        TextEntry::make('created_at')->dateTime(),
    ];
}
```

---

## Implementation Strategy

### Phase 1: Fix OauthClientResource.php
1. Update Grid component import
2. Convert all schema arrays from associative to indexed
3. Test the form rendering

### Phase 2: Fix ListOauthClients.php
1. Update `getHeaderActions()` return type
2. Convert actions array to associative with string keys
3. Test list page functionality

### Phase 3: Fix ViewOauthClient.php
1. Update imports for TextEntry and IconEntry
2. Convert infolist schema to indexed array
3. Test view page functionality

## Testing Checklist

- [ ] Run PHPStan Level 10 on User module - expect 0 errors
- [ ] Run PHPMD on User module
- [ ] Run PHPInsights on User module
- [ ] Test OAuth Client resource: create, edit, view, list
- [ ] Test all navigation and actions
- [ ] Git commit changes

## Related Documentation

- [Filament 4 Migration Guide](../Xot/docs/filament-4-migration-guide.md)
- [XotBaseResource Rules](../Xot/docs/filament-extension-rules.md)
- [Array Return Types](../Xot/docs/array-return-types.md)