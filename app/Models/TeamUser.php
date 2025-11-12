<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * TeamUser Model
 *
 * @property-read \Modules\User\Models\Team|null $team
 * @property-read \Modules\User\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser query()
 *
 * @mixin \Eloquent
 */
class TeamUser extends BasePivot
{
    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'team_user';

    /** @var list<string> */
    protected $fillable = [
        'team_id',
        'user_id',
        'role',
    ];

    /**
     * Get the team that owns the team-user relationship.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the user that owns the team-user relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
