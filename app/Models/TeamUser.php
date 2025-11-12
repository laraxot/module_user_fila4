<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * TeamUser Model
 */
class TeamUser extends Model
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