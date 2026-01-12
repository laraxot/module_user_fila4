<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Modules\User\Models\TeamPermission;
use Modules\Xot\Filament\Resources\XotBaseResource;

class TeamPermissionResource extends XotBaseResource
{
    protected static ?string $model = TeamPermission::class;

<<<<<<< HEAD
    protected static string|\UnitEnum|null $navigationGroup = 'Gestione Utenti';

    protected static ?int $navigationSort = 15;

    public static function getNavigationLabel(): string
    {
        return __('user::team_permission.navigation.label');
    }

    public static function getPluralLabel(): string
    {
        return __('user::team_permission.navigation.plural');
    }

    public static function getModelLabel(): string
    {
        return __('user::team_permission.navigation.name');
    }

=======
>>>>>>> 32e772a8 (.)
    /**
     * Get the form schema for the resource (XotBaseResource pattern).
     *
     * @return array<string, Field|Section>
     */
    public static function getFormSchema(): array
    {
        return [
            'section01' => Section::make([
                'team_id' => Select::make('team_id')
                    ->relationship('team', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                'user_id' => Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                'permission' => TextInput::make('permission')
                    ->required()
                    ->maxLength(255),
            ]),
        ];
    }
}