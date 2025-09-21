<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Database\Factories\DeviceFactory;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

/**
 * Device model representing a user's device in the system.
 *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property EloquentCollection<int, Model&UserContract> $users
 * @property int|null $users_count
 * @method static DeviceFactory factory($count = null, $state = [])
 * @method static Builder|Device newModelQuery()
 * @method static Builder|Device newQuery()
 * @method static Builder|Device query()
 * @method static Builder|Device whereBrowser($value)
 * @method static Builder|Device whereCreatedAt($value)
 * @method static Builder|Device whereCreatedBy($value)
 * @method static Builder|Device whereDevice($value)
 * @method static Builder|Device whereId($value)
 * @method static Builder|Device whereIsDesktop($value)
 * @method static Builder|Device whereIsMobile($value)
 * @method static Builder|Device whereIsPhone($value)
 * @method static Builder|Device whereIsRobot($value)
 * @method static Builder|Device whereIsTablet($value)
 * @method static Builder|Device whereLanguages($value)
 * @method static Builder|Device whereMobileId($value)
 * @method static Builder|Device wherePlatform($value)
 * @method static Builder|Device whereRobot($value)
 * @method static Builder|Device whereUpdatedAt($value)
 * @method static Builder|Device whereUpdatedBy($value)
 * @method static Builder|Device whereVersion($value)
 * @property DeviceUser $pivot
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
=======
=======
 * @property EloquentCollection<int, \Illuminate\Database\Eloquent\Model&UserContract> $users
 * @property int|null $users_count
 * @method static DeviceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Device newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Device newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Device query()
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereBrowser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereIsDesktop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereIsMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereIsPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereIsRobot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereIsTablet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereMobileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereRobot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Device whereVersion($value)
 * @property DeviceUser $pivot
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property string $id
 * @property string|null $mobile_id
 * @property array|null $languages
 * @property string|null $device
 * @property string|null $platform
 * @property string|null $browser
 * @property string|null $version
 * @property bool|null $is_robot
 * @property string|null $robot
 * @property bool|null $is_desktop
 * @property bool|null $is_mobile
 * @property bool|null $is_tablet
 * @property bool|null $is_phone
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $uuid
 * @method static Builder<static>|Device whereUuid($value)
<<<<<<< HEAD
=======
=======
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereUuid($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperDevice
 * @mixin \Eloquent
 */
class Device extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'uuid',
        'mobile_id',
        'languages',
        'device',
        'platform',
        'browser',
        'version',
        'is_robot',
        'robot',
        'is_desktop',
        'is_mobile',
        'is_tablet',
        'is_phone',
    ];

    /**
     * Define the many-to-many relationship between devices and users.
     *
     * return BelongsToMany<UserContract, Device>
     */
    public function users(): BelongsToMany
    {
        $userClass = XotData::make()->getUserClass();

        return $this->belongsToManyX($userClass);
    }

    /**
     * Define the attribute casting for the model.
     *
     * @return array<string, string>
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'languages' => 'array',
            'is_robot' => 'boolean',
            'is_desktop' => 'boolean',
            'is_mobile' => 'boolean',
            'is_tablet' => 'boolean',
            'is_phone' => 'boolean',
        ];
    }
}
