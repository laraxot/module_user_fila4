<?php

declare(strict_types=1);

/**
 * ----------------------------------------------------------------.
 * EX XotBasePolicy.
 */

namespace Modules\User\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

// use Modules\Xot\Datas\XotData;

abstract class UserBasePolicy
{
    use HandlesAuthorization;

<<<<<<< HEAD
    public function before(UserContract $user, string $_ability): null|bool
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function before(UserContract $user, string $_ability): null|bool
=======
    public function before(UserContract $user, string $ability): ?bool
>>>>>>> a12f125f4a (.)
=======
    public function before(UserContract $user, string $_ability): null|bool
>>>>>>> b93ef594b4 (.)
=======
    public function before(UserContract $user, string $ability): ?bool
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $xotData = XotData::make();
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return null;
    }
}
