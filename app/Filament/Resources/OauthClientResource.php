<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\Client;
use Modules\User\Filament\Resources\OauthClientResource\Pages;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Class OauthClientResource.
 */
class OauthClientResource extends XotBaseResource
{
    protected static ?string $model = Client::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $modelLabel = 'OAuth Client';

    protected static ?string $pluralModelLabel = 'OAuth Clients';

    protected static ?string $navigationGroup = 'API';

    protected static ?string $navigationIcon = 'heroicon-o-key';

    /**
     * Define the form for the resource.
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('OAuth Client Information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Client Name')
                                    ->required()
                                    ->maxLength(255),
                                Select::make('user_id')
                                    ->label('User')
                                    ->relationship('user', 'name')
                                    ->searchable(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('redirect')
                                    ->label('Redirect URL')
                                    ->maxLength(2000)
                                    ->helperText('URL to redirect after authentication'),
                                TextInput::make('secret')
                                    ->label('Client Secret')
                                    ->password()
                                    ->maxLength(100),
                            ]),
                        Grid::make(3)
                            ->schema([
                                Select::make('provider')
                                    ->label('Provider')
                                    ->options([
                                        'users' => 'Users',
                                    ])
                                    ->helperText('Authentication provider'),
                                TextInput::make('personal_access_client')
                                    ->label('Personal Access')
                                    ->numeric()
                                    ->helperText('Is personal access client?'),
                                TextInput::make('password_client')
                                    ->label('Password Client')
                                    ->numeric()
                                    ->helperText('Is password client?'),
                            ]),
                    ])
                    ->columns(2),
            ]);
    }

    /**
     * Define the table for the resource.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->description(fn (Client $record): string => $record->provider ?? '')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('redirect')
                    ->label('Redirect')
                    ->limit(50)
                    ->tooltip(fn (Client $record): string => $record->redirect)
                    ->searchable(isIndividual: true),
                Tables\Columns\IconColumn::make('personal_access_client')
                    ->label('Personal Access')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('password_client')
                    ->label('Password Client')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name'),
                Tables\Filters\TernaryFilter::make('personal_access_client')
                    ->label('Personal Access Client'),
                Tables\Filters\TernaryFilter::make('password_client')
                    ->label('Password Client'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    /**
     * Define the pages available for the resource.
     *
     * @return array<string, string>
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOauthClients::route('/'),
            'create' => Pages\CreateOauthClient::route('/create'),
            'view' => Pages\ViewOauthClient::route('/{record}'),
            'edit' => Pages\EditOauthClient::route('/{record}/edit'),
        ];
    }

    /**
     * Configure the model query.
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user']);
    }
}
