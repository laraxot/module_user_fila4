<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\User\Models\Membership;
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Membership;
use Modules\Xot\Contracts\UserContract;
=======

>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\Membership;
use Modules\Xot\Contracts\UserContract;
>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\Membership;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class MembershipPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('membership.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Membership $membership): bool
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        return (
            $user->hasPermissionTo('membership.view') ||
            $user->id === $membership->user_id ||
            $user->hasRole('super-admin')
        );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

               $user->id === $membership->user_id ||
               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('membership.view') || 
               $user->id === $membership->user_id ||
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('membership.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.update') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.update') || $user->hasRole('super-admin');
=======
    public function update(UserContract $user, Membership $membership): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function update(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.update') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function update(UserContract $user, Membership $membership): bool
    {
        return $user->hasPermissionTo('membership.update') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.delete') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.delete') || $user->hasRole('super-admin');
=======
    public function delete(UserContract $user, Membership $membership): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function delete(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function delete(UserContract $user, Membership $membership): bool
    {
        return $user->hasPermissionTo('membership.delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.restore') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function restore(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.restore') || $user->hasRole('super-admin');
=======
    public function restore(UserContract $user, Membership $membership): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function restore(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.restore') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function restore(UserContract $user, Membership $membership): bool
    {
        return $user->hasPermissionTo('membership.restore') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Membership $membership): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionTo('membership.force-delete') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('membership.force-delete') || $user->hasRole('super-admin');
=======

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
        return $user->hasPermissionTo('membership.force-delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('membership.force-delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
