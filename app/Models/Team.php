<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Team Model.
 * 
 * Extends BaseTeam which already implements all TeamContract methods.
 *
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Membership> $memberships
 * @property-read int|null $memberships_count
 * @property-read \Modules\Xot\Contracts\UserContract|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\TeamInvitation> $teamInvitations
 * @property-read int|null $team_invitations_count
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $updater
 * @method static \Modules\User\Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team query()
 * @mixin \Eloquent
 */
<<<<<<< HEAD
<<<<<<< HEAD
class Team extends BaseTeam
{

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'user';
    
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
=======
class Team extends BaseTeam {}
>>>>>>> fbc8f8e (.)
=======
class Team extends BaseTeam
{
}
>>>>>>> 6d20fbe (.)
