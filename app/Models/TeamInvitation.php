<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Models\BaseModel;

/**
 * Team Invitation Model
 *
 * @property-read \Modules\User\Models\Team|null $team
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamInvitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamInvitation query()
 *
 * @mixin \Eloquent
 */
class TeamInvitation extends BaseModel
{
    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'team_invitations';

    /** @var list<string> */
    protected $fillable = [
        'team_id',
        'email',
        'role',
    ];

    /**
     * Get the team that owns the invitation.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
