<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\SocialProvider;
use Modules\Xot\Contracts\UserContract;
=======

>>>>>>> fbc8f8e (.)
=======
use Modules\User\Models\SocialProvider;
use Modules\Xot\Contracts\UserContract;
>>>>>>> 6d20fbe (.)

class SocialProviderPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('social-provider.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function view(UserContract $user, SocialProvider $_socialProvider): bool
    {
        return $user->hasPermissionTo('social-provider.view') || $user->hasRole('super-admin');
=======
    public function view(UserContract $user, SocialProvider $socialProvider): bool
    {

               $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
    public function view(UserContract $user, SocialProvider $_socialProvider): bool
    {
        return $user->hasPermissionTo('social-provider.view') || $user->hasRole('super-admin');
>>>>>>> 6d20fbe (.)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('social-provider.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $user, SocialProvider $_socialProvider): bool
    {
        return $user->hasPermissionTo('social-provider.update') || $user->hasRole('super-admin');
=======
    public function update(UserContract $user, SocialProvider $socialProvider): bool
    {

               $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
    public function update(UserContract $user, SocialProvider $_socialProvider): bool
    {
        return $user->hasPermissionTo('social-provider.update') || $user->hasRole('super-admin');
>>>>>>> 6d20fbe (.)
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $user, SocialProvider $_socialProvider): bool
    {
        return $user->hasPermissionTo('social-provider.delete') || $user->hasRole('super-admin');
=======
    public function delete(UserContract $user, SocialProvider $socialProvider): bool
    {

               $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
    public function delete(UserContract $user, SocialProvider $_socialProvider): bool
    {
        return $user->hasPermissionTo('social-provider.delete') || $user->hasRole('super-admin');
>>>>>>> 6d20fbe (.)
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function restore(UserContract $user, SocialProvider $_socialProvider): bool
    {
        return $user->hasPermissionTo('social-provider.restore') || $user->hasRole('super-admin');
=======
    public function restore(UserContract $user, SocialProvider $socialProvider): bool
    {

               $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
    public function restore(UserContract $user, SocialProvider $_socialProvider): bool
    {
        return $user->hasPermissionTo('social-provider.restore') || $user->hasRole('super-admin');
>>>>>>> 6d20fbe (.)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, SocialProvider $socialProvider): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('social-provider.force-delete') || $user->hasRole('super-admin');
=======

               $user->hasRole('super-admin');
>>>>>>> fbc8f8e (.)
=======
        return $user->hasPermissionTo('social-provider.force-delete') || $user->hasRole('super-admin');
>>>>>>> 6d20fbe (.)
    }
}
