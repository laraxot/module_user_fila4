<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\User\Models\Feature;
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Feature;
use Modules\Xot\Contracts\UserContract;
=======

>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\Feature;
use Modules\Xot\Contracts\UserContract;
>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\Feature;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class FeaturePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        // return $user->hasPermissionTo('feature.view.any');
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
    public function view(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.view') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function view(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.view') || $user->hasRole('super-admin');
=======
    public function view(UserContract $user, Feature $feature): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function view(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.view') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function view(UserContract $user, Feature $feature): bool
    {
        return $user->hasPermissionTo('feature.view') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('feature.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.update') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.update') || $user->hasRole('super-admin');
=======
    public function update(UserContract $user, Feature $feature): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function update(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.update') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function update(UserContract $user, Feature $feature): bool
    {
        return $user->hasPermissionTo('feature.update') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.delete') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.delete') || $user->hasRole('super-admin');
=======
    public function delete(UserContract $user, Feature $feature): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function delete(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function delete(UserContract $user, Feature $feature): bool
    {
        return $user->hasPermissionTo('feature.delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.restore') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function restore(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.restore') || $user->hasRole('super-admin');
=======
    public function restore(UserContract $user, Feature $feature): bool
    {

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
    public function restore(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.restore') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
    public function restore(UserContract $user, Feature $feature): bool
    {
        return $user->hasPermissionTo('feature.restore') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Feature $feature): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionTo('feature.force-delete') || $user->hasRole('super-admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('feature.force-delete') || $user->hasRole('super-admin');
=======

               $user->hasRole('super-admin');
>>>>>>> a12f125f4a (.)
=======
        return $user->hasPermissionTo('feature.force-delete') || $user->hasRole('super-admin');
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('feature.force-delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
