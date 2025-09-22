<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

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
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\TextInput;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ClientsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'clients';

    /**
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
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
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
    }
}
