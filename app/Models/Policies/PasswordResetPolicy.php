<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\User\Models\PasswordReset;
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\PasswordReset;
use Modules\Xot\Contracts\UserContract;
=======

>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\PasswordReset;
use Modules\Xot\Contracts\UserContract;
>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\PasswordReset;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class PasswordResetPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('password-reset.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, PasswordReset $passwordReset): bool
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
            $user->hasPermissionTo('password-reset.view') ||
            $user->email === $passwordReset->email ||
            $user->hasRole('super-admin')
        );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

               $user->email === $passwordReset->email ||
               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('password-reset.view') || 
               $user->email === $passwordReset->email ||
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('password-reset.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, PasswordReset $_passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.update') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $user, PasswordReset $_passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.update') || $user->hasRole('super-admin');
=======
    public function update(UserContract $user, PasswordReset $passwordReset): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function update(UserContract $user, PasswordReset $_passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.update') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function update(UserContract $user, PasswordReset $passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.update') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, PasswordReset $_passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.delete') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $user, PasswordReset $_passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.delete') || $user->hasRole('super-admin');
=======
    public function delete(UserContract $user, PasswordReset $passwordReset): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function delete(UserContract $user, PasswordReset $_passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function delete(UserContract $user, PasswordReset $passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, PasswordReset $_passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.restore') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function restore(UserContract $user, PasswordReset $_passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.restore') || $user->hasRole('super-admin');
=======
    public function restore(UserContract $user, PasswordReset $passwordReset): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function restore(UserContract $user, PasswordReset $_passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.restore') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function restore(UserContract $user, PasswordReset $passwordReset): bool
    {
        return $user->hasPermissionTo('password-reset.restore') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, PasswordReset $passwordReset): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionTo('password-reset.force-delete') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('password-reset.force-delete') || $user->hasRole('super-admin');
=======

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
        return $user->hasPermissionTo('password-reset.force-delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('password-reset.force-delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
