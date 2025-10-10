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

abstract class BaseUserResource extends XotBaseResource
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

    #[Override]
    public static function getFormSchema(): array
    {
        return array_values([
            'section01' => Section::make([
                TextInput::make('name')->required(),
                TextInput::make('email')->required()->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(static function ($state): ?string {
                        if ($state === null) {
                            return null;
                        }
                        $value = is_string($state) ? $state : (string) $state;
                        return $value !== '' ? Hash::make($value) : null;
                    })
                    ->required(fn($livewire) => $livewire instanceof CreateUser),
            ])->columnSpan(8),
            'section02' => Section::make([
                Placeholder::make('created_at')->content(static function ($record) {
                    if ($record === null || !is_object($record) || !property_exists($record, 'created_at')) {
                        return new HtmlString('&mdash;');
                    }
                    $createdAt = $record->created_at ?? null;
                    if ($createdAt === null || !is_object($createdAt) || !method_exists($createdAt, 'diffForHumans')) {
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
