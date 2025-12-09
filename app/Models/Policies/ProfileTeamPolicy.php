<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
class ProfileTeamPolicy extends UserBasePolicy
{
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
class ProfileTeamPolicy extends UserBasePolicy
{
=======
use Modules\User\Contracts\UserContract;
=======
use Modules\Xot\Contracts\UserContract;
>>>>>>> origin/develop
use Modules\User\Models\ProfileTeam;

class ProfileTeamPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('profile-team.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, ProfileTeam $profileTeam): bool
    {
<<<<<<< HEAD
        return $user->id === $profileTeam->user_id ||
            $user->teams->contains($profileTeam->team_id) ||
            $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('profile-team.view') || 
               $user->id === $profileTeam->user_id ||
               $user->teams->contains($profileTeam->team_id) ||
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('profile-team.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, ProfileTeam $profileTeam): bool
    {
<<<<<<< HEAD
        return $user->id === $profileTeam->user_id ||
            $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('profile-team.update') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, ProfileTeam $profileTeam): bool
    {
<<<<<<< HEAD
        return $user->id === $profileTeam->user_id ||
            $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('profile-team.delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, ProfileTeam $profileTeam): bool
    {
<<<<<<< HEAD
        return $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('profile-team.restore') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, ProfileTeam $profileTeam): bool
    {
<<<<<<< HEAD
        return $user->hasRole('super-admin');
    }
>>>>>>> a12f125f4a (.)
=======
class ProfileTeamPolicy extends UserBasePolicy
{
>>>>>>> b93ef594b4 (.)
}
=======
        return $user->hasPermissionTo('profile-team.force-delete') || 
               $user->hasRole('super-admin');
    }
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
