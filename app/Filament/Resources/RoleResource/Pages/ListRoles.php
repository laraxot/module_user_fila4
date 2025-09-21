<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
use Override;
use Filament\Tables\Filters\SelectFilter;
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
use Filament\Tables\Filters\SelectFilter;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Models\Role;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListRoles extends XotBaseListRecords
{
    protected static string $resource = RoleResource::class;

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
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            'name' => TextColumn::make('name')->searchable()->sortable(),
            // Tables\Columns\TextColumn::make('role'),
            'guard_name' => TextColumn::make('guard_name')->searchable()->sortable(),
            'team_id' => TextColumn::make('team.name')->searchable()->sortable(),
        ];
    }

    #[Override]
<<<<<<< HEAD
=======
=======
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable(),
=======
            'name' => TextColumn::make('name')->searchable()->sortable(),
>>>>>>> b93ef594b4 (.)
            // Tables\Columns\TextColumn::make('role'),
            'guard_name' => TextColumn::make('guard_name')->searchable()->sortable(),
            'team_id' => TextColumn::make('team.name')->searchable()->sortable(),
        ];
    }

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function getTableFilters(): array
    {
        return [
            'guard_name' => SelectFilter::make('guard_name')
<<<<<<< HEAD
=======
=======
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable(),
            // Tables\Columns\TextColumn::make('role'),
            'guard_name' => TextColumn::make('guard_name')
                ->searchable()
                ->sortable(),
            'team_id' => TextColumn::make('team.name')
                ->searchable()
                ->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'guard_name' => Tables\Filters\SelectFilter::make('guard_name')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->options([
                    'web' => 'Web',
                    'api' => 'API',
                    'sanctum' => 'Sanctum',
                ])
                ->multiple(),
        ];
    }
}
