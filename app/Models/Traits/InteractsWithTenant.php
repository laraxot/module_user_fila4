<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
use Throwable;
=======
<<<<<<< HEAD
use Throwable;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Scopes\TenantScope;
use Modules\User\Models\Tenant;
use Modules\Xot\Datas\XotData;

/**
 * @property TeamContract $currentTeam
 */
trait InteractsWithTenant
{
    /**
     * Tenant corrente.
     *
     * @var Model|null
     */
<<<<<<< HEAD
    protected null|Model $currentTenant = null;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected null|Model $currentTenant = null;
=======
    protected ?Model $currentTenant = null;
>>>>>>> a12f125f4a (.)
=======
    protected null|Model $currentTenant = null;
>>>>>>> b93ef594b4 (.)
=======
    protected ?Model $currentTenant = null;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Relazione con il tenant a cui appartiene il modello.
     *
<<<<<<< HEAD
     * @return BelongsTo<Model, self>
     * @phpstan-return BelongsTo<Model, $this>
=======
<<<<<<< HEAD
     * @return BelongsTo<Model, self>
     * @phpstan-return BelongsTo<Model, $this>
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Illuminate\Database\Eloquent\Model, self>
     * @phpstan-return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Illuminate\Database\Eloquent\Model, $this>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function tenant(): BelongsTo
    {
        $tenant = $this->getTenant();
        if ($tenant === null) {
            $this->loadTenantFromSession();
            $tenant = $this->getTenant();
        }

        $tenantClass = config('tenant.tenant_model', Tenant::class);

        // @phpstan-ignore argument.type, argument.templateType
        return $this->belongsTo($tenantClass, 'tenant_id');
    }

    /**
     * Ottiene il tenant corrente.
     *
     * @return Model|null
     */
<<<<<<< HEAD
    protected function getTenant(): null|Model
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected function getTenant(): null|Model
=======
    protected function getTenant(): ?Model
>>>>>>> a12f125f4a (.)
=======
    protected function getTenant(): null|Model
>>>>>>> b93ef594b4 (.)
=======
    protected function getTenant(): ?Model
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return $this->currentTenant;
    }

    /**
     * Carica il tenant dalla sessione.
     *
     * @return void
     */
    protected function loadTenantFromSession(): void
    {
        try {
            $this->currentTenant = Filament::getTenant();
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
        } catch (\Throwable $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Se Filament non è disponibile, lascia il tenant come null
            $this->currentTenant = null;
        }
    }

    /**
     * The "booted" method of the model.
     */
    protected static function bootInteractsWithTenant(): void
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        static::addGlobalScope(new TenantScope());

        static::creating(static function ($model): void {
            if ($model !== null) {
                $tenant = Filament::getTenant();
                if ($tenant !== null) {
                    $model->tenant_id = $tenant->getKey();
                }
            }
        });
<<<<<<< HEAD
=======
=======
        static::addGlobalScope(new TenantScope);
=======
        static::addGlobalScope(new TenantScope());
>>>>>>> b93ef594b4 (.)

        static::creating(static function ($model): void {
            if ($model !== null) {
                $tenant = Filament::getTenant();
                if ($tenant !== null) {
                    $model->tenant_id = $tenant->getKey();
                }
            }
<<<<<<< HEAD
        );
>>>>>>> a12f125f4a (.)
=======
        });
>>>>>>> b93ef594b4 (.)
=======
        static::addGlobalScope(new TenantScope);

        static::creating(
            static function ($model): void {
                if ($model !== null) {
                    $tenant = Filament::getTenant();
                    if ($tenant !== null) {
                        $model->tenant_id = $tenant->getKey();
                    }
                }
            }
        );
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Interact with the user's first name.
     */
<<<<<<< HEAD
    protected function setTenantIdAttribute(null|int $value): void
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected function setTenantIdAttribute(null|int $value): void
=======
    protected function setTenantIdAttribute(?int $value): void
>>>>>>> a12f125f4a (.)
=======
    protected function setTenantIdAttribute(null|int $value): void
>>>>>>> b93ef594b4 (.)
=======
    protected function setTenantIdAttribute(?int $value): void
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $tenant = Filament::getTenant();
        if ($value === null && $tenant !== null) {
            $tenantId = $tenant->getKey();
            if (is_int($tenantId)) {
                $value = $tenantId;
            }
        }

        if ($value !== null) {
            $this->attributes['tenant_id'] = $value;
        }
    }

    /**
     * Applica lo scope del tenant.
     */
    protected function applyTenantScope(): void
    {
        $tenant = $this->getTenant();
        if ($tenant === null) {
            $this->loadTenantFromSession();
            $tenant = $this->getTenant();
        }

        if ($tenant !== null) {
            $tenantId = $tenant->getKey();
            if ($tenantId !== null) {
                static::addGlobalScope(new TenantScope());
            }
        }
    }
}
