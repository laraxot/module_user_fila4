<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\Pivot;
use Filament\Panel;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\Pivot;
use Filament\Panel;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Actions\Panel\ApplyTenancyToPanelAction;
use Modules\Xot\Datas\XotData;

/**
 * Trait HasTenants
 *
 * Provides tenant functionality for User models implementing multi-tenancy.
 *
<<<<<<< HEAD
=======
=======
use Modules\Xot\Datas\XotData;
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
>>>>>>> b93ef594b4 (.)
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Actions\Panel\ApplyTenancyToPanelAction;
use Modules\Xot\Datas\XotData;

/**
 * Trait HasTenants
 *
 * Provides tenant functionality for User models implementing multi-tenancy.
<<<<<<< HEAD
 * 
>>>>>>> a12f125f4a (.)
=======
 *
>>>>>>> b93ef594b4 (.)
=======
use Filament\Panel;
use Modules\Xot\Datas\XotData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Actions\Panel\ApplyTenancyToPanelAction;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Trait HasTenants
 * 
 * Provides tenant functionality for User models implementing multi-tenancy.
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property TeamContract $currentTeam
 */
trait HasTenants
{
    /**
     * Check if the user can access a specific tenant.
     *
<<<<<<< HEAD
     * @param Model $tenant
=======
<<<<<<< HEAD
     * @param Model $tenant
=======
     * @param \Illuminate\Database\Eloquent\Model $tenant
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @return bool
     */
    public function canAccessTenant(Model $tenant): bool
    {
        return $this->tenants()->whereKey($tenant)->exists();
    }

    /**
     * Get tenants for the given panel.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @param Panel $_panel
     * @return array<Model>|Collection<int, Model>
     */
    public function getTenants(Panel $_panel): array|Collection
    {
        /** @var Collection<int, Model> $tenants */
        $tenants = $this->tenants;

<<<<<<< HEAD
=======
=======
     * @param Panel $panel
=======
     * @param Panel $_panel
>>>>>>> b93ef594b4 (.)
     * @return array<Model>|Collection<int, Model>
     */
    public function getTenants(Panel $_panel): array|Collection
    {
        /** @var Collection<int, Model> $tenants */
        $tenants = $this->tenants;
<<<<<<< HEAD
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
     * @param \Filament\Panel $panel
     * @return array<\Illuminate\Database\Eloquent\Model>|\Illuminate\Support\Collection<int, \Illuminate\Database\Eloquent\Model>
     */
    public function getTenants(Panel $panel): array|Collection
    {
        /** @var \Illuminate\Support\Collection<int, \Illuminate\Database\Eloquent\Model> $tenants */
        $tenants = $this->tenants;
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        return $tenants;
    }

    /**
     * Get all of the tenants the user belongs to.
     *
<<<<<<< HEAD
     * @return BelongsToMany<Model, Pivot>
=======
<<<<<<< HEAD
     * @return BelongsToMany<Model, Pivot>
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Illuminate\Database\Eloquent\Model, \Illuminate\Database\Eloquent\Relations\Pivot>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function tenants(): BelongsToMany
    {
        $xot = XotData::make();
<<<<<<< HEAD
        /** @var class-string<Model> */
=======
<<<<<<< HEAD
        /** @var class-string<Model> */
=======
        /** @var class-string<\Illuminate\Database\Eloquent\Model> */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $tenant_class = $xot->getTenantClass();

        return $this->belongsToManyX($tenant_class);
    }
}
