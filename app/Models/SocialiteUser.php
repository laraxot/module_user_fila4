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
<<<<<<< HEAD
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property UserContract|null $user
 *
 * @method static Builder|SocialiteUser newModelQuery()
 * @method static Builder|SocialiteUser newQuery()
 * @method static Builder|SocialiteUser query()
 * @method static Builder|SocialiteUser whereAvatar($value)
 * @method static Builder|SocialiteUser whereCreatedAt($value)
 * @method static Builder|SocialiteUser whereCreatedBy($value)
 * @method static Builder|SocialiteUser whereEmail($value)
 * @method static Builder|SocialiteUser whereId($value)
 * @method static Builder|SocialiteUser whereName($value)
 * @method static Builder|SocialiteUser whereProvider($value)
 * @method static Builder|SocialiteUser whereProviderId($value)
 * @method static Builder|SocialiteUser whereToken($value)
 * @method static Builder|SocialiteUser whereUpdatedAt($value)
 * @method static Builder|SocialiteUser whereUpdatedBy($value)
 * @method static Builder|SocialiteUser whereUserId($value)
 *
 * @property string $uuid (DC2Type:guid)
 *
 * @method static Builder|SocialiteUser whereUuid($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static SocialiteUserFactory factory($count = null, $state = [])
 *
 * @mixin IdeHelperSocialiteUser
 * @mixin \Eloquent
=======
 * @property string|null $email
 * @property string|null $name
>>>>>>> e058848 (.)
 */
/**
 * @property-read \Modules\Fixcity\Models\Profile|null $creator
 * @property-read \Modules\Fixcity\Models\Profile|null $updater
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