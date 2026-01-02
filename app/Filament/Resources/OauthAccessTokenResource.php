<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\User\Filament\Resources\OauthAccessTokenResource\Pages;
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Filament\Resources\XotBaseResource;

class OauthAccessTokenResource extends XotBaseResource
{
    protected static ?string $model = OauthAccessToken::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-key';

    protected static string|\UnitEnum|null $navigationGroup = 'API';

    protected static ?int $navigationSort = 5;

    public static function getNavigationLabel(): string
    {
        return __('OAuth Access Tokens');
    }

    public static function getPluralLabel(): string
    {
        return __('OAuth Access Tokens');
    }

    public static function getModelLabel(): string
    {
        return __('OAuth Access Token');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->sortable()
                    ->copyable(),

                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable()
                    ->url(fn ($record) => $record->user?->exists ?
                        UserResource::getUrl('view', ['record' => $record->user]) : null,
                        shouldOpenInNewTab: true),

                TextColumn::make('client.name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('scopes')
                    ->label('Scopes')
                    ->limit(30)
                    ->tooltip(function ($state) {
                        if ($state) {
                            return is_array($state) ? json_encode($state) : $state;
                        }

                        return null;
                    }),

                IconColumn::make('revoked')
                    ->label('Revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('expires_at')
                    ->label('Expires')
                    ->dateTime()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        if ($state instanceof Carbon) {
                            $now = Carbon::now();
                            if ($state->lt($now)) {
                                return $state->format('Y-m-d H:i:s').' (Expired)';
                            }
                        }

                        return $state instanceof Carbon ? $state->format('Y-m-d H:i:s') : 'N/A';
                    }),
            ])
            ->filters([
                \Filament\Tables\Filters\Filter::make('revoked')
                    ->query(fn (Builder $query) => $query->where('revoked', true)),

                \Filament\Tables\Filters\Filter::make('expired')
                    ->query(fn (Builder $query) => $query->where('expires_at', '<', now())),

                \Filament\Tables\Filters\Filter::make('valid')
                    ->query(fn (Builder $query) => $query->where('revoked', false)->where('expires_at', '>', now())),
            ])
            ->actions([
                DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOauthAccessTokens::route('/'),
            'view' => Pages\ViewOauthAccessToken::route('/{record}'),
        ];
    }

    public static function getFormSchema(): array
    {
        return [
            Section::make('OAuth Access Token Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Select::make('user_id')
                                ->relationship('user', 'name')
                                ->label('User')
                                ->searchable(),
                            Select::make('client_id')
                                ->relationship('client', 'name')
                                ->label('Client')
                                ->searchable()
                                ->required(),
                        ]),

                    Grid::make(2)
                        ->schema([
                            TextInput::make('name')
                                ->label('Name')
                                ->maxLength(255),
                            TextInput::make('scopes')
                                ->label('Scopes')
                                ->placeholder('Comma-separated scopes'),
                        ]),
                ]),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'client']);
    }
}
