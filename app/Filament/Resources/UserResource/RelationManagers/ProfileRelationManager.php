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
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
<<<<<<< HEAD
=======
=======
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
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
class ProfileRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'profile';

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    protected static null|string $recordTitleAttribute = 'first_name';

    /**
     * @return array<string, Component>
     */
    #[Override]
<<<<<<< HEAD
=======
=======
    protected static ?string $recordTitleAttribute = 'first_name';
=======
    protected static null|string $recordTitleAttribute = 'first_name';
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
    protected static ?string $recordTitleAttribute = 'first_name';

    /**
     * @return array<string, \Filament\Forms\Components\Component>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function getFormSchema(): array
    {
        return [
            'ente' => TextInput::make('ente'),
            'matr' => TextInput::make('matr'),
<<<<<<< HEAD
            'first_name' => TextInput::make('first_name')->required()->maxLength(255),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'first_name' => TextInput::make('first_name')->required()->maxLength(255),
=======
            'first_name' => TextInput::make('first_name')
                ->required()
                ->maxLength(255),
>>>>>>> a12f125f4a (.)
=======
            'first_name' => TextInput::make('first_name')->required()->maxLength(255),
>>>>>>> b93ef594b4 (.)
=======
            'first_name' => TextInput::make('first_name')
                ->required()
                ->maxLength(255),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'last_name' => TextInput::make('last_name'),
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
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('ente'),
                TextColumn::make('matr'),
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    public function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                    TextColumn::make('id'),
                    TextColumn::make('ente'),
                    TextColumn::make('matr'),
                    TextColumn::make('first_name'),
                    TextColumn::make('last_name'),
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
                    ViewAction::make(),
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
                    DeleteBulkAction::make(),
                ]
            );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('ente'),
                TextColumn::make('matr'),
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
