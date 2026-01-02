<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\OauthAuthCodeResource\Pages;
use Modules\User\Models\OauthAuthCode;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Class OauthAuthCodeResource.
 */
class OauthAuthCodeResource extends XotBaseResource
{
    protected static ?string $model = OauthAuthCode::class;

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $modelLabel = 'OAuth Authorization Code';

    protected static ?string $pluralModelLabel = 'OAuth Authorization Codes';

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-code-bracket';

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
            Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable(),
            Select::make('client_id')
                ->relationship('client', 'name')
                ->searchable()
                ->required(),
            TextInput::make('scopes'),
            TextInput::make('revoked')
                ->numeric()
                ->required(),
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
                    ->label('Auth Code ID')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        // Show just first 10 chars of the code for security
                        return Str::limit($state, 15, '...');
                    }),
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('client.name')
                    ->label('Client')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('scopes')
                    ->label('Scopes')
                    ->limit(30)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if ($state) {
                            return is_array($state) ? json_encode($state) : $state;
                        }

                        return null;
                    })
                    ->toggleable(),
                IconColumn::make('revoked')
                    ->label('Revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),
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
                // Add filters for revoked status, expiration, user, client
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
            'index' => Pages\ListOauthAuthCodes::route('/'),
            'view' => Pages\ViewOauthAuthCode::route('/{record}'),
        ];
    }

    /**
     * Modify the Eloquent query used to retrieve the records.
     */
    #[\Override]
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'client']);
    }
}
