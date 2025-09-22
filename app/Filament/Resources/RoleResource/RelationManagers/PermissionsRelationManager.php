<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\Component;
=======
use Filament\Schemas\Components\Component;
>>>>>>> a63f578 (.)
=======
use Filament\Schemas\Components\Component;
>>>>>>> 041533e (.)
=======
use Filament\Schemas\Components\Component;
>>>>>>> 00a34d0 (.)
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms;
use Filament\Forms\Form;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Form;
=======
>>>>>>> a63f578 (.)
=======
>>>>>>> 041533e (.)
=======
>>>>>>> 00a34d0 (.)
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class PermissionsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'permissions';

    /**
     * Configura lo schema del form per la gestione dei permessi.
     *
     * @return array<string, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->placeholder(__('Inserisci il nome del permesso')),
        ];
    }

    /**
     * Configura la tabella per la visualizzazione e la gestione dei permessi.
     */
    #[Override]
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
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
            ]);
    }
}
