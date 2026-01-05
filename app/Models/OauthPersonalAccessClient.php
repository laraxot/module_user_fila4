<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
>>>>>>> cf5d6db (.)
use Illuminate\Support\Carbon;

/**
 * Modules\User\Models\OauthPersonalAccessClient.
 *
<<<<<<< HEAD
 * @property string      $uuid
 * @property string      $client_id
=======
 * @property string $uuid
 * @property string $client_id
>>>>>>> cf5d6db (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
 * @property int         $id
=======
 * @property int $id
>>>>>>> cf5d6db (.)
 *
 * @method static Builder|OauthPersonalAccessClient newModelQuery()
 * @method static Builder|OauthPersonalAccessClient newQuery()
 * @method static Builder|OauthPersonalAccessClient query()
 * @method static Builder|OauthPersonalAccessClient whereClientId($value)
 * @method static Builder|OauthPersonalAccessClient whereCreatedAt($value)
 * @method static Builder|OauthPersonalAccessClient whereUpdatedAt($value)
 * @method static Builder|OauthPersonalAccessClient whereUuid($value)
 * @method static Builder|OauthPersonalAccessClient whereId($value)
 * @method static Builder|OauthPersonalAccessClient whereCreatedBy($value)
 * @method static Builder|OauthPersonalAccessClient whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class OauthPersonalAccessClient extends Model
{
    /** @var string */
    protected $table = 'oauth_personal_access_clients';
}
