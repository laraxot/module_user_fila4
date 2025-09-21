<?php

declare(strict_types=1);

/**
 * @see https://github.com/savannabits/filament-tenancy-starter/blob/main/app/Filament/resources/TenantResource.php
 */

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Resources\TenantResource\RelationManagers\UsersRelationManager;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
=======
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
>>>>>>> b93ef594b4 (.)
=======
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\TenantResource\Pages\CreateTenant;
use Modules\User\Filament\Resources\TenantResource\Pages\EditTenant;
use Modules\User\Filament\Resources\TenantResource\Pages\ListTenants;
use Modules\User\Filament\Resources\TenantResource\Pages\ViewTenant;
use Modules\User\Filament\Resources\TenantResource\RelationManagers;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Services\XotService;

<<<<<<< HEAD
class TenantResource extends XotBaseResource
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';
=======
=======
=======
>>>>>>> origin/develop
use Modules\Xot\Filament\Resources\XotBaseResource;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Modules\Xot\Services\XotService;

<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Services\XotService;

>>>>>>> a12f125f4a (.)
class TenantResource extends XotBaseResource
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class TenantResource extends XotBaseResource
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Get the model class name for this resource.
     *
<<<<<<< HEAD
     * @return class-string<Model>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return class-string<Model>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return class-string<\Illuminate\Database\Eloquent\Model>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public static function getModel(): string
    {
        $xot = app(XotService::class);
        return $xot->getTenantClass();
    }

<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public static function getFormSchema(): array
    {
        return [
            Section::make()
                ->schema([
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                    TextInput::make('name')
                        ->required()
                        ->unique(
                            table: 'tenants',
                            ignoreRecord: true,
                        )
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (callable $set, $state) {
                            $set('slug', Str::slug($state));
                            $set('domain', Str::slug($state));
                        })
                        ->columnSpanFull()
                        ->placeholder('Nome del tenant')
                        ->helperText('Inserisci il nome del tenant'),
                    TextInput::make('slug')
                        ->required()
                        ->disabled(fn($context) => $context !== 'create')
                        ->unique(
                            table: 'tenants',
                            ignoreRecord: true,
                        )
                        ->helperText('Lo slug verrà generato automaticamente dal nome'),
                    TextInput::make('domain')
                        ->required()
                        ->visible(fn($context) => $context === 'create')
                        ->unique(
                            table: 'domains',
                            ignoreRecord: true,
                        )
                        ->prefix('https://')
                        ->suffix('.' . request()->getHost())
                        ->placeholder('dominio')
                        ->helperText('Il dominio del tenant'),
                    TextInput::make('email_address')
                        ->email()
                        ->placeholder('email@example.com')
                        ->helperText('Indirizzo email del tenant'),
                    TextInput::make('phone')
                        ->tel()
                        ->placeholder('Telefono')
                        ->helperText('Numero di telefono del tenant'),
                    TextInput::make('mobile')
                        ->tel()
                        ->placeholder('Cellulare')
                        ->helperText('Numero di cellulare del tenant'),
                    TextInput::make('address')->placeholder('Indirizzo')->helperText('Indirizzo del tenant'),
                    ColorPicker::make('primary_color')->helperText('Colore primario del tenant'),
                    ColorPicker::make('secondary_color')->helperText('Colore secondario del tenant'),
                ])
                ->columns(2),
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        ];
    }

    #[Override]
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
                        TextInput::make('name')
                            ->required()
                            ->unique(table: 'tenants', ignoreRecord: true)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (callable $set, $state) {
                                $set('slug', Str::slug($state));
                                $set('domain', Str::slug($state));
                            })
                            ->columnSpanFull()
                            ->placeholder('Nome del tenant')
                            ->helperText('Inserisci il nome del tenant'),

                        TextInput::make('slug')
                            ->required()
                            ->disabled(fn ($context) => $context !== 'create')
                            ->unique(table: 'tenants', ignoreRecord: true)
                            ->helperText('Lo slug verrà generato automaticamente dal nome'),

                        TextInput::make('domain')
                            ->required()
                            ->visible(fn ($context) => $context === 'create')
                            ->unique(table: 'domains', ignoreRecord: true)
                            ->prefix('https://')
                            ->suffix('.'.request()->getHost())
                            ->placeholder('dominio')
                            ->helperText('Il dominio del tenant'),

                        TextInput::make('email_address')
                            ->email()
                            ->placeholder('email@example.com')
                            ->helperText('Indirizzo email del tenant'),

                        TextInput::make('phone')
                            ->tel()
                            ->placeholder('Telefono')
                            ->helperText('Numero di telefono del tenant'),

                        TextInput::make('mobile')
                            ->tel()
                            ->placeholder('Cellulare')
                            ->helperText('Numero di cellulare del tenant'),

                        TextInput::make('address')
                            ->placeholder('Indirizzo')
                            ->helperText('Indirizzo del tenant'),

                        ColorPicker::make('primary_color')
                            ->helperText('Colore primario del tenant'),

                        ColorPicker::make('secondary_color')
                            ->helperText('Colore secondario del tenant'),
                    ])
                    ->columns(2)
        ];
    }

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        ];
    }

    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public static function getRelations(): array
    {
        return [
            // RelationManagers\DomainsRelationManager::class,
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            UsersRelationManager::class,
        ];
    }

<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
            RelationManagers\UsersRelationManager::class,
        ];
    }

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public static function getPages(): array
    {
        return [
            'index' => ListTenants::route('/'),
            'create' => CreateTenant::route('/create'),
            'view' => ViewTenant::route('/{record}'),
            'edit' => EditTenant::route('/{record}/edit'),
        ];
    }
}
