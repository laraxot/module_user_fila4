<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ClientResource\Pages;

use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\User\Filament\Resources\ClientResource;

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
                ->label('Client ID')
                ->sortable()
                ->searchable()
                ->copyable()
                ->tooltip('Click to copy Client ID'),

            'name' => TextColumn::make('name')
                ->sortable()
                ->searchable()
                ->description(fn($record) => $record->personal_access_client ? 'Personal Access Client' : 'OAuth Client'),

            'redirect' => TextColumn::make('redirect')
                ->label('Redirect URIs')
                ->limit(50)
                ->tooltip(fn($record) => $record->redirect)
                ->toggleable(),

            'revoked' => IconColumn::make('revoked')
                ->label('Status')
                ->boolean()
                ->trueIcon('heroicon-o-x-circle')
                ->falseIcon('heroicon-o-check-circle')
                ->trueColor('danger')
                ->falseColor('success')
                ->sortable(),

            'personal_access_client' => IconColumn::make('personal_access_client')
                ->label('Type')
                ->boolean()
                ->trueIcon('heroicon-o-user')
                ->falseIcon('heroicon-o-users')
                ->trueColor('info')
                ->falseColor('gray')
                ->tooltip(fn($record) => $record->personal_access_client ? 'Personal Access' : 'OAuth Client')
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
     * @return array<\Filament\Tables\Actions\Action>
     */
    public function getTableActions(): array
    {
        return [
            ViewAction::make()
                ->icon('heroicon-o-eye'),
            EditAction::make()
                ->icon('heroicon-o-pencil'),
            DeleteAction::make()
                ->icon('heroicon-o-trash')
                ->requiresConfirmation(),
        ];
    }
}