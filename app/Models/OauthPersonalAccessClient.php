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
use Laravel\Passport\PersonalAccessClient as PassportPersonalAccessClient;

/**
 * Modules\User\Models\OauthPersonalAccessClient.
 *
 * @property string $uuid
 * @property string $client_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property OauthClient|null $client
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|OauthPersonalAccessClient newModelQuery()
 * @method static Builder|OauthPersonalAccessClient newQuery()
 * @method static Builder|OauthPersonalAccessClient query()
 * @method static Builder|OauthPersonalAccessClient whereClientId($value)
 * @method static Builder|OauthPersonalAccessClient whereCreatedAt($value)
 * @method static Builder|OauthPersonalAccessClient whereUpdatedAt($value)
 * @method static Builder|OauthPersonalAccessClient whereUuid($value)
 * @property int $id
 * @method static Builder|OauthPersonalAccessClient whereId($value)
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static Builder|OauthPersonalAccessClient whereCreatedBy($value)
 * @method static Builder|OauthPersonalAccessClient whereUpdatedBy($value)
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereUuid($value)
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereId($value)
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereUpdatedBy($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperOauthPersonalAccessClient
 * @mixin \Eloquent
 */
class OauthPersonalAccessClient extends PassportPersonalAccessClient
{
    /** @var string */
    protected $connection = 'user';

    // protected $primaryKey = 'uuid';
    /** @var string */
    protected $keyType = 'string';

    // protected $fillable = ['id', 'client_id'];
}
