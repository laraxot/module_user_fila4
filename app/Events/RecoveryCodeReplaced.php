<?php

declare(strict_types=1);

namespace Modules\User\Events;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Queue\SerializesModels;

class RecoveryCodeReplaced
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public Authenticatable $user,
        public string $code,
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
