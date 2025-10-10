<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Exception;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Override;
use Webmozart\Assert\Assert;

/**
 * .
 */
class ListProfiles extends XotBaseListRecords
{
    protected static string $resource = BaseProfileResource::class;

    /**
     * @return array<string, Tables\Columns\Column>
     */
    #[Override]
    /**
     * @return array<string, mixed>
     */
    public function getTableColumns(): array
    {
        return [
            'user.name' => TextColumn::make('user.name')
                ->sortable()
                ->searchable()
                ->default(function ($record) {
                    if (! $record instanceof \Illuminate\Database\Eloquent\Model) {
                        return '--';
                    }

                    /** @var \Illuminate\Database\Eloquent\Model|null $userModel */
                    $userModel = $record->getAttribute('user');
                    $user_class = XotData::make()->getUserClass();

                    if ($userModel === null) {
                        /** @var string|null $email */
                        $email = $record->getAttribute('email');
                        if ($email === null) {
                            $record->update(['email' => fake()->email()]);
                            $email = (string) $record->getAttribute('email');
                        }
                        try {
                            /** @var UserContract $userModel */
                            $userModel = XotData::make()->getUserByEmail($email);
                        } catch (Exception $e) {
                            return '--';
                        }
                    }

                    if ($userModel === null) {
                        $recordData = $record->toArray();
                        Assert::isArray($recordData);

                        /** @var array<string, mixed> $user_data */
                        $user_data = Arr::except($recordData, ['id']);
                        /** @var UserContract $userModel */
                        $userModel = $user_class::create($user_data);
                    }

                    Assert::isInstanceOf($userModel, \Illuminate\Database\Eloquent\Model::class);
                    $userId = $userModel->getKey();
                    $userModel->update(['user_id' => $userId]);

                    /** @var string $userName */
                    $userName = $userModel->getAttribute('name') ?? '--';

                    return $userName;
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
    #[Override]
    /**
     * @return array<string, mixed>
     */
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
