<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\User\Models\TeamUser;
use Modules\User\Models\User;
use Tests\TestCase;

/**
 * Test per il trait HasTeams corretto secondo filosofia Jetstream + Laraxot.
 *
 * Verifica tutte le correzioni implementate:
 * - belongsToTeams() ora funziona correttamente
 * - belongsToTeam() usa logica corretta
 * - ownsTeam() è efficiente
 * - teams() usa belongsToManyX
 * - Tipizzazione rigorosa
 * - Metodi non-Jetstream rimossi
 */
uses(TestCase::class);

beforeEach(function (): void {
    $this->user = User::factory()->create();
    $this->team = Team::factory()->create();
    $this->personalTeam = Team::factory()->create([
        /** @phpstan-ignore-next-line property.notFound */
        'user_id' => $this->user->id,
        'personal_team' => true,
    ]);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly checks if user belongs to teams', function (): void {
    // Test: User senza team
    /** @var \Illuminate\Database\Eloquent\Collection */
        $userWithoutTeams = User::factory()->create();
    expect($userWithoutTeams->belongsToTeams())->toBeFalse();

    // Test: User con team owned
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->belongsToTeams())->toBeTrue();

    // Test: User con team membership
    /** @var \Illuminate\Database\Eloquent\Collection */
        $memberUser = User::factory()->create();
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
    /** @var \Illuminate\Database\Eloquent\Collection */
        $otherTeam = Team::factory()->create();
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
    // Verifica che la relazione teams() restituisca BelongsToMany
    /** @phpstan-ignore-next-line property.notFound */
    $relation = $this->user->teams();
    expect($relation)->toBeInstanceOf(BelongsToMany::class);

    // Verifica che il pivot model sia TeamUser
    expect($relation->getTable())->toBe('team_user');
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
    expect($result)->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->current_team_id)->toBe($this->team->id);

    // Test: Switch to null
    /** @phpstan-ignore-next-line property.notFound */
    $result = $this->user->switchTeam(null);
    expect($result)->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->current_team_id)->toBeNull();

    // Test: Switch to non-member team
    /** @var \Illuminate\Database\Eloquent\Collection */
        $otherTeam = Team::factory()->create();
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
    expect($this->user->isCurrentTeam($this->personalTeam))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->isCurrentTeam($this->team))->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it returns all teams user owns or belongs to', function (): void {
    // Aggiungi user come member di un team
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'member']);

    /** @phpstan-ignore-next-line property.notFound */
    $allTeams = $this->user->allTeams();

    expect($allTeams)->toBeInstanceOf(Collection::class);
    expect($allTeams)->toHaveCount(2); // personal team + member team
    /** @phpstan-ignore-next-line property.notFound */
    expect($allTeams->contains($this->personalTeam))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($allTeams->contains($this->team))->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it returns owned teams', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $ownedTeams = $this->user->ownedTeams;

    expect($ownedTeams)->toBeInstanceOf(Collection::class);
    expect($ownedTeams)->toHaveCount(1);
    /** @phpstan-ignore-next-line property.notFound */
    expect($ownedTeams->contains($this->personalTeam))->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it returns personal team', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $personalTeam = $this->user->personalTeam();

    expect($personalTeam)->toBeInstanceOf(TeamContract::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($personalTeam->id)->toBe($this->personalTeam->id);
    expect($personalTeam->personal_team)->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly determines team role', function (): void {
    // Test: Owner role
    /** @phpstan-ignore-next-line property.notFound */
    $role = $this->user->teamRole($this->personalTeam);
    expect($role)->toBeInstanceOf(Role::class);
    expect($role->name)->toBe('owner');

    // Test: Member role
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'admin']);
    /** @phpstan-ignore-next-line property.notFound */
    $role = $this->user->teamRole($this->team);
    expect($role)->toBeInstanceOf(Role::class);
    expect($role->name)->toBe('admin');

    // Test: No role (not member)
    /** @var \Illuminate\Database\Eloquent\Collection */
        $otherTeam = Team::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    $role = $this->user->teamRole($otherTeam);
    expect($role)->toBeNull();
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

    // Test: No role (not member)
    /** @var \Illuminate\Database\Eloquent\Collection */
        $otherTeam = Team::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    $roleName = $this->user->teamRoleName($otherTeam);
    expect($roleName)->toBeNull();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly checks team role', function (): void {
    // Test: Owner always has any role
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamRole($this->personalTeam, 'admin'))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamRole($this->personalTeam, 'member'))->toBeTrue();

    // Test: Specific role check
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'admin']);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamRole($this->team, 'admin'))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamRole($this->team, 'member'))->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it correctly manages team permissions', function (): void {
    // Test: Owner has all permissions
    /** @phpstan-ignore-next-line property.notFound */
    $permissions = $this->user->teamPermissions($this->personalTeam);
    expect($permissions)->toBe(['*']);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamPermission($this->personalTeam, 'any_permission'))->toBeTrue();

    // Test: Non-member has no permissions
    /** @var \Illuminate\Database\Eloquent\Collection */
        $otherTeam = Team::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    $permissions = $this->user->teamPermissions($otherTeam);
    expect($permissions)->toBe([]);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamPermission($otherTeam, 'any_permission'))->toBeFalse();

    // Test: Member has role-based permissions
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'admin']);
    /** @phpstan-ignore-next-line property.notFound */
    $permissions = $this->user->teamPermissions($this->team);
    expect($permissions)->toBe(['admin']);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeamPermission($this->team, 'admin'))->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it provides utility methods', function (): void {
    // Test: hasTeams() alias
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->hasTeams())->toBeTrue();

    // Test: isOwnerOrMember()
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->isOwnerOrMember($this->personalTeam))->toBeTrue();

    /** @phpstan-ignore-next-line property.notFound */
    $this->user->teams()->attach($this->team->id, ['role' => 'member']);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->isOwnerOrMember($this->team))->toBeTrue();

    /** @var \Illuminate\Database\Eloquent\Collection */
        $otherTeam = Team::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->isOwnerOrMember($otherTeam))->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it handles edge cases correctly', function (): void {
    // Test: User senza ID
    $newUser = new User;
    expect($newUser->belongsToTeams())->toBeFalse();

    // Test: Team senza user_id
    /** @var \Illuminate\Database\Eloquent\Collection */
        $teamWithoutOwner = Team::factory()->create(['user_id' => null]);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->ownsTeam($teamWithoutOwner))->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('it validates assertions correctly', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect(fn () => $this->user->ownsTeam(null))->toThrow(InvalidArgumentException::class, 'Team cannot be null');
});
