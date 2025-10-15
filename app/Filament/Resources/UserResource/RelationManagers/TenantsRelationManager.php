<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\Column;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\TenantResource\Pages\ListTenants;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Override;

/**
 * Manages the relationship between users and tenants.
 *
 * This class provides the form schema and table configuration for the "tenants" relationship
 * with strong typing and enhanced structure for stability and professionalism.
 */
class TenantsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'tenants';

    protected static ?string $recordTitleAttribute = 'name';


    #[Override]
    /**
     * @return array<string, mixed>
     */
    public function getTableColumns(): array
    {
        $columns = app(ListTenants::class)->getTableColumns();

        // Ensure we only return Column instances with string keys
        /** @var array<string, Column> $result */
        $result = array_filter($columns, fn ($column): bool => $column instanceof Column);

        return $result;
    }
}
