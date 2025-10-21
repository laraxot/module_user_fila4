<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Modules\User\Models\Role;
use Modules\User\Models\Device;
use Illuminate\Support\Collection;
use Spatie\Permission\Traits\HasRoles as SpatieHasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasDevices
{
    public function devices(): BelongsToMany
    {
        return $this->belongsToManyX(Device::class);
    }
}