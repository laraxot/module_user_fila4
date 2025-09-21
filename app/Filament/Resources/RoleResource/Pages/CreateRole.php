<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\RoleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class CreateRole extends XotBaseCreateRecord
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

=======
=======
>>>>>>> origin/develop




use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;





<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

>>>>>>> b93ef594b4 (.)
class CreateRole extends XotBaseCreateRecord
=======
class CreateRole extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    // //
    public Collection $permissions;

    protected static string $resource = RoleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $this->permissions = collect($data)
            ->filter(
                static fn($_permission, $key): bool => (
                    !in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_')
                ),
            )
            ->keys();
<<<<<<< HEAD

        $res = Arr::only($data, ['name', 'guard_name', 'team_id']);
        if (!isset($res['team_id'])) {
=======
<<<<<<< HEAD

        $res = Arr::only($data, ['name', 'guard_name', 'team_id']);
        if (!isset($res['team_id'])) {
=======
=======
>>>>>>> origin/develop
        $this->permissions = collect($data)->filter(static fn ($permission, $key): bool => ! in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_'))->keys();

        $res = Arr::only($data, ['name', 'guard_name', 'team_id']);
        if (! isset($res['team_id'])) {
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        $res = Arr::only($data, ['name', 'guard_name', 'team_id']);
        if (!isset($res['team_id'])) {
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            $res['team_id'] = null;
        }

        return $res;
    }

    /*
     *  Modules\User\Filament\Resources\RoleResource\Pages\CreateRole::afterCreate does not exist.
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
     *
     * private function afterCreate(): void {
     * $permissionModels = collect();
     * $this->permissions->each(function ($permission) use ($permissionModels): void {
     * $permissionModels->push(Utils::getPermissionModel()::firstOrCreate([
     *
     * 'name' => $permission,
     * 'guard_name' => $this->data['guard_name'],
     * ]));
     * });
     *
     * $this->record->syncPermissions($permissionModels);
     * }
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop

    private function afterCreate(): void {
        $permissionModels = collect();
        $this->permissions->each(function ($permission) use ($permissionModels): void {
            $permissionModels->push(Utils::getPermissionModel()::firstOrCreate([

                'name' => $permission,
                'guard_name' => $this->data['guard_name'],
            ]));
        });

        $this->record->syncPermissions($permissionModels);
    }
    */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
