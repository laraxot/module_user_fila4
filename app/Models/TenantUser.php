<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * TenantUser Pivot Model
 *
 * Represents the many-to-many relationship between Tenant and User models.
 *
 * @property int $tenant_id
 * @property int $user_id
 * @property string|null $role
 *
 * @property-read \Modules\User\Models\Tenant|null $tenant
 * @property-read \Modules\User\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TenantUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TenantUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TenantUser query()
 * @mixin \Illuminate\Database\Eloquent\Relations\Pivot
 */
class TenantUser extends BasePivot
{
    /** @var string */
    protected $table = 'tenant_user';

    /** @var list<string> */
    protected $fillable = [
        'tenant_id',
        'user_id',
        'role',
    ];

    /**
     * Get the tenant that owns the tenant-user relationship.
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * Get the user that owns the tenant-user relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
