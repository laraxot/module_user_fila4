<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Override;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Base class for viewing user resources.
 *
<<<<<<< HEAD
=======
=======
=======
use Override;
>>>>>>> b93ef594b4 (.)
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Base class for viewing user resources.
<<<<<<< HEAD
 * 
>>>>>>> a12f125f4a (.)
=======
 *
>>>>>>> b93ef594b4 (.)
=======
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Filament\Infolists;

/**
 * Base class for viewing user resources.
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * This class provides the base configuration for viewing user resources
 * across the application. It should be extended by specific user type
 * view classes rather than used directly.
 */
abstract class BaseViewUser extends XotBaseViewRecord
{
    protected static string $resource = UserResource::class;

    /**
     * Define the infolist schema for the view.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function getInfolistSchema(): array
    {
        return [
            'name' => TextEntry::make('name')->label(trans('user::resource.fields.name')),
            'email' => TextEntry::make('email')->label(trans('user::resource.fields.email')),
            'type' => TextEntry::make('type')->label(trans('user::resource.fields.type')),
            'state' => TextEntry::make('state')->label(trans('user::resource.fields.state')),
            'created_at' => TextEntry::make('created_at')
                ->label(trans('user::resource.fields.created_at'))
                ->dateTime(),
<<<<<<< HEAD
            'updated_at' => TextEntry::make('updated_at')
=======
=======
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
    public function getInfolistSchema(): array
    {
        return [
            'name' => TextEntry::make('name')->label(trans('user::resource.fields.name')),
            'email' => TextEntry::make('email')->label(trans('user::resource.fields.email')),
            'type' => TextEntry::make('type')->label(trans('user::resource.fields.type')),
            'state' => TextEntry::make('state')->label(trans('user::resource.fields.state')),
            'created_at' => TextEntry::make('created_at')
                ->label(trans('user::resource.fields.created_at'))
                ->dateTime(),
<<<<<<< HEAD
                
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
            'updated_at' => TextEntry::make('updated_at')
=======
    public function getInfolistSchema(): array
    {
        return [
            'name' => Infolists\Components\TextEntry::make('name')
                ->label(trans('user::resource.fields.name')),
                
            'email' => Infolists\Components\TextEntry::make('email')
                ->label(trans('user::resource.fields.email')),
                
            'type' => Infolists\Components\TextEntry::make('type')
                ->label(trans('user::resource.fields.type')),
                
            'state' => Infolists\Components\TextEntry::make('state')
                ->label(trans('user::resource.fields.state')),
                
            'created_at' => Infolists\Components\TextEntry::make('created_at')
                ->label(trans('user::resource.fields.created_at'))
                ->dateTime(),
                
            'updated_at' => Infolists\Components\TextEntry::make('updated_at')
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ->label(trans('user::resource.fields.updated_at'))
                ->dateTime(),
        ];
    }
}
