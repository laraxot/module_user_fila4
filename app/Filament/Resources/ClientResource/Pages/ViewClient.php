<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ClientResource\Pages;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Resources\ClientResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewClient extends XotBaseViewRecord
{
    protected static string $resource = ClientResource::class;

    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
            'client' => Section::make()->schema([
                'client_grid' => Grid::make(['default' => 2, 'md' => 3, 'lg' => 4])->schema([
                    'id' => TextEntry::make('id')->copyable(),
                    'name' => TextEntry::make('name'),
                    'user_id' => TextEntry::make('user_id'),
                    'provider' => TextEntry::make('provider'),
                    'redirect' => TextEntry::make('redirect')
                        ->copyable()
                        ->url(fn (?string $state): ?string => $state),
                ]),
            ]),

            'credentials' => Section::make()->schema([
                'credentials_grid' => Grid::make(['default' => 1, 'md' => 2])->schema([
                    'secret' => TextEntry::make('secret')
                        ->copyable()
                        ->password(),
                ]),
            ]),

            'flags' => Section::make()->schema([
                'flags_grid' => Grid::make(['default' => 2, 'md' => 4])->schema([
                    'personal_access_client' => TextEntry::make('personal_access_client')
                        ->formatStateUsing(static fn (mixed $state): string => $state ? '1' : '0'),
                    'password_client' => TextEntry::make('password_client')
                        ->formatStateUsing(static fn (mixed $state): string => $state ? '1' : '0'),
                    'revoked' => TextEntry::make('revoked')
                        ->formatStateUsing(static fn (mixed $state): string => $state ? '1' : '0'),
                ]),
            ]),

            'meta' => Section::make()->schema([
                'meta_grid' => Grid::make(['default' => 2, 'md' => 3])->schema([
                    'created_at' => TextEntry::make('created_at')->dateTime(),
                    'updated_at' => TextEntry::make('updated_at')->dateTime(),
                    'created_by' => TextEntry::make('created_by'),
                    'updated_by' => TextEntry::make('updated_by'),
                ]),
            ]),
        ];
    }
}
