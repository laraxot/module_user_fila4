<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\User\Database\Factories\DeviceProfileFactory;
use Modules\Xot\Contracts\ProfileContract;

/**
 * <<<<<<< HEAD
 * <<<<<<< HEAD
 * DeviceProfile Model
 * =======
 * DeviceProfile Model.
 * >>>>>>> 220cf97b (.)
 * =======
 * DeviceProfile Model.
 * >>>>>>> laraxot/develop.
 *
 * Represents the relationship between a device and a user profile.
 * Extends the base DeviceUser model to add specific functionality.
 *
 * @property ProfileContract|null $creator
 * @property Device|null          $device
 * @property ProfileContract|null $profile
 * @property ProfileContract|null $updater
 *                                         <<<<<<< HEAD
 *                                         <<<<<<< HEAD
 * @property User|null            $user
 *                                         =======
 * @property User|null            $user
 *                                         >>>>>>> 220cf97b (.)
 *                                         =======
 * @property User|null            $user
 *                                         >>>>>>> laraxot/develop
 *
 * @method static Builder<static>|DeviceProfile newModelQuery()
 * @method static Builder<static>|DeviceProfile newQuery()
 * @method static Builder<static>|DeviceProfile query()
 *
 * @mixin IdeHelperDeviceProfile
<<<<<<< HEAD
 *
 * @property ProfileContract|null $deleter
 *
 * @method static DeviceProfileFactory factory($count = null, $state = [])
=======
 * <<<<<<< HEAD
 * <<<<<<< HEAD
 * =======
 * =======
 * >>>>>>> laraxot/develop
 *
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\DeviceProfileFactory factory($count = null, $state = [])
 *
 * <<<<<<< HEAD
 * >>>>>>> 220cf97b (.)
 * =======
 * >>>>>>> laraxot/develop
>>>>>>> dd73b41a (.)
 *
 * @mixin \Eloquent
 */
class DeviceProfile extends DeviceUser
{
    /**
     * Create a new model instance.
     *
     * @param array<string, mixed> $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
