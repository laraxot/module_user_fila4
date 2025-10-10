<?php

declare(strict_types=1);

/**
 * inspired by  DutchCodingCompany\FilamentSocialite.
 */

namespace Modules\User\Models;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Modules\User\Database\Factories\SocialiteUserFactory;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\SocialiteUser.
 *
 * @property int $id
 * @property string $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $token
 * @property string|null $name
 * @property string|null $email
 * @property string|null $avatar
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property UserContract|null $user
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
 * @property string $uuid (DC2Type:guid)
 * @method static Builder|SocialiteUser whereUuid($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin IdeHelperSocialiteUser
 * @method static SocialiteUserFactory factory($count = null, $state = [])
<<<<<<< HEAD
=======
=======
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Modules\Xot\Contracts\UserContract|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereUserId($value)
 * @property string $uuid (DC2Type:guid)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialiteUser whereUuid($value)
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @mixin IdeHelperSocialiteUser
 * @method static \Modules\User\Database\Factories\SocialiteUserFactory factory($count = null, $state = [])
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin \Eloquent
 */
class SocialiteUser extends BaseModel
{
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
    /** @var list<string> */
    protected $fillable = [
        // 'id',
        'user_id',
        'provider',
        'provider_id',
        'token',
        'name',
        'email',
        'avatar',
    ];

    public function user(): BelongsTo
    {
        /** @var class-string<Model> */
        $user_class = XotData::make()->getUserClass();

        return $this->belongsTo($user_class);
    }
}
