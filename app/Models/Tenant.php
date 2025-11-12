<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Tenant Model
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Modules\User\Database\Factories\TenantFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant query()
 * @mixin \Eloquent
 */
class Tenant extends BaseModel
{
    use \Modules\Xot\Models\Traits\HasXotFactory;

    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'tenants';

    /** @var list<string> */
    protected $fillable = [
        'name',
        'slug',
        'domain',
        'database',
        'is_active',
    ];

    /**
     * Generate a slug for the tenant based on its name.
     */
    public function generateSlug(): void
    {
        $this->slug = \Illuminate\Support\Str::slug($this->name);
    }

    /**
     * Boot the model.
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $tenant): void {
            if (empty($tenant->slug)) {
                $tenant->generateSlug();
            }
        });
    }

    /**
     * Get the attributes that should be cast.
     * 
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the users that belong to the tenant.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'tenant_user')
            ->withPivot('role')
            ->withTimestamps();
    }
}