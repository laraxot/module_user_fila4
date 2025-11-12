<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Models\User;

class TeamsRelationManager extends RelationManager
{
    protected static string $relationship = 'teams';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                IconColumn::make('personal_team')
                    ->boolean()
<<<<<<< HEAD
                    ->default(function ($record, $livewire): bool {
                        /**
                         * @var \Illuminate\Database\Eloquent\Model $record
                         * @var \Filament\Resources\RelationManagers\RelationManager $livewire
                         */
                        $user = $livewire->getOwnerRecord();

                        if (! $user instanceof User) {
                            return false;
                        }

                        /** @var int|string $recordId */
                        $recordId = $record->getKey();

                        return $user->current_team_id === $recordId;
=======
                    ->default(function ($record, $livewire) {
                        if (! is_object($livewire) || ! method_exists($livewire, 'getOwnerRecord')) {
                            return false;
                        }
                        $owner = $livewire->getOwnerRecord();
                        if (! $owner instanceof \Illuminate\Database\Eloquent\Model) {
                            return false;
                        }
                        if (! $record instanceof \Illuminate\Database\Eloquent\Model) {
                            return false;
                        }
                        return $owner->getAttribute('current_team_id') === $record->getKey();
>>>>>>> e058848 (.)
                    }),
            ])
            ->filters([

            ])
            ->headerActions([
                AttachAction::make()->schema(fn (AttachAction $action): array => [
                    $action->getRecordSelect(),
                    TextInput::make('role')->default('editor')->required(),
                ]),
            ])
            ->recordActions([
                DetachAction::make()->after(function ($record, $livewire): void {
<<<<<<< HEAD
                    /**
                     * @var \Illuminate\Database\Eloquent\Model $record
                     * @var \Filament\Resources\RelationManagers\RelationManager $livewire
                     */
                    $user = $livewire->getOwnerRecord();

                    if (! $user instanceof User) {
                        return;
                    }

=======
                    if (! is_object($livewire) || ! method_exists($livewire, 'getOwnerRecord')) {
                        return;
                    }
                    $user = $livewire->getOwnerRecord();
                    if (! $user instanceof \Illuminate\Database\Eloquent\Model) {
                        return;
                    }
                    if (! is_object($record) || ! method_exists($record, 'getKey')) {
                        return;
                    }
                    $team_id = $record->getKey();
>>>>>>> e058848 (.)
                    $user->update([
                        'current_team_id' => null,
                    ]);
                }),
            ])
            ->toolbarActions([
                DetachBulkAction::make(),
            ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('personal_team')->sortable(),
            TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
}
