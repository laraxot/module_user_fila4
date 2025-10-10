<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Carbon;
use Laravel\Passport\AuthCode as PassportAuthCode;

/**
 * Modules\User\Models\OauthAuthCode.
 *
 * @property OauthClient|null $client
<<<<<<< HEAD
 * @method static Builder|OauthAuthCode newModelQuery()
 * @method static Builder|OauthAuthCode newQuery()
 * @method static Builder|OauthAuthCode query()
=======
<<<<<<< HEAD
 * @method static Builder|OauthAuthCode newModelQuery()
 * @method static Builder|OauthAuthCode newQuery()
 * @method static Builder|OauthAuthCode query()
=======
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode query()
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property string $id
 * @property string|null $user_id
 * @property string|null $client_id
 * @property string|null $scopes
 * @property bool $revoked
 * @property Carbon|null $expires_at
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|OauthAuthCode whereClientId($value)
 * @method static Builder|OauthAuthCode whereExpiresAt($value)
 * @method static Builder|OauthAuthCode whereId($value)
 * @method static Builder|OauthAuthCode whereRevoked($value)
 * @method static Builder|OauthAuthCode whereScopes($value)
 * @method static Builder|OauthAuthCode whereUserId($value)
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode whereUserId($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperOauthAuthCode
 * @mixin \Eloquent
 */
class OauthAuthCode extends PassportAuthCode
{
    /** @var string */
    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'scopes', 'revoked', 'expires_at'];
}
