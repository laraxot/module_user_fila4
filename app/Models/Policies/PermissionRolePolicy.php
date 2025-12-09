<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\PermissionRole;
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Contracts\UserContract;
use Modules\User\Models\PermissionRole;
>>>>>>> fbc8f8e (.)
=======
use Modules\User\Models\PermissionRole;
use Modules\Xot\Contracts\UserContract;
>>>>>>> 6d20fbe (.)

class PermissionRolePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('permission-role.view.any');
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, PermissionRole $_permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.view') || $user->hasRole('super-admin');
    }

    /**
<<<<<<< HEAD
=======
    }    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, PermissionRole $permissionRole): bool
    {
        return $user->hasRole('super-admin');
    }    /**
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('permission-role.create');
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, PermissionRole $_permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.update') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, PermissionRole $_permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.delete') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, PermissionRole $_permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.restore') || $user->hasRole('super-admin');
    }

    /**
<<<<<<< HEAD
=======
    }    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, PermissionRole $permissionRole): bool
    {
        return $user->hasRole('super-admin');
    }    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, PermissionRole $permissionRole): bool
    {
        return $user->hasRole('super-admin');
    }    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, PermissionRole $permissionRole): bool
    {
        return $user->hasRole('super-admin');
    }    /**
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, PermissionRole $permissionRole): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('permission-role.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
        return $user->hasPermissionTo('permission-role.force-delete') || $user->hasRole('super-admin');
>>>>>>> 6d20fbe (.)
    }
}
