<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

<<<<<<< HEAD
use Filament\Tables\Filters\BaseFilter;
use Override;
use Exception;
use Modules\Xot\Contracts\UserContract;
=======
use Exception;
use Modules\Xot\Contracts\UserContract;
use Filament\Tables\Filters\BaseFilter;
>>>>>>> fbc8f8e (.)
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * .
 */
class ListProfiles extends XotBaseListRecords
{
    protected static string $resource = BaseProfileResource::class;

    /**
     * @return array<string, Tables\Columns\Column>
     */
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> fbc8f8e (.)
    public function getTableColumns(): array
    {
        return [
            'user.name' => TextColumn::make('user.name')
                ->sortable()
                ->searchable()
<<<<<<< HEAD
                ->default(function ($record) {
                    $user = $record->user;
                    $user_class = XotData::make()->getUserClass();
                    if ($user === null) {
                        if ($record->email === null) {
                            $record->update(['email' => fake()->email()]);
                        }
                        try {
                            /** @var UserContract */
                            $user = XotData::make()->getUserByEmail($record->email);
                        } catch (Exception $e) {
                            return '--';
                        }
                    }
                    if ($user === null) {
                        $data = $record->toArray();
                        $user_data = Arr::except($data, ['id']);
                        /** @var UserContract */
                        $user = $user_class::create($user_data);
                    }
                    $record->update(['user_id' => $user->id]);

                    return $user->name;
                }),
            'first_name' => TextColumn::make('first_name')->sortable()->searchable(),
            'last_name' => TextColumn::make('last_name')->sortable()->searchable(),
            'email' => TextColumn::make('email')->sortable()->searchable(),
            'is_active' => IconColumn::make('is_active')->boolean(),
            'photo' => SpatieMediaLibraryImageColumn::make('photo')->collection('profile'),
=======
                ->default(
                    function ($record) {
                        $user = $record->user;
                        $user_class = XotData::make()->getUserClass();
                        if ($user === null) {
                            if ($record->email == null) {
                                $record->update(['email' => fake()->email()]);
                            }
                            try {
                                /** @var UserContract */
                                $user = XotData::make()->getUserByEmail($record->email);
                            } catch (Exception $e) {
                                return '--';
                            }
                        }
                        if ($user === null) {
                            $data = $record->toArray();
                            $user_data = Arr::except($data, ['id']);
                            /** @var UserContract */
                            $user = $user_class::create($user_data);
                        }
                        $record->update(['user_id' => $user->id]);

                        return $user->name;
                    }
                ),
            'first_name' => TextColumn::make('first_name')
                ->sortable()
                ->searchable(),
            'last_name' => TextColumn::make('last_name')
                ->sortable()
                ->searchable(),
            'email' => TextColumn::make('email')
                ->sortable()
                ->searchable(),
            'is_active' => IconColumn::make('is_active')
                ->boolean(),
            'photo' => SpatieMediaLibraryImageColumn::make('photo')
                ->collection('profile'),
>>>>>>> fbc8f8e (.)
        ];
    }

    /**
     * @return array<string, BaseFilter>
     */
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> fbc8f8e (.)
    public function getTableFilters(): array
    {
        return [
            'is_active' => TernaryFilter::make('is_active')
                ->placeholder(static::trans('filters.is_active.all'))
                ->trueLabel(static::trans('filters.is_active.active'))
                ->falseLabel(static::trans('filters.is_active.inactive'))
                ->queries(
<<<<<<< HEAD
                    true: static fn(Builder $query) => $query->where('is_active', '=', true),
                    false: static fn(Builder $query) => $query->where('is_active', '=', false),
=======
                    true: static fn (Builder $query) => $query->where('is_active', '=', true),
                    false: static fn (Builder $query) => $query->where('is_active', '=', false),
>>>>>>> fbc8f8e (.)
                ),
        ];
    }
}
