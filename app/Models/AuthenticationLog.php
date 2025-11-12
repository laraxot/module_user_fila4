<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Authentication Log Model
 *
 * @property string         $id
 * @property string         $authenticatable_id
 * @property string         $authenticatable_type
 * @property string|null    $ip_address
 * @property string|null    $user_agent
 * @property \DateTime|null $login_at
 * @property \DateTime|null $logout_at
 * @property bool           $login_successful
 * @property string|null    $location
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 */
/**
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @property User|null                                   $user
 *
 * @method static \Modules\User\Database\Factories\AuthenticationLogFactory       factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog query()
 *
 * @mixin \Eloquent
 */
class AuthenticationLog extends BaseModel
{
    use \Modules\Xot\Models\Traits\HasXotFactory;
    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'authentication_logs';

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'login_at',
        'logout_at',
        'login_successful',
        'logout_type',
    ];

    /**
     * Get the attributes that should be cast.
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

    /**
     * Get the user that owns the authentication log.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
