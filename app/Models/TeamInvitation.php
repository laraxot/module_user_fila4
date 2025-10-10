<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Team Invitation Model
 */
class TeamInvitation extends Model
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