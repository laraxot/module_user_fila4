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
use Filament\Actions\AttachAction;
use Filament\Actions\EditAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
<<<<<<< HEAD
=======
=======
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\EditAction;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Xot\Datas\XotData;
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
class RolesRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'roles';

<<<<<<< HEAD
    protected static null|string $recordTitleAttribute = 'name';
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $recordTitleAttribute = 'name';
=======
    protected static ?string $recordTitleAttribute = 'name';
>>>>>>> a12f125f4a (.)
=======
    protected static null|string $recordTitleAttribute = 'name';
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

    // protected static ?string $inverseRelationship = 'section'; // Since the inverse related model is `Category`, this is normally `category`, not `section`.
    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    // }
    /**
     * @return array<string, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            /*
             * 'team_id' => Forms\Components\Select::make('team_id')
             * ->relationship('teams', 'name'),
             */
        ];
    }

    #[Override]
<<<<<<< HEAD
=======
=======
    //
=======
>>>>>>> b93ef594b4 (.)
    // }
    /**
     * @return array<string, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            /*
             * 'team_id' => Forms\Components\Select::make('team_id')
             * ->relationship('teams', 'name'),
             */
        ];
    }

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
    protected static ?string $recordTitleAttribute = 'name';

    // protected static ?string $inverseRelationship = 'section'; // Since the inverse related model is `Category`, this is normally `category`, not `section`.

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //
    // }

    /**
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
            /*
            'team_id' => Forms\Components\Select::make('team_id')
                ->relationship('teams', 'name'),
            */
        ];
    }

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function table(Table $table): Table
    {
        $xotData = XotData::make();

        return $table
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('team_id'),
            ])
            ->filters([])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
                AttachAction::make()
                    // ->mutateFormDataUsing(function (array $data): array {
                    //     // This is the test.
                    //     $data['team_id'] = 2;
                    //     return $data;
                    // }),
                    ->schema(static fn(AttachAction $action): array => [
                        $action->getRecordSelect(),
                        // Forms\Components\TextInput::make('team_id')->required(),
                        Select::make('team_id')->options($xotData->getTeamClass()::get()->pluck('name', 'id')),
                        // ->options(function($item){
                        //     dddx($this);
                        // })
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                DetachAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
            ->columns(
                [
                    TextColumn::make('id'),
                    TextColumn::make('name'),
                    TextColumn::make('team_id'),
                ]
            )
            ->filters(
                [
                ]
            )
            ->headerActions(
                [
                    // Tables\Actions\CreateAction::make(),
                    AttachAction::make()
                        // ->mutateFormDataUsing(function (array $data): array {
                        //     // This is the test.
                        //     $data['team_id'] = 2;
                        //     return $data;
                        // }),
                        ->form(
                            static fn (AttachAction $action): array => [
                                $action->getRecordSelect(),
                                // Forms\Components\TextInput::make('team_id')->required(),
                                Select::make('team_id')
                                    ->options($xotData->getTeamClass()::get()->pluck('name', 'id')),
                                // ->options(function($item){
                                //     dddx($this);
                                // })
                            ]
                        ),
                ]
            )
<<<<<<< HEAD
            ->recordActions(
=======
            ->actions(
>>>>>>> origin/develop
                [
                    EditAction::make(),
                    // Tables\Actions\DeleteAction::make(),
                    DetachAction::make(),
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
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
