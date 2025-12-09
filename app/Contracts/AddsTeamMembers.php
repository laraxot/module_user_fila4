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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    public function add(
        UserContract $userContract,
        TeamContract $teamContract,
        string $email,
        ?string $role = null,
    ): void;
<<<<<<< HEAD
=======
    public function add(UserContract $userContract, TeamContract $teamContract, string $email, ?string $role = null): void;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
}
