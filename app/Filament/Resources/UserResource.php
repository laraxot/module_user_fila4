<?php

/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/resources/UserResource.php
 * @see https://github.com/3x1io/filament-user/blob/main/src/resources/UserResource.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Override;
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Filament\Forms\Components\Placeholder;
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
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Filament\Forms\Components\Placeholder;
=======
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Modules\User\Filament\Resources\UserResource\Pages;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Filament\Resources\XotBaseResource;

class UserResource extends XotBaseResource
{
    // protected static ?string $model = \Modules\Xot\Datas\XotData::make()->getUserClass();

<<<<<<< HEAD
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';
=======
<<<<<<< HEAD
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';
=======
    protected static ?string $navigationIcon = 'heroicon-o-users';
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

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
    public static function getFormSchema(): array
    {
        return [
            'section01' => Section::make([
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                'name' => TextInput::make('name')->required(),
                'email' => TextInput::make('email')->required()->unique(ignoreRecord: true),
                'password' => TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn($state) => !empty($state) ? Hash::make($state) : null)
                    ->required(fn($livewire) => $livewire instanceof CreateUser),
            ])->columnSpan(8),
            'section02' => Section::make([
                'created_at' => Placeholder::make('created_at')->content(static function ($record) {
                    if ($record === null || $record->created_at === null) {
                        return new HtmlString('&mdash;');
                    }

                    return $record->created_at->diffForHumans();
                }),
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
                'name' => TextInput::make('name')
                    ->required(),
                'email' => TextInput::make('email')
                    ->required()
                    ->unique(ignoreRecord: true),
<<<<<<< HEAD
=======
                'name' => TextInput::make('name')->required(),
                'email' => TextInput::make('email')->required()->unique(ignoreRecord: true),
>>>>>>> b93ef594b4 (.)
                'password' => TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn($state) => !empty($state) ? Hash::make($state) : null)
                    ->required(fn($livewire) => $livewire instanceof CreateUser),
            ])->columnSpan(8),
            'section02' => Section::make([
<<<<<<< HEAD
=======
                'password' => TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => ! empty($state) ? Hash::make($state) : null)
                    ->required(fn ($livewire) => $livewire instanceof Pages\CreateUser),
            ])->columnSpan(8),
            'section02' => Section::make([
>>>>>>> origin/develop
                'created_at' => Placeholder::make('created_at')
                    ->content(static function ($record) {
                        if ($record === null || $record->created_at === null) {
                            return new HtmlString('&mdash;');
                        }
                        
                        return $record->created_at->diffForHumans();
                    }),
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
                'created_at' => Placeholder::make('created_at')->content(static function ($record) {
                    if ($record === null || $record->created_at === null) {
                        return new HtmlString('&mdash;');
                    }

                    return $record->created_at->diffForHumans();
                }),
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            ])->columnSpan(4),
        ];
    }

    // public static function enablePasswordUpdates(bool|Closure $condition = true): void
    // {
    //     static::$enablePasswordUpdates = $condition;
    // }

    /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
     * public static function getModel(): string
     * {
     * return config('filament-user-resource.model');
     * }
     */
<<<<<<< HEAD

    #[Override]
=======
<<<<<<< HEAD

    #[Override]
=======
=======
>>>>>>> origin/develop
    public static function getModel(): string
    {
        return config('filament-user-resource.model');
    }
    */

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }
}
