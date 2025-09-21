<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Carbon;

/**
 * Modules\User\Models\RoleHasPermission.
 *
 * @property int $id
 * @property int $permission_id
 * @property int $role_id
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|RoleHasPermission newModelQuery()
 * @method static Builder|RoleHasPermission newQuery()
 * @method static Builder|RoleHasPermission query()
 * @method static Builder|RoleHasPermission whereId($value)
 * @method static Builder|RoleHasPermission wherePermissionId($value)
 * @method static Builder|RoleHasPermission whereRoleId($value)
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereRoleId($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|RoleHasPermission whereCreatedAt($value)
 * @method static Builder|RoleHasPermission whereCreatedBy($value)
 * @method static Builder|RoleHasPermission whereUpdatedAt($value)
 * @method static Builder|RoleHasPermission whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereUpdatedBy($value)
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperRoleHasPermission
 * @mixin \Eloquent
 */
class RoleHasPermission extends BasePivot
{
    /**
     * @var list<string>
     *
     * @psalm-var list{'permission_id', 'role_id'}
     */
    protected $fillable = ['permission_id', 'role_id'];
}
