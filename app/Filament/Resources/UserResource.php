<?php

/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/resources/UserResource.php
 * @see https://github.com/3x1io/filament-user/blob/main/src/resources/UserResource.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Schemas\Components\Section;
use Override;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Modules\User\Filament\Resources\UserResource\Pages;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Filament\Resources\XotBaseResource;

class UserResource extends XotBaseResource
{
    // protected static ?string $model = \Modules\Xot\Datas\XotData::make()->getUserClass();

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';

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
                    ->dehydrateStateUsing(fn(?string $state): ?string => !empty($state) ? Hash::make($state) : null)
                    ->required(fn(mixed $livewire): bool => $livewire instanceof CreateUser),
            ])->columnSpan(8),
            'section02' => Section::make([
                'created_at' => Placeholder::make('created_at')->content(static function (mixed $record): HtmlString|string {
                    if (! $record instanceof \Illuminate\Database\Eloquent\Model) {
                        return new HtmlString('&mdash;');
                    }

                    /** @var \Carbon\Carbon|null $createdAt */
                    $createdAt = $record->getAttribute('created_at');
                    if ($createdAt === null || ! $createdAt instanceof \Carbon\Carbon) {
                        return new HtmlString('&mdash;');
                    }

                    return $createdAt->diffForHumans();
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
