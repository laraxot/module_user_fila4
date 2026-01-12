<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Filament\Resources\TeamUserResource\Pages;
use Modules\User\Models\TeamUser;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Class TeamUserResource.
 */
final class TeamUserResource extends XotBaseResource
{
    protected static ?string $model = TeamUser::class;

<<<<<<< HEAD
=======
    protected static ?string $recordTitleAttribute = 'id';



>>>>>>> 32e772a8 (.)
    /**
     * @return array<string, Component>
     */
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            'team_user' => Section::make('Team User Information')
                ->schema([
                    'team_id' => Select::make('team_id')
                        ->label('Team')
                        ->relationship('team', 'name')
                        ->required()
                        ->searchable(),
                    'user_id' => Select::make('user_id')
                        ->label('User')
                        ->relationship('user', 'name')
                        ->required()
                        ->searchable(),
                    'role' => Select::make('role')
                        ->label('Role')
                        ->options([
                            'admin' => 'Admin',
                            'member' => 'Member',
                            'viewer' => 'Viewer',
                        ])
                        ->required()
                        ->searchable()
                        ->helperText('Role of the user in the team'),
                ])
                ->columns(2),
        ];
    }

    /**
     * Define the pages available for the resource.
     *
     * @return array<string, PageRegistration>
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeamUsers::route('/'),
            'create' => Pages\CreateTeamUser::route('/create'),
            'view' => Pages\ViewTeamUser::route('/{record}'),
            'edit' => Pages\EditTeamUser::route('/{record}/edit'),
        ];
    }

    /**
     * Configure the model query.
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['team', 'user']);
    }
}