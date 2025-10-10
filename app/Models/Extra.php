<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Modules\User\Database\Factories\ExtraFactory;
use Modules\Xot\Models\Extra as XotBaseExtra;

/**
 * @property SchemalessAttributes $extra_attributes
 * @method static Builder|Extra newModelQuery()
 * @method static Builder|Extra newQuery()
 * @method static Builder|Extra query()
 * @method static Builder|Extra withExtraAttributes()
 * @property int $id
 * @property string $model_type
 * @property string $model_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|Extra whereCreatedAt($value)
 * @method static Builder|Extra whereCreatedBy($value)
 * @method static Builder|Extra whereDeletedAt($value)
 * @method static Builder|Extra whereDeletedBy($value)
 * @method static Builder|Extra whereExtraAttributes($value)
 * @method static Builder|Extra whereId($value)
 * @method static Builder|Extra whereModelId($value)
 * @method static Builder|Extra whereModelType($value)
 * @method static Builder|Extra whereUpdatedAt($value)
 * @method static Builder|Extra whereUpdatedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @method static ExtraFactory factory($count = null, $state = [])
<<<<<<< HEAD
=======
=======
use Modules\Xot\Models\Extra as XotBaseExtra;

/**
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $extra_attributes
 * @method static \Illuminate\Database\Eloquent\Builder|Extra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Extra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Extra query()
 * @method static \Illuminate\Database\Eloquent\Builder|Extra withExtraAttributes()
 * @property int $id
 * @property string $model_type
 * @property string $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereExtraAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extra whereUpdatedBy($value)
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @method static \Modules\User\Database\Factories\ExtraFactory factory($count = null, $state = [])
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperExtra
 * @mixin \Eloquent
 */
class Extra extends XotBaseExtra
{
    /** @var string */
    protected $connection = 'user';
}
