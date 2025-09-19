<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> fbc8f8e (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> 6d20fbe (.)
use Filament\Infolists\Components\TextEntry;
use Modules\User\Filament\Resources\PermissionResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewPermission extends XotBaseViewRecord
{
    protected static string $resource = PermissionResource::class;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
     * @return array<string, Component>
     */
    #[Override]
    public function getInfolistSchema(): array
    {
        return [
            'name' => TextEntry::make('name')->label(__('user::permission.fields.name.label')),
            'guard_name' => TextEntry::make('guard_name')->label(__('user::permission.fields.guard_name.label')),
            'active' => TextEntry::make('active')
                ->label(__('user::permission.fields.active.label'))
                ->formatStateUsing(fn($state): string => $state ? __('user::common.yes') : __('user::common.no')),
<<<<<<< HEAD
=======
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    public function getInfolistSchema(): array
    {
        return [
            'name' => TextEntry::make('name')
                ->label(__('user::permission.fields.name.label')),
            'guard_name' => TextEntry::make('guard_name')
                ->label(__('user::permission.fields.guard_name.label')),
            'active' => TextEntry::make('active')
                ->label(__('user::permission.fields.active.label'))
                ->formatStateUsing(fn ($state): string => $state ? __('user::common.yes') : __('user::common.no')),
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            'created_at' => TextEntry::make('created_at')
                ->label(__('user::permission.fields.created_at.label'))
                ->dateTime(),
        ];
    }
}
