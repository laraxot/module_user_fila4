<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Modules\Xot\Contracts\ProfileContract;
use Modules\User\Database\Factories\PermissionUserFactory;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static PermissionUserFactory factory($count = null, $state = [])
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 * @mixin IdeHelperPermissionUser
 * @mixin \Eloquent
 */
<<<<<<< HEAD
class PermissionUser extends ModelHasPermission
{
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
class PermissionUser extends ModelHasPermission
{
}
=======
class PermissionUser extends ModelHasPermission {}
>>>>>>> a12f125f4a (.)
=======
class PermissionUser extends ModelHasPermission
{
}
>>>>>>> b93ef594b4 (.)
=======
/**
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @method static \Modules\User\Database\Factories\PermissionUserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser query()
 * @mixin IdeHelperPermissionUser
 * @mixin \Eloquent
 */
class PermissionUser extends ModelHasPermission {}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
