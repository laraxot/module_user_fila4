<?php

declare(strict_types=1);

namespace Modules\User\Models\Models;

<<<<<<< HEAD
use Illuminate\Notifications\DatabaseNotification;
=======
<<<<<<< HEAD
use Illuminate\Notifications\DatabaseNotification;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

abstract class BaseUser extends Authenticatable
{
    use Notifiable;

    /**
     * Get the entity's notifications.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @return MorphMany<DatabaseNotification, $this>
     */
    public function notifications(): MorphMany
    {
        /** @var class-string<DatabaseNotification> $notificationClass */
        $notificationClass = config('notifications.notification_model', DatabaseNotification::class);
<<<<<<< HEAD
=======
=======
     * @return MorphMany<\Illuminate\Notifications\DatabaseNotification, $this>
     */
    public function notifications(): MorphMany
    {
        /** @var class-string<\Illuminate\Notifications\DatabaseNotification> $notificationClass */
        $notificationClass = config('notifications.notification_model', \Illuminate\Notifications\DatabaseNotification::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        
        return $this->morphMany($notificationClass, 'notifiable');
    }
}
