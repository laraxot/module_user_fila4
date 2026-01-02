<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

/**
 * Class AuthenticationLogsRelationManager.
 */
class AuthenticationLogsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'authentications';

    protected static ?string $recordTitleAttribute = 'ip_address';

    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'ip_address' => TextColumn::make('ip_address')
                ->sortable(),
            'user_agent' => TextColumn::make('user_agent')
                ->limit(50),
            'login_successful' => IconColumn::make('login_successful')
                ->boolean(),
            'login_at' => TextColumn::make('login_at')
                ->dateTime()
                ->sortable(),
            'logout_at' => TextColumn::make('logout_at')
                ->dateTime()
                ->sortable(),
            'location' => TextColumn::make('location')
                ->formatStateUsing(function ($state) {
                    if (is_array($state)) {
                        return collect($state)
                            ->map(fn ($value, $key) => "{$key}: {$value}")
                            ->join(', ');
                    }

                    return $state ? json_encode($state) : 'N/A';
                }),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ];
    }

    /**
     * @return array<string, \Filament\Actions\Action>
     */
    #[\Override]
    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ];
    }
}
