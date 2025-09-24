# Filament 4 Migration Guide

## Overview
This guide covers the migration from Filament v3 to Filament v4 for the User module, focusing on the new Schema system and breaking changes.

## Key Breaking Changes in Filament 4

### 1. Schema System Introduction
- **NEW**: All Livewire components must implement `HasSchemas` interface and use `InteractsWithSchemas` trait
- **REMOVED**: Direct `Filament\Forms\Form` class usage
- **NEW**: Components now use unified `Schema` objects

### 2. Livewire Component Requirements
Every Livewire component using Filament must now:

```php
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;

class MyComponent extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    // Component logic
}
```

### 3. Form Method Changes
**OLD (v3):**
```php
public function form(Form $form): Form
{
    return $form->schema([
        // components
    ]);
}
```

**NEW (v4):**
```php
public function form(Schema $schema): Schema
{
    return $schema
        ->components([
            // components
        ])
        ->statePath('data');
}
```

### 4. Table Method Changes
**OLD (v3):**
```php
public function table(Table $table): Table
{
    return $table
        ->query(User::query())
        ->columns([
            // columns
        ]);
}
```

**NEW (v4):**
```php
public function table(Table $table): Table
{
    return $table
        ->query(User::query())
        ->columns([
            // columns
        ]);
}
```

### 5. Widget Changes
**OLD (v3):**
```php
/**
 * @property Form $form
 */
class MyWidget extends Widget
{
    public function form(Form $form): Form
    {
        return $form->schema([...]);
    }
}
```

**NEW (v4):**
```php
class MyWidget extends Widget implements HasSchemas
{
    use InteractsWithSchemas;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([...])
            ->statePath('data');
    }
}
```

### 6. Component Initialization
**OLD (v3):**
```php
public function mount(): void
{
    $this->form->fill();
}
```

**NEW (v4):**
```php
public function mount(): void
{
    $this->form->fill();
}
```

### 7. Custom Component Development
- **REMOVED**: `mount()` method for custom table columns
- **NEW**: Use `setUp()` method instead
- **REQUIRED**: Always call `parent::setUp()` in custom implementations

```php
// Custom table column example
class CustomColumn extends Column
{
    protected function setUp(): void
    {
        parent::setUp();

        // Custom setup logic
    }
}
```

## Files to Update in User Module

### 1. Livewire Components
- `app/Http/Livewire/Auth/Login.php`
- `app/Http/Livewire/Auth/Register.php`

### 2. Filament Widgets
- `app/Filament/Widgets/Auth/LoginWidget.php`
- `app/Filament/Widgets/Auth/RegisterWidget.php`
- `app/Filament/Widgets/Auth/ResetPasswordWidget.php`
- `app/Filament/Widgets/PasswordExpiredWidget.php`

### 3. Filament Pages
- All pages in `app/Filament/Clusters/Appearance/Pages/`
- All custom pages using forms or tables

## Migration Checklist

- [ ] Add `HasSchemas` interface to all Livewire components
- [ ] Add `InteractsWithSchemas` trait to all Livewire components
- [ ] Update `form()` method signatures to use `Schema` instead of `Form`
- [ ] Add `statePath()` configuration to all form schemas
- [ ] Remove `@property Form $form` PHPDoc comments
- [ ] Update mount methods to use new schema system
- [ ] Test all forms and widgets after migration

## Common Error Patterns

### Error: "Unknown class Filament\Forms\Form"
**Solution**: Replace `Form` with `Schema` and implement proper interfaces

### Error: "Property does not accept Filament\Forms\Form"
**Solution**: Update PHPDoc and property types to use Schema system

### Error: "Call to method on unknown class"
**Solution**: Ensure proper imports and interface implementations

## Testing After Migration

1. **Form Functionality**: Test all form submissions and validations
2. **Widget Rendering**: Verify all widgets display correctly
3. **Table Operations**: Check all table filtering, sorting, and actions
4. **Authentication**: Test login, registration, and password reset flows

## Resources

- [Filament 4.x Documentation](https://filamentphp.com/docs/4.x)
- [Filament 4 Upgrade Guide](https://filamentphp.com/docs/4.x/upgrade-guide)
- [Schema System Documentation](https://filamentphp.com/docs/4.x/components/schema)