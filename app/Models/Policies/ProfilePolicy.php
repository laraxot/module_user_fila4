<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
class ProfilePolicy extends UserBasePolicy
{
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
class ProfilePolicy extends UserBasePolicy
{
=======

=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\Profile;
>>>>>>> origin/develop

class ProfilePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $this->hasPermission($user, 'profile.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Profile $profile): bool
    {
<<<<<<< HEAD

=======
        return $this->hasPermission($user, 'profile.view') || 
>>>>>>> origin/develop
               $user->id === $profile->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $this->hasPermission($user, 'profile.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Profile $profile): bool
    {
<<<<<<< HEAD

=======
        return $this->hasPermission($user, 'profile.update') || 
>>>>>>> origin/develop
               $user->id === $profile->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Profile $profile): bool
    {
        return $this->hasPermission($user, 'profile.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Profile $profile): bool
    {
        return $this->hasPermission($user, 'profile.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Profile $profile): bool
    {
        return $this->hasPermission($user, 'profile.force-delete');
    }
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
class ProfilePolicy extends UserBasePolicy
{
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
