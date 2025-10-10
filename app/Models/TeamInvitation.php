<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Model;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\User\Contracts\TeamContract;
use Modules\User\Database\Factories\TeamInvitationFactory;
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\TeamInvitation.
 *
 * @property int $id
 * @property string|null $team_id
 * @property string $email
 * @property string|null $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Team|null $team
 * @property TeamContract|null $team
 * @method static TeamInvitationFactory factory($count = null, $state = [])
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|TeamInvitation newModelQuery()
 * @method static Builder|TeamInvitation newQuery()
 * @method static Builder|TeamInvitation query()
 * @method static Builder|TeamInvitation whereCreatedAt($value)
 * @method static Builder|TeamInvitation whereEmail($value)
 * @method static Builder|TeamInvitation whereId($value)
 * @method static Builder|TeamInvitation whereRole($value)
 * @method static Builder|TeamInvitation whereTeamId($value)
 * @method static Builder|TeamInvitation whereUpdatedAt($value)
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereUpdatedAt($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property string $uuid
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|TeamInvitation whereCreatedBy($value)
 * @method static Builder|TeamInvitation whereDeletedAt($value)
 * @method static Builder|TeamInvitation whereDeletedBy($value)
 * @method static Builder|TeamInvitation whereUpdatedBy($value)
 * @method static Builder|TeamInvitation whereUuid($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereUuid($value)
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @mixin IdeHelperTeamInvitation
 * @mixin \Eloquent
 */
class TeamInvitation extends BaseModel
{
    /** @var string */
    protected $connection = 'user';

    /** @var list<string> */
    protected $fillable = [
        'email',
        'role',
    ];

    /**
     * Get the team that the invitation belongs to.
     *  BelongsTo<the related model, the current model>
     * -return BelongsTo<TeamContract, TeamInvitation> No TeamContract ..
     */
    public function team(): BelongsTo
    {
        $xotData = XotData::make();
<<<<<<< HEAD
        /** @var class-string<Model> */
=======
<<<<<<< HEAD
        /** @var class-string<Model> */
=======
        /** @var class-string<\Illuminate\Database\Eloquent\Model> */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $team_class = $xotData->getTeamClass();

        return $this->belongsTo($team_class);
    }
}
