<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Tables\Filters\BaseFilter;
use Override;
use Exception;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
=======
=======
use Exception;
use Modules\Xot\Contracts\UserContract;
use Filament\Tables\Filters\BaseFilter;
>>>>>>> a12f125f4a (.)
=======
use Filament\Tables\Filters\BaseFilter;
use Override;
use Exception;
use Modules\Xot\Contracts\UserContract;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
            'user.name' => TextColumn::make('user.name')
                ->sortable()
                ->searchable()
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                ->default(function ($record) {
                    $user = $record->user;
                    $user_class = XotData::make()->getUserClass();
                    if ($user === null) {
                        if ($record->email === null) {
                            $record->update(['email' => fake()->email()]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
                ->default(
                    function ($record) {
                        $user = $record->user;
                        $user_class = XotData::make()->getUserClass();
                        if ($user === null) {
                            if ($record->email == null) {
                                $record->update(['email' => fake()->email()]);
                            }
                            try {
<<<<<<< HEAD
                                /** @var UserContract */
                                $user = XotData::make()->getUserByEmail($record->email);
                            } catch (Exception $e) {
                                return '--';
                            }
=======
>>>>>>> b93ef594b4 (.)
                        }
                        try {
                            /** @var UserContract */
                            $user = XotData::make()->getUserByEmail($record->email);
                        } catch (Exception $e) {
                            return '--';
                        }
                    }
<<<<<<< HEAD
=======
                                /** @var \Modules\Xot\Contracts\UserContract */
                                $user = XotData::make()->getUserByEmail($record->email);
                            } catch (\Exception $e) {
                                return '--';
                            }
                        }
                        if ($user === null) {
                            $data = $record->toArray();
                            $user_data = Arr::except($data, ['id']);
                            /** @var \Modules\Xot\Contracts\UserContract */
                            $user = $user_class::create($user_data);
                        }
                        $record->update(['user_id' => $user->id]);

                        return $user->name;
                    }
>>>>>>> origin/develop
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
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
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
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, BaseFilter>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return array<string, BaseFilter>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, Tables\Filters\BaseFilter>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                    true: static fn(Builder $query) => $query->where('is_active', '=', true),
                    false: static fn(Builder $query) => $query->where('is_active', '=', false),
=======
                    true: static fn (Builder $query) => $query->where('is_active', '=', true),
                    false: static fn (Builder $query) => $query->where('is_active', '=', false),
>>>>>>> a12f125f4a (.)
=======
                    true: static fn(Builder $query) => $query->where('is_active', '=', true),
                    false: static fn(Builder $query) => $query->where('is_active', '=', false),
>>>>>>> b93ef594b4 (.)
=======
                    true: static fn (Builder $query) => $query->where('is_active', '=', true),
                    false: static fn (Builder $query) => $query->where('is_active', '=', false),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ),
        ];
    }
}
