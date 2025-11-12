<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Team Model.
 *
 * Extends BaseTeam which already implements all TeamContract methods.
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null                   $creator
 * @property \Illuminate\Database\Eloquent\Collection<int, Membership>     $memberships
 * @property int|null                                                      $memberships_count
 * @property \Modules\User\Models\User|null                                $owner
 * @property \Illuminate\Database\Eloquent\Collection<int, TeamInvitation> $teamInvitations
 * @property int|null                                                      $team_invitations_count
 * @property \Modules\Xot\Contracts\ProfileContract|null                   $updater
 *
 * @method static \Modules\User\Database\Factories\TeamFactory       factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team query()
 *
 * @mixin \Eloquent
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
