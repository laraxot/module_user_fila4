<?php

/**
 * --.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

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
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

<<<<<<< HEAD
<<<<<<< HEAD
=======








>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
class DomainsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'domains';

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, Component>
     */
    #[Override]
=======
     * @return array<string, \Filament\Schemas\Components\Component>
     */
>>>>>>> fbc8f8e (.)
=======
     * @return array<string, Component>
     */
    #[Override]
>>>>>>> 6d20fbe (.)
    public function getFormSchema(): array
    {
        return [
            'domain' => TextInput::make('domain')
                ->required()
                ->prefix('http(s)://')
<<<<<<< HEAD
<<<<<<< HEAD
                ->suffix('.' . request()->getHost())
=======
                ->suffix('.'.request()->getHost())
>>>>>>> fbc8f8e (.)
=======
                ->suffix('.' . request()->getHost())
>>>>>>> 6d20fbe (.)
                ->maxLength(255),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> fbc8f8e (.)
=======
    #[Override]
>>>>>>> 6d20fbe (.)
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('domain')
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
            ->columns([
                TextColumn::make('domain'),
                TextColumn::make('full-domain')->getStateUsing(
                    static fn($record) => Str::of($record->domain)->append('.')->append(request()->getHost()),
                ),
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
            ]);
<<<<<<< HEAD
=======
            ->columns(
                [
                    TextColumn::make('domain'),
                    TextColumn::make('full-domain')->getStateUsing(static fn ($record) => Str::of($record->domain)->append('.')->append(request()->getHost())),
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
            );
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    }
}
