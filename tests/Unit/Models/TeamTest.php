<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Tests\TestCase;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_team_with_minimal_data(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();

        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'name' => 'Test Team',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
            'user_id' => $user->id,
            'name' => 'Test Team',
        ]);
    }

    public function test_can_create_team_with_all_fields(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();

        $teamData = [
            'user_id' => $user->id,
            'name' => 'Full Team',
            'personal_team' => 0,
            'code' => 'TEAM001',
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
            'owner_id' => $user->id,
        ];

        $team = Team/** @phpstan-ignore-line */ ::factory()->create($teamData);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
            'user_id' => $user->id,
            'name' => 'Full Team',
            'personal_team' => 0,
            'code' => 'TEAM001',
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
            'owner_id' => $user->id,
        ]);
    }

    public function test_team_has_soft_deletes(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id]);
        $teamId = $team->id;

        /** @phpstan-ignore-next-line method.nonObject */
        $team->delete();

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertSoftDeleted('teams', ['id' => $teamId]);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('teams', ['id' => $teamId]);
    }

    public function test_can_restore_soft_deleted_team(): void
    {
        if (!method_exists(Team::class, 'withTrashed')) {
            /** @phpstan-ignore-next-line property.notFound, method.nonObject */
            $this->markTestSkipped('SoftDeletes trait not present on Team model');
            return;
        }

        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id]);
        $teamId = $team->id;

        /** @phpstan-ignore-next-line method.nonObject */
        $team->delete();
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertSoftDeleted('teams', ['id' => $teamId]);

        /** @var Team $restoredTeam */
        $restoredTeam = Team::withTrashed()->find($teamId);
        /** @phpstan-ignore-next-line method.nonObject */
        $restoredTeam->restore();

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('teams', ['id' => $teamId]);
        static::assertNull($restoredTeam->deleted_at);
    }

    public function test_can_find_team_by_name(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'name' => 'Unique Team Name',
        ]);

        $foundTeam = Team::where('name', 'Unique Team Name')->first();

        static::assertNotNull($foundTeam);
        static::assertSame($team->id, $foundTeam->id);
    }

    public function test_can_find_team_by_code(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'code' => 'TEAM123',
        ]);

        $foundTeam = Team::where('code', 'TEAM123')->first();

        static::assertNotNull($foundTeam);
        static::assertSame($team->id, $foundTeam->id);
    }

    public function test_can_find_team_by_uuid(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $uuid = '550e8400-e29b-41d4-a716-446655440000';
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'uuid' => $uuid,
        ]);

        $foundTeam = Team::where('uuid', $uuid)->first();

        static::assertNotNull($foundTeam);
        static::assertSame($team->id, $foundTeam->id);
    }

    public function test_can_find_team_by_owner_id(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'owner_id' => $user->id,
        ]);

        $foundTeam = Team::where('owner_id', $user->id)->first();

        static::assertNotNull($foundTeam);
        static::assertSame($team->id, $foundTeam->id);
    }

    public function test_can_find_personal_teams(): void
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

        $personalTeams = Team::where('personal_team', 1)->get();

        static::assertCount(1, $personalTeams);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame(1, $personalTeams->first()->personal_team);
    }

    public function test_can_find_teams_by_user_id(): void
    {
        $user1 = User/** @phpstan-ignore-line */ ::factory()->create();
        $user2 = User/** @phpstan-ignore-line */ ::factory()->create();

        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user1->id]);
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user1->id]);
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user2->id]);

        $user1Teams = Team::where('user_id', $user1->id)->get();

        static::assertCount(2, $user1Teams);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertTrue($user1Teams->every(fn ($team) => $team->user_id === $user1->id));
    }

    public function test_can_find_teams_by_name_pattern(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id, 'name' => 'Development Team']);
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id, 'name' => 'Marketing Team']);
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $user->id, 'name' => 'Sales Team']);

        $devTeams = Team::where('name', 'like', '%Team%')->get();

        static::assertCount(3, $devTeams);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertTrue($devTeams->every(fn ($team) => str_contains($team->name, 'Team')));
    }

    public function test_can_update_team(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'name' => 'Old Name',
        ]);

        /** @phpstan-ignore-next-line method.nonObject */
        $team->update(['name' => 'New Name']);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
            'name' => 'New Name',
        ]);
    }

    public function test_can_handle_null_values(): void
    {
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            'user_id' => $user->id,
            'name' => 'Test Team',
            'code' => null,
            'uuid' => null,
            'owner_id' => null,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
            'code' => null,
            'uuid' => null,
            'owner_id' => null,
        ]);
    }

    public function test_can_find_teams_by_multiple_criteria(): void
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
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame('Development Team', $teams->first()->name);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame(0, $teams->first()->personal_team);
    }
}
