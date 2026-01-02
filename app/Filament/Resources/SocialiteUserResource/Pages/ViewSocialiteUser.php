<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialiteUserResource\Pages;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\SocialiteUserResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSocialiteUser extends XotBaseViewRecord
{
    protected static string $resource = SocialiteUserResource::class;

    /**
     * @return array<int, \Filament\Infolists\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
            Section::make('User Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('user.name')
                                ->label('User')
                                ->url(fn ($state, $record) => $record->user?->exists ? 
                                    \Modules\User\Filament\Resources\UserResource::getUrl('view', ['record' => $record->user]) : null),
                            TextEntry::make('provider')
                                ->label('Provider')
                                ->formatStateUsing(fn ($state) => Str::title($state)),
                        ]),
                    
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('provider_id')
                                ->label('Provider ID')
                                ->copyable()
                                ->copyMessage('Provider ID copied'),
                            TextEntry::make('name')
                                ->label('Name'),
                        ]),
                ])->columns(1),

            Section::make('Contact Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('email')
                                ->label('Email')
                                ->copyable()
                                ->copyMessage('Email copied'),
                            TextEntry::make('avatar')
                                ->label('Avatar')
                                ->url(fn ($state) => $state)
                                ->openUrlInNewTab(),
                        ]),
                ])->columns(1),

            Section::make('Tokens')
                ->schema([
                    TextEntry::make('token')
                        ->label('Access Token')
                        ->password()
                        ->copyable()
                        ->copyMessage('Token copied'),
                ])
                ->collapsible(),

            Section::make('Timestamps')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('created_at')
                                ->label('Created At')
                                ->dateTime(),
                            TextEntry::make('updated_at')
                                ->label('Updated At')
                                ->dateTime(),
                        ]),
                ])->columns(1),
        ];
    }
}