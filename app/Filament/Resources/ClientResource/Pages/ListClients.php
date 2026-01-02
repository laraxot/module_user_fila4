<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ClientResource\Pages;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Resources\ClientResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListClients extends XotBaseListRecords
{
    protected static string $resource = ClientResource::class;

    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->sortable()
                ->searchable()
                ->copyable()
                ->tooltip('Click to copy Client ID'),

            'name' => TextColumn::make('name')
                ->sortable()
                ->searchable()
                ->description(fn ($record) => $record->personal_access_client ? 'Personal Access Client' : 'OAuth Client'),

            'redirect' => TextColumn::make('redirect')
                ->limit(50)
                ->tooltip(fn ($record) => $record->redirect)
                ->toggleable(),

            'revoked' => IconColumn::make('revoked')
                ->boolean()
                ->trueIcon('heroicon-o-x-circle')
                ->falseIcon('heroicon-o-check-circle')
                ->trueColor('danger')
                ->falseColor('success')
                ->sortable(),

            'personal_access_client' => IconColumn::make('personal_access_client')
                ->boolean()
                ->trueIcon('heroicon-o-user')
                ->falseIcon('heroicon-o-users')
                ->trueColor('info')
                ->falseColor('gray')
                ->tooltip(fn ($record) => $record->personal_access_client ? 'Personal Access' : 'OAuth Client')
                ->toggleable(),

            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * @return array<string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            ...parent::getTableActions(),
        ];
    }
}
