<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> fbc8f8e (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> 6d20fbe (.)
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

<<<<<<< HEAD
<<<<<<< HEAD
=======








>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
class TokensRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'tokens';

    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
     * @return array<string, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
        ];
    }

    #[Override]
<<<<<<< HEAD
=======
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
        ];
    }

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
            ->columns([
                TextColumn::make('name'),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // {{ tableEmptyStateActions }}
            ]);
<<<<<<< HEAD
=======
            ->columns(
                [
                    TextColumn::make('name'),
                ]
            )
            ->filters(
                [
                ]
            )
            ->headerActions(
                [
                    CreateAction::make(),
                ]
            )
            ->recordActions(
                [
                    EditAction::make(),
                    DeleteAction::make(),
                ]
            )
            ->toolbarActions(
                [
                    BulkActionGroup::make(
                        [
                            DeleteBulkAction::make(),
                        ]
                    ),
                ]
            )
            ->emptyStateActions(
                [
                    // {{ tableEmptyStateActions }}
                ]
            );
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    }
}
