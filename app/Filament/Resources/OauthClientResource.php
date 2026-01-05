<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid as SchemaGrid;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\Client;
use Modules\User\Filament\Resources\OauthClientResource\Pages;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Schemas\Components\XotBaseSection;

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
     *
     * @return array<string, Modules\Xot\Filament\Schemas\Components\XotBaseSection>
     */
    public static function getFormSchema(): array
    {
        return [
            XotBaseSection::make('OAuth Client Information')
                ->schema([
                    SchemaGrid::make(2)
                        ->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Select::make('user_id')
                                ->relationship('user', 'name')
                                ->searchable(),
                        ]),
                    SchemaGrid::make(2)
                        ->schema([
                            TextInput::make('redirect')
                                ->maxLength(2000),
                            TextInput::make('secret')
                                ->password()
                                ->maxLength(100),
                        ]),
                    SchemaGrid::make(3)
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
