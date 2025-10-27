<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Tenant;
use Modules\Xot\Contracts\UserContract;
=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\Tenant;
>>>>>>> origin/develop

class TenantPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('tenant.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Tenant $tenant): bool
    {
<<<<<<< HEAD
        return (
            $user->hasPermissionTo('tenant.view') ||
            $user->tenants->contains($tenant->id) ||
            $user->hasRole('super-admin')
        );
=======
        return $user->hasPermissionTo('tenant.view') || 
               $user->tenants->contains($tenant->id) ||
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('tenant.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $user, Tenant $_tenant): bool
    {
        return $user->hasPermissionTo('tenant.update') || $user->hasRole('super-admin');
=======
    public function update(UserContract $user, Tenant $tenant): bool
    {
        return $user->hasPermissionTo('tenant.update') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $user, Tenant $_tenant): bool
    {
        return $user->hasPermissionTo('tenant.delete') || $user->hasRole('super-admin');
=======
    public function delete(UserContract $user, Tenant $tenant): bool
    {
        return $user->hasPermissionTo('tenant.delete') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    public function restore(UserContract $user, Tenant $_tenant): bool
    {
        return $user->hasPermissionTo('tenant.restore') || $user->hasRole('super-admin');
=======
    public function restore(UserContract $user, Tenant $tenant): bool
    {
        return $user->hasPermissionTo('tenant.restore') || 
               $user->hasRole('super-admin');
>>>>>>> origin/develop
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Tenant $tenant): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionTo('tenant.force-delete') || $user->hasRole('super-admin');
    }
=======
use Modules\User\Contracts\UserContract;
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Modules\User\Models\Tenant;
use Modules\Xot\Contracts\UserContract;

class TenantPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('tenant.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Tenant $tenant): bool
    {
        return
            $user->hasPermissionTo('tenant.view') ||
            $user->tenants->contains($tenant->id) ||
            $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('tenant.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Tenant $_tenant): bool
    {
        return $user->hasPermissionTo('tenant.update') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Tenant $_tenant): bool
    {
        return $user->hasPermissionTo('tenant.delete') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Tenant $_tenant): bool
    {
        return $user->hasPermissionTo('tenant.restore') || $user->hasRole('super-admin');
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
	/**
	 * Determine whether the user can permanently delete the model.
	 */
	public function forceDelete(UserContract $user, Tenant $tenant): bool
	{
		return $user->hasRole('super-admin');
	}
>>>>>>> a12f125f4a (.)
=======
>>>>>>> 81efa49 (.)
    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Tenant $tenant): bool
    {
        return $user->hasPermissionTo('tenant.force-delete') || $user->hasRole('super-admin');
    }
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('tenant.force-delete') || 
               $user->hasRole('super-admin');
    }
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
