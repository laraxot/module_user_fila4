<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module as ModuleFacade;
use Nwidart\Modules\Laravel\Module;

trait HasModules
{
    /**
     * @return list<Module>
     */
    public function getModules(): array
    {
        $modules = ModuleFacade::getOrdered();
        $roles = $this->roles;

        /** @var array<string, Module> $filteredModules */
        $filteredModules = Arr::where($modules, function ($module, $key) {
            // $name = $module->getName();
            $name = is_string($key) ? $key : (string) $key;
            $role_name = Str::of($name)->lower()->append('::admin')->toString();

            return $this->hasRole($role_name);
        });
        /** @var list<Module> $modulesList */
        $modulesList = array_values($filteredModules);

        return $modulesList;
    }
=======
trait HasModules
{
    /*
    public function getModules(): Collection
    {
        // @var \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
        $roles = $this->roles()->get();

        return $roles->filter(function ($item): bool {
            $name = $item->name;
            Assert::string($name);

            return Str::endsWith($name, '::admin');
        });
    }
    */
>>>>>>> b98f28f9 (.)
}
