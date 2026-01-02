<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\DetachBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class TeamsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'personal_team' => IconColumn::make('personal_team')
                ->boolean()
                ->getStateUsing(function (Model $record, $livewire): bool {
                    /** @var \Modules\User\Models\User $user */
                    $user = $livewire->getOwnerRecord();

                    if (! $user instanceof User) {
                        return false;
                    }

                    /** @var int|string $recordId */
                    $recordId = $record->getKey();

                    return $user->current_team_id === $recordId;
                }),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    #[\Override]
    public function getTableHeaderActions(): array
    {
        return [
            'attach' => AttachAction::make()
                ->form(fn (AttachAction $action): array => [
                    $action->getRecordSelect(),
                    TextInput::make('role')->default('editor')->required(),
                ]),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    #[\Override]
    public function getTableActions(): array
    {
        return [
            'detach' => DetachAction::make()
                ->after(function (Model $record, $livewire): void {
                    /** @var \Modules\User\Models\User $user */
                    $user = $livewire->getOwnerRecord();

                    if (! $user instanceof User) {
                        return;
                    }

                    $user->update([
                        'current_team_id' => null,
                    ]);
                }),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\BulkAction>
     */
    #[\Override]
    public function getTableBulkActions(): array
    {
        return [
            'detach' => DetachBulkAction::make(),
        ];
    }
}
