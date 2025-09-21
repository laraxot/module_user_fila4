<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\Pivot;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\Pivot;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
=======
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Support\Facades\Schema;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Str;
use Modules\User\Contracts\HasTeamsContract;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Membership;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

/**
 * Trait HasTeams
 *
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
use Illuminate\Support\Facades\Schema;

/**
 * Trait HasTeams
 * 
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

/**
 * Trait HasTeams
 *
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * Provides team functionality for User models implementing team-based organization.
 * This trait handles team ownership, membership, permissions, and relationships.
 *
 * @property TeamContract $currentTeam
 * @property int|null $current_team_id
 * @property Collection<int, TeamContract> $teams
 * @property Collection<int, TeamContract> $ownedTeams
 * @property Collection<int, UserContract> $teamUsers
 * @property UserContract|null $owner
 */
trait HasTeams
{
    /**
     * Add a user to the team.
     *
<<<<<<< HEAD
     * @param Model $user
     * @param Model|null $role
     * @return Model
=======
<<<<<<< HEAD
     * @param Model $user
     * @param Model|null $role
     * @return Model
=======
     * @param  \Illuminate\Database\Eloquent\Model  $user
     * @param  \Illuminate\Database\Eloquent\Model|null  $role
     * @return \Illuminate\Database\Eloquent\Model
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function addTeamMember($user, $role = null)
    {
        $teamUser = $this->teamUsers()->create([
            'user_id' => $user->getKey(),
            'role_id' => $role ? $role->getKey() : null,
        ]);

        $this->increment('total_members');

        return $teamUser;
    }

    /**
     * Get all teams the user belongs to.
     *
<<<<<<< HEAD
     * @return Collection<TeamContract>
=======
<<<<<<< HEAD
     * @return Collection<TeamContract>
=======
     * @return \Illuminate\Support\Collection<TeamContract>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function allTeams(): Collection
    {
        return $this->ownedTeams->merge($this->teams)->sortBy('name');
    }

    /**
     * Check if the user belongs to any teams.
     */
    public function belongsToTeams(): bool
    {
        return true;
    }

    /**
     * Check if the user belongs to a specific team.
     */
    public function belongsToTeam(TeamContract $team): bool
    {
        $found = $this->teams()->where('teams.id', $team->id)->first();
        if ($found === null) {
            return false;
        }
        Assert::isInstanceOf($found, TeamContract::class, 'Team must implement TeamContract.');
        return true;
    }

    /**
     * Boot the HasTeams trait.
     *
     * @return void
     */
    protected static function bootHasTeams()
    {
        /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
         * static::deleting(function ($team) {
         * $team->teamUsers()->delete();
         * $team->teamInvitations()->delete();
         * });
         */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        static::deleting(function ($team) {
            $team->teamUsers()->delete();
            $team->teamInvitations()->delete();
        });
        */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Check if the user can add a member to a team.
     */
    public function canAddTeamMember(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'add team member');
    }

    /**
     * Check if the user can create a team.
     */
    public function canCreateTeam(): bool
    {
        return $this->hasPermissionTo('create team');
    }

    /**
     * Check if the user can delete a team.
     */
    public function canDeleteTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
    }

    /**
     * Check if the user can leave a team.
     */
    public function canLeaveTeam(TeamContract $team): bool
    {
<<<<<<< HEAD
        return $this->belongsToTeam($team) && !$this->ownsTeam($team);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->belongsToTeam($team) && !$this->ownsTeam($team);
=======
        return $this->belongsToTeam($team) && ! $this->ownsTeam($team);
>>>>>>> a12f125f4a (.)
=======
        return $this->belongsToTeam($team) && !$this->ownsTeam($team);
>>>>>>> b93ef594b4 (.)
=======
        return $this->belongsToTeam($team) && ! $this->ownsTeam($team);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Check if the user can manage a team.
     */
    public function canManageTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
    }

    /**
     * Check if the user can remove a member from a team.
     */
<<<<<<< HEAD
    public function canRemoveTeamMember(TeamContract $team, UserContract $_user): bool
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function canRemoveTeamMember(TeamContract $team, UserContract $_user): bool
=======
    public function canRemoveTeamMember(TeamContract $team, UserContract $user): bool
>>>>>>> a12f125f4a (.)
=======
    public function canRemoveTeamMember(TeamContract $team, UserContract $_user): bool
>>>>>>> b93ef594b4 (.)
=======
    public function canRemoveTeamMember(TeamContract $team, UserContract $user): bool
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'remove team member');
    }

    /**
     * Check if the user can update a team.
     */
    public function canUpdateTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update team');
    }

    /**
     * Check if the user can update a team member.
     */
<<<<<<< HEAD
    public function canUpdateTeamMember(TeamContract $team, UserContract $_user): bool
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function canUpdateTeamMember(TeamContract $team, UserContract $_user): bool
=======
    public function canUpdateTeamMember(TeamContract $team, UserContract $user): bool
>>>>>>> a12f125f4a (.)
=======
    public function canUpdateTeamMember(TeamContract $team, UserContract $_user): bool
>>>>>>> b93ef594b4 (.)
=======
    public function canUpdateTeamMember(TeamContract $team, UserContract $user): bool
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update team member');
    }

    /**
     * Check if the user can view a team.
     */
    public function canViewTeam(TeamContract $team): bool
    {
        return $this->belongsToTeam($team) || $this->hasTeamPermission($team, 'view team');
    }

    /**
     * Get all of the team's users including its owner.
     *
<<<<<<< HEAD
     * @return Collection<int, UserContract>
=======
<<<<<<< HEAD
     * @return Collection<int, UserContract>
=======
     * @return \Illuminate\Support\Collection<int, UserContract>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function getAllTeamUsersAttribute(): Collection
    {
        $owner = $this->owner;
        if ($owner === null) {
            return $this->teamUsers;
        }
        return $this->teamUsers->merge([$owner]);
    }

    /**
     * Determine if the given user is on the team.
     *
     * @param UserContract $user
     * @return bool
     */
    public function hasTeamMember(UserContract $user): bool
    {
        if ($this->teamUsers->contains($user)) {
            return true;
        }

        // Check if user can own this team (UserContract sempre ha il metodo ownsTeam)
        if ($this instanceof TeamContract) {
            return $user->ownsTeam($this);
        }

        return false;
    }

    /**
     * Check if the user has teams.
     */
    public function hasTeams(): bool
    {
        return true;
    }

    /**
     * Check if the user has a specific permission in a team.
     */
    public function hasTeamPermission(TeamContract $team, string $permission): bool
    {
<<<<<<< HEAD
        return $this->ownsTeam($team) || in_array($permission, $this->teamPermissions($team), strict: true);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->ownsTeam($team) || in_array($permission, $this->teamPermissions($team), strict: true);
=======
        return $this->ownsTeam($team) || in_array($permission, $this->teamPermissions($team));
>>>>>>> a12f125f4a (.)
=======
        return $this->ownsTeam($team) || in_array($permission, $this->teamPermissions($team), strict: true);
>>>>>>> b93ef594b4 (.)
=======
        return $this->ownsTeam($team) || in_array($permission, $this->teamPermissions($team));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Check if the user has a specific role in a team.
     */
    public function hasTeamRole(TeamContract $team, string $role): bool
    {
        if ($this->ownsTeam($team)) {
            return true;
        }

        $teamRole = $this->teamRole($team);
        return $teamRole !== null && isset($teamRole->name) && $teamRole->name === $role;
    }

    /**
     * Get the current team of the user's context.
     *
<<<<<<< HEAD
     * @return BelongsTo<Model&TeamContract, $this>
=======
<<<<<<< HEAD
     * @return BelongsTo<Model&TeamContract, $this>
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Illuminate\Database\Eloquent\Model&\Modules\User\Contracts\TeamContract, $this>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function currentTeam(): BelongsTo
    {
        $xot = XotData::make();
        if ($this->current_team_id === null && $this->id) {
            $this->switchTeam($this->personalTeam());
        }

        if ($this->allTeams()->isEmpty() && $this->getKey() !== null) {
            $this->current_team_id = null;
            $this->save();
        }

        $teamClass = $xot->getTeamClass();

        return $this->belongsTo($teamClass, 'current_team_id');
    }

    /**
     * Get the teams owned by the user.
     *
<<<<<<< HEAD
     * @return HasMany<Model&TeamContract, $this>
=======
<<<<<<< HEAD
     * @return HasMany<Model&TeamContract, $this>
=======
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Illuminate\Database\Eloquent\Model&\Modules\User\Contracts\TeamContract, $this>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function ownedTeams(): HasMany
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        return $this->hasMany($teamClass, 'user_id');
    }

    /**
     * Get all team users.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @return HasMany<Membership, $this>
     */
    public function teamUsers(): HasMany
    {
        /** @var HasMany<Membership, $this> $relation */
        $relation = $this->hasMany(Membership::class, 'user_id');
<<<<<<< HEAD
=======
=======
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\User\Models\Membership, $this>
     */
    public function teamUsers(): HasMany
    {
        /** @var \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\User\Models\Membership, $this> $relation */
        $relation = $this->hasMany(\Modules\User\Models\Membership::class, 'user_id');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        return $relation;
    }

    /**
     * Get the role for a specific team.
     */
<<<<<<< HEAD
    public function teamRole(TeamContract $team): null|Role
    {
        /** @var Model|Pivot|null $teamUser */
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function teamRole(TeamContract $team): null|Role
=======
    public function teamRole(TeamContract $team): ?Role
>>>>>>> a12f125f4a (.)
=======
    public function teamRole(TeamContract $team): null|Role
>>>>>>> b93ef594b4 (.)
    {
        /** @var Model|Pivot|null $teamUser */
=======
    public function teamRole(TeamContract $team): ?Role
    {
        /** @var \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\Pivot|null $teamUser */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $teamUser = $this->teamUsers()->where('team_id', $team->id)->first();

        if ($teamUser === null) {
            return null;
        }

        // Accesso sicuro alla proprietà role usando getAttribute
        $role = $teamUser->getAttribute('role');
<<<<<<< HEAD

        return ($role instanceof Role) ? $role : null;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

        return ($role instanceof Role) ? $role : null;
=======
        
        return $role instanceof Role ? $role : null;
>>>>>>> a12f125f4a (.)
=======

        return ($role instanceof Role) ? $role : null;
>>>>>>> b93ef594b4 (.)
=======
        
        return $role instanceof Role ? $role : null;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Get permissions for a specific team.
     *
     * @param TeamContract $team
     * @return array<int, string>
     */
    public function teamPermissions(TeamContract $team): array
    {
        $role = $this->teamRole($team);

        if ($role === null || !$role->permissions) {
            return [];
        }

        /** @var array<int, string> */
        return $role->permissions->pluck('name')->values()->toArray();
    }

    /**
     * Remove a user from the team.
     *
<<<<<<< HEAD
     * @param Model $user
=======
<<<<<<< HEAD
     * @param Model $user
=======
     * @param  \Illuminate\Database\Eloquent\Model  $user
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @return void
     */
    public function removeTeamMember($user)
    {
<<<<<<< HEAD
        $this->teamUsers()->where('user_id', $user->getKey())->delete();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->teamUsers()->where('user_id', $user->getKey())->delete();
=======
        $this->teamUsers()
            ->where('user_id', $user->getKey())
            ->delete();
>>>>>>> a12f125f4a (.)
=======
        $this->teamUsers()->where('user_id', $user->getKey())->delete();
>>>>>>> b93ef594b4 (.)
=======
        $this->teamUsers()
            ->where('user_id', $user->getKey())
            ->delete();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        $this->decrement('total_members');
    }

    /**
     * Get the user's personal team.
     *
<<<<<<< HEAD
     * @return TeamContract|null
     */
    public function personalTeam(): null|TeamContract
    {
        /** @var TeamContract|null */
=======
<<<<<<< HEAD
     * @return TeamContract|null
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function personalTeam(): null|TeamContract
=======
    public function personalTeam(): ?TeamContract
>>>>>>> a12f125f4a (.)
=======
    public function personalTeam(): null|TeamContract
>>>>>>> b93ef594b4 (.)
    {
        /** @var TeamContract|null */
=======
     * @return \Modules\User\Contracts\TeamContract|null
     */
    public function personalTeam(): ?TeamContract
    {
        /** @var \Modules\User\Contracts\TeamContract|null */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $personalTeam = $this->ownedTeams->where('personal_team', true)->first();

        return $personalTeam;
    }

    /**
     * Switch the user's context to the given team.
     *
     * @param TeamContract $team
     */
<<<<<<< HEAD
    public function switchTeam(null|TeamContract $team): bool
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function switchTeam(null|TeamContract $team): bool
=======
    public function switchTeam(?TeamContract $team): bool
>>>>>>> a12f125f4a (.)
=======
    public function switchTeam(null|TeamContract $team): bool
>>>>>>> b93ef594b4 (.)
=======
    public function switchTeam(?TeamContract $team): bool
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        if ($team === null) {
            return false;
        }

<<<<<<< HEAD
        if (!$this->belongsToTeam($team)) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!$this->belongsToTeam($team)) {
=======
        if (! $this->belongsToTeam($team)) {
>>>>>>> a12f125f4a (.)
=======
        if (!$this->belongsToTeam($team)) {
>>>>>>> b93ef594b4 (.)
=======
        if (! $this->belongsToTeam($team)) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            return false;
        }

        $this->current_team_id = (string) $team->id;
        $this->save();

        return true;
    }

    /**
     * Determine if the given team is the current team.
     */
    public function isCurrentTeam(TeamContract $team): bool
    {
        if ($this->currentTeam === null) {
            return false;
        }

<<<<<<< HEAD
        return $team->getKey() === $this->currentTeam->getKey();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $team->getKey() === $this->currentTeam->getKey();
=======
        return $team->getKey() == $this->currentTeam->getKey();
>>>>>>> a12f125f4a (.)
=======
        return $team->getKey() === $this->currentTeam->getKey();
>>>>>>> b93ef594b4 (.)
=======
        return $team->getKey() == $this->currentTeam->getKey();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine if the user owns the given team.
     *
     * @param TeamContract $team
     */
    public function ownsTeam(TeamContract $team): bool
    {
<<<<<<< HEAD
        /** @var ?Model $found */
=======
<<<<<<< HEAD
        /** @var ?Model $found */
=======
        /** @var ?\Illuminate\Database\Eloquent\Model $found */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $found = $this->ownedTeams()->where('teams.id', $team->id)->first();

        return $found !== null;
    }

    /**
     * Get all of the teams the user belongs to.
     *
<<<<<<< HEAD
     * @return BelongsToMany<Model&TeamContract, Model>
=======
<<<<<<< HEAD
     * @return BelongsToMany<Model&TeamContract, Model>
=======
     * @return BelongsToMany<\Illuminate\Database\Eloquent\Model&\Modules\User\Contracts\TeamContract, \Illuminate\Database\Eloquent\Model>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function teams(): BelongsToMany
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

<<<<<<< HEAD
        /** @var BelongsToMany<Model&TeamContract, Model> $relation */
        $relation = $this->belongsToMany($teamClass, 'team_user', 'user_id', 'team_id')->using(Membership::class);
=======
<<<<<<< HEAD
        /** @var BelongsToMany<Model&TeamContract, Model> $relation */
<<<<<<< HEAD
<<<<<<< HEAD
        $relation = $this->belongsToMany($teamClass, 'team_user', 'user_id', 'team_id')->using(Membership::class);
=======
=======
        /** @var BelongsToMany<\Illuminate\Database\Eloquent\Model&\Modules\User\Contracts\TeamContract, \Illuminate\Database\Eloquent\Model> $relation */
>>>>>>> origin/develop
        $relation = $this->belongsToMany(
            $teamClass,
            'team_user',
            'user_id',
            'team_id'
        )->using(Membership::class);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $relation = $this->belongsToMany($teamClass, 'team_user', 'user_id', 'team_id')->using(Membership::class);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        return $relation;
    }

    /**
     * Invite a user to a team.
     */
    public function inviteToTeam(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->attach($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Remove a user from the team.
     */
    public function removeFromTeam(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->detach($user->id);

            return true;
        }

        return false;
    }

    /**
     * Check if the user is an owner or a member.
     */
    public function isOwnerOrMember(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->belongsToTeam($team);
    }

    /**
     * Promote a member to team admin.
     */
    public function promoteToAdmin(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->updateExistingPivot($user->id, ['role' => 'admin']);

            return true;
        }

        return false;
    }

    /**
     * Demote a member from team admin.
     */
    public function demoteFromAdmin(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->updateExistingPivot($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Get all admins of the team.
     */
    public function getTeamAdmins(TeamContract $team): Collection
    {
        return $team->members()->wherePivot('role', 'admin')->get();
    }

    /**
     * Get all members of the team.
     */
    public function getTeamMembers(TeamContract $team): Collection
    {
        return $team->members()->wherePivot('role', 'member')->get();
    }

    /**
     * Determine if the user owns the given team.
     *
     * @param TeamContract $team
     */
    public function checkTeamOwnership(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
    }
}
