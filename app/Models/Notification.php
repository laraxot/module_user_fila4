<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Database\Eloquent\Model;
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotificationCollection;
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Database\Eloquent\Model;
>>>>>>> b93ef594b4 (.)
use Illuminate\Database\Eloquent\Builder;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\DatabaseNotification as BaseNotification;

/**
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Model|\Eloquent $notifiable
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static Builder|Notification newModelQuery()
 * @method static Builder|Notification newQuery()
 * @method static Builder|Notification query()
 * @method static Builder|Notification read()
 * @method static Builder|Notification unread()
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
<<<<<<< HEAD
=======
=======
 * @property \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification read()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification unread()
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection<int, static> get($columns = ['*'])
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperNotification
 * @mixin \Eloquent
 */
class Notification extends BaseNotification
{
    use HasFactory;
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /** @var string */
    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
