<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
class DevicePolicy extends UserBasePolicy
{
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
class DevicePolicy extends UserBasePolicy
{
=======

=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\Device;
>>>>>>> origin/develop

class DevicePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('device.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Device $device): bool
    {
<<<<<<< HEAD

=======
        return $user->hasPermissionTo('device.view') || 
>>>>>>> origin/develop
               $user->devices->contains($device->id) ||
               $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('device.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Device $device): bool
    {
<<<<<<< HEAD

=======
        return $user->hasPermissionTo('device.update') || 
>>>>>>> origin/develop
               $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Device $device): bool
    {
<<<<<<< HEAD

=======
        return $user->hasPermissionTo('device.delete') || 
>>>>>>> origin/develop
               $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Device $device): bool
    {
<<<<<<< HEAD

=======
        return $user->hasPermissionTo('device.restore') || 
>>>>>>> origin/develop
               $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Device $device): bool
    {
<<<<<<< HEAD

               $user->hasRole('super-admin');
    }
>>>>>>> a12f125f4a (.)
=======
class DevicePolicy extends UserBasePolicy
{
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('device.force-delete') || 
               $user->hasRole('super-admin');
    }
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
