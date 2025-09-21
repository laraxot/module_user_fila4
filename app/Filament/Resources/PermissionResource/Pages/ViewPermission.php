<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Filament\Schemas\Components\Component;
use Override;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Infolists\Components\TextEntry;
use Modules\User\Filament\Resources\PermissionResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

<<<<<<< HEAD
class ViewPermission extends XotBaseViewRecord
=======
<<<<<<< HEAD
class ViewPermission extends XotBaseViewRecord
=======
class ViewPermission extends \Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    protected static string $resource = PermissionResource::class;

    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
=======
     * @return array<string, \Filament\Schemas\Components\Component>
=======
     * @return array<string, Component>
>>>>>>> b93ef594b4 (.)
     */
    #[Override]
    public function getInfolistSchema(): array
    {
        return [
            'name' => TextEntry::make('name')->label(__('user::permission.fields.name.label')),
            'guard_name' => TextEntry::make('guard_name')->label(__('user::permission.fields.guard_name.label')),
            'active' => TextEntry::make('active')
                ->label(__('user::permission.fields.active.label'))
<<<<<<< HEAD
                ->formatStateUsing(fn ($state): string => $state ? __('user::common.yes') : __('user::common.no')),
>>>>>>> a12f125f4a (.)
=======
                ->formatStateUsing(fn($state): string => $state ? __('user::common.yes') : __('user::common.no')),
>>>>>>> b93ef594b4 (.)
=======
     * @return array<string, \Filament\Infolists\Components\Component>
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
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'created_at' => TextEntry::make('created_at')
                ->label(__('user::permission.fields.created_at.label'))
                ->dateTime(),
        ];
    }
}
