<?php

declare(strict_types=1);

/**
 * ----------------------------------------------------------------.
 * EX XotBasePolicy.
 */

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Exception;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Str;
use Modules\User\Models\Permission;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Support\Str;
use Modules\Xot\Datas\XotData;
use Modules\User\Models\Permission;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Auth\Access\HandlesAuthorization;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

// use Modules\Xot\Datas\XotData;

abstract class UserPermissionBasePolicy
{
    use HandlesAuthorization;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public function before(UserContract $user, string $ability): null|bool
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

        $class_name = class_basename(static::class);
        $permission_name = Str::of($class_name)
            ->before('Policy')
            ->lower()
            ->append('.' . $ability)
            ->toString();

        try {
            Permission::firstOrCreate(['name' => $permission_name]);
        } catch (Exception $e) {
            // dddx($e);
        }
        if ($user->hasPermissionTo($permission_name)) {
            return true;
        }
<<<<<<< HEAD
=======
=======
    public function before(UserContract $user, string $ability): ?bool
=======
    public function before(UserContract $user, string $ability): null|bool
>>>>>>> b93ef594b4 (.)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $class_name = class_basename(static::class);
        $permission_name = Str::of($class_name)
            ->before('Policy')
            ->lower()
            ->append('.' . $ability)
            ->toString();

        try {
            Permission::firstOrCreate(['name' => $permission_name]);
        } catch (Exception $e) {
            // dddx($e);
        }
        if ($user->hasPermissionTo($permission_name)) {
            return true;
        }
>>>>>>> b93ef594b4 (.)
=======
    public function before(UserContract $user, string $ability): ?bool
    {
        
        if ($user->hasRole('super-admin')) {
            return true;
        }
       
        $class_name=class_basename(static::class);
        $permission_name=Str::of($class_name)
        ->before('Policy')
        ->lower()
        ->append('.'.$ability)
        ->toString();
        
        try {
            Permission::firstOrCreate(['name' => $permission_name]);
        } catch (\Exception $e) {
            //dddx($e);
        }
        if($user->hasPermissionTo($permission_name)){
            return true;
        }
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        return null;
    }
}
