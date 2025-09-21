<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
=======
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
=======
use Filament\Actions\DeleteAction;
use Filament\Pages\Actions\ViewAction;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Models\Role;
use Modules\User\Support\Utils;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Webmozart\Assert\Assert;

class EditRole extends XotBaseEditRecord
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Webmozart\Assert\Assert;

=======
use Webmozart\Assert\Assert;
=======
use Webmozart\Assert\Assert;




use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> origin/develop




<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Webmozart\Assert\Assert;

>>>>>>> a12f125f4a (.)
class EditRole extends XotBaseEditRecord
=======

class EditRole extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    // //
    public Collection $permissions;

    // public Role $record;
    protected static string $resource = RoleResource::class;

    /**
     *  ---.
     */
    public function afterSave(): void
    {
        $permissionModels = collect();
        Assert::isArray($data = $this->data);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $this->permissions->each(static function ($permission) use ($permissionModels, $data): void {
            $permissionModels->push(Utils::getPermissionModel()::firstOrCreate([
                'name' => $permission,
                'guard_name' => $data['guard_name'] ?? 'web',
            ]));
        });
        Assert::isInstanceOf($this->record, Role::class, '[' . __LINE__ . '][' . class_basename($this) . ']');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        $this->permissions->each(
            static function ($permission) use ($permissionModels, $data): void {
                $permissionModels->push(
                    Utils::getPermissionModel()::firstOrCreate(
                        [
                            'name' => $permission,
                            'guard_name' => $data['guard_name'] ?? 'web',
                        ]
                    )
                );
            }
        );
        Assert::isInstanceOf($this->record, Role::class, '['.__LINE__.']['.class_basename($this).']');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $this->record->syncPermissions($permissionModels);
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
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
                    !\in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_')
                ),
            )
            ->keys();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        $this->permissions = collect($data)->filter(static fn ($permission, $key): bool => ! \in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_'))->keys();
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        $this->permissions = collect($data)->filter(static fn ($permission, $key): bool => ! \in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_'))->keys();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        return Arr::only($data, ['name', 'guard_name']);
    }
}
