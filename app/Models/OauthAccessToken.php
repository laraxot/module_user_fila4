<?php

declare(strict_types=1);

namespace Modules\User\Models;

// use Laravel\Passport\AccessToken as PassportAccessToken;
<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Database\Eloquent\Builder;
=======
<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Laravel\Passport\Token as PassportToken;

/**
 * Modules\User\Models\OauthAccessToken.
 *
 * @property string $id
 * @property string|null $user_id
 * @property string $client_id
 * @property string|null $name
 * @property array|null $scopes
 * @property bool $revoked
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $expires_at
 * @property OauthClient|null $client
 * @property UserContract|null $user
 * @method static Builder|OauthAccessToken newModelQuery()
 * @method static Builder|OauthAccessToken newQuery()
 * @method static Builder|OauthAccessToken query()
 * @method static Builder|OauthAccessToken whereClientId($value)
 * @method static Builder|OauthAccessToken whereCreatedAt($value)
 * @method static Builder|OauthAccessToken whereExpiresAt($value)
 * @method static Builder|OauthAccessToken whereId($value)
 * @method static Builder|OauthAccessToken whereName($value)
 * @method static Builder|OauthAccessToken whereRevoked($value)
 * @method static Builder|OauthAccessToken whereScopes($value)
 * @method static Builder|OauthAccessToken whereUpdatedAt($value)
 * @method static Builder|OauthAccessToken whereUserId($value)
<<<<<<< HEAD
=======
=======
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property OauthClient|null $client
 * @property \Modules\Xot\Contracts\UserContract|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereUserId($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property OauthRefreshToken|null $refreshToken
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder<static>|OauthAccessToken whereCreatedBy($value)
 * @method static Builder<static>|OauthAccessToken whereDeletedAt($value)
 * @method static Builder<static>|OauthAccessToken whereDeletedBy($value)
 * @method static Builder<static>|OauthAccessToken whereUpdatedBy($value)
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAccessToken whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAccessToken whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAccessToken whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAccessToken whereUpdatedBy($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperOauthAccessToken
 * @mixin \Eloquent
 */
class OauthAccessToken extends PassportToken
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    use HasFactory;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    use HasFactory;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /** @var string */
    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
