<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> fbc8f8e (.)
=======
use Override;
>>>>>>> 6d20fbe (.)
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Resources\SocialProviderResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

<<<<<<< HEAD
<<<<<<< HEAD
=======


>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
/**
 * --.
 */
class ListSocialProviders extends XotBaseListRecords
{
    protected static string $resource = SocialProviderResource::class;

<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> fbc8f8e (.)
=======
    #[Override]
>>>>>>> 6d20fbe (.)
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->wrap(),
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
            'active' => IconColumn::make('active')->boolean()->sortable(),
            'stateless' => IconColumn::make('stateless')->boolean()->sortable(),
            'socialite' => IconColumn::make('socialite')->boolean()->sortable(),
            'scopes' => TextColumn::make('scopes')->searchable()->wrap(),
            'parameters' => TextColumn::make('parameters')->searchable()->wrap(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable(),
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
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'active' => SelectFilter::make('active')
                ->options([
                    true => 'Active',
                    false => 'Inactive',
                ]),
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        ];
    }
}
