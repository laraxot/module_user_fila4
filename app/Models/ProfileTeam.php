<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\ProfileTeamFactory;
use Modules\Xot\Contracts\ProfileContract;

/**
 * <<<<<<< HEAD
 * <<<<<<< HEAD
 * ProfileTeam Model
 * =======
 * ProfileTeam Model.
 * >>>>>>> 220cf97b (.)
 * =======
 * ProfileTeam Model.
 * >>>>>>> laraxot/develop.
 *
 * Represents the relationship between a profile and a team, including the user's role.
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *                                            <<<<<<< HEAD
 *                                            <<<<<<< HEAD
 * @property string               $id
 * @property int                  $team_id
 * @property string|null          $user_id
 * @property string|null          $role
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 *                                            =======
 *                                            =======
 *                                            >>>>>>> laraxot/develop
 * @property string               $id
 * @property int                  $team_id
 * @property string|null          $user_id
 * @property string|null          $role
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 *                                            <<<<<<< HEAD
 *                                            >>>>>>> 220cf97b (.)
 *                                            =======
 *                                            >>>>>>> laraxot/develop
 *
 * @method static Builder<static>|ProfileTeam newModelQuery()
 * @method static Builder<static>|ProfileTeam newQuery()
 * @method static Builder<static>|ProfileTeam query()
 * @method static Builder<static>|ProfileTeam whereCreatedAt($value)
 * @method static Builder<static>|ProfileTeam whereCreatedBy($value)
 * @method static Builder<static>|ProfileTeam whereDeletedAt($value)
 * @method static Builder<static>|ProfileTeam whereDeletedBy($value)
 * @method static Builder<static>|ProfileTeam whereId($value)
 * @method static Builder<static>|ProfileTeam whereRole($value)
 * @method static Builder<static>|ProfileTeam whereTeamId($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedAt($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedBy($value)
 * @method static Builder<static>|ProfileTeam whereUserId($value)
 *
 * @mixin IdeHelperProfileTeam
 * <<<<<<< HEAD
 * =======
 * <<<<<<< HEAD
 * <<<<<<< HEAD
 * =======
 * =======
 * >>>>>>> laraxot/develop
 * >>>>>>> dd73b41a (.)
 *
 * @property ProfileContract|null $deleter
 * @property Team|null            $team
 * @property User|null            $user
 *
 * <<<<<<< HEAD
 *
 * @method static ProfileTeamFactory                                  factory($count = null, $state = [])
 *                                                                                                        =======
 * @method static \Modules\User\Database\Factories\ProfileTeamFactory factory($count = null, $state = [])
 *
 * <<<<<<< HEAD
 * >>>>>>> 220cf97b (.)
 * =======
 * >>>>>>> laraxot/develop
 * >>>>>>> dd73b41a (.)
 *
 * @mixin \Eloquent
 */
class ProfileTeam extends TeamUser
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profile_team';
}
