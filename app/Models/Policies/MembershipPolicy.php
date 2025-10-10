<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Membership;
use Modules\Xot\Contracts\UserContract;
=======

>>>>>>> fbc8f8e (.)
=======
use Modules\User\Models\Membership;
use Modules\Xot\Contracts\UserContract;
>>>>>>> 6d20fbe (.)

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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        return (
            $user->hasPermissionTo('membership.view') ||
            $user->id === $membership->user_id ||
            $user->hasRole('super-admin')
        );
<<<<<<< HEAD
=======

               $user->id === $membership->user_id ||
               $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
    public function update(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.update') || $user->hasRole('super-admin');
=======
    public function update(UserContract $user, Membership $membership): bool
    {

               $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
    public function update(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.update') || $user->hasRole('super-admin');
>>>>>>> 6d20fbe (.)
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.delete') || $user->hasRole('super-admin');
=======
    public function delete(UserContract $user, Membership $membership): bool
    {

               $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
    public function delete(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.delete') || $user->hasRole('super-admin');
>>>>>>> 6d20fbe (.)
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function restore(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.restore') || $user->hasRole('super-admin');
=======
    public function restore(UserContract $user, Membership $membership): bool
    {

               $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
    public function restore(UserContract $user, Membership $_membership): bool
    {
        return $user->hasPermissionTo('membership.restore') || $user->hasRole('super-admin');
>>>>>>> 6d20fbe (.)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Membership $membership): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('membership.force-delete') || $user->hasRole('super-admin');
=======

               $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
        return $user->hasPermissionTo('membership.force-delete') || $user->hasRole('super-admin');
>>>>>>> 6d20fbe (.)
    }
}
