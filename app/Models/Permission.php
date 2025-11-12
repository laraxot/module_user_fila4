<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Database\Factories\PermissionFactory;

/**
<<<<<<< HEAD
 * Class Permission.
 *
 * Extends Spatie's Permission model to interact with the permission system.
 *
 * @property string $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Collection<int, Role> $roles
 * @property int|null $roles_count
 * @property EloquentCollection<int, Model&UserContract> $users
 * @property int|null $users_count
 *
 * @method static Builder|Permission newModelQuery()
 * @method static Builder|Permission newQuery()
 * @method static Builder|Permission query()
 * @method static Builder|Permission whereCreatedAt($value)
 * @method static Builder|Permission whereUpdatedAt($value)
 * @method static Builder|Permission whereCreatedBy($value)
 * @method static Builder|Permission whereUpdatedBy($value)
 * @method static Builder|Permission whereGuardName($value)
 * @method static Builder|Permission whereId($value)
 * @method static Builder|Permission whereName($value)
 * @method static Builder|Permission role($roles, $guard = null)
 * @method static Builder|Permission permission($permissions)
 *
 * @property EloquentCollection<int, Permission> $permissions
 * @property int|null $permissions_count
 *
 * @method static Builder|Permission withoutPermission($permissions)
 * @method static Builder|Permission withoutRole($roles, $guard = null)
 *
 * @property PermissionRole|null $pivot
 *
 * @method static PermissionFactory factory($count = null, $state = [])
 *
 * @mixin IdeHelperPermission
 * @mixin \Eloquent
=======
 * Permission Model
>>>>>>> e058848 (.)
 */
class Permission extends Model
{
<<<<<<< HEAD
    use \Modules\Xot\Models\Traits\HasXotFactory;
=======
    use HasFactory;
>>>>>>> 6849bc76 (.)
    use RelationX;

=======
>>>>>>> e058848 (.)
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

<<<<<<< HEAD
   
=======
    /**
     * @see vendor/ laravel / framework / src / Illuminate / Database / Eloquent / Factories / HasFactory.php
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
     */
    protected static function newFactory()
    {
        return app(GetFactoryAction::class)->execute(static::class);
    }
>>>>>>> 6849bc76 (.)
}
=======
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
>>>>>>> e058848 (.)
