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

    public function before(UserContract $user, string $_ability): ?bool
    {
        $xotData = XotData::make();
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return null;
    }

<<<<<<< HEAD
    /**
=======

     /**
>>>>>>> a382d4f1 (.)
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return false;
    }
<<<<<<< HEAD
=======

>>>>>>> a382d4f1 (.)
}
