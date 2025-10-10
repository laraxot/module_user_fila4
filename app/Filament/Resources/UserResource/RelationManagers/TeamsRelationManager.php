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
