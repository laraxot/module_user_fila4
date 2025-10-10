<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Filament\Tables\Filters\BaseFilter;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Override;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkAction;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Tables;
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Tables\Filters\BaseFilter;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Tables;
=======
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteBulkAction;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Filament\Resources\PermissionResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Webmozart\Assert\Assert;

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Webmozart\Assert\Assert;

=======
use Webmozart\Assert\Assert;

=======
>>>>>>> b93ef594b4 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Webmozart\Assert\Assert;

>>>>>>> a12f125f4a (.)
=======
use Webmozart\Assert\Assert;

use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
class ListPermissions extends XotBaseListRecords
{
    protected static string $resource = PermissionResource::class;

    /**
     * @return array<string, Tables\Columns\Column>
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'guard_name' => TextColumn::make('guard_name')->searchable()->sortable(),
            'active' => IconColumn::make('active')->boolean(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'guard_name' => TextColumn::make('guard_name')
                ->searchable()
                ->sortable(),
            'active' => IconColumn::make('active')
                ->boolean(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'guard_name' => TextColumn::make('guard_name')->searchable()->sortable(),
            'active' => IconColumn::make('active')->boolean(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, BaseFilter>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return array<string, BaseFilter>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function getTableFilters(): array
    {
        return [
            'guard_name' => SelectFilter::make('guard_name')
<<<<<<< HEAD
=======
=======
     * @return array<string, Tables\Filters\BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            'guard_name' => Tables\Filters\SelectFilter::make('guard_name')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->options([
                    'web' => 'Web',
                    'api' => 'API',
                    'sanctum' => 'Sanctum',
                ])
                ->multiple(),
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function getTableActions(): array
    {
        return [
            'view' => ViewAction::make(),
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
<<<<<<< HEAD
=======
=======
     * @return array<string, Tables\Actions\Action|Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            'view' => Tables\Actions\ViewAction::make(),
            'edit' => Tables\Actions\EditAction::make(),
            'delete' => Tables\Actions\DeleteAction::make(),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, Action>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return array<string, Action>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, \Filament\Actions\Action>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, BulkAction>
     */
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, BulkAction>
     */
    #[Override]
=======
     * @return array<string, \Filament\Actions\BulkAction>
     */
>>>>>>> a12f125f4a (.)
=======
     * @return array<string, BulkAction>
     */
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, BulkAction>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getTableBulkActions(): array
    {
        Assert::classExists($roleModel = config('permission.models.role'));

        return [
            'delete' => DeleteBulkAction::make(),
            'attach_role' => BulkAction::make('Attach Role')
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                ->action(static function (Collection $collection, array $data): void {
                    foreach ($collection as $record) {
                        // Verifichiamo che $record sia un'istanza di Model prima di procedere
                        Assert::isInstanceOf(
                            $record,
                            Model::class,
                            '[' . __LINE__ . '][' . __CLASS__ . ']',
                        );
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

                        // Poi verifichiamo che il modello abbia il metodo roles() prima di chiamarlo
                        if (method_exists($record, 'roles')) {
                            $record->roles()->sync($data['role']);
                            $record->save();
                        }
                    }
                })
                ->schema([
                    Select::make('role')->options($roleModel::query()->pluck('name', 'id'))->required(),
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
                ->action(
                    static function (Collection $collection, array $data): void {
                        foreach ($collection as $record) {
                            // Verifichiamo che $record sia un'istanza di Model prima di procedere
<<<<<<< HEAD
                            Assert::isInstanceOf($record, Model::class, '['.__LINE__.']['.__CLASS__.']');
=======
>>>>>>> b93ef594b4 (.)

                        // Poi verifichiamo che il modello abbia il metodo roles() prima di chiamarlo
                        if (method_exists($record, 'roles')) {
                            $record->roles()->sync($data['role']);
                            $record->save();
                        }
                    }
<<<<<<< HEAD
=======
                            Assert::isInstanceOf($record, \Illuminate\Database\Eloquent\Model::class, '['.__LINE__.']['.__CLASS__.']');

                            // Poi verifichiamo che il modello abbia il metodo roles() prima di chiamarlo
                            if (method_exists($record, 'roles')) {
                                $record->roles()->sync($data['role']);
                                $record->save();
                            }
                        }
                    }
>>>>>>> origin/develop
                )
                ->form([
                    Select::make('role')
                        ->options($roleModel::query()->pluck('name', 'id'))
                        ->required(),
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
                })
                ->schema([
                    Select::make('role')->options($roleModel::query()->pluck('name', 'id'))->required(),
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ])
                ->deselectRecordsAfterCompletion(),
        ];
    }
}
