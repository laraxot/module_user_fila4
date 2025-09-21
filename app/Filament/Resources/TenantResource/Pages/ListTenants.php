<?php

/**
 * Tenant List Management.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ListTenants extends XotBaseListRecords
{
    protected static string $resource = TenantResource::class;

    /**
     * Definisce le colonne della tabella per la lista tenant.
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
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'name' => TextColumn::make('name')->searchable(),
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->searchable()
                ->sortable(),

            'name' => TextColumn::make('name')
                ->searchable(),

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'name' => TextColumn::make('name')->searchable(),
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'slug' => TextColumn::make('slug')
                ->default(function ($record) {
                    if ($record === null) {
                        return '';
                    }
                    $record->generateSlug();
                    $slug = Str::slug($record->name);
                    $record->slug = $slug;
                    $record->save();

                    return $slug;
                })
                ->sortable(),
        ];
    }
}
