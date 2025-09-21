<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

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
>>>>>>> 81efa49 (.)
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
<<<<<<< HEAD
=======
=======
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
class TokensRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'tokens';

    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
=======
     * @return array<string, \Filament\Schemas\Components\Component>
=======
     * @return array<string, Component>
>>>>>>> b93ef594b4 (.)
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
        ];
    }

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
        ];
    }

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
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
<<<<<<< HEAD
            ->recordActions(
=======
            ->actions(
>>>>>>> origin/develop
                [
                    EditAction::make(),
                    DeleteAction::make(),
                ]
            )
<<<<<<< HEAD
            ->toolbarActions(
=======
            ->bulkActions(
>>>>>>> origin/develop
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
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
