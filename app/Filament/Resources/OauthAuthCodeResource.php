<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
<<<<<<< HEAD
=======
use Filament\Forms\Components\Component;
>>>>>>> cf5d6db (.)
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\PageRegistration;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\OauthAuthCodeResource\Pages;
use Modules\User\Models\OauthAuthCode;
use Modules\Xot\Filament\Resources\XotBaseResource;
<<<<<<< HEAD

=======
>>>>>>> cf5d6db (.)
use function Safe\json_encode;

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
<<<<<<< HEAD
     * @return array<string, Select|TextInput>
=======
     * @return array<string, \Filament\Forms\Components\Select|\Filament\Forms\Components\TextInput>
>>>>>>> cf5d6db (.)
     */
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            'user_id' => Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable(),
            'client_id' => Select::make('client_id')
                ->relationship('client', 'name')
                ->searchable()
                ->required(),
            'scopes' => TextInput::make('scopes'),
            'revoked' => TextInput::make('revoked')
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
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function (mixed $state): string {
                        if (! is_string($state)) {
                            return '';
                        }
<<<<<<< HEAD

=======
>>>>>>> cf5d6db (.)
                        return Str::limit($state, 15, '...');
                    }),
                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('client.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('scopes')
                    ->limit(30)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
<<<<<<< HEAD
                        if (null === $state) {
                            return null;
                        }
                        if (is_array($state)) {
                            /* @var array<string, mixed> $state */
                            return json_encode($state);
                        }

=======
                        if ($state === null) {
                            return null;
                        }
                        if (is_array($state)) {
                            /** @var array<string, mixed> $state */
                            return json_encode($state);
                        }
>>>>>>> cf5d6db (.)
                        return is_string($state) ? $state : null;
                    })
                    ->toggleable(),
                IconColumn::make('revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),
                TextColumn::make('expires_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
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
     * @return array<string, PageRegistration>
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
