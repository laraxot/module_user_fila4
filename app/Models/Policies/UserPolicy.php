<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Contracts\UserContract as Post;

class UserPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function view(UserContract $_user, Post $_post): bool
=======
    public function view(UserContract $user, Post $post): bool
>>>>>>> fbc8f8e (.)
=======
    public function view(UserContract $_user, Post $_post): bool
>>>>>>> 6d20fbe (.)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function create(UserContract $_user): bool
=======
    public function create(UserContract $user): bool
>>>>>>> fbc8f8e (.)
=======
    public function create(UserContract $_user): bool
>>>>>>> 6d20fbe (.)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $_user, Post $_post): bool
=======
    public function update(UserContract $user, Post $post): bool
>>>>>>> fbc8f8e (.)
=======
    public function update(UserContract $_user, Post $_post): bool
>>>>>>> 6d20fbe (.)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $_user, Post $_post): bool
=======
    public function delete(UserContract $user, Post $post): bool
>>>>>>> fbc8f8e (.)
=======
    public function delete(UserContract $_user, Post $_post): bool
>>>>>>> 6d20fbe (.)
    {
        // return $user->ownsTeam($team);
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function superadmin(UserContract $_user, Post $_post): bool
=======
    public function superadmin(UserContract $user, Post $post): bool
>>>>>>> fbc8f8e (.)
=======
    public function superadmin(UserContract $_user, Post $_post): bool
>>>>>>> 6d20fbe (.)
    {
        // return $user->ownsTeam($team);
        return false;
    }
}
