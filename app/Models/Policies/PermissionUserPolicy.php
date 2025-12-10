<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\User\Models\PermissionUser;
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\PermissionUser;
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Contracts\UserContract;
use Modules\User\Models\PermissionUser;
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\PermissionUser;
use Modules\Xot\Contracts\UserContract;
>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\PermissionUser;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class PermissionUserPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('permission-user.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
    public function view(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.view') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function view(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.view') || $user->hasRole('super-admin');
=======
    public function view(UserContract $user, PermissionUser $permissionUser): bool
    {
        return $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function view(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.view') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function view(UserContract $user, PermissionUser $permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.view') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('permission-user.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.update') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.update') || $user->hasRole('super-admin');
=======
    public function update(UserContract $user, PermissionUser $permissionUser): bool
    {
        return $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function update(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.update') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function update(UserContract $user, PermissionUser $permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.update') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.delete') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.delete') || $user->hasRole('super-admin');
=======
    public function delete(UserContract $user, PermissionUser $permissionUser): bool
    {
        return $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function delete(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function delete(UserContract $user, PermissionUser $permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.restore') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function restore(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.restore') || $user->hasRole('super-admin');
=======
    public function restore(UserContract $user, PermissionUser $permissionUser): bool
    {
        return $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function restore(UserContract $user, PermissionUser $_permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.restore') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function restore(UserContract $user, PermissionUser $permissionUser): bool
    {
        return $user->hasPermissionTo('permission-user.restore') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, PermissionUser $permissionUser): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionTo('permission-user.force-delete') || $user->hasRole('super-admin');
    }
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('permission-user.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
        return $user->hasPermissionTo('permission-user.force-delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
    }
}
=======
        return $user->hasPermissionTo('permission-user.force-delete') || 
               $user->hasRole('super-admin');
    }
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
