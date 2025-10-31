<?php

/**
 * Tenant List Management.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;

class ListTenants extends XotBaseListRecords
{
    protected static string $resource = TenantResource::class;

    /**
     * Definisce le colonne della tabella per la lista tenant.
     */
    #[Override]
    /**
     * @return array<string, mixed>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'slug' => TextColumn::make('slug')
                ->default(function ($record) {
                    if (! $record instanceof \Illuminate\Database\Eloquent\Model) {
                        return '';
                    }
                    if (method_exists($record, 'generateSlug')) {
                        $record->generateSlug();
                    }

                    /** @var string $name */
                    $name = $record->getAttribute('name') ?? '';
                    $slug = Str::slug($name);

                    if (property_exists($record, 'slug')) {
                        $record->slug = $slug;
                        $record->save();
                    }

                    return $slug;
                })
                ->sortable(),
        ];
    }
}
