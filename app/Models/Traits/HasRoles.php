<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Models\Role;
use Spatie\Permission\Traits\HasRoles as SpatieHasRoles;

trait HasRoles
{
    use SpatieHasRoles;

    /**
     * A user may have multiple roles.
     */
    public function roles(): BelongsToMany
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id')->where(
            'model_type',
            self::class,
        );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        return $this->belongsToMany(
            Role::class,
            'model_has_roles',
            'model_id',
            'role_id'
        )->where('model_type', self::class);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determine if the user has the given role.
     *
<<<<<<< HEAD
     * @param string|array|\Spatie\Permission\Contracts\Role|Collection $roles
     */
    public function hasRole($roles, null|string $guard = null): bool
    {
        if (is_string($roles) && str_contains($roles, '|')) {
=======
<<<<<<< HEAD
     * @param string|array|\Spatie\Permission\Contracts\Role|Collection $roles
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function hasRole($roles, null|string $guard = null): bool
    {
        if (is_string($roles) && str_contains($roles, '|')) {
=======
    public function hasRole($roles, ?string $guard = null): bool
    {
        if (is_string($roles) && false !== strpos($roles, '|')) {
>>>>>>> a12f125f4a (.)
=======
    public function hasRole($roles, null|string $guard = null): bool
    {
        if (is_string($roles) && str_contains($roles, '|')) {
>>>>>>> b93ef594b4 (.)
=======
     * @param string|array|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection $roles
     */
    public function hasRole($roles, ?string $guard = null): bool
    {
        if (is_string($roles) && false !== strpos($roles, '|')) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            $roles = explode('|', $roles);
        }

        if (is_string($roles)) {
            return $this->roles->contains('name', $roles);
        }

        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }

            return false;
        }

<<<<<<< HEAD
        return !is_null($roles) && $this->roles->contains('id', $roles->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return !is_null($roles) && $this->roles->contains('id', $roles->id);
=======
        return ! is_null($roles) && $this->roles->contains('id', $roles->id);
>>>>>>> a12f125f4a (.)
=======
        return !is_null($roles) && $this->roles->contains('id', $roles->id);
>>>>>>> b93ef594b4 (.)
=======
        return ! is_null($roles) && $this->roles->contains('id', $roles->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
