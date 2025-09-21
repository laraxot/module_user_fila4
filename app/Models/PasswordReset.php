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
use Modules\User\Database\Factories\PasswordResetFactory;

/**
 * Modules\User\Models\PasswordReset.
 *
 * @property int $id
 * @property string $email
 * @property string $token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $user_id
 * @property string|null $updated_by
 * @property string|null $created_by
 * @method static PasswordResetFactory factory($count = null, $state = [])
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|PasswordReset newModelQuery()
 * @method static Builder|PasswordReset newQuery()
 * @method static Builder|PasswordReset query()
 * @method static Builder|PasswordReset whereCreatedAt($value)
 * @method static Builder|PasswordReset whereCreatedBy($value)
 * @method static Builder|PasswordReset whereEmail($value)
 * @method static Builder|PasswordReset whereId($value)
 * @method static Builder|PasswordReset whereToken($value)
 * @method static Builder|PasswordReset whereUpdatedAt($value)
 * @method static Builder|PasswordReset whereUpdatedBy($value)
 * @method static Builder|PasswordReset whereUserId($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string|null $uuid
 * @method static Builder<static>|PasswordReset whereUuid($value)
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereUserId($value)
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PasswordReset whereUuid($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperPasswordReset
 * @mixin \Eloquent
 */
class PasswordReset extends BaseModel
{
    /**
     * @var list<string>
     *
     * @psalm-var list{'email', 'token', 'created_at', 'updated_at', 'created_by', 'updated_by'}
     */
    protected $fillable = ['email', 'token', 'created_at', 'updated_at', 'created_by', 'updated_by'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'password_resets';
<<<<<<< HEAD
}

// end class PasswordReset
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
}

// end class PasswordReset
=======
}// end class PasswordReset
>>>>>>> a12f125f4a (.)
=======
}

// end class PasswordReset
>>>>>>> b93ef594b4 (.)
=======
}// end class PasswordReset
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
