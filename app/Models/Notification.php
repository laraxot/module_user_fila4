<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\DatabaseNotification as BaseNotification;

/**
<<<<<<< HEAD
 * @property Model $notifiable
=======
 * @property Model|\Eloquent $notifiable
>>>>>>> ceff73a (.)
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
 * @mixin IdeHelperNotification
<<<<<<< HEAD
=======
 * @mixin \Eloquent
>>>>>>> ceff73a (.)
 */
class Notification extends BaseNotification
{
    use HasFactory;

    /** @var string */
    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
