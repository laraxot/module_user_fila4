<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Modules\User\Contracts\TeamInvitationContract.
 *
 * @property int          $id
 * @property int          $team_id
 * @property string       $email
 * @property string|null  $role
 * @property Carbon|null  $created_at
 * @property Carbon|null  $updated_at
 * @property TeamContract $team
 *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static Builder|TeamInvitationContract newModelQuery()
 * @method static Builder|TeamInvitationContract newQuery()
 * @method static Builder|TeamInvitationContract query()
 * @method static Builder|TeamInvitationContract whereCreatedAt($value)
 * @method static Builder|TeamInvitationContract whereEmail($value)
 * @method static Builder|TeamInvitationContract whereId($value)
 * @method static Builder|TeamInvitationContract whereRole($value)
 * @method static Builder|TeamInvitationContract whereTeamId($value)
 * @method static Builder|TeamInvitationContract whereUpdatedAt($value)
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitationContract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitationContract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitationContract query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitationContract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitationContract whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitationContract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitationContract whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitationContract whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitationContract whereUpdatedAt($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface TeamInvitationContract
{
    public function delete(): void;
}
