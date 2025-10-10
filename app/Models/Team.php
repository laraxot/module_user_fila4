<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Builder;

<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
/**
 * Class Modules\User\Models\Team.
 *
 * @property string $id
 * @property string $user_id (DC2Type:guid)
 * @property string $name
 * @property int $personal_team
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property ProfileContract|null $creator
 * @property TeamUser $pivot
 * @property Collection<int, User> $members
 * @property int|null $members_count
 * @property User|null $owner
 * @property Collection<int, TeamInvitation> $teamInvitations
 * @property int|null $team_invitations_count
 * @property ProfileContract|null $updater
 * @property Collection<int, User> $users
 * @property int|null $users_count
 * @method static TeamFactory factory($count = null, $state = [])
 * @method static Builder|Team newModelQuery()
 * @method static Builder|Team newQuery()
 * @method static Builder|Team query()
 * @method static Builder|Team whereCreatedAt($value)
 * @method static Builder|Team whereCreatedBy($value)
 * @method static Builder|Team whereDeletedAt($value)
 * @method static Builder|Team whereDeletedBy($value)
 * @method static Builder|Team whereId($value)
 * @method static Builder|Team whereName($value)
 * @method static Builder|Team wherePersonalTeam($value)
 * @method static Builder|Team whereUpdatedAt($value)
 * @method static Builder|Team whereUpdatedBy($value)
 * @method static Builder|Team whereUserId($value)
 * @property string|null $code
 * @method static Builder|Team whereCode($value)
 * @property string|null $uuid
 * @method static Builder<static>|Team whereUuid($value)
 * @property string|null $owner_id
 * @method static Builder<static>|Team whereOwnerId($value)
 * @mixin IdeHelperTeam
 * @mixin \Eloquent
 */
<<<<<<< HEAD
class Team extends BaseTeam
{
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
class Team extends BaseTeam
{
}
=======
class Team extends BaseTeam {}
>>>>>>> a12f125f4a (.)
=======
class Team extends BaseTeam
{
}
>>>>>>> b93ef594b4 (.)
=======
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property TeamUser $pivot
 * @property \Illuminate\Database\Eloquent\Collection<int, User> $members
 * @property int|null $members_count
 * @property User|null $owner
 * @property \Illuminate\Database\Eloquent\Collection<int, TeamInvitation> $teamInvitations
 * @property int|null $team_invitations_count
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @property \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property int|null $users_count
 * @method static \Modules\User\Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePersonalTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUserId($value)
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCode($value)
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team whereUuid($value)
 * @property string|null $owner_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team whereOwnerId($value)
 * @mixin IdeHelperTeam
 * @mixin \Eloquent
 */
class Team extends BaseTeam {}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
