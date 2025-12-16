<?php

declare(strict_types=1);

use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
test('can create team with minimal data', function (): void {
    $user = User::factory()->create();

    $team = Team::factory()->create([
        'user_id' => $user->id,
        'name' => 'Test Team',
    ]);
=======
    public function testCanCreateTeamWithMinimalData(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();

        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'name' => 'Test Team',
        ]);
>>>>>>> 7def95d7 (.)

    expect($team->id)->not->toBeNull();
    expect($team->user_id)->toBe($user->id);
    expect($team->name)->toBe('Test Team');
});

<<<<<<< HEAD
test('can create team with all fields', function (): void {
    $user = User::factory()->create();
=======
    public function testCanCreateTeamWithAllFields(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
>>>>>>> 7def95d7 (.)

    $teamData = [
        'user_id' => $user->id,
        'name' => 'Full Team',
        'personal_team' => 0,
        'code' => 'TEAM001',
        'uuid' => '550e8400-e29b-41d4-a716-446655440000',
        'owner_id' => $user->id,
    ];

<<<<<<< HEAD
    $team = Team::factory()->create($teamData);
=======
        $team = Team/** @phpstan-ignore-line */ ::factory()->create($teamData);
>>>>>>> 7def95d7 (.)

    expect($team->id)->not->toBeNull();
    expect($team->user_id)->toBe($user->id);
    expect($team->name)->toBe('Full Team');
    expect($team->personal_team)->toBe(0);
    expect($team->code)->toBe('TEAM001');
    expect($team->uuid)->toBe('550e8400-e29b-41d4-a716-446655440000');
    expect($team->owner_id)->toBe($user->id);
});

<<<<<<< HEAD
test('can find team by name', function (): void {
    $user = User::factory()->create();
    $team = Team::factory()->create([
        'user_id' => $user->id,
        'name' => 'Unique Team Name',
    ]);
=======
    public function testTeamHasSoftDeletes(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id]);
        $teamId = $team->id;
>>>>>>> 7def95d7 (.)

    $foundTeam = Team::where('name', 'Unique Team Name')->first();

    expect($foundTeam)->not->toBeNull();
    expect($foundTeam->id)->toBe($team->id);
});

test('can find team by code', function (): void {
    $user = User::factory()->create();
    $team = Team::factory()->create([
        'user_id' => $user->id,
        'code' => 'TEAM123',
    ]);

    $foundTeam = Team::where('code', 'TEAM123')->first();

<<<<<<< HEAD
    expect($foundTeam)->not->toBeNull();
    expect($foundTeam->id)->toBe($team->id);
});
=======
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id]);
        $teamId = $team->id;
>>>>>>> 7def95d7 (.)

test('can find team by uuid', function (): void {
    $user = User::factory()->create();
    $uuid = '550e8400-e29b-41d4-a716-446655440000';
    $team = Team::factory()->create([
        'user_id' => $user->id,
        'uuid' => $uuid,
    ]);

    $foundTeam = Team::where('uuid', $uuid)->first();

    expect($foundTeam)->not->toBeNull();
    expect($foundTeam->id)->toBe($team->id);
});

<<<<<<< HEAD
test('can find team by owner id', function (): void {
    $user = User::factory()->create();
    $team = Team::factory()->create([
        'user_id' => $user->id,
        'owner_id' => $user->id,
    ]);
=======
    public function testCanFindTeamByName(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'name' => 'Unique Team Name',
        ]);
>>>>>>> 7def95d7 (.)

    $foundTeam = Team::where('owner_id', $user->id)->first();

    expect($foundTeam)->not->toBeNull();
    expect($foundTeam->id)->toBe($team->id);
});

<<<<<<< HEAD
test('can find personal teams', function (): void {
    $user = User::factory()->create();
    Team::factory()->create([
        'user_id' => $user->id,
        'personal_team' => 1,
    ]);
    Team::factory()->create([
        'user_id' => $user->id,
        'personal_team' => 0,
    ]);
=======
    public function testCanFindTeamByCode(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'code' => 'TEAM123',
        ]);
>>>>>>> 7def95d7 (.)

    $personalTeams = Team::where('personal_team', 1)->get();

    expect($personalTeams->count())->toBeGreaterThanOrEqual(1);
    expect($personalTeams->first()->personal_team)->toBe(1);
});

<<<<<<< HEAD
test('can find teams by user id', function (): void {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
=======
    public function testCanFindTeamByUuid(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $uuid = '550e8400-e29b-41d4-a716-446655440000';
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'uuid' => $uuid,
        ]);
>>>>>>> 7def95d7 (.)

    Team::factory()->create(['user_id' => $user1->id]);
    Team::factory()->create(['user_id' => $user1->id]);
    Team::factory()->create(['user_id' => $user2->id]);

    $user1Teams = Team::where('user_id', $user1->id)->get();

<<<<<<< HEAD
    expect($user1Teams->count())->toBeGreaterThanOrEqual(2);
    expect($user1Teams->every(fn ($team) => $team->user_id === $user1->id))->toBeTrue();
});
=======
    public function testCanFindTeamByOwnerId(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'owner_id' => $user->id,
        ]);
>>>>>>> 7def95d7 (.)

test('can find teams by name pattern', function (): void {
    $user = User::factory()->create();
    Team::factory()->create(['user_id' => $user->id, 'name' => 'Development Team']);
    Team::factory()->create(['user_id' => $user->id, 'name' => 'Marketing Team']);
    Team::factory()->create(['user_id' => $user->id, 'name' => 'Sales Team']);

    $devTeams = Team::where('name', 'like', '%Team%')->get();

<<<<<<< HEAD
    expect($devTeams->count())->toBeGreaterThanOrEqual(3);
    expect($devTeams->every(fn ($team) => str_contains($team->name, 'Team')))->toBeTrue();
});
=======
    public function testCanFindPersonalTeams(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'personal_team' => 1,
        ]);
        Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'personal_team' => 0,
        ]);
>>>>>>> 7def95d7 (.)

test('can update team', function (): void {
    $user = User::factory()->create();
    $team = Team::factory()->create([
        'user_id' => $user->id,
        'name' => 'Old Name',
    ]);

    $team->update(['name' => 'New Name']);

<<<<<<< HEAD
    expect($team->fresh()->name)->toBe('New Name');
});

test('can handle null values', function (): void {
    $user = User::factory()->create();
    $team = Team::factory()->create([
        'user_id' => $user->id,
        'name' => 'Test Team',
        'code' => null,
        'uuid' => null,
        'owner_id' => null,
    ]);
=======
    public function testCanFindTeamsByUserId(): void
    {
        $user1 = User/** @phpstan-ignore-line */ ::factory()->create();
        $user2 = User/** @phpstan-ignore-line */ ::factory()->create();

        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user1->id]);
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user1->id]);
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user2->id]);
>>>>>>> 7def95d7 (.)

    expect($team->code)->toBeNull();
    expect($team->uuid)->toBeNull();
    expect($team->owner_id)->toBeNull();
});

test('can find teams by multiple criteria', function (): void {
    $user = User::factory()->create();
    Team::factory()->create([
        'user_id' => $user->id,
        'name' => 'Development Team',
        'personal_team' => 0,
    ]);

<<<<<<< HEAD
    Team::factory()->create([
        'user_id' => $user->id,
        'name' => 'Personal Team',
        'personal_team' => 1,
    ]);
=======
    public function testCanFindTeamsByNamePattern(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id, 'name' => 'Development Team']);
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id, 'name' => 'Marketing Team']);
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id, 'name' => 'Sales Team']);
>>>>>>> 7def95d7 (.)

    $teams = Team::where('user_id', $user->id)->where('personal_team', 0)->get();

<<<<<<< HEAD
    expect($teams->count())->toBeGreaterThanOrEqual(1);
    expect($teams->first()->name)->toBe('Development Team');
    expect($teams->first()->personal_team)->toBe(0);
});
=======
        static::assertCount(3, $devTeams);
        static::assertTrue($devTeams->every(fn ($team) => str_contains($team->name, 'Team')));
    }

    public function testCanUpdateTeam(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'name' => 'Old Name',
        ]);

        $team->update(['name' => 'New Name']);

        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
            'name' => 'New Name',
        ]);
    }

    public function testCanHandleNullValues(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'name' => 'Test Team',
            'code' => null,
            'uuid' => null,
            'owner_id' => null,
        ]);

        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
            'code' => null,
            'uuid' => null,
            'owner_id' => null,
        ]);
    }

    public function testCanFindTeamsByMultipleCriteria(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'name' => 'Development Team',
            'personal_team' => 0,
        ]);

        Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'name' => 'Personal Team',
            'personal_team' => 1,
        ]);

        $teams = Team::where('user_id', $user->id)->where('personal_team', 0)->get();

        static::assertCount(1, $teams);
        static::assertSame('Development Team', $teams->first()->name);
        static::assertSame(0, $teams->first()->personal_team);
    }
}
>>>>>>> 7def95d7 (.)
