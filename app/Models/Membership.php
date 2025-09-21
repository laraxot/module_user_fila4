<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * Modules\User\Models\Membership.
 *
 * @property string $role
<<<<<<< HEAD
 * @method static Builder|Membership newModelQuery()
 * @method static Builder|Membership newQuery()
 * @method static Builder|Membership query()
=======
<<<<<<< HEAD
 * @method static Builder|Membership newModelQuery()
 * @method static Builder|Membership newQuery()
 * @method static Builder|Membership query()
=======
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership query()
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property int $id
 * @property string $uuid
 * @property string|null $team_id
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $customer_id
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|Membership whereCreatedAt($value)
 * @method static Builder|Membership whereCreatedBy($value)
 * @method static Builder|Membership whereCustomerId($value)
 * @method static Builder|Membership whereId($value)
 * @method static Builder|Membership whereRole($value)
 * @method static Builder|Membership whereTeamId($value)
 * @method static Builder|Membership whereUpdatedAt($value)
 * @method static Builder|Membership whereUpdatedBy($value)
 * @method static Builder|Membership whereUserId($value)
 * @method static Builder|Membership whereUuid($value)
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|Membership whereDeletedAt($value)
 * @method static Builder|Membership whereDeletedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUuid($value)
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereDeletedBy($value)
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperMembership
 * @mixin \Eloquent
 */
class Membership extends BasePivot
{
    use HasFactory;
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    /** @var bool */
    public $incrementing = true;

    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'team_user';
}
