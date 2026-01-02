<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PasswordResetResource\Pages;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Modules\User\Filament\Resources\PasswordResetResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewPasswordReset extends XotBaseViewRecord
{
    protected static string $resource = PasswordResetResource::class;

    /**
     * @return array<int, \Filament\Infolists\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
            Section::make('Password Reset Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('email')
                                ->label('Email')
                                ->copyable()
                                ->copyMessage('Email copied'),
                            TextEntry::make('token')
                                ->label('Token')
                                ->copyable()
                                ->copyMessage('Token copied')
                                ->columnSpanFull(),
                        ]),
                ])->columns(1),

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
