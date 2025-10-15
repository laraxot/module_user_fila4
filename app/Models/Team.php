<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Team Model.
 * 
 * Extends BaseTeam which already implements all TeamContract methods.
 *
 * @property-read \Modules\Fixcity\Models\Profile|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Membership> $memberships
 * @property-read int|null $memberships_count
 * @property-read \Modules\Fixcity\Models\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\TeamInvitation> $teamInvitations
 * @property-read int|null $team_invitations_count
 * @property-read \Modules\Fixcity\Models\Profile|null $updater
 * @method static \Modules\User\Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team query()
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
