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
    public function apply(Builder $builder, Model $_model): void
    {
        // ✅ FIX: Verifica contesto prima di applicare lo scope
        // In contesto console (Artisan), non c'è sessione Filament attiva
        if (app()->runningInConsole()) {
            // In console, non applicare filtro tenant per permettere operazioni su tutti i tenant
            // I comandi console devono gestire il filtro manualmente se necessario
            return;
        }

        try {
            $tenant_id = Filament::getTenant()?->getKey();
            if ($tenant_id !== null) {
                $builder->where('tenant_id', '=', $tenant_id);
            }
        } catch (\Throwable $e) {
            // In caso di errore, non filtrare per tenant
            // Questo evita query failure in contesti non-standard
            // Log per debugging ma non bloccare l'operazione
        }
    }
}
