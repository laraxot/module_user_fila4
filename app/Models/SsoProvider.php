<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modules\User\Models\SsoProvider.
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $type
 * @property string|null $entity_id
 * @property string|null $client_id
 * @property string|null $client_secret
 * @property string|null $redirect_url
 * @property string|null $metadata_url
 * @property string|null $scopes
 * @property array|null $settings
 * @property array|null $domain_whitelist
 * @property array|null $role_mapping
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @mixin IdeHelperSsoProvider
 *
<<<<<<< HEAD
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $updater
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $creator
 * @property-read \Modules\Quaeris\Models\Profile|null $updater
>>>>>>> 6849bc76 (.)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User> $users
 * @property-read int|null $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereClientSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereDomainWhitelist($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereMetadataUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereRedirectUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereRoleMapping($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SsoProvider whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class SsoProvider extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'display_name',
        'type',
        'entity_id',
        'client_id',
        'client_secret',
        'redirect_url',
        'metadata_url',
        'scopes',
        'settings',
        'domain_whitelist',
        'role_mapping',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'settings' => 'array',
        'domain_whitelist' => 'array',
        'role_mapping' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get all users associated with this SSO provider.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'sso_provider_id');
    }

    /**
     * Check if a given email domain is allowed for this provider.
     */
    public function isAllowedDomain(string $email): bool
    {
        if (empty($this->domain_whitelist)) {
            return true;
        }

        $atPos = strrchr($email, '@');
        if ($atPos === false) {
            return false;
        }

        $domain = substr($atPos, 1);

        return in_array($domain, $this->domain_whitelist, true);
    }

    /**
     * Map SAML/OIDC roles to application roles.
     *
     * @param  array<string>  $samlRoles
     * @return list<string>
     */
    public function mapRoles(array $samlRoles): array
    {
        $mapping = $this->role_mapping ?? [];
        $roles = [];

        foreach ($samlRoles as $samlRole) {
            if (isset($mapping[$samlRole]) && is_string($mapping[$samlRole])) {
                $roles[] = $mapping[$samlRole];
            }
        }

        return $roles;
    }
}
