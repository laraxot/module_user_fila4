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
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function __construct(
        public Authenticatable $user,
        public string $code,
    ) {}
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    public function __construct(public Authenticatable $user, public string $code) {}
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    public function __construct(public Authenticatable $user, public string $code) {}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
