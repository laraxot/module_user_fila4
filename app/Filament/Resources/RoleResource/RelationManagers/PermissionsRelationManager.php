<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

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
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables;
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
class PermissionsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'permissions';

    /**
     * Configura lo schema del form per la gestione dei permessi.
     *
<<<<<<< HEAD
     * @return array<string, Component>
     */
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, Component>
     */
    #[Override]
=======
     * @return array<string, \Filament\Schemas\Components\Component>
     */
>>>>>>> a12f125f4a (.)
=======
     * @return array<string, Component>
     */
    #[Override]
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
<<<<<<< HEAD
=======
=======
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            'name' => Forms\Components\TextInput::make('name')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->required()
                ->maxLength(255)
                ->placeholder(__('Inserisci il nome del permesso')),
        ];
    }

    /**
     * Configura la tabella per la visualizzazione e la gestione dei permessi.
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                TextColumn::make('name')->sortable()->searchable(),
            ])
            ->filters([]) // Aggiungi eventuali filtri qui se necessario
            ->headerActions([
                CreateAction::make()->tooltip(__('Crea un nuovo permesso')),
            ])
            ->recordActions([
                EditAction::make()->tooltip(__('Modifica permesso')),
                DeleteAction::make()->tooltip(__('Elimina permesso')),
            ])
            ->toolbarActions([
                DeleteBulkAction::make()->tooltip(__('Elimina i permessi selezionati')),
<<<<<<< HEAD
=======
=======
                TextColumn::make('name')

                    ->sortable()
                    ->searchable(),
=======
                TextColumn::make('name')->sortable()->searchable(),
>>>>>>> b93ef594b4 (.)
            ])
            ->filters([]) // Aggiungi eventuali filtri qui se necessario
            ->headerActions([
                CreateAction::make()->tooltip(__('Crea un nuovo permesso')),
            ])
            ->recordActions([
                EditAction::make()->tooltip(__('Modifica permesso')),
                DeleteAction::make()->tooltip(__('Elimina permesso')),
            ])
            ->toolbarActions([
<<<<<<< HEAD
                DeleteBulkAction::make()

                    ->tooltip(__('Elimina i permessi selezionati')),
>>>>>>> a12f125f4a (.)
=======
                DeleteBulkAction::make()->tooltip(__('Elimina i permessi selezionati')),
>>>>>>> b93ef594b4 (.)
=======
                Tables\Columns\TextColumn::make('name')

                    ->sortable()
                    ->searchable(),
            ])
            ->filters([]) // Aggiungi eventuali filtri qui se necessario
            ->headerActions([
                Tables\Actions\CreateAction::make()

                    ->tooltip(__('Crea un nuovo permesso')),
            ])
            ->actions([
                Tables\Actions\EditAction::make()

                    ->tooltip(__('Modifica permesso')),
                Tables\Actions\DeleteAction::make()

                    ->tooltip(__('Elimina permesso')),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()

                    ->tooltip(__('Elimina i permessi selezionati')),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            ]);
    }
}
