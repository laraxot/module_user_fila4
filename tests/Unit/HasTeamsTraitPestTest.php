<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\User\Models\User;

beforeEach(function (): void {
    /** @var object{user: mixed} $this */ $this->user = User/** @phpstan-ignore-line */ ::factory()->create();
    $this->team = Team/** @phpstan-ignore-line */ ::factory()->create();
    $this->personalTeam = Team/** @phpstan-ignore-line */ ::factory()->create([
        /** @phpstan-ignore-next-line property.notFound */
        'user_id' => $this->user->id,
        'personal_team' => true,
    ]);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly checks if user belongs to teams', function (): void {
    // Test: User without teams
    /** @var User */
        $userWithoutTeams = User/** @phpstan-ignore-line */ ::factory()->create();
    expect($userWithoutTeams->belongsToTeams())->toBeFalse();

    // Test: User with owned team
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->belongsToTeams())->toBeTrue();

    // Test: User with team membership
    /** @var User */
        $memberUser = User/** @phpstan-ignore-line */ ::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    $memberUser->teams()->attach($this->team->id, ['role' => 'member']);
    expect($memberUser->belongsToTeams())->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly checks if user belongs to specific team', function (): void {
    // Test: Null team
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->belongsToTeam(null))->toBeFalse();

    // Test: Owned team
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->belongsToTeam($this->personalTeam))->toBeTrue();

    // Test: Member team
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'member']);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->belongsToTeam($this->team))->toBeTrue();

    // Test: Non-member team
    /** @var Team */
        $otherTeam = Team/** @phpstan-ignore-line */ ::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->belongsToTeam($otherTeam))->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly checks team ownership', function (): void {
    // Test: Owned team
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->ownsTeam($this->personalTeam))->toBeTrue();

    // Test: Non-owned team
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->ownsTeam($this->team))->toBeFalse();

    // Test: Member team (not owner)
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'member']);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->ownsTeam($this->team))->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it uses belongs to many x for teams relationship', function (): void {
    // Verify teams() relationship returns BelongsToMany
    /** @phpstan-ignore-next-line property.notFound */
    $relation = $this->user->teams();
    expect($relation)
        ->toBeInstanceOf(BelongsToMany::class)
        ->getTable()
        ->toBe('team_user');
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly manages current team', function (): void {
    // Test: Switch to valid team
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'member']);
    /** @phpstan-ignore-next-line property.notFound */
    $result = $this->user->switchTeam($this->team);

    /** @phpstan-ignore-next-line property.notFound */
    expect($result)->toBeTrue()->and($this->user->current_team_id)->toBe($this->team->id);

    // Test: Switch to null
    /** @phpstan-ignore-next-line property.notFound */
    $result = $this->user->switchTeam(null);
    /** @phpstan-ignore-next-line property.notFound */
    expect($result)->toBeTrue()->and($this->user->current_team_id)->toBeNull();

    // Test: Switch to non-member team
    /** @var Team */
        $otherTeam = Team/** @phpstan-ignore-line */ ::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    $result = $this->user->switchTeam($otherTeam);
    expect($result)->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly identifies current team', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->switchTeam($this->personalTeam);

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->isCurrentTeam($this->personalTeam))
        ->toBeTrue()
        /** @phpstan-ignore-next-line property.notFound */
        ->and($this->user->isCurrentTeam($this->team))
        ->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it returns all teams user owns or belongs to', function (): void {
    // Add user as member of a team
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'member']);

    /** @phpstan-ignore-next-line property.notFound */
    $allTeams = $this->user->allTeams();

    expect($allTeams)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2)
        /** @phpstan-ignore-next-line property.notFound */
        ->toContain($this->personalTeam)
        /** @phpstan-ignore-next-line property.notFound */
        ->toContain($this->team); // personal team + member team
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it returns owned teams', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $ownedTeams = $this->user->ownedTeams;

    /** @phpstan-ignore-next-line property.notFound */
    expect($ownedTeams)->toBeInstanceOf(Collection::class)->toHaveCount(1)->toContain($this->personalTeam);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it returns personal team', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $personalTeam = $this->user->personalTeam();

    expect($personalTeam)
        ->toBeInstanceOf(TeamContract::class)
        /** @phpstan-ignore-next-line property.notFound */
        ->id->toBe($this->personalTeam->id)
        ->personal_team->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly determines team role', function (): void {
    // Test: Owner role
    /** @phpstan-ignore-next-line property.notFound */
    $role = $this->user->teamRole($this->personalTeam);
    expect($role)->toBeInstanceOf(Role::class)->name->toBe('owner');

    // Test: Member role
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'admin']);
    /** @phpstan-ignore-next-line property.notFound */
    $role = $this->user->teamRole($this->team);
    expect($role)->toBeInstanceOf(Role::class)->name->toBe('admin');

    // Test: No role
    /** @var User */
        $otherUser = User/** @phpstan-ignore-line */ ::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    expect($otherUser->teamRole($this->team))->toBeNull();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it provides team role name helper', function (): void {
    // Test: Owner role name
    /** @phpstan-ignore-next-line property.notFound */
    $roleName = $this->user->teamRoleName($this->personalTeam);
    expect($roleName)->toBe('owner');

    // Test: Member role name - detach first to avoid duplicates
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->detach($this->team->id);
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'admin']);
    /** @phpstan-ignore-next-line property.notFound */
    $roleName = $this->user->teamRoleName($this->team);
    expect($roleName)->toBe('admin');

    // Test: Unknown role
    /** @var Team */
        $otherTeam = Team/** @phpstan-ignore-line */ ::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    $roleName = $this->user->teamRoleName($otherTeam);
    expect($roleName)->toBe('Unknown');
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly checks team role', function (): void {
    // Test: Has role
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'admin']);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamRole($this->team, 'admin'))
        ->toBeTrue()
        /** @phpstan-ignore-next-line property.notFound */
        ->and($this->user->hasTeamRole($this->team, 'editor'))
        ->toBeFalse();

    // Test: Owner has all roles
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamRole($this->personalTeam, 'admin'))
        ->toBeTrue()
        /** @phpstan-ignore-next-line property.notFound */
        ->and($this->user->hasTeamRole($this->personalTeam, 'editor'))
        ->toBeTrue();

    // Test: No role
    /** @var Team */
        $otherTeam = Team/** @phpstan-ignore-line */ ::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamRole($otherTeam, 'admin'))->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly manages team permissions', function (): void {
    // Test: Owner has all permissions
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamPermission($this->personalTeam, 'edit-team'))->toBeTrue();

    // Test: Member with specific permission
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, [
        'role' => 'editor',
        'permissions' => json_encode(['edit-content' => true]),
    ]);

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamPermission($this->team, 'edit-content'))
        ->toBeTrue()
        /** @phpstan-ignore-next-line property.notFound */
        ->and($this->user->hasTeamPermission($this->team, 'delete-content'))
        ->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it handles edge cases', function (): void {
    // Test: User without ID
    $newUser = new User;
    expect($newUser->belongsToTeams())->toBeFalse();

    // Test: Team without owner
    /** @var Team */
        $teamWithoutOwner = Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => null]);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->ownsTeam($teamWithoutOwner))->toBeFalse();

    // Test: Non-existent team
    $nonExistentTeam = new Team(['id' => 9999]);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->belongsToTeam($nonExistentTeam))->toBeFalse();
});
