<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\Component;
=======
use Filament\Schemas\Components\Component;
>>>>>>> a63f578 (.)
=======
use Filament\Schemas\Components\Component;
>>>>>>> 041533e (.)
=======
use Filament\Schemas\Components\Component;
>>>>>>> 00a34d0 (.)
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
use Filament\Forms;
use Filament\Forms\Form;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Form;
=======
>>>>>>> a63f578 (.)
=======
>>>>>>> 041533e (.)
=======
>>>>>>> 00a34d0 (.)
use Filament\Tables\Table;
use Modules\User\Filament\Resources\TenantResource\Pages\ListTenants;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;

/**
 * Manages the relationship between users and tenants.
 *
 * This class provides the form schema and table configuration for the "tenants" relationship
 * with strong typing and enhanced structure for stability and professionalism.
 */
class TenantsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'tenants';

    protected static null|string $recordTitleAttribute = 'name';

    /**
     * Set up the form schema for tenant relations.
     *
     * @return array<Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
        ];
    }

    /**
     * Define table columns for displaying tenant information.
     *
     * @return array<string, Column>
     */
    #[Override]
    public function getTableColumns(): array
    {
        $columns = app(ListTenants::class)->getTableColumns();

        // Ensure we only return Column instances, filter out any Layout\Component instances
        return array_filter($columns, fn($column): bool => $column instanceof Column);
    }
}
