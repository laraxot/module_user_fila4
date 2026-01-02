<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Filament\Resources\SocialiteUserResource\Pages;
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Class SocialiteUserResource.
 */
class SocialiteUserResource extends XotBaseResource
{
    protected static ?string $model = SocialiteUser::class;

    protected static ?string $recordTitleAttribute = 'provider';

    protected static ?string $modelLabel = 'Social Authentication';

    protected static ?string $pluralModelLabel = 'Social Authentications';

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-user';

    protected static \UnitEnum|string|null $navigationGroup = 'Authentication';

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
                ->searchable()
                ->required(),
            Select::make('provider')
                ->options([
                    'google' => 'Google',
                    'facebook' => 'Facebook',
                    'github' => 'GitHub',
                    'twitter' => 'Twitter',
                    'linkedin' => 'LinkedIn',
                    'apple' => 'Apple',
                    // Add other providers as needed
                ])
                ->searchable()
                ->required(),
            TextInput::make('provider_id')
                ->required()
                ->maxLength(255),
            TextInput::make('provider_token')
                ->maxLength(255)
                ->password(),
            TextInput::make('provider_refresh_token')
                ->maxLength(255)
                ->password(),
            TextInput::make('provider_avatar')
                ->maxLength(255),
        ];
    }

    /**
     * Configure the table for the resource.
     */
    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('provider')
                    ->label('Provider')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('provider_id')
                    ->label('Provider ID')
                    ->searchable(),
                TextColumn::make('provider_avatar')
                    ->label('Avatar')
                    ->formatStateUsing(function ($state) {
                        if ($state) {
                            return view('filament.components.avatar', ['url' => $state])->render();
                        }
                        
                        return 'No Avatar';
                    })
                    ->html(),
                TextColumn::make('created_at')
                    ->label('Connected At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Add filters for provider type
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListSocialiteUsers::route('/'),
            'edit' => Pages\EditSocialiteUser::route('/{record}/edit'),
        ];
    }

    /**
     * Modify the Eloquent query used to retrieve the records.
     */
    #[\Override]
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user']);
    }
}