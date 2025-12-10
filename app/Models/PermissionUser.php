<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\User\Database\Factories\PermissionUserFactory;
use Modules\Xot\Contracts\ProfileContract;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static PermissionUserFactory          factory($count = null, $state = [])
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 *
 * @mixin IdeHelperPermissionUser
 * @mixin \Eloquent
 */
<<<<<<< HEAD
<<<<<<< HEAD
class PermissionUser extends ModelHasPermission {}
=======
class PermissionUser extends ModelHasPermission
{
}
>>>>>>> laraxot/develop
=======
class PermissionUser extends ModelHasPermission
{
}
>>>>>>> a382d4f1 (.)
