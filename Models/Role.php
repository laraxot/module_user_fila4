<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Modules\Xot\Models\Traits\HasXotFactory;
>>>>>>> a382d4f1 (.)
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
<<<<<<< HEAD
    use HasFactory;
=======
    use HasXotFactory;
>>>>>>> a382d4f1 (.)

    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
    ];

    public static function firstOrCreate(array $attributes, array $values = []): self
    {
        // @phpstan-ignore-next-line
        return parent::firstOrCreate($attributes, $values);
    }
}
