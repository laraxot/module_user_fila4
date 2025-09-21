<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Modules\User\Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
<<<<<<< HEAD
use Modules\Media\Models\Media;
=======
=======
use Modules\User\Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
>>>>>>> a12f125f4a (.)
=======
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Modules\User\Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> b93ef594b4 (.)
use Modules\Media\Models\Media;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;

/**
 * Modules\User\Models\Tenant.
 *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static TenantFactory factory($count = null, $state = [])
 * @method static Builder|Tenant newModelQuery()
 * @method static Builder|Tenant newQuery()
 * @method static Builder|Tenant query()
 * @property EloquentCollection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property MediaCollection<int, Media> $media
<<<<<<< HEAD
=======
=======
 * @method static \Modules\User\Database\Factories\TenantFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant query()
 * @property EloquentCollection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @property \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Modules\Media\Models\Media> $media
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property int|null $media_count
 * @property TenantUser $pivot
 * @property EloquentCollection<int, User> $users
 * @property int|null $users_count
 * @mixin IdeHelperTenant
 * @mixin \Eloquent
 */
<<<<<<< HEAD
class Tenant extends BaseTenant
{
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
class Tenant extends BaseTenant
{
}
=======
class Tenant extends BaseTenant {}
>>>>>>> a12f125f4a (.)
=======
class Tenant extends BaseTenant
{
}
>>>>>>> b93ef594b4 (.)
=======
class Tenant extends BaseTenant {}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
