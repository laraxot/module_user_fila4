<?php

/**
 * --.
 */
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

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
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
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
class DomainsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'domains';

    /**
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
            'domain' => TextInput::make('domain')
                ->required()
                ->prefix('http(s)://')
<<<<<<< HEAD
                ->suffix('.' . request()->getHost())
=======
<<<<<<< HEAD
<<<<<<< HEAD
                ->suffix('.' . request()->getHost())
=======
                ->suffix('.'.request()->getHost())
>>>>>>> a12f125f4a (.)
=======
                ->suffix('.' . request()->getHost())
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            'domain' => Forms\Components\TextInput::make('domain')
                ->required()
                ->prefix('http(s)://')
                ->suffix('.'.request()->getHost())
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->maxLength(255),
        ];
    }

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
            ->recordTitleAttribute('domain')
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
            ->columns(
                [
                    TextColumn::make('domain'),
                    TextColumn::make('full-domain')->getStateUsing(static fn ($record) => Str::of($record->domain)->append('.')->append(request()->getHost())),
=======
            ->columns(
                [
                    Tables\Columns\TextColumn::make('domain'),
                    Tables\Columns\TextColumn::make('full-domain')->getStateUsing(static fn ($record) => Str::of($record->domain)->append('.')->append(request()->getHost())),
>>>>>>> origin/develop
                ]
            )
            ->filters(
                [
                ]
            )
            ->headerActions(
                [
<<<<<<< HEAD
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
=======
                    Tables\Actions\CreateAction::make(),
                ]
            )
            ->actions(
                [
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]
            )
            ->bulkActions(
                [
                    Tables\Actions\BulkActionGroup::make(
                        [
                            Tables\Actions\DeleteBulkAction::make(),
>>>>>>> origin/develop
                        ]
                    ),
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
