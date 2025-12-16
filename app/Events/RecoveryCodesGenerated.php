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
<<<<<<< HEAD
    public function __construct(
        public UserContract $userContract,
    ) {}
=======
    public function __construct(public UserContract $userContract) {}
>>>>>>> fbc8f8e (.)
=======
    public function __construct(
        public UserContract $userContract,
    ) {}
>>>>>>> 6d20fbe (.)
}
