<?php

/**
 * @see https://github.com/Althinect/filament-spatie-roles-permissions/blob/2.x/src/resources/PermissionResource/RelationManager/RoleRelationManager.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\RelationManager;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop








<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
class RoleRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'roles';

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    protected static null|string $recordTitleAttribute = 'name';

    /**
     * @return array<string, Component>
     */
    #[Override]
<<<<<<< HEAD
=======
=======
    protected static ?string $recordTitleAttribute = 'name';
=======
    protected static null|string $recordTitleAttribute = 'name';
>>>>>>> b93ef594b4 (.)

    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<string, \Filament\Forms\Components\Component>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name'),
            'guard_name' => TextInput::make('guard_name'),
        ];
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable(),
            TextColumn::make('guard_name')->searchable(),
        ])->filters([]);
    }

    protected static function getModelLabel(): null|string
<<<<<<< HEAD
=======
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable(),
            TextColumn::make('guard_name')->searchable(),
        ])->filters([]);
    }

<<<<<<< HEAD
    protected static function getModelLabel(): ?string
>>>>>>> a12f125f4a (.)
=======
    protected static function getModelLabel(): null|string
>>>>>>> b93ef594b4 (.)
=======
    public function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                    TextColumn::make('name')
                        ->searchable(),
                    TextColumn::make('guard_name')
                        ->searchable(),
                ]
            )
            ->filters(
                [
                ]
            );
    }

    protected static function getModelLabel(): ?string
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        // return __('filament-spatie-roles-permissions::filament-spatie.section.role');
        return __('filament-spatie-roles-permissions::filament-spatie.section.role');
    }

    protected static function getPluralModelLabel(): string
    {
        return __('filament-spatie-roles-permissions::filament-spatie.section.roles');
    }
}
