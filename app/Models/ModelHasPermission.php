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
use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\ModelHasPermissionFactory;

/**
 * Modules\User\Models\ModelHasPermission.
 *
 * @property int $id
 * @property int $permission_id
 * @property string $model_type
 * @property string $model_id
 * @method static ModelHasPermissionFactory factory($count = null, $state = [])
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|ModelHasPermission newModelQuery()
 * @method static Builder|ModelHasPermission newQuery()
 * @method static Builder|ModelHasPermission query()
 * @method static Builder|ModelHasPermission whereId($value)
 * @method static Builder|ModelHasPermission whereModelId($value)
 * @method static Builder|ModelHasPermission whereModelType($value)
 * @method static Builder|ModelHasPermission wherePermissionId($value)
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission wherePermissionId($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|ModelHasPermission whereCreatedAt($value)
 * @method static Builder|ModelHasPermission whereCreatedBy($value)
 * @method static Builder|ModelHasPermission whereUpdatedAt($value)
 * @method static Builder|ModelHasPermission whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string|null $team_id
 * @method static Builder|ModelHasPermission whereTeamId($value)
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereUpdatedBy($value)
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @property string|null $team_id
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereTeamId($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperModelHasPermission
 * @mixin \Eloquent
 */
class ModelHasPermission extends BaseMorphPivot
{
    /**
     * @var list<string>
     *
     * @psalm-var list{'permission_id', 'model_type', 'model_id'}
     */
    protected $fillable = ['permission_id', 'model_type', 'model_id'];
}
