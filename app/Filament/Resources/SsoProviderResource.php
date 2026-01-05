<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Override;
use Modules\User\Filament\Resources\SsoProviderResource\Pages\ListSsoProviders;
use Modules\User\Filament\Resources\SsoProviderResource\Pages\CreateSsoProvider;
use Modules\User\Filament\Resources\SsoProviderResource\Pages\ViewSsoProvider;
use Modules\User\Filament\Resources\SsoProviderResource\Pages\EditSsoProvider;
use Filament\Support\Components\Component;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\PageRegistration;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\SsoProviderResource\Pages;
use Modules\User\Filament\Resources\SsoProviderResource\RelationManagers\UsersRelationManager;
use Modules\User\Models\SsoProvider;
use Modules\Xot\Filament\Resources\XotBaseResource;

class SsoProviderResource extends XotBaseResource
{
    protected static ?string $model = SsoProvider::class;

    protected static ?string $recordTitleAttribute = 'display_name';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-identification';

    /**
     * @return array<string, Component>
     */
    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
            'display_name' => TextInput::make('display_name')
                ->required()
                ->maxLength(255),
            'type' => Select::make('type')
                ->options([
                    'saml' => 'SAML',
                    'oidc' => 'OIDC',
                    'oauth' => 'OAuth',
                ])
                ->required(),
            'entity_id' => TextInput::make('entity_id')->maxLength(255),
            'client_id' => TextInput::make('client_id')->maxLength(255),
            'client_secret' => TextInput::make('client_secret')
                ->password()
                ->maxLength(255),
            'redirect_url' => TextInput::make('redirect_url')
                ->url()
                ->maxLength(255),
            'metadata_url' => TextInput::make('metadata_url')
                ->url()
                ->maxLength(255),
            'scopes' => Textarea::make('scopes')->rows(2),
            'settings' => KeyValue::make('settings'),
            'domain_whitelist' => KeyValue::make('domain_whitelist'),
            'role_mapping' => KeyValue::make('role_mapping'),
            'is_active' => Toggle::make('is_active'),
        ];
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return $table;
    }

    /**
     * @return array<string, class-string<RelationManager>>
     */
    #[Override]
    public static function getRelations(): array
    {
        return [
            'users' => UsersRelationManager::class,
        ];
    }

    /**
     * @return array<string, PageRegistration>
     */
    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListSsoProviders::route('/'),
            'create' => CreateSsoProvider::route('/create'),
            'view' => ViewSsoProvider::route('/{record}'),
            'edit' => EditSsoProvider::route('/{record}/edit'),
        ];
    }
}
