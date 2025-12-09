<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\User\Models\User;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertDatabaseCount;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Modules\User\Models\User;
use Modules\User\Models\Team;
use Modules\User\Models\Role;
use Modules\User\Contracts\TeamContract;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->team = Team::factory()->create();
    $this->personalTeam = Team::factory()->create([
        'user_id' => $this->user->id,
        'personal_team' => true,
    ]);
});

test('it correctly checks if user belongs to teams', function () {
    // Test: User without teams
    $userWithoutTeams = User::factory()->create();
    expect($userWithoutTeams->belongsToTeams())->toBeFalse();

    // Test: User with owned team
    expect($this->user->belongsToTeams())->toBeTrue();

    // Test: User with team membership
    $memberUser = User::factory()->create();
    $memberUser->teams()->attach($this->team->id, ['role' => 'member']);
    expect($memberUser->belongsToTeams())->toBeTrue();
});

test('it correctly checks if user belongs to specific team', function () {
    // Test: Null team
    expect($this->user->belongsToTeam(null))->toBeFalse();

    // Test: Owned team
    expect($this->user->belongsToTeam($this->personalTeam))->toBeTrue();

    // Test: Member team
    $this->user->teams()->attach($this->team->id, ['role' => 'member']);
    expect($this->user->belongsToTeam($this->team))->toBeTrue();

    // Test: Non-member team
    $otherTeam = Team::factory()->create();
    expect($this->user->belongsToTeam($otherTeam))->toBeFalse();
});

test('it correctly checks team ownership', function () {
    // Test: Owned team
    expect($this->user->ownsTeam($this->personalTeam))->toBeTrue();

    // Test: Non-owned team
    expect($this->user->ownsTeam($this->team))->toBeFalse();

    // Test: Member team (not owner)
    $this->user->teams()->attach($this->team->id, ['role' => 'member']);
    expect($this->user->ownsTeam($this->team))->toBeFalse();
});

test('it uses belongs to many x for teams relationship', function () {
    // Verify teams() relationship returns BelongsToMany
    $relation = $this->user->teams();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    expect($relation)
        ->toBeInstanceOf(BelongsToMany::class)
        ->getTable()
        ->toBe('team_user');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    expect($relation)->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsToMany::class)
        ->getTable()->toBe('team_user');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    expect($relation)->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsToMany::class)
        ->getTable()->toBe('team_user');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('it correctly manages current team', function () {
    // Test: Switch to valid team
    $this->user->teams()->attach($this->team->id, ['role' => 'member']);
    $result = $this->user->switchTeam($this->team);
<<<<<<< HEAD

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    expect($result)->toBeTrue()->and($this->user->current_team_id)->toBe($this->team->id);

    // Test: Switch to null
    $result = $this->user->switchTeam(null);
    expect($result)->toBeTrue()->and($this->user->current_team_id)->toBeNull();
<<<<<<< HEAD
=======
=======
=======
    
>>>>>>> origin/develop
    expect($result)->toBeTrue()
        ->and($this->user->current_team_id)->toBe($this->team->id);

    // Test: Switch to null
    $result = $this->user->switchTeam(null);
    expect($result)->toBeTrue()
        ->and($this->user->current_team_id)->toBeNull();
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    expect($result)->toBeTrue()->and($this->user->current_team_id)->toBe($this->team->id);

    // Test: Switch to null
    $result = $this->user->switchTeam(null);
    expect($result)->toBeTrue()->and($this->user->current_team_id)->toBeNull();
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    // Test: Switch to non-member team
    $otherTeam = Team::factory()->create();
    $result = $this->user->switchTeam($otherTeam);
    expect($result)->toBeFalse();
});

test('it correctly identifies current team', function () {
    $this->user->switchTeam($this->personalTeam);
<<<<<<< HEAD

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    expect($this->user->isCurrentTeam($this->personalTeam))
        ->toBeTrue()
        ->and($this->user->isCurrentTeam($this->team))
        ->toBeFalse();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    expect($this->user->isCurrentTeam($this->personalTeam))->toBeTrue()
        ->and($this->user->isCurrentTeam($this->team))->toBeFalse();
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    
    expect($this->user->isCurrentTeam($this->personalTeam))->toBeTrue()
        ->and($this->user->isCurrentTeam($this->team))->toBeFalse();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('it returns all teams user owns or belongs to', function () {
    // Add user as member of a team
    $this->user->teams()->attach($this->team->id, ['role' => 'member']);

    $allTeams = $this->user->allTeams();
<<<<<<< HEAD

    expect($allTeams)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2)
        ->toContain($this->personalTeam)
        ->toContain($this->team); // personal team + member team
=======
<<<<<<< HEAD

    expect($allTeams)
        ->toBeInstanceOf(Collection::class)
<<<<<<< HEAD
<<<<<<< HEAD
        ->toHaveCount(2)
        ->toContain($this->personalTeam)
        ->toContain($this->team); // personal team + member team
=======
        ->toHaveCount(2) // personal team + member team
        ->toContain($this->personalTeam)
        ->toContain($this->team);
>>>>>>> a12f125f4a (.)
=======
        ->toHaveCount(2)
        ->toContain($this->personalTeam)
        ->toContain($this->team); // personal team + member team
>>>>>>> b93ef594b4 (.)
=======
    
    expect($allTeams)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2) // personal team + member team
        ->toContain($this->personalTeam)
        ->toContain($this->team);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('it returns owned teams', function () {
    $ownedTeams = $this->user->ownedTeams;
<<<<<<< HEAD

    expect($ownedTeams)->toBeInstanceOf(Collection::class)->toHaveCount(1)->toContain($this->personalTeam);
=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    expect($ownedTeams)->toBeInstanceOf(Collection::class)->toHaveCount(1)->toContain($this->personalTeam);
=======
=======
    
>>>>>>> origin/develop
    expect($ownedTeams)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(1)
        ->toContain($this->personalTeam);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    expect($ownedTeams)->toBeInstanceOf(Collection::class)->toHaveCount(1)->toContain($this->personalTeam);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('it returns personal team', function () {
    $personalTeam = $this->user->personalTeam();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($personalTeam)
        ->toBeInstanceOf(TeamContract::class)
        ->id->toBe($this->personalTeam->id)
        ->personal_team->toBeTrue();
});

test('it correctly determines team role', function () {
    // Test: Owner role
    $role = $this->user->teamRole($this->personalTeam);
<<<<<<< HEAD
    expect($role)->toBeInstanceOf(Role::class)->name->toBe('owner');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    expect($role)->toBeInstanceOf(Role::class)->name->toBe('owner');
=======
    expect($role)
        ->toBeInstanceOf(Role::class)
        ->name->toBe('owner');
>>>>>>> a12f125f4a (.)
=======
    expect($role)->toBeInstanceOf(Role::class)->name->toBe('owner');
>>>>>>> b93ef594b4 (.)
=======
    expect($role)
        ->toBeInstanceOf(Role::class)
        ->name->toBe('owner');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    // Test: Member role
    $this->user->teams()->attach($this->team->id, ['role' => 'admin']);
    $role = $this->user->teamRole($this->team);
<<<<<<< HEAD
    expect($role)->toBeInstanceOf(Role::class)->name->toBe('admin');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    expect($role)->toBeInstanceOf(Role::class)->name->toBe('admin');
=======
    expect($role)
        ->toBeInstanceOf(Role::class)
        ->name->toBe('admin');
>>>>>>> a12f125f4a (.)
=======
    expect($role)->toBeInstanceOf(Role::class)->name->toBe('admin');
>>>>>>> b93ef594b4 (.)
=======
    expect($role)
        ->toBeInstanceOf(Role::class)
        ->name->toBe('admin');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    // Test: No role
    $otherUser = User::factory()->create();
    expect($otherUser->teamRole($this->team))->toBeNull();
});

test('it provides team role name helper', function () {
    // Test: Owner role name
    $roleName = $this->user->teamRoleName($this->personalTeam);
    expect($roleName)->toBe('owner');

    // Test: Member role name - detach first to avoid duplicates
    $this->user->teams()->detach($this->team->id);
    $this->user->teams()->attach($this->team->id, ['role' => 'admin']);
    $roleName = $this->user->teamRoleName($this->team);
    expect($roleName)->toBe('admin');

    // Test: Unknown role
    $otherTeam = Team::factory()->create();
    $roleName = $this->user->teamRoleName($otherTeam);
    expect($roleName)->toBe('Unknown');
});

test('it correctly checks team role', function () {
    // Test: Has role
    $this->user->teams()->attach($this->team->id, ['role' => 'admin']);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    expect($this->user->hasTeamRole($this->team, 'admin'))
        ->toBeTrue()
        ->and($this->user->hasTeamRole($this->team, 'editor'))
        ->toBeFalse();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    // Test: Owner has all roles
    expect($this->user->hasTeamRole($this->personalTeam, 'admin'))
        ->toBeTrue()
        ->and($this->user->hasTeamRole($this->personalTeam, 'editor'))
        ->toBeTrue();
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    expect($this->user->hasTeamRole($this->team, 'admin'))->toBeTrue()
        ->and($this->user->hasTeamRole($this->team, 'editor'))->toBeFalse();

    // Test: Owner has all roles
    expect($this->user->hasTeamRole($this->personalTeam, 'admin'))->toBeTrue()
        ->and($this->user->hasTeamRole($this->personalTeam, 'editor'))->toBeTrue();
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

    // Test: Owner has all roles
    expect($this->user->hasTeamRole($this->personalTeam, 'admin'))
        ->toBeTrue()
        ->and($this->user->hasTeamRole($this->personalTeam, 'editor'))
        ->toBeTrue();
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    // Test: No role
    $otherTeam = Team::factory()->create();
    expect($this->user->hasTeamRole($otherTeam, 'admin'))->toBeFalse();
});

test('it correctly manages team permissions', function () {
    // Test: Owner has all permissions
    expect($this->user->hasTeamPermission($this->personalTeam, 'edit-team'))->toBeTrue();

    // Test: Member with specific permission
    $this->user->teams()->attach($this->team->id, [
        'role' => 'editor',
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        'permissions' => json_encode(['edit-content' => true]),
    ]);

    expect($this->user->hasTeamPermission($this->team, 'edit-content'))
        ->toBeTrue()
        ->and($this->user->hasTeamPermission($this->team, 'delete-content'))
        ->toBeFalse();
<<<<<<< HEAD
=======
=======

    expect($this->user->hasTeamPermission($this->team, 'edit-content'))->toBeTrue()
        ->and($this->user->hasTeamPermission($this->team, 'delete-content'))->toBeFalse();
>>>>>>> a12f125f4a (.)
=======
        'permissions' => json_encode(['edit-content' => true]),
    ]);

    expect($this->user->hasTeamPermission($this->team, 'edit-content'))
        ->toBeTrue()
        ->and($this->user->hasTeamPermission($this->team, 'delete-content'))
        ->toBeFalse();
>>>>>>> b93ef594b4 (.)
=======
        'permissions' => json_encode(['edit-content' => true])
    ]);
    
    expect($this->user->hasTeamPermission($this->team, 'edit-content'))->toBeTrue()
        ->and($this->user->hasTeamPermission($this->team, 'delete-content'))->toBeFalse();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('it handles edge cases', function () {
    // Test: User without ID
<<<<<<< HEAD
    $newUser = new User();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $newUser = new User();
=======

>>>>>>> a12f125f4a (.)
=======
    $newUser = new User();
>>>>>>> b93ef594b4 (.)
=======
    $newUser = new User();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($newUser->belongsToTeams())->toBeFalse();

    // Test: Team without owner
    $teamWithoutOwner = Team::factory()->create(['user_id' => null]);
    expect($this->user->ownsTeam($teamWithoutOwner))->toBeFalse();

    // Test: Non-existent team
    $nonExistentTeam = new Team(['id' => 9999]);
    expect($this->user->belongsToTeam($nonExistentTeam))->toBeFalse();
});
