<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Membership Model
 *
 * @property string $id
 * @property string $team_id
 * @property string $user_id
 * @property string $role
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 */
class Membership extends Model
{
    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'memberships';

    /** @var list<string> */
    protected $fillable = [
        'team_id',
        'user_id',
        'role',
        'customer_id',
    ];

    /**
     * Get the team that owns the membership.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the user that owns the membership.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}