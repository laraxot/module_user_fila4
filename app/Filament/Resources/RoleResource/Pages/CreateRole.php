<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\RoleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

=======




use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;





>>>>>>> fbc8f8e (.)
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

>>>>>>> 6d20fbe (.)
class CreateRole extends XotBaseCreateRecord
{
    // //
    public Collection $permissions;

    protected static string $resource = RoleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        $this->permissions = collect($data)
            ->filter(
                static fn($_permission, $key): bool => (
                    !in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_')
                ),
            )
            ->keys();

        $res = Arr::only($data, ['name', 'guard_name', 'team_id']);
        if (!isset($res['team_id'])) {
<<<<<<< HEAD
=======
        $this->permissions = collect($data)->filter(static fn ($permission, $key): bool => ! in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_'))->keys();

        $res = Arr::only($data, ['name', 'guard_name', 'team_id']);
        if (! isset($res['team_id'])) {
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
            $res['team_id'] = null;
        }

        return $res;
    }

    /*
     *  Modules\User\Filament\Resources\RoleResource\Pages\CreateRole::afterCreate does not exist.
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
}
