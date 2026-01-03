<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PasswordResetResource\Pages;

use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Modules\User\Filament\Resources\PasswordResetResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewPasswordReset extends XotBaseViewRecord
{
    protected static string $resource = PasswordResetResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
            'password_reset_info' => Section::make('Password Reset Information')
                ->schema([
                    'reset_grid' => Grid::make(2)
                        ->schema([
                            'email' => TextEntry::make('email')
                                ->copyable()
                                ->copyMessage('Email copied'),
                            'token' => TextEntry::make('token')
                                ->copyable()
                                ->copyMessage('Token copied')
                                ->columnSpanFull(),
                        ]),
                ])->columns(1),

            'timestamps' => Section::make('Timestamps')
                ->schema([
                    'timestamps_grid' => Grid::make(2)
                        ->schema([
                            'created_at' => TextEntry::make('created_at')
                                ->dateTime(),
                            'updated_at' => TextEntry::make('updated_at')
                                ->dateTime(),
                        ]),
                ])->columns(1),
        ];
    }
}
