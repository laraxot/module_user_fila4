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
     * @return array<int, \Filament\Infolists\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
            Section::make('Token Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('id')
                                ->label('Refresh Token ID'),
                            TextEntry::make('accessToken.id')
                                ->label('Access Token ID')
                                ->url(fn ($state, $record) => $record->accessToken?->exists ?
                                    \Modules\User\Filament\Resources\OauthAccessTokenResource::getUrl('view', ['record' => $record->accessToken]) : null),
                        ]),
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
