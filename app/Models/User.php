<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Modules\Media\Models\Media;
use Modules\User\Database\Factories\UserFactory;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

/**
 * Class Modules\User\Models\User.
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property Carbon|null $password_expires_at
 * @property string|null $lang
 * @property bool $is_active
 * @property bool $is_otp
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_by
 * @property Collection<int, AuthenticationLog> $authentications
 * @property int|null $authentications_count
 * @property Collection<int, OauthClient> $clients
 * @property int|null $clients_count
 * @property TenantUser $pivot
 * @property Collection<int, Device> $devices
 * @property int|null $devices_count
 * @property string|null $full_name
 * @property AuthenticationLog|null $latestAuthentication
 * @property \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property int|null $notifications_count
 * @property Collection<int, Team> $ownedTeams
 * @property int|null $owned_teams_count
 * @property Collection<int, Permission> $permissions
 * @property int|null $permissions_count
 * @property ProfileContract|null $profile
 * @property Collection<int, Role> $roles
 * @property int|null $roles_count
 * @property Membership $membership
 * @property Collection<int, Team> $teams
 * @property int|null $teams_count
 * @property Collection<int, Tenant> $tenants
 * @property int|null $tenants_count
 * @property Collection<int, OauthAccessToken> $tokens
 * @property int|null $tokens_count
 *
 * @method static UserFactory factory($count = null, $state = [])
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions, $without = false)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null, $without = false)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCreatedBy($value)
 * @method static Builder|User whereCurrentTeamId($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereDeletedBy($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsActive($value)
 * @method static Builder|User whereLang($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereProfilePhotoPath($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUpdatedBy($value)
 * @method static Builder|User withoutPermission($permissions)
 * @method static Builder|User withoutRole($roles, $guard = null)
 *
 * @property string $last_name
 * @property Team|null $currentTeam
 * @property MediaCollection<int, Media> $media
 * @property int|null $media_count
 * @property Collection<int, SocialiteUser> $socialiteUsers
 * @property int|null $socialite_users_count
 * @property Collection<int, Membership> $teamUsers
 * @property int|null $team_users_count
 * @property Collection<int, User> $all_team_users
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $registration_number
 * @property string|null $status
 * @property string|null $state
 * @property string|null $moderation_data
 * @property string|null $certifications
 * @property string|null $type
 *
 * @method static Builder<static>|User whereAddress($value)
 * @method static Builder<static>|User whereCertifications($value)
 * @method static Builder<static>|User whereCity($value)
 * @method static Builder<static>|User whereIsOtp($value)
 * @method static Builder<static>|User whereModerationData($value)
 * @method static Builder<static>|User wherePasswordExpiresAt($value)
 * @method static Builder<static>|User wherePhone($value)
 * @method static Builder<static>|User whereRegistrationNumber($value)
 * @method static Builder<static>|User whereState($value)
 * @method static Builder<static>|User whereStatus($value)
 * @method static Builder<static>|User whereType($value)
 *
 * @mixin \Eloquent
 */
class User extends BaseUser
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    public $connection = 'user';

    public function canAccessSocialite(): bool
    {
        // return $this->role_id === Role::ROLE_ADMINISTRATOR;
        return true;
    }

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(\Modules\User\Contracts\TeamContract $teamContract): bool
    {
        $this->current_team_id = (int) $teamContract->getKey();

        return $this->save();
    }

    /**
     * Get all of the teams the user owns or belongs to.
     */
    public function allTeams(): \Illuminate\Support\Collection
    {
        $owned = $this->ownedTeams()->get();
        $belongsTo = $this->teams()->get();

        return $owned->merge($belongsTo)->unique('id');
    }

    /**
     * Get all of the teams the user owns.
     */
    public function ownedTeams(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Team::class, 'user_id');
    }

    /**
     * Get the user's "personal" team.
     */
    public function personalTeam(): ?\Modules\User\Contracts\TeamContract
    {
        /** @var Team|null $team */
        $team = $this->ownedTeams()->where('personal_team', true)->first();

        return $team;
    }

    /**
     * Determine if the user owns the given team.
     */
    public function ownsTeam(\Modules\User\Contracts\TeamContract $teamContract): bool
    {
        return $this->ownedTeams()->where('id', $teamContract->getKey())->exists();
    }

    /**
     * Determine if the user belongs to the given team.
     */
    public function belongsToTeam(\Modules\User\Contracts\TeamContract $teamContract): bool
    {
        return $this->teams()->where('team_id', $teamContract->getKey())->exists();
    }

    /**
     * Get the role that the user has on the team.
     */
    public function teamRole(\Modules\User\Contracts\TeamContract $teamContract): ?Role
    {
        $pivot = $this->teams()->where('team_id', $teamContract->getKey())->first();

        // TODO: Implement proper team role retrieval
        return null;
    }

    /**
     * Determine if the user has the given role on the given team.
     */
    public function hasTeamRole(\Modules\User\Contracts\TeamContract $teamContract, string $role): bool
    {
        return $this->teams()->where('team_id', $teamContract->getKey())
            ->wherePivot('role', $role)->exists();
    }

    /**
     * Get the user's permissions for the given team.
     */
    public function teamPermissions(\Modules\User\Contracts\TeamContract $teamContract): array
    {
        $teamRole = $this->teamRole($teamContract);

        return $teamRole ? $teamRole->permissions->pluck('name')->toArray() : [];
    }

    /**
     * Determine if the user has the given permission on the given team.
     */
    public function hasTeamPermission(\Modules\User\Contracts\TeamContract $teamContract, string $permission): bool
    {
        $permissions = $this->teamPermissions($teamContract);

        return in_array($permission, $permissions);
    }

    /**
     * Get the tenants the user can access.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Tenant, $this>
     */
    public function tenants(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tenant::class);
    }

    /**
     * Get all tenants the user can access.
     *
     * @return \Illuminate\Support\Collection<int, Tenant>
     */
    public function getTenants(\Filament\Panel $panel): \Illuminate\Support\Collection
    {
        /** @var \Illuminate\Support\Collection<int, Tenant> $tenants */
        $tenants = $this->tenants;

        return $tenants;
    }

    /**
     * Check if user can access the given tenant.
     */
    public function canAccessTenant(\Illuminate\Database\Eloquent\Model $tenant): bool
    {
        return $this->tenants()->whereKey($tenant)->exists();
    }

    /**
     * Get the teams the user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Team, $this>
     */
    public function teams(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_user')
            ->withPivot('role')
            ->withTimestamps();
    }

    /**
     * Get the user's current team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Team, $this>
     */
    public function currentTeam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class, 'current_team_id');
    }

    /**
     * Check if the given team is the current team.
     */
    public function isCurrentTeam(\Modules\User\Contracts\TeamContract $teamContract): bool
    {
        return $this->current_team_id === $teamContract->getKey();
    }
}
