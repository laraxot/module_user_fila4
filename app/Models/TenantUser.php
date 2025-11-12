<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * TenantUser Model
 *
 * @property-read \Modules\User\Models\Tenant|null $tenant
 * @property-read \Modules\User\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TenantUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TenantUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TenantUser query()
 * @mixin \Eloquent
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