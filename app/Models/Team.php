<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Team Model.
 *
 * Extends BaseTeam which already implements all TeamContract methods.
 */
class Team extends BaseTeam
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'personal_team' => 'boolean',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * Get the memberships for the team.
     *
     * @return HasMany<Membership, $this>
     */
    public function memberships(): HasMany
    {
        return $this->hasMany(Membership::class);
    }
}
