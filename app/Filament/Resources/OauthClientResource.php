<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\Client;
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

    // $navigationIcon gestito automaticamente da NavigationLabelTrait tramite traduzioni

    /**
     * Schema del form per la risorsa.
     */
    public static function getFormSchema(): array
    {
        return [
            \Filament\Schemas\Components\Section::make('OAuth Client Information')
                ->schema([
                    \Filament\Schemas\Components\Grid::make(2)
                        ->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Select::make('user_id')
                                ->relationship('user', 'name')
                                ->searchable(),
                        ]),
                    \Filament\Schemas\Components\Grid::make(2)
                        ->schema([
                            TextInput::make('redirect')
                                ->maxLength(2000),
                            TextInput::make('secret')
                                ->password()
                                ->maxLength(100),
                        ]),
                    \Filament\Schemas\Components\Grid::make(3)
                        ->schema([
                            Select::make('provider')
                                ->options([
                                    'users' => 'Users',
                                ]),
                            TextInput::make('personal_access_client')
                                ->numeric(),
                            TextInput::make('password_client')
                                ->numeric(),
                        ]),
                ])
                ->columns(2),
        ];
    }

    // table() NON necessario - gestito dalla pagina ListOauthClients tramite getTableColumns()
    // getPages() NON necessario - gestito automaticamente da XotBaseResource

    /**
     * Configure the model query.
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user']);
    }
}
