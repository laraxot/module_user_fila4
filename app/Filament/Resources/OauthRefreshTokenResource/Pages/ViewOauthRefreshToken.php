<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthRefreshTokenResource\Pages;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ToggleEntry;
use Modules\User\Filament\Resources\OauthRefreshTokenResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthRefreshToken extends XotBaseViewRecord
{
    protected static string $resource = OauthRefreshTokenResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
            'token_information' => Section::make('Token Information')
                ->schema([
                    'token_grid' => Grid::make(2)
                        ->schema([
                            'id' => TextEntry::make('id'),
                            'access_token_id' => TextEntry::make('accessToken.id')
                                ->url(fn ($state, $record) => $record->accessToken?->exists ?
                                    \Modules\User\Filament\Resources\OauthAccessTokenResource::getUrl('view', ['record' => $record->accessToken]) : null),
                        ]),
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
