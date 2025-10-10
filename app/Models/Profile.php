<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Spatie\SchemalessAttributes\SchemalessAttributes;
=======
<<<<<<< HEAD
use Spatie\SchemalessAttributes\SchemalessAttributes;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Collection;
use Modules\Media\Models\Media;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
<<<<<<< HEAD
=======
=======
use Illuminate\Database\Eloquent\Collection;
use Modules\Media\Models\Media;
=======
>>>>>>> b93ef594b4 (.)
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Collection;
use Modules\Media\Models\Media;
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\User\Contracts\UserContract;
use Modules\User\Database\Factories\ProfileFactory;
use Modules\User\Models\Pivots\DeviceProfile;
use Modules\User\Models\Pivots\ProfileTeam;
use Modules\Xot\Contracts\ProfileContract;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\Permission\Traits\HasRoles;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait as HasSchemalessAttributes;
<<<<<<< HEAD
=======
=======
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
=======
>>>>>>> b93ef594b4 (.)
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\Permission\Traits\HasRoles;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait as HasSchemalessAttributes;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

/**
 * User Profile Model
 *
<<<<<<< HEAD
=======
=======
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait as HasSchemalessAttributes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * User Profile Model
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * Represents a user profile with relationships to devices, teams, and roles.
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $user_name
 * @property string $email
 * @property string|null $phone
 * @property string|null $bio
 * @property string|null $avatar
 * @property string|null $timezone
 * @property string|null $locale
 * @property array $preferences
 * @property string $status
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property SchemalessAttributes $extra
 * @property-read string $avatar
 * @property-read ProfileContract|null $creator
 * @property-read Collection<int, DeviceUser> $deviceUsers
 * @property-read int|null $device_users_count
 * @property-read \Modules\User\Models\ProfileTeam|\Modules\User\Models\DeviceProfile|null $pivot
 * @property-read Collection<int, Device> $devices
<<<<<<< HEAD
=======
=======
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $extra
 * @property-read string $avatar
 * @property-read ProfileContract|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\DeviceUser> $deviceUsers
 * @property-read int|null $device_users_count
 * @property-read \Modules\User\Models\ProfileTeam|\Modules\User\Models\DeviceProfile|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Device> $devices
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property-read int|null $devices_count
 * @property-read string|null $first_name
 * @property-read string|null $full_name
 * @property-read string|null $last_name
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, DeviceUser> $mobileDeviceUsers
 * @property-read int|null $mobile_device_users_count
 * @property-read Collection<int, Device> $mobileDevices
 * @property-read int|null $mobile_devices_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, Team> $teams
<<<<<<< HEAD
=======
=======
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Modules\Media\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\DeviceUser> $mobileDeviceUsers
 * @property-read int|null $mobile_device_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Device> $mobileDevices
 * @property-read int|null $mobile_devices_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\Team> $teams
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property-read int|null $teams_count
 * @property-read ProfileContract|null $updater
 * @property-read UserContract|null $user
 * @property-read string|null $user_name
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static ProfileFactory factory($count = null, $state = [])
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, $guard = null, $without = false)
 * @method static Builder<static>|Profile withExtraAttributes()
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, $guard = null)
<<<<<<< HEAD
=======
=======
 * @method static \Modules\User\Database\Factories\ProfileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile withExtraAttributes()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile withoutRole($roles, $guard = null)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperProfile
 * @mixin \Eloquent
 */
class Profile extends BaseProfile implements HasMedia
{
    use HasRoles;
    use InteractsWithMedia;
    use HasSchemalessAttributes;

    /**
     * The schemaless attributes.
     *
     * @var list<string>
     */
    protected $formlessAttributes = [
        'extra',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';
}
