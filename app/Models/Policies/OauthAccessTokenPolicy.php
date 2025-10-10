<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Contracts\UserContract;
=======

>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Contracts\UserContract;
>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\OauthAccessToken;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class OauthAccessTokenPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-access-token.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, OauthAccessToken $oauthAccessToken): bool
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
            $user->hasPermissionTo('oauth-access-token.view') ||
            $user->id === $oauthAccessToken->user_id ||
            $user->hasRole('super-admin')
        );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

               $user->id === $oauthAccessToken->user_id ||
               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('oauth-access-token.view') || 
               $user->id === $oauthAccessToken->user_id ||
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-access-token.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, OauthAccessToken $_oauthAccessToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.update') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $user, OauthAccessToken $_oauthAccessToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.update') || $user->hasRole('super-admin');
=======
    public function update(UserContract $user, OauthAccessToken $oauthAccessToken): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function update(UserContract $user, OauthAccessToken $_oauthAccessToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.update') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function update(UserContract $user, OauthAccessToken $oauthAccessToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.update') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, OauthAccessToken $oauthAccessToken): bool
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
            $user->hasPermissionTo('oauth-access-token.delete') ||
            $user->id === $oauthAccessToken->user_id ||
            $user->hasRole('super-admin')
        );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

               $user->id === $oauthAccessToken->user_id ||
               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('oauth-access-token.delete') || 
               $user->id === $oauthAccessToken->user_id ||
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, OauthAccessToken $_oauthAccessToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.restore') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function restore(UserContract $user, OauthAccessToken $_oauthAccessToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.restore') || $user->hasRole('super-admin');
=======
    public function restore(UserContract $user, OauthAccessToken $oauthAccessToken): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function restore(UserContract $user, OauthAccessToken $_oauthAccessToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.restore') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function restore(UserContract $user, OauthAccessToken $oauthAccessToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.restore') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, OauthAccessToken $oauthAccessToken): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionTo('oauth-access-token.force-delete') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('oauth-access-token.force-delete') || $user->hasRole('super-admin');
=======

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
        return $user->hasPermissionTo('oauth-access-token.force-delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('oauth-access-token.force-delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
