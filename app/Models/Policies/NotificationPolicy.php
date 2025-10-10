<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
class NotificationPolicy extends UserBasePolicy
{
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
class NotificationPolicy extends UserBasePolicy
{
=======

=======
use Modules\Xot\Contracts\UserContract;
use Modules\User\Models\Notification;
>>>>>>> origin/develop

class NotificationPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('notification.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Notification $notification): bool
    {
<<<<<<< HEAD

=======
        return $user->hasPermissionTo('notification.view') || 
>>>>>>> origin/develop
               $user->id === $notification->notifiable_id ||
               $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('notification.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Notification $notification): bool
    {
<<<<<<< HEAD

=======
        return $user->hasPermissionTo('notification.update') || 
>>>>>>> origin/develop
               $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Notification $notification): bool
    {
<<<<<<< HEAD

=======
        return $user->hasPermissionTo('notification.delete') || 
>>>>>>> origin/develop
               $user->id === $notification->notifiable_id ||
               $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Notification $notification): bool
    {
<<<<<<< HEAD

=======
        return $user->hasPermissionTo('notification.restore') || 
>>>>>>> origin/develop
               $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Notification $notification): bool
    {
<<<<<<< HEAD

               $user->hasRole('super-admin');
    }
>>>>>>> a12f125f4a (.)
=======
class NotificationPolicy extends UserBasePolicy
{
>>>>>>> b93ef594b4 (.)
=======
        return $user->hasPermissionTo('notification.force-delete') || 
               $user->hasRole('super-admin');
    }
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
