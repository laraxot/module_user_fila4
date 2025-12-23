<?php

/**
 * Tenant List Management.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
use Modules\User\Models\Tenant;
=======
>>>>>>> laraxot/develop
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\TenantResource;
use Modules\User\Models\Tenant;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListTenants extends XotBaseListRecords
{
    protected static string $resource = TenantResource::class;

    /**
     * Definisce le colonne della tabella per la lista tenant.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 220cf97b (.)
=======
    #[\Override]
>>>>>>> laraxot/develop
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'slug' => TextColumn::make('slug')
                ->default(function ($record) {
<<<<<<< HEAD
<<<<<<< HEAD
                    if ($record === null || ! $record instanceof Tenant) {
=======
                    if (null === $record || ! $record instanceof Tenant) {
>>>>>>> 220cf97b (.)
=======
                    if (null === $record || ! $record instanceof Tenant) {
>>>>>>> laraxot/develop
                        return '';
                    }
                    $record->generateSlug();
                    $name = $record->getAttribute('name');
                    if (! is_string($name)) {
                        $name = '';
                    }
                    $slug = Str::slug($name);
                    $record->setAttribute('slug', $slug);
                    $record->save();

                    return $slug;
                })
                ->sortable(),
        ];
    }
}
