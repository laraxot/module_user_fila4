<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Parental\HasChildren;
use Webmozart\Assert\Assert;
use function Safe\json_decode;
use function Safe\json_encode;
use Modules\Xot\Datas\XotData;
use Modules\User\Models\Tenant;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Filament\Models\Contracts\HasName;
use Spatie\Permission\Traits\HasRoles;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Notifications\Notifiable;
use Modules\Xot\Models\Traits\RelationX;
use Filament\Models\Contracts\HasTenants;
use Spatie\MediaLibrary\InteractsWithMedia;
use Modules\Xot\Models\Traits\HasXotFactory;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Modules\User\Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Base User Model.
 *
 * @property string|null $two_factor_recovery_codes
 */
abstract class BaseUser extends Authenticatable implements HasMedia, HasName, HasTenants, MustVerifyEmail, UserContract
{
    use HasApiTokens;
    use HasChildren;
    use HasXotFactory;
    use HasPermissions;
    use HasRoles;
    use HasUuids;
    use InteractsWithMedia;
    use Notifiable;
    use RelationX;

    public $incrementing = false;

    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'users';

    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    /** @var list<string> */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /** @var \Illuminate\Database\Eloquent\Model|null */
    protected $currentTenant;

    /** @var \Illuminate\Database\Eloquent\Model|null */
    protected $currentTeam;

    /** @var string */
    protected $guard_name = 'web';

    public function __construct(array $attributes = [])
    {
        try {
            $this->fillable = array_values(array_merge(parent::getFillable(), $this->getFillable()));
            parent::__construct($attributes);
        } catch (\Throwable $e) {
            $this->fillable = array_values($this->getFillable());
            $this->attributes = $attributes;
        }
    }

    /**
     * Get the name attribute for Filament.
     */
    public function getName(): string
    {
        return $this->name ?? $this->email ?? 'Unknown';
    }
    /**
     * Get the Filament name for the model.
     */
    public function getFilamentName(): string
    {
        return $this->getName();
    }

    /**
     * Get the user's tenants for multi-tenancy.
     *
     * @return BelongsToMany<Tenant, $this>
     */
    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(
            Tenant::class,
            'tenant_user',
            'user_id',
            'tenant_id'
        );
    }

    /**
     * Get the user's tenants.
     */
    public function getTenants(\Filament\Panel $panel): \Illuminate\Support\Collection|array
    {
        return $this->tenants;
    }

    /**
     * Get the user's current tenant.
     */
    public function getCurrentTenant(): ?\Illuminate\Database\Eloquent\Model
    {
        return $this->currentTenant ?? null;
    }

    /**
     * Set the current tenant for the user.
     */
    public function setCurrentTenant(\Illuminate\Database\Eloquent\Model $tenant): void
    {
        $this->currentTenant = $tenant;
    }

    /**
     * Check if the user can access a specific tenant.
     */
    public function canAccessTenant(\Illuminate\Database\Eloquent\Model $tenant): bool
    {
        return $this->tenants()->where('tenant_id', $tenant->getKey())->exists();
    }

    /**
     * Set the user's password with hashing.
     */
    public function setPasswordAttribute(string $value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    

    /**
     * Check if the user is verified.
     */
    public function hasVerifiedEmail(): bool
    {
        return ! is_null($this->email_verified_at);
    }

    /**
     * Mark the user's email as verified.
     */
    public function markEmailAsVerified(): bool
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Send the email verification notification.
     */
    public function sendEmailVerificationNotification(): void
    {
        // Implementation depends on the notification class used
    }

    /**
     * Check if the user has a specific role.
     */
    public function hasRole(\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection|array|string|int $roles, ?string $guard = null): bool
    {
        if (is_string($roles)) {
            return $this->roles()->where('name', $roles)->exists();
        }

        if (is_array($roles)) {
            return $this->roles()->whereIn('name', $roles)->exists();
        }

        if ($roles instanceof \Illuminate\Support\Collection) {
            return $this->roles()->whereIn('name', $roles->toArray())->exists();
        }

        if ($roles instanceof \Spatie\Permission\Contracts\Role) {
            $roleId = $roles->id;
            if (is_int($roleId)) {
                return $this->roles()->where('id', $roleId)->exists();
            }
        }

        if (is_int($roles)) {
            return $this->roles()->where('id', $roles)->exists();
        }

        return false;
    }

    /**
     * Check if the user has a specific permission.
     */
    public function hasPermission(string $permission): bool
    {
        return $this->permissions()->where('name', $permission)->exists()
               || $this->roles()->whereHas('permissions', function ($query) use ($permission): void {
                   $query->where('name', $permission);
               })->exists();
    }

    /**
     * Assign a role to the user.
     */
    public function assignRole(\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection|array|string|int $roles = []): static
    {
        if (is_string($roles) || is_int($roles)) {
            $roles = [$roles];
        }

        if ($roles instanceof \Illuminate\Support\Collection) {
            $roles = $roles->toArray();
        }

        if (! is_array($roles)) {
            $roles = [$roles];
        }

        foreach ($roles as $role) {
            if (is_string($role) || is_int($role)) {
                $role = \Spatie\Permission\Models\Role::findByName(is_string($role) ? $role : (string) $role, $this->getDefaultGuardName());
            }

            if ($role instanceof \Spatie\Permission\Contracts\Role) {
                $this->roles()->syncWithoutDetaching([$role->id]);
            }
        }

        return $this;
    }

    /**
     * Check if the user is active.
     */
    public function isActive(): bool
    {
        return $this->active ?? true;
    }

    /**
     * Check if the user is suspended.
     */
    public function isSuspended(): bool
    {
        return $this->suspended ?? false;
    }

    /**
     * Get the user's profile.
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get the user's settings.
     */
    public function settings(): ?\Illuminate\Database\Eloquent\Model
    {
        return $this->hasOne(Settings::class)->first();
    }

    /**
     * Get the user's preferences.
     */
    public function preferences(): ?\Illuminate\Database\Eloquent\Model
    {
        return $this->hasOne(Preferences::class)->first();
    }

    /**
     * Check if the user can access a specific panel.
     */
    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return true; // Default implementation - allow access to all panels
    }

    /**
     * Check if the user is in the current team.
     */
    public function isCurrentTeam(\Modules\User\Contracts\TeamContract $teamContract): bool
    {
        return $this->currentTeam()->first() && $this->currentTeam()->first()->getKey() === $teamContract->getKey();
    }

    /**
     * Get the user's current team.
     */
    public function currentTeam(): BelongsTo
    {
        return $this->belongsTo(
            XotData::make()->getTeamClass(),
            'current_team_id'
        );
    }

    /**
     * Set the user's current team.
     */
    public function setCurrentTeam(\Illuminate\Database\Eloquent\Model $team): void
    {
        $this->currentTeam = $team;
    }

    /**
     * Check if the user can access a specific team.
     */
    public function canAccessTeam(\Illuminate\Database\Eloquent\Model $team): bool
    {
        return $this->teams()->where('team_id', $team->getKey())->exists();
    }

    /**
     * Get the user's teams.
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(
            XotData::make()->getTeamClass(),
            'team_user',
            'user_id',
            'team_id'
        );
    }

    /**
     * Get the user's display name.
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->name ?? $this->email ?? 'Unknown User';
    }

    /**
     * Get the user's full name.
     */
    public function getFullNameAttribute(): string
    {
        return $this->name ?? $this->email ?? 'Unknown User';
    }

    /**
     * Get the user's first name.
     */
    public function getFirstNameAttribute(): string
    {
        $name = $this->name ?? '';
        $parts = explode(' ', $name);

        return $parts[0] ?? '';
    }

    /**
     * Get the user's last name.
     */
    public function getLastNameAttribute(): string
    {
        $name = $this->name ?? '';
        $parts = explode(' ', $name);

        return count($parts) > 1 ? implode(' ', array_slice($parts, 1)) : '';
    }

    /**
     * Get the user's email address.
     */
    public function getEmailAttribute(): string
    {
        return (string) ($this->attributes['email'] ?? '');
    }

    /**
     * Get the user's name.
     */
    public function getNameAttribute(): string
    {
        return (string) ($this->attributes['name'] ?? '');
    }

    /**
     * Get the user's ID.
     */
    public function getIdAttribute(): string
    {
        return (string) $this->getKey();
    }

    /**
     * Get the user's created at date.
     */
    public function getCreatedAtAttribute(): ?\Carbon\Carbon
    {
        $value = $this->attributes['created_at'] ?? null;
        if ($value === null) {
            return null;
        }

        return \Carbon\Carbon::parse((string) $value);
    }

    /**
     * Get the user's updated at date.
     */
    public function getUpdatedAtAttribute(): ?\Carbon\Carbon
    {
        $value = $this->attributes['updated_at'] ?? null;
        if ($value === null) {
            return null;
        }

        return \Carbon\Carbon::parse((string) $value);
    }

    /**
     * Get the user's email verified at date.
     */
    public function getEmailVerifiedAtAttribute(): ?\Carbon\Carbon
    {
        $value = $this->attributes['email_verified_at'] ?? null;
        if ($value === null) {
            return null;
        }

        return \Carbon\Carbon::parse((string) $value);
    }

    /**
     * Get the user's remember token.
     */
    public function getRememberTokenAttribute(): ?string
    {
        return $this->attributes['remember_token'] ? (string) $this->attributes['remember_token'] : null;
    }

    /**
     * Set the user's remember token.
     */
    public function setRememberTokenAttribute(?string $value): void
    {
        $this->attributes['remember_token'] = $value;
    }

    /**
     * Get the user's password.
     */
    public function getPasswordAttribute(): string
    {
        return (string) ($this->attributes['password'] ?? '');
    }

    /**
     * Get the user's email verification status.
     */
    public function getEmailVerifiedAttribute(): bool
    {
        return $this->hasVerifiedEmail();
    }

    /**
     * Get the user's active status.
     */
    public function getActiveAttribute(): bool
    {
        return $this->isActive();
    }

    /**
     * Get the user's suspended status.
     */
    public function getSuspendedAttribute(): bool
    {
        return $this->isSuspended();
    }

    /**
     * Get the user's roles.
     */
    public function getRolesAttribute(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->roles;
    }

    /**
     * Get the user's permissions.
     */
    public function getPermissionsAttribute(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->permissions;
    }

    /**
     * Get the user's tenants.
     */
    public function getTenantsAttribute(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->tenants;
    }

    /**
     * Get the user's teams.
     */
    public function getTeamsAttribute(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->teams;
    }

    /**
     * Get the user's notifications.
     */
    public function getNotificationsAttribute(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->notifications()->get();
    }

    /**
     * Get the user's unread notifications.
     */
    public function getUnreadNotificationsAttribute(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->notifications()->whereNull('read_at')->get();
    }

    /**
     * Get the user's media.
     */
    public function getMediaAttribute(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->media;
    }

    /**
     * Get the user's avatar.
     */
    public function getAvatarAttribute(): ?string
    {
        return $this->getFirstMediaUrl('avatar');
    }

    /**
     * Get the user's avatar URL.
     */
    public function getAvatarUrlAttribute(): ?string
    {
        return $this->getAvatarAttribute();
    }

    /**
     * Get the user's initials.
     */
    public function getInitialsAttribute(): string
    {
        $name = $this->name ?? $this->email ?? 'Unknown';
        $words = explode(' ', $name);
        $initials = '';

        foreach ($words as $word) {
            if (! empty($word)) {
                $initials .= strtoupper(substr($word, 0, 1));
            }
        }

        return $initials ?: 'U';
    }

    /**
     * Get the user's string representation.
     */
    public function __toString(): string
    {
        return $this->getDisplayNameAttribute();
    }

    /**
     * Get the default guard name.
     */
    public function getDefaultGuardName(): string
    {
        return $this->guard_name;
    }

    /**
     * Create a new user instance.
     *
     * @param  array<string, mixed>  $attributes
     */
    public static function create(array $attributes = []): static
    {
        $instance = parent::create($attributes);
        if (! $instance instanceof static) {
            throw new \RuntimeException('Created instance is not of expected type');
        }

        return $instance;
    }

    /**
     * Get the count of users.
     */
    public static function count(): int
    {
        return parent::count();
    }

    /**
     * Get users where a column is not null.
     */
    public static function whereNotNull(string $column): \Illuminate\Database\Eloquent\Builder
    {
        return parent::whereNotNull($column);
    }

    /**
     * Delete the model from the database.
     */
    public function delete(): bool
    {
        $result = parent::delete();

        return $result !== null ? (bool) $result : false;
    }

    /**
     * Get the first user.
     */
    public static function first(): ?static
    {
        $instance = parent::first();
        if ($instance !== null && ! $instance instanceof static) {
            throw new \RuntimeException('Retrieved instance is not of expected type');
        }

        return $instance;
    }

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(\Modules\User\Contracts\TeamContract $teamContract): bool
    {
        $this->current_team_id = $teamContract->getKey();

        return $this->save();
    }

    /**
     * Get all of the teams the user owns or belongs to.
     */
    public function allTeams(): \Illuminate\Support\Collection
    {
        return $this->ownedTeams->merge($this->teams);
    }

    /**
     * Get all of the teams the user owns.
     */
    public function ownedTeams(): HasMany
    {
        return $this->hasMany(XotData::make()->getTeamClass());
    }

    /**
     * Get the user's "personal" team.
     */
    public function personalTeam(): ?\Modules\User\Contracts\TeamContract
    {
        /** @var \Modules\User\Contracts\TeamContract|null $team */
        $team = $this->ownedTeams()->where('personal_team', true)->first();

        return $team;
    }

    /**
     * Determine if the user owns the given team.
     */
    public function ownsTeam(\Modules\User\Contracts\TeamContract $teamContract): bool
    {
        return $this->id === $teamContract->user_id;
    }

    /**
     * Get the role that the user has on the team.
     */
    public function teamRole(\Modules\User\Contracts\TeamContract $teamContract): ?Role
    {
        $team = $this->teams()->where('teams.id', $teamContract->getKey())->first();
        if ($team === null) {
            return null;
        }

        $pivot = $team->pivot;
        $roleAttr = $pivot->getAttribute('role');

        return $roleAttr instanceof Role ? $roleAttr : null;
    }

    /**
     * Determine if the user has the given role on the given team.
     */
    public function hasTeamRole(\Modules\User\Contracts\TeamContract $teamContract, string $role): bool
    {
        $teamRole = $this->teamRole($teamContract);

        return $teamRole && $teamRole->name === $role;
    }

    /**
     * Get the user's permissions for the given team.
     */
    public function teamPermissions(\Modules\User\Contracts\TeamContract $teamContract): array
    {
        return [];
    }

    /**
     * Determine if the user has the given permission on the given team.
     */
    public function hasTeamPermission(\Modules\User\Contracts\TeamContract $teamContract, string $permission): bool
    {
        return in_array($permission, $this->teamPermissions($teamContract), true);
    }

    /**
     * Check if two-factor authentication is enabled for the user.
     */
    public function hasTwoFactorEnabled(): bool
    {
        return (bool) ($this->two_factor_enabled ?? false);
    }

    /**
     * Set recovery codes for two-factor authentication.
     *
     * @param  array<int, string>  $codes
     */
    public function setRecoveryCodes(array $codes): void
    {
        $this->update([
            'two_factor_recovery_codes' => encrypt(json_encode($codes)),
        ]);
    }

    /**
     * Use a recovery code for two-factor authentication.
     */
    public function useRecoveryCode(string $code): bool
    {
        if (! $this->two_factor_recovery_codes) {
            return false;
        }

        $encrypted = $this->two_factor_recovery_codes;
        Assert::string($encrypted, 'Recovery codes must be string');
        $decrypted = decrypt($encrypted);
        Assert::string($decrypted, 'Decrypted value must be string');
        $recoveryCodes = json_decode($decrypted, true);

        if (! is_array($recoveryCodes)) {
            return false;
        }

        $index = array_search($code, $recoveryCodes, true);

        if ($index === false) {
            return false;
        }

        unset($recoveryCodes[$index]);

        $this->update([
            'two_factor_recovery_codes' => encrypt(json_encode(array_values($recoveryCodes))),
        ]);

        return true;
    }
}
