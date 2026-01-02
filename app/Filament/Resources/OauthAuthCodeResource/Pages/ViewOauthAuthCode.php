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
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
            'authorization_code_info' => Section::make('Authorization Code Information')
                ->schema([
                    'code_grid' => Grid::make(2)
                        ->schema([
                            'id' => TextEntry::make('id')
                                ->formatStateUsing(function ($state) {
                                    return Str::limit($state, 15, '...');
                                }),
                            'client_name' => TextEntry::make('client.name')
                                ->url(fn ($state, $record) => $record->client?->exists ?
                                    \Modules\User\Filament\Resources\OauthClientResource::getUrl('view', ['record' => $record->client]) : null),
                        ]),

                    'user_grid' => Grid::make(2)
                        ->schema([
                            'user_name' => TextEntry::make('user.name')
                                ->url(fn ($state, $record) => $record->user?->exists ?
                                    \Modules\User\Filament\Resources\UserResource::getUrl('view', ['record' => $record->user]) : null),
                        ]),
                ])->columns(1),

            'authorization_details' => Section::make('Authorization Details')
                ->schema([
                    'scopes' => TextEntry::make('scopes')
                        ->formatStateUsing(function ($state) {
                            if (is_array($state)) {
                                return implode(', ', $state);
                            }

                            return $state;
                        })
                        ->columnSpanFull(),
                ])->columns(1),

            'status' => Section::make('Status')
                ->schema([
                    'status_grid' => Grid::make(2)
                        ->schema([
                            'revoked' => ToggleEntry::make('revoked'),
                        ]),
                ])->columns(1),

            'timestamps' => Section::make('Timestamps')
                ->schema([
                    'timestamps_grid' => Grid::make(2)
                        ->schema([
                            'expires_at' => TextEntry::make('expires_at')
                                ->dateTime(),
                            'created_at' => TextEntry::make('created_at')
                                ->dateTime(),
                        ]),
                ])->columns(1),
        ];
    }
}
