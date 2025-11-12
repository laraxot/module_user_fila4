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
    public function view(UserContract $_user, Post $_post): bool
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function view(UserContract $_user, Post $_post): bool
=======
    public function view(UserContract $user, Post $post): bool
>>>>>>> a12f125f4a (.)
=======
    public function view(UserContract $_user, Post $_post): bool
>>>>>>> b93ef594b4 (.)
=======
    public function view(UserContract $user, Post $post): bool
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
<<<<<<< HEAD
    public function create(UserContract $_user): bool
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function create(UserContract $_user): bool
=======
    public function create(UserContract $user): bool
>>>>>>> a12f125f4a (.)
=======
    public function create(UserContract $_user): bool
>>>>>>> b93ef594b4 (.)
=======
    public function create(UserContract $user): bool
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $_user, Post $_post): bool
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $_user, Post $_post): bool
=======
    public function update(UserContract $user, Post $post): bool
>>>>>>> a12f125f4a (.)
=======
    public function update(UserContract $_user, Post $_post): bool
>>>>>>> b93ef594b4 (.)
=======
    public function update(UserContract $user, Post $post): bool
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $_user, Post $_post): bool
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $_user, Post $_post): bool
=======
    public function delete(UserContract $user, Post $post): bool
>>>>>>> a12f125f4a (.)
=======
    public function delete(UserContract $_user, Post $_post): bool
>>>>>>> b93ef594b4 (.)
=======
    public function delete(UserContract $user, Post $post): bool
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        // return $user->ownsTeam($team);
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function superadmin(UserContract $_user, Post $_post): bool
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function superadmin(UserContract $_user, Post $_post): bool
=======
    public function superadmin(UserContract $user, Post $post): bool
>>>>>>> a12f125f4a (.)
=======
    public function superadmin(UserContract $_user, Post $_post): bool
>>>>>>> b93ef594b4 (.)
=======
    public function superadmin(UserContract $user, Post $post): bool
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        // return $user->ownsTeam($team);
        return false;
    }
}
