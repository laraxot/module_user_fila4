<?php

/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/resources/UserResource.php
 * @see https://github.com/3x1io/filament-user/blob/main/src/resources/UserResource.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class UserResource extends XotBaseResource
{
    // protected static ?string $model = \Modules\Xot\Datas\XotData::make()->getUserClass();

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';

    // Static property Modules\User\Filament\Resources\UserResource::$enablePasswordUpdates is never read, only written.
    // private static bool|\Closure $enablePasswordUpdates = true;

    public static function getWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }

    // public static function extendForm(\Closure $callback): void
    // {
    //    static::$extendFormCallback = $callback;
    // }

    /**
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    #[Override]
    public static function getFormSchema(): array
    {
        return array_values([
            'section01' => Section::make([
                'name' => TextInput::make('name')->required(),
                'email' => TextInput::make('email')->required()->unique(ignoreRecord: true),
                'password' => TextInput::make('password')
                    ->password()
<<<<<<< HEAD
                    ->dehydrateStateUsing(function ($state): ?string {
                        // Type narrowing for PHPStan Level 10
                        if (! is_string($state) || empty($state)) {
                            return null;
                        }

                        return Hash::make($state);
                    })
                    ->required(fn ($livewire) => $livewire instanceof CreateUser),
            ])->columnSpan(8),
            'section02' => Section::make([
                'created_at' => Placeholder::make('created_at')->content(static function ($record) {
                    // Type narrowing for PHPStan Level 10
=======
                    ->dehydrateStateUsing(fn(?string $state): ?string => !empty($state) ? Hash::make($state) : null)
                    ->required(fn(mixed $livewire): bool => $livewire instanceof CreateUser),
            ])->columnSpan(8),
            'section02' => Section::make([
                'created_at' => Placeholder::make('created_at')->content(static function (mixed $record): HtmlString|string {
>>>>>>> e058848 (.)
                    if (! $record instanceof \Illuminate\Database\Eloquent\Model) {
                        return new HtmlString('&mdash;');
                    }

<<<<<<< HEAD
                    // PHPStan Level 10: hasAttribute() invece di property_exists() per Eloquent
                    if (! $record->hasAttribute('created_at')) {
                        return new HtmlString('&mdash;');
                    }

                    /** @var \Carbon\Carbon|null $createdAt */
                    $createdAt = $record->getAttribute('created_at');

                    if ($createdAt === null) {
                        return new HtmlString('&mdash;');
                    }
                    if ($createdAt instanceof \Carbon\CarbonInterface) {
                        return $createdAt->diffForHumans();
                    } elseif ($createdAt instanceof \DateTimeInterface) {
                        return $createdAt->format('Y-m-d H:i:s');
                    } else {
                        return new HtmlString('&mdash;');
                    }
=======
                    /** @var \Carbon\Carbon|null $createdAt */
                    $createdAt = $record->getAttribute('created_at');
                    if ($createdAt === null || ! $createdAt instanceof \Carbon\Carbon) {
                        return new HtmlString('&mdash;');
                    }

                    return $createdAt->diffForHumans();
>>>>>>> e058848 (.)
                }),
            ])->columnSpan(4),
        ]);
    }

    // public static function enablePasswordUpdates(bool|Closure $condition = true): void
    // {
    //     static::$enablePasswordUpdates = $condition;
    // }

    /*
     * public static function getModel(): string
     * {
     * return config('filament-user-resource.model');
     * }
     */

    #[Override]
    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }
}
