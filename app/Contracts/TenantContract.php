<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Modules\Xot\Contracts\ProfileContract;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Xot\Contracts\UserContract;

/**
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Collection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
=======
=======
 * @property \Illuminate\Database\Eloquent\Collection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 *
 * @phpstan-require-extends Model
 */
interface TenantContract extends ModelContract
{
    // belongstomany or hasmany ?
    // public function users(): HasMany;
}
