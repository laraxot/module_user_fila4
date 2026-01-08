<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\Action;
use Filament\Actions\AttachAction;
use Filament\Actions\BulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
>>>>>>> dd73b41a (.)
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class TeamsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<string, Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
<<<<<<< HEAD
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'personal_team' => IconColumn::make('personal_team')
                ->boolean()
                ->getStateUsing(function (Model $record, self $livewire): bool {
                    /** @var User $user */
                    $user = $livewire->getOwnerRecord();
=======
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                IconColumn::make('personal_team')
                    ->boolean()
                    ->default(function ($record, $livewire): bool {
                        /**
                         * @var Model           $record
                         * @var RelationManager $livewire
                         */
                        $user = $livewire->getOwnerRecord();
>>>>>>> dd73b41a (.)

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
     * @return array<string, Action>
     */
    #[\Override]
    public function getTableHeaderActions(): array
    {
        return [
            'attach' => AttachAction::make()
                ->schema(fn (AttachAction $action): array => [
                    $action->getRecordSelect(),
                    TextInput::make('role')->default('editor')->required(),
                ]),
        ];
    }

    /**
     * @return array<string, Action>
     */
    #[\Override]
    public function getTableActions(): array
    {
        return [
            'detach' => DetachAction::make()
                ->after(function (Model $_record, self $livewire): void {
                    /** @var User $user */
                    $user = $livewire->getOwnerRecord();

                    if (! $user instanceof User) {
                        return;
                    }

                    $user->update([
                        'current_team_id' => null,
                    ]);
                }),
<<<<<<< HEAD
        ];
=======
            ])
            ->toolbarActions([
                DetachBulkAction::make(),
            ]);
>>>>>>> dd73b41a (.)
    }

    /**
     * @return array<string, BulkAction>
     */
    #[\Override]
    public function getTableBulkActions(): array
    {
        return [
<<<<<<< HEAD
            'detach' => DetachBulkAction::make(),
=======
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('personal_team')->sortable(),
            TextColumn::make('created_at')->dateTime()->sortable(),
>>>>>>> dd73b41a (.)
        ];
    }
}
