<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Filament\Resources\OauthRefreshTokenResource\Pages;
use Modules\User\Models\OauthRefreshToken;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Class OauthRefreshTokenResource.
 */
class OauthRefreshTokenResource extends XotBaseResource
{
    protected static ?string $model = OauthRefreshToken::class;

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $modelLabel = 'OAuth Refresh Token';

    protected static ?string $pluralModelLabel = 'OAuth Refresh Tokens';

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-arrow-path';

    protected static \UnitEnum|string|null $navigationGroup = 'API';

    /**
     * Get the form schema for the resource.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            Select::make('access_token_id')
                ->relationship('accessToken', 'id')
                ->searchable()
                ->required(),
            TextInput::make('revoked')
                ->numeric()
                ->required(),
            TextInput::make('expires_at')
                ->label('Expires At')
                ->helperText('Formatted as date/time'),
        ];
    }

    /**
     * Extend table callback for the resource.
     *
     * @return array<string, mixed>
     */
    public static function extendTableCallback(): array
    {
        return [
            'columns' => [
                TextColumn::make('id')
                    ->label('Token ID')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('accessToken.id')
                    ->label('Access Token')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('revoked')
                    ->label('Revoked')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('expires_at')
                    ->label('Expires At')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),
            ],
            'filters' => [
                // Add filters for revoked status, expiration
            ],
            'actions' => [
                DeleteAction::make(),
            ],
            'bulk_actions' => [
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ],
            'default_sort' => ['created_at', 'desc'],
        ];
    }

    /**
     * Get the pages available for the resource.
     *
     * @return array<string, string>
     */
    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOauthRefreshTokens::route('/'),
            'view' => Pages\ViewOauthRefreshToken::route('/{record}'),
        ];
    }

    /**
     * Modify the Eloquent query used to retrieve the records.
     */
    #[\Override]
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['accessToken']);
    }
}
