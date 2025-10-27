<?php

declare(strict_types=1);

namespace Modules\User\Datas;

<<<<<<< HEAD
use DateInterval;
=======
<<<<<<< HEAD
use DateInterval;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class PermissionCacheData extends Data
{
<<<<<<< HEAD
    public DateInterval $expiration_time;
=======
<<<<<<< HEAD
    public DateInterval $expiration_time;
=======
    public \DateInterval $expiration_time;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    // => \DateInterval::createFromDateString('24 hours'),
    public string $key;

    // => 'spatie.permission.cache',
    public string $store; // => 'default',
}
