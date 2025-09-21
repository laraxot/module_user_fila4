<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> b93ef594b4 (.)
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms;
use Filament\Forms\Form;
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
<<<<<<< HEAD
    protected static string $relationship = 'tenants';

    protected static null|string $recordTitleAttribute = 'name';
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static string $relationship = 'tenants';

    protected static null|string $recordTitleAttribute = 'name';
=======
=======
>>>>>>> origin/develop


    protected static string $relationship = 'tenants';

    protected static ?string $recordTitleAttribute = 'name';
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    protected static string $relationship = 'tenants';

    protected static null|string $recordTitleAttribute = 'name';
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Set up the form schema for tenant relations.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @return array<Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
<<<<<<< HEAD
=======
=======
     * @return array<\Filament\Schemas\Components\Component>
=======
     * @return array<Component>
>>>>>>> b93ef594b4 (.)
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
            TextInput::make('name')
                ->required()
                ->maxLength(255),
>>>>>>> a12f125f4a (.)
=======
            TextInput::make('name')->required()->maxLength(255),
>>>>>>> b93ef594b4 (.)
=======
     * @return array<\Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
     * Define table columns for displaying tenant information.
     *
<<<<<<< HEAD
     * @return array<string, Column>
     */
=======
<<<<<<< HEAD
     * @return array<string, Column>
     */
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function getTableColumns(): array
    {
        $columns = app(ListTenants::class)->getTableColumns();

        // Ensure we only return Column instances, filter out any Layout\Component instances
        return array_filter($columns, fn($column): bool => $column instanceof Column);
<<<<<<< HEAD
=======
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public function getTableColumns(): array
    {
        $columns = app(ListTenants::class)->getTableColumns();

        // Ensure we only return Column instances, filter out any Layout\Component instances
<<<<<<< HEAD
        return array_filter($columns, function ($column): bool {
            return $column instanceof Column;
        });
>>>>>>> a12f125f4a (.)
=======
        return array_filter($columns, fn($column): bool => $column instanceof Column);
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    public function getTableColumns(): array
    {
        $columns = app(ListTenants::class)->getTableColumns();
        
        // Ensure we only return Column instances, filter out any Layout\Component instances
        return array_filter($columns, function ($column): bool {
            return $column instanceof \Filament\Tables\Columns\Column;
        });
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
