<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use DateTime;
=======
<<<<<<< HEAD
use DateTime;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Team Permission Model
<<<<<<< HEAD
 *
=======
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * Represents a permission assigned to a user within a team context.
 *
 * @property string $id
 * @property string $team_id
 * @property string $user_id
 * @property string $permission
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 * @property Team $team
 * @property User $user
 * @method static Builder<static>|TeamPermission newModelQuery()
 * @method static Builder<static>|TeamPermission newQuery()
 * @method static Builder<static>|TeamPermission query()
<<<<<<< HEAD
=======
=======
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 * @property Team $team
 * @property User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamPermission query()
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperTeamPermission
 * @mixin \Eloquent
 */
class TeamPermission extends Model
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
<<<<<<< HEAD
=======
=======
    /** 
=======
    /**
>>>>>>> b93ef594b4 (.)
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'user';

    /**
     * The attributes that are mass assignable.
     *
<<<<<<< HEAD
     * @var list<string> 
>>>>>>> a12f125f4a (.)
=======
     * @var list<string>
>>>>>>> b93ef594b4 (.)
=======
    /** 
     * The database connection that should be used by the model.
     *
     * @var string 
     */
    protected $connection = 'user';

    /** 
     * The attributes that are mass assignable.
     *
     * @var list<string> 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    protected $fillable = [
        'team_id',
        'user_id',
        'permission',
    ];

    /**
     * Get the team that owns the permission.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the user that owns the permission.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
