<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\AuthenticationLogResource\Pages;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ToggleEntry;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\AuthenticationLogResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewAuthenticationLog extends XotBaseViewRecord
{
    protected static string $resource = AuthenticationLogResource::class;

    /**
     * @return array<int, \Filament\Infolists\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
                Section::make('Authentication Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('id')
                                    ->label('Log ID'),
                                TextEntry::make('authenticatable_type')
                                    ->label('Authenticatable Type')
                                    ->formatStateUsing(fn ($state) => Str::afterLast($state, '\\')),
                            ]),
                        
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('authenticatable.name')
                                    ->label('User')
                                    ->url(fn ($state, $record) => $record->authenticatable?->exists ? 
                                        \Modules\User\Filament\Resources\UserResource::getUrl('view', ['record' => $record->authenticatable]) : null),
                                TextEntry::make('ip_address')
                                    ->label('IP Address')
                                    ->copyable()
                                    ->copyMessage('IP address copied'),
                            ]),
                    ])->columns(1),

                Section::make('User Agent')
                    ->schema([
                        TextEntry::make('user_agent')
                            ->label('User Agent')
                            ->columnSpanFull(),
                    ])->collapsible(),

                Section::make('Timestamps')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('login_at')
                                    ->label('Login Time')
                                    ->dateTime(),
                                TextEntry::make('logout_at')
                                    ->label('Logout Time')
                                    ->dateTime(),
                                TextEntry::make('created_at')
                                    ->label('Created At')
                                    ->dateTime(),
                            ]),
                    ])->columns(1),

                Section::make('Status')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                ToggleEntry::make('login_successful')
                                    ->label('Login Successful'),
                                ToggleEntry::make('cleared_by_user')
                                    ->label('Cleared by User'),
                            ]),
                    ])->columns(1),

                Section::make('Location')
                    ->schema([
                        TextEntry::make('location')
                            ->label('Location Data')
                            ->formatStateUsing(fn ($state) => $state ? json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : 'No location data'),
                    ])->collapsible(),
        ];
    }
}