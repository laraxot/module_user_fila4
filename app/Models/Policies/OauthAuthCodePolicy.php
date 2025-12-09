<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\User\Models\OauthAuthCode;
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\OauthAuthCode;
use Modules\Xot\Contracts\UserContract;
=======
use Modules\Xot\Contracts\ProfileContract;
use Modules\User\Models\OauthAuthCode;
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\OauthAuthCode;
use Modules\Xot\Contracts\UserContract;
>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\OauthAuthCode;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class OauthAuthCodePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
<<<<<<< HEAD
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.view.any');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.view.any');
=======
    public function viewAny(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.view.any'); /** @phpstan-ignore method.nonObject */
>>>>>>> a12f125f4a (.)
=======
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.view.any');
>>>>>>> b93ef594b4 (.)
=======
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.view.any');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
    public function view(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.view') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function view(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.view') || $user->hasRole('super-admin');
=======
    public function view(ProfileContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasRole('super-admin'); /** @phpstan-ignore method.nonObject */
>>>>>>> a12f125f4a (.)
=======
    public function view(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.view') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function view(UserContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.view') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can create models.
     */
<<<<<<< HEAD
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.create');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.create');
=======
    public function create(ProfileContract $user): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.create'); /** @phpstan-ignore method.nonObject */
>>>>>>> a12f125f4a (.)
=======
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.create');
>>>>>>> b93ef594b4 (.)
=======
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.create');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.update') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.update') || $user->hasRole('super-admin');
=======
    public function update(ProfileContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasRole('super-admin'); /** @phpstan-ignore method.nonObject */
>>>>>>> a12f125f4a (.)
=======
    public function update(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.update') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function update(UserContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.update') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.delete') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.delete') || $user->hasRole('super-admin');
=======
    public function delete(ProfileContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasRole('super-admin'); /** @phpstan-ignore method.nonObject */
>>>>>>> a12f125f4a (.)
=======
    public function delete(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function delete(UserContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.restore') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function restore(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.restore') || $user->hasRole('super-admin');
=======
    public function restore(ProfileContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasRole('super-admin'); /** @phpstan-ignore method.nonObject */
>>>>>>> a12f125f4a (.)
=======
    public function restore(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.restore') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function restore(UserContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.restore') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
<<<<<<< HEAD
    public function forceDelete(UserContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.force-delete') || $user->hasRole('super-admin');
    }
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function forceDelete(UserContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.force-delete') || $user->hasRole('super-admin');
=======
    public function forceDelete(ProfileContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasRole('super-admin'); /** @phpstan-ignore method.nonObject */
>>>>>>> a12f125f4a (.)
=======
    public function forceDelete(UserContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.force-delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
    }
}
=======
    public function forceDelete(UserContract $user, OauthAuthCode $oauthAuthCode): bool
    {
        return $user->hasPermissionTo('oauth-auth-code.force-delete') || 
               $user->hasRole('super-admin');
    }
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
