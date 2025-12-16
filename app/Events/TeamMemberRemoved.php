<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Contracts\UserContract;

class TeamMemberRemoved
{
    use Dispatchable;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        /**
         * The team instance.
         */
        public TeamContract $teamContract,
        /**
         * The team member being added.
         */
        public UserContract $userContract,
<<<<<<< HEAD
    ) {
    }
=======
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/develop
=======
    ) {
    }
>>>>>>> a382d4f1 (.)
>>>>>>> e4cd89fa (.)
}
