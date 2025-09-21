<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\AssociateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\DeleteBulkAction;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\RoleResource;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

=======
=======
>>>>>>> origin/develop




use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;





<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
class ManageRolePermissions extends ManageRelatedRecords
{
    protected static string $resource = RoleResource::class;

    protected static string $relationship = 'permissions';

<<<<<<< HEAD
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';
=======
<<<<<<< HEAD
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';
=======
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    public static function getNavigationLabel(): string
    {
        return 'Permissions';
    }

    public function getFormSchema(): array
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
        ];
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
{


    return [

<<<<<<< HEAD
                TextInput::make('name')
=======
                Forms\Components\TextInput::make('name')
>>>>>>> origin/develop
                    ->required()
                    ->maxLength(255),

      ];
}
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
<<<<<<< HEAD
                TextColumn::make('name'),
            ])
            ->filters([])
=======
<<<<<<< HEAD
                TextColumn::make('name'),
            ])
<<<<<<< HEAD
<<<<<<< HEAD
            ->filters([])
=======
            ->filters([
            ])
>>>>>>> a12f125f4a (.)
=======
            ->filters([])
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
<<<<<<< HEAD
=======
=======
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AssociateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DissociateAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DissociateBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ]),
            ]);
    }
}
