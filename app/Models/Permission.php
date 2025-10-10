<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Database\Factories\PermissionFactory;

/**
 * Permission Model
 */
class Permission extends Model
{
    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'permissions';

    /** @var list<string> */
    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
    ];

    /**
     * Get the users that have the permission.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'model_has_permissions', 'permission_id', 'model_id')
            ->where('model_type', User::class);
    }

    /**
     * Get the roles that have the permission.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions', 'permission_id', 'role_id');
    }

    /**
     * Get the factory instance for the model.
     */
    public static function factory(): PermissionFactory
    {
        return PermissionFactory::new();
    }
}