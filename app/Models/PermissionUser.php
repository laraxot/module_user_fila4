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
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static PermissionUserFactory factory($count = null, $state = [])
=======
 * @method static PermissionUserFactory          factory($count = null, $state = [])
>>>>>>> 220cf97b (.)
=======
 * @method static PermissionUserFactory          factory($count = null, $state = [])
>>>>>>> laraxot/develop
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 *
 * @mixin IdeHelperPermissionUser
<<<<<<< HEAD
<<<<<<< HEAD
=======
 *
 * @property ProfileContract|null $deleter
 *
>>>>>>> 220cf97b (.)
=======
 *
 * @property ProfileContract|null $deleter
 *
>>>>>>> laraxot/develop
 * @mixin \Eloquent
 */
class PermissionUser extends ModelHasPermission
{
}
