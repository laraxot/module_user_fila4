<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Laravel\Socialite\Two\InvalidStateException;

class InvalidState
{
    use Dispatchable;
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public InvalidStateException $exception,
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
