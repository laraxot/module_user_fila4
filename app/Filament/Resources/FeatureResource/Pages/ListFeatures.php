<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\FeatureResource\Pages;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Override;
=======
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Resources\FeatureResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListFeatures extends XotBaseListRecords
{
    protected static string $resource = FeatureResource::class;

    /**
<<<<<<< HEAD
     * @return array<string, Column>
     */
=======
<<<<<<< HEAD
     * @return array<string, Column>
     */
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'type' => TextColumn::make('type')->searchable()->sortable(),
            'active' => IconColumn::make('active')->boolean(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
<<<<<<< HEAD
=======
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'type' => TextColumn::make('type')->searchable()->sortable(),
            'active' => IconColumn::make('active')->boolean(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
<<<<<<< HEAD

   
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'type' => TextColumn::make('type')
                ->searchable()
                ->sortable(),
            'active' => IconColumn::make('active')
                ->boolean(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ];
    }

   
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
