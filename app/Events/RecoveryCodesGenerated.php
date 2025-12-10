<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\Xot\Contracts\UserContract;

class RecoveryCodesGenerated
{
    use Dispatchable;

    /**
     * Create a new event instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(
        public UserContract $userContract,
    ) {}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(
        public UserContract $userContract,
    ) {}
=======
    public function __construct(public UserContract $userContract) {}
>>>>>>> a12f125f4a (.)
=======
    public function __construct(
        public UserContract $userContract,
    ) {}
>>>>>>> b93ef594b4 (.)
=======
    public function __construct(public UserContract $userContract) {}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
