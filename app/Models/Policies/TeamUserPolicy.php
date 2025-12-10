<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
class TeamUserPolicy extends UserBasePolicy
{
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
class TeamUserPolicy extends UserBasePolicy
{
=======
use Modules\User\Contracts\UserContract;
=======
use Modules\Xot\Contracts\UserContract;
>>>>>>> origin/develop
use Modules\User\Models\TeamUser;

class TeamUserPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('team-user.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, TeamUser $teamUser): bool
    {
<<<<<<< HEAD
        return $user->id === $teamUser->user_id ||
            $user->teams->contains($teamUser->team_id) ||
            $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('team-user.view') || 
               $user->id === $teamUser->user_id ||
               $user->teams->contains($teamUser->team_id) ||
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('team-user.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, TeamUser $teamUser): bool
    {
<<<<<<< HEAD
        return $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('team-user.update') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, TeamUser $teamUser): bool
    {
<<<<<<< HEAD
        return $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('team-user.delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, TeamUser $teamUser): bool
    {
<<<<<<< HEAD
        return $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('team-user.restore') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, TeamUser $teamUser): bool
    {
<<<<<<< HEAD
        return $user->hasRole('super-admin');
    }
>>>>>>> a12f125f4a (.)
=======
class TeamUserPolicy extends UserBasePolicy
{
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('team-user.force-delete') || 
               $user->hasRole('super-admin');
    }
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
