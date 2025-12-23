<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\User\Database\Factories\AuthenticationFactory;
=======
>>>>>>> laraxot/develop
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\AuthenticationFactory;
use Modules\Xot\Models\Traits\HasXotFactory;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * Authentication Model
 *
 * Tracks user authentication attempts and sessions.
 *
 * @property int $id
 * @property string $type Type of authentication (e.g., 'login', 'logout')
 * @property string|null $ip_address IP address used for authentication
 * @property string|null $user_agent User agent string from the request
 * @property string|null $location Geographic location derived from IP
 * @property bool $login_successful Whether the login attempt was successful
 * @property Carbon|null $login_at When the login attempt occurred
 * @property Carbon|null $logout_at When the logout occurred
 * @property string $authenticatable_type The class name of the authenticatable model
 * @property string $authenticatable_id The ID of the authenticatable model
 * @property Carbon|null $created_at When the record was created
 * @property Carbon|null $updated_at When the record was last updated
=======
=======
>>>>>>> laraxot/develop
 * Authentication Model.
 *
 * Tracks user authentication attempts and sessions.
 *
 * @property int         $id
 * @property string      $type                 Type of authentication (e.g., 'login', 'logout')
 * @property string|null $ip_address           IP address used for authentication
 * @property string|null $user_agent           User agent string from the request
 * @property string|null $location             Geographic location derived from IP
 * @property bool        $login_successful     Whether the login attempt was successful
 * @property Carbon|null $login_at             When the login attempt occurred
 * @property Carbon|null $logout_at            When the logout occurred
 * @property string      $authenticatable_type The class name of the authenticatable model
 * @property string      $authenticatable_id   The ID of the authenticatable model
 * @property Carbon|null $created_at           When the record was created
 * @property Carbon|null $updated_at           When the record was last updated
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop
 *
 * @method static Builder<static>|Authentication newModelQuery()
 * @method static Builder<static>|Authentication newQuery()
 * @method static Builder<static>|Authentication query()
 * @method static Builder<static>|Authentication whereCreatedAt($value)
 * @method static Builder<static>|Authentication whereId($value)
 * @method static Builder<static>|Authentication whereIpAddress($value)
 * @method static Builder<static>|Authentication whereLocation($value)
 * @method static Builder<static>|Authentication whereType($value)
 * @method static Builder<static>|Authentication whereUpdatedAt($value)
 * @method static Builder<static>|Authentication whereUserAgent($value)
 * @method static Builder<static>|Authentication whereLoginAt($value)
 * @method static Builder<static>|Authentication whereLogoutAt($value)
 * @method static Builder<static>|Authentication whereLoginSuccessful($value)
 * @method static Builder<static>|Authentication whereAuthenticatableType($value)
 * @method static Builder<static>|Authentication whereAuthenticatableId($value)
 *
 * @mixin IdeHelperAuthentication
 *
 * @method static AuthenticationFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/develop
 * @property \Illuminate\Database\Eloquent\Model|\Eloquent $authenticatable
 * @property \Modules\Xot\Contracts\ProfileContract|null   $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null   $deleter
 * @property \Modules\Xot\Contracts\ProfileContract|null   $updater
 *
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop
 * @mixin \Eloquent
 */
class Authentication extends BaseModel
{
    use HasXotFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'type',
        'ip_address',
        'user_agent',
        'location',
        'login_at',
        'login_successful',
        'logout_at',
        'authenticatable_type',
        'authenticatable_id',
    ];

    public function authenticatable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'login_at' => 'datetime',
            'logout_at' => 'datetime',
            'login_successful' => 'boolean',
        ];
    }
}
