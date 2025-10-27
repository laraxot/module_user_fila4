<?php

declare(strict_types=1);

namespace Modules\User\Models\Scopes;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Modules\User\Models\Tenant;

/**
 * Scope che limita le query ai record associati al tenant corrente.
 */
class TenantScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
<<<<<<< HEAD
    public function apply(Builder $builder, Model $_model): void
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function apply(Builder $builder, Model $_model): void
=======
    public function apply(Builder $builder, Model $model): void
>>>>>>> a12f125f4a (.)
=======
    public function apply(Builder $builder, Model $_model): void
>>>>>>> b93ef594b4 (.)
=======
    public function apply(Builder $builder, Model $model): void
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $tenant_id = Filament::getTenant()?->getKey();
        if ($tenant_id !== null) {
            $builder->where('tenant_id', '=', $tenant_id);
        }
    }
}
