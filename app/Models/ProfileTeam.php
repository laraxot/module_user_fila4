<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
=======
<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\Xot\Contracts\ProfileContract;

/**
 * ProfileTeam Model
<<<<<<< HEAD
 *
=======
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * Represents the relationship between a profile and a team, including the user's role.
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string $id
 * @property int $team_id
 * @property string|null $user_id
 * @property string|null $role
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|ProfileTeam newModelQuery()
 * @method static Builder<static>|ProfileTeam newQuery()
 * @method static Builder<static>|ProfileTeam query()
 * @method static Builder<static>|ProfileTeam whereCreatedAt($value)
 * @method static Builder<static>|ProfileTeam whereCreatedBy($value)
 * @method static Builder<static>|ProfileTeam whereDeletedAt($value)
 * @method static Builder<static>|ProfileTeam whereDeletedBy($value)
 * @method static Builder<static>|ProfileTeam whereId($value)
 * @method static Builder<static>|ProfileTeam whereRole($value)
 * @method static Builder<static>|ProfileTeam whereTeamId($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedAt($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedBy($value)
 * @method static Builder<static>|ProfileTeam whereUserId($value)
<<<<<<< HEAD
=======
=======
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam whereUserId($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperProfileTeam
 * @mixin \Eloquent
 */
class ProfileTeam extends TeamUser
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profile_team';
}
