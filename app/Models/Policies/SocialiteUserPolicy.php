<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Contracts\UserContract;
use Modules\User\Models\SocialiteUser;
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Contracts\UserContract;
>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\SocialiteUser;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class SocialiteUserPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('socialite-user.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, SocialiteUser $socialiteUser): bool
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
            $user->hasPermissionTo('socialite-user.view') ||
            $user->id === $socialiteUser->user_id ||
            $user->hasRole('super-admin')
        );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        return $user->id === $socialiteUser->user_id ||
            $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('socialite-user.view') || 
               $user->id === $socialiteUser->user_id ||
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('socialite-user.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, SocialiteUser $socialiteUser): bool
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
            $user->hasPermissionTo('socialite-user.update') ||
            $user->id === $socialiteUser->user_id ||
            $user->hasRole('super-admin')
        );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        return $user->id === $socialiteUser->user_id ||
            $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('socialite-user.update') || 
               $user->id === $socialiteUser->user_id ||
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, SocialiteUser $socialiteUser): bool
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
            $user->hasPermissionTo('socialite-user.delete') ||
            $user->id === $socialiteUser->user_id ||
            $user->hasRole('super-admin')
        );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        return $user->id === $socialiteUser->user_id ||
            $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('socialite-user.delete') || 
               $user->id === $socialiteUser->user_id ||
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, SocialiteUser $_socialiteUser): bool
    {
        return $user->hasPermissionTo('socialite-user.restore') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function restore(UserContract $user, SocialiteUser $_socialiteUser): bool
    {
        return $user->hasPermissionTo('socialite-user.restore') || $user->hasRole('super-admin');
=======
    public function restore(UserContract $user, SocialiteUser $socialiteUser): bool
    {
        return $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function restore(UserContract $user, SocialiteUser $_socialiteUser): bool
    {
        return $user->hasPermissionTo('socialite-user.restore') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function restore(UserContract $user, SocialiteUser $socialiteUser): bool
    {
        return $user->hasPermissionTo('socialite-user.restore') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, SocialiteUser $socialiteUser): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionTo('socialite-user.force-delete') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('socialite-user.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
        return $user->hasPermissionTo('socialite-user.force-delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('socialite-user.force-delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
