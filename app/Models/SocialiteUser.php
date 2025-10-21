<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Socialite User Model
 *
 * @property string $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $avatar
 * @property string|null $email
 * @property string|null $name
 */
/**
 * @property-read \Modules\User\Models\User|null $user
 * @method static \Modules\User\Database\Factories\SocialiteUserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SocialiteUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SocialiteUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SocialiteUser query()
 * @mixin \Eloquent
 */
class SocialiteUser extends BaseModel
{
    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'socialite_users';

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'provider',
        'provider_id',
        'avatar',
        'email',
        'name',
    ];

    /**
     * Get the user that owns the socialite user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}