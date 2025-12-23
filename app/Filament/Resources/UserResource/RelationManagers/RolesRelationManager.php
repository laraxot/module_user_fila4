<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Actions\Header\AttachRoleAction;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
<<<<<<< HEAD
use Override;
=======
>>>>>>> laraxot/develop

class RolesRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';

    // protected static ?string $inverseRelationship = 'section'; // Since the inverse related model is `Category`, this is normally `category`, not `section`.
    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    // }
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 220cf97b (.)
=======
    #[\Override]
>>>>>>> laraxot/develop
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
        ];
    }

    /**
     * @return array<string, Column>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 220cf97b (.)
=======
    #[\Override]
>>>>>>> laraxot/develop
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name'),
            'team_id' => TextColumn::make('team_id'),
        ];
    }

    /**
     * @return array<string, Action>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 220cf97b (.)
=======
    #[\Override]
>>>>>>> laraxot/develop
    public function getTableHeaderActions(): array
    {
        $xotData = XotData::make();

        /** @var array<string, Action> $parentActions */
        $parentActions = parent::getTableHeaderActions();

        return array_merge(
            $parentActions,
            [
                'attach' => AttachRoleAction::make(),
            ]
        );
    }
}
