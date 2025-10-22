<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;

/**
 * ---.
 *
 * @phpstan-require-extends Model
 */
interface AddsTeamMembers
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function add(
        UserContract $userContract,
        TeamContract $teamContract,
        string $email,
        ?string $role = null,
    ): void;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    public function add(UserContract $userContract, TeamContract $teamContract, string $email, ?string $role = null): void;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    public function add(UserContract $userContract, TeamContract $teamContract, string $email, ?string $role = null): void;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
