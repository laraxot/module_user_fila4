<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop

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
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 220cf97b (.)
=======
    #[\Override]
>>>>>>> laraxot/develop
    public function getTableColumns(): array
    {
        return [
            'user.name' => TextColumn::make('user.name')
                ->sortable()
                ->searchable()
                ->default(function ($record) {
                    if (! is_object($record)) {
                        return '--';
                    }

                    // PHPStan Level 10: isset() invece di property_exists() per Eloquent relations/attributes
                    $userValue = $record->user ?? null;
                    $user_class = XotData::make()->getUserClass();

<<<<<<< HEAD
<<<<<<< HEAD
                    if ($userValue === null) {
                        $emailValue = $record->email ?? null;

                        if ($emailValue === null) {
=======
=======
>>>>>>> laraxot/develop
                    if (null === $userValue) {
                        $emailValue = $record->email ?? null;

                        if (null === $emailValue) {
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop
                            if (method_exists($record, 'update')) {
                                $record->update(['email' => fake()->email()]);
                            }
                            $emailValue = $record->email ?? '';
                        }

                        if (! is_string($emailValue)) {
                            return '--';
                        }

                        try {
                            $userValue = XotData::make()->getUserByEmail($emailValue);
<<<<<<< HEAD
<<<<<<< HEAD
                        } catch (Exception $e) {
=======
                        } catch (\Exception $e) {
>>>>>>> 220cf97b (.)
=======
                        } catch (\Exception $e) {
>>>>>>> laraxot/develop
                            return '--';
                        }
                    }

                    if (! is_object($userValue)) {
                        return '--';
                    }

                    // PHPStan Level 10: isset() per magic properties di User model
                    $userId = $userValue->id ?? null;

<<<<<<< HEAD
<<<<<<< HEAD
                    if ($userId !== null && method_exists($record, 'update')) {
=======
                    if (null !== $userId && method_exists($record, 'update')) {
>>>>>>> 220cf97b (.)
=======
                    if (null !== $userId && method_exists($record, 'update')) {
>>>>>>> laraxot/develop
                        $record->update(['user_id' => $userId]);
                    }

                    $userName = $userValue->name ?? '--';

                    return is_string($userName) ? $userName : '--';
                }),
            'first_name' => TextColumn::make('first_name')->sortable()->searchable(),
            'last_name' => TextColumn::make('last_name')->sortable()->searchable(),
            'email' => TextColumn::make('email')->sortable()->searchable(),
            'is_active' => IconColumn::make('is_active')->boolean(),
            'photo' => SpatieMediaLibraryImageColumn::make('photo')->collection('profile'),
        ];
    }

    /**
     * @return array<string, BaseFilter>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 220cf97b (.)
=======
    #[\Override]
>>>>>>> laraxot/develop
    public function getTableFilters(): array
    {
        return [
            'is_active' => TernaryFilter::make('is_active')
                ->placeholder(static::trans('filters.is_active.all'))
                ->trueLabel(static::trans('filters.is_active.active'))
                ->falseLabel(static::trans('filters.is_active.inactive'))
                ->queries(
                    true: static fn (Builder $query) => $query->where('is_active', '=', true),
                    false: static fn (Builder $query) => $query->where('is_active', '=', false),
                ),
        ];
    }
}
