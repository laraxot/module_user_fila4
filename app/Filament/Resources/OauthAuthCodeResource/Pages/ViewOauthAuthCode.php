<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthAuthCodeResource\Pages;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ToggleEntry;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\OauthAuthCodeResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthAuthCode extends XotBaseViewRecord
{
    protected static string $resource = OauthAuthCodeResource::class;

    /**
     * @return array<int, \Filament\Infolists\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
            Section::make('Authorization Code Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('id')
                                ->label('Auth Code ID')
                                ->formatStateUsing(function ($state) {
                                    // Show just first 10 chars of the code for security
                                    return Str::limit($state, 15, '...');
                                }),
                            TextEntry::make('client.name')
                                ->label('Client')
                                ->url(fn ($state, $record) => $record->client?->exists ? 
                                    \Modules\User\Filament\Resources\OauthClientResource::getUrl('view', ['record' => $record->client]) : null),
                        ]),
                    
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('user.name')
                                ->label('User')
                                ->url(fn ($state, $record) => $record->user?->exists ? 
                                    \Modules\User\Filament\Resources\UserResource::getUrl('view', ['record' => $record->user]) : null),
                        ]),
                ])->columns(1),

            Section::make('Authorization Details')
                ->schema([
                    TextEntry::make('scopes')
                        ->label('Scopes')
                        ->formatStateUsing(function ($state) {
                            if (is_array($state)) {
                                return implode(', ', $state);
                            }
                            return $state;
                        })
                        ->columnSpanFull(),
                ])->columns(1),

            Section::make('Status')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            ToggleEntry::make('revoked')
                                ->label('Revoked'),
                        ]),
                ])->columns(1),

            Section::make('Timestamps')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('expires_at')
                                ->label('Expires At')
                                ->dateTime(),
                            TextEntry::make('created_at')
                                ->label('Created At')
                                ->dateTime(),
                        ]),
                ])->columns(1),
        ];
    }
}