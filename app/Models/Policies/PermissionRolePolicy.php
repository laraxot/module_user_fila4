<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\User\Models\PermissionRole;
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\PermissionRole;
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Contracts\UserContract;
use Modules\User\Models\PermissionRole;
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\PermissionRole;
use Modules\Xot\Contracts\UserContract;
>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\PermissionRole;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class PermissionRolePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('permission-role.view.any');
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public function view(UserContract $user, PermissionRole $_permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.view') || $user->hasRole('super-admin');
    }

    /**
<<<<<<< HEAD
=======
=======
    }    /**
=======
    }

    /**
>>>>>>> b93ef594b4 (.)
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, PermissionRole $_permissionRole): bool
    {
<<<<<<< HEAD
        return $user->hasRole('super-admin');
    }    /**
>>>>>>> a12f125f4a (.)
=======
        return $user->hasPermissionTo('permission-role.view') || $user->hasRole('super-admin');
    }

    /**
>>>>>>> b93ef594b4 (.)
=======
    public function view(UserContract $user, PermissionRole $permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.view') || 
               $user->hasRole('super-admin');
    }

    /**
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('permission-role.create');
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
    public function update(UserContract $user, PermissionRole $_permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.update') || $user->hasRole('super-admin');
=======
    public function update(UserContract $user, PermissionRole $permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.update') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, PermissionRole $_permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.delete') || $user->hasRole('super-admin');
=======
    public function delete(UserContract $user, PermissionRole $permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, PermissionRole $_permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.restore') || $user->hasRole('super-admin');
    }

    /**
=======
    }    /**
=======
    }

    /**
>>>>>>> b93ef594b4 (.)
     * Determine whether the user can update the model.
     */
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
        return $user->hasRole('super-admin');
    }    /**
>>>>>>> a12f125f4a (.)
=======
>>>>>>> 81efa49 (.)
        return $user->hasPermissionTo('permission-role.restore') || $user->hasRole('super-admin');
    }

    /**
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
=======
    public function restore(UserContract $user, PermissionRole $permissionRole): bool
    {
        return $user->hasPermissionTo('permission-role.restore') || 
               $user->hasRole('super-admin');
    }

    /**
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, PermissionRole $permissionRole): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionTo('permission-role.force-delete') || $user->hasRole('super-admin');
    }
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('permission-role.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
        return $user->hasPermissionTo('permission-role.force-delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
    }
}
=======
        return $user->hasPermissionTo('permission-role.force-delete') || 
               $user->hasRole('super-admin');
    }
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
