<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

<<<<<<< HEAD
use Override;
use Filament\Tables\Filters\SelectFilter;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
use Filament\Tables\Filters\SelectFilter;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Resources\SocialProviderResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======


>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======


>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
/**
 * --.
 */
class ListSocialProviders extends XotBaseListRecords
{
    protected static string $resource = SocialProviderResource::class;

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
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->wrap(),
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
            'active' => IconColumn::make('active')->boolean()->sortable(),
            'stateless' => IconColumn::make('stateless')->boolean()->sortable(),
            'socialite' => IconColumn::make('socialite')->boolean()->sortable(),
            'scopes' => TextColumn::make('scopes')->searchable()->wrap(),
            'parameters' => TextColumn::make('parameters')->searchable()->wrap(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable(),
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        ];
    }

    #[Override]
    public function getTableFilters(): array
    {
        return [
            'active' => SelectFilter::make('active')->options([
                true => 'Active',
                false => 'Inactive',
            ]),
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
            'active' => IconColumn::make('active')
                ->boolean()
                ->sortable(),
            'stateless' => IconColumn::make('stateless')
                ->boolean()
                ->sortable(),
            'socialite' => IconColumn::make('socialite')
                ->boolean()
                ->sortable(),
            'scopes' => TextColumn::make('scopes')
                ->searchable()
                ->wrap(),
            'parameters' => TextColumn::make('parameters')
                ->searchable()
                ->wrap(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable(),
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
        ];
    }

    #[Override]
    public function getTableFilters(): array
    {
        return [
<<<<<<< HEAD
            'active' => SelectFilter::make('active')
=======
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'active' => \Filament\Tables\Filters\SelectFilter::make('active')
>>>>>>> origin/develop
                ->options([
                    true => 'Active',
                    false => 'Inactive',
                ]),
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            'active' => SelectFilter::make('active')->options([
                true => 'Active',
                false => 'Inactive',
            ]),
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }
}
