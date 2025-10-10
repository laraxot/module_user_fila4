<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Actions\Header\AttachRoleAction;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class RolesRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';

    // protected static ?string $inverseRelationship = 'section'; // Since the inverse related model is `Category`, this is normally `category`, not `section`.
    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    // }
    #[\Override]
    /**
     * @return array<string, mixed>
     */
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
    #[\Override]
    /**
     * @return array<string, mixed>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name'),
            'team_id' => TextColumn::make('team_id'),
        ];
    }

    /**
     * @return array<string, Action|\Filament\Actions\ActionGroup>
     */
    #[\Override]
    /**
     * @return array<string, mixed>
     */
    public function getTableHeaderActions(): array
    {
        $xotData = XotData::make();
        $parentActions = parent::getTableHeaderActions();

        $actions = [];
        foreach ($parentActions as $key => $action) {
            if (is_string($key) && ($action instanceof \Filament\Actions\Action || $action instanceof \Filament\Actions\ActionGroup)) {
                $actions[$key] = $action;
            }
        }

        $actions['attach'] = AttachRoleAction::make();

        return $actions;
    }
}
