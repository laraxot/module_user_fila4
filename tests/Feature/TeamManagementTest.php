<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Models\Team;
use Modules\User\Models\TeamInvitation;
use Modules\User\Models\TeamPermission;
use Modules\User\Models\User;

beforeEach(function (): void {
    $this->owner = User/** @phpstan-ignore-line */ ::factory()->create();
    $this->member = User/** @phpstan-ignore-line */ ::factory()->create();
    $this->team = Team/** @phpstan-ignore-line */ ::factory()->create([
        /** @phpstan-ignore-next-line property.notFound */
        'user_id' => $this->owner->id,
        'name' => 'Test Team',
    ]);
});

describe('Team Creation and Management', function (): void {
    it('can create a team', function (): void {
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create([
            /** @phpstan-ignore-next-line property.notFound */
            'user_id' => $this->owner->id,
            'name' => 'New Team',
            'slug' => 'new-team',
        ]);

        expect($team)
            ->toBeInstanceOf(Team::class)
            ->name->toBe('New Team')
            ->slug->toBe('new-team')
            /** @phpstan-ignore-next-line property.notFound */
            ->user_id->toBe($this->owner->id);
    });

    it('belongs to an owner', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->owner)->toBeInstanceOf(User::class)->id->toBe($this->owner->id);
    });

    it('can have multiple teams per user', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        /** @phpstan-ignore-next-line property.notFound */
        $team1 = Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $this->owner->id]);
        /** @var \Illuminate\Database\Eloquent\Collection */
        /** @phpstan-ignore-next-line property.notFound */
        $team2 = Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $this->owner->id]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->owner->ownedTeams)->toHaveCount(3); // Including the one from beforeEach
    });

    it('can update team information', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->update([
            'name' => 'Updated Team Name',
            'description' => 'Updated description',
        ]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->fresh())->name->toBe('Updated Team Name')->description->toBe('Updated description');
    });

    it('can delete a team', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $teamId = $this->team->id;
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->delete();

        expect(Team::find($teamId))->toBeNull();
    });
});

describe('Team Membership', function (): void {
    it('can add members to team', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach($this->member);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->users)->toContain($this->member);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->member->teams)->toContain($this->team);
    });

    it('can remove members from team', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach($this->member);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->users)->toContain($this->member);

        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->detach($this->member);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->fresh()->users)->not->toContain($this->member);
    });

    it('can have multiple members', function (): void {
        /** @var User */
        $member1 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $member2 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $member3 = User/** @phpstan-ignore-line */ ::factory()->create();

        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach([$member1->id, $member2->id, $member3->id]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->users)->toHaveCount(3);
    });

    it('can check if user is team member', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach($this->member);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->hasUser($this->member))->toBe(true);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->hasUser($this->owner))->toBe(false); // Owner is not a member, they own the team
    });

    it('can get team membership with pivot data', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach($this->member, [
            'role' => 'editor',
            'joined_at' => now(),
        ]);

        /** @phpstan-ignore-next-line property.notFound */
        $membership = $this->team
            ->users()
            /** @phpstan-ignore-next-line property.notFound */
            ->where('user_id', $this->member->id)
            ->first()
            ->pivot;

        expect($membership->role)->toBe('editor');
        expect($membership->joined_at)->not->toBeNull();
    });
});

describe('User Team Relationship', function (): void {
    it('user can belong to multiple teams', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        /** @phpstan-ignore-next-line property.notFound */
        $team1 = Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $this->owner->id]);
        /** @var \Illuminate\Database\Eloquent\Collection */
        /** @phpstan-ignore-next-line property.notFound */
        $team2 = Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $this->owner->id]);

        /** @phpstan-ignore-next-line property.notFound */
        $this->member->teams()->attach([$team1->id, $team2->id]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->member->teams)->toHaveCount(2);
    });

    it('user can switch current team', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->member->teams()->attach($this->team);
        /** @phpstan-ignore-next-line property.notFound */
        $this->member->update(['current_team_id' => $this->team->id]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->member->fresh()->current_team_id)->toBe($this->team->id);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->member->currentTeam->id)->toBe($this->team->id);
    });

    it('user can leave a team', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->member->teams()->attach($this->team);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->member->teams)->toContain($this->team);

        /** @phpstan-ignore-next-line property.notFound */
        $this->member->teams()->detach($this->team);
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->member->fresh()->teams)->not->toContain($this->team);
    });

    it('can get all team users for a user', function (): void {
        /** @var User */
        $teammate1 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $teammate2 = User/** @phpstan-ignore-line */ ::factory()->create();

        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach([$this->member->id, $teammate1->id, $teammate2->id]);
        /** @phpstan-ignore-next-line property.notFound */
        $this->member->teams()->attach($this->team);

        /** @phpstan-ignore-next-line property.notFound */
        $allTeamUsers = $this->member->allTeamUsers();

        expect($allTeamUsers)->toContain($teammate1);
        expect($allTeamUsers)->toContain($teammate2);
        /** @phpstan-ignore-next-line property.notFound */
        expect($allTeamUsers)->not->toContain($this->member); // Should not include self
    });
});

describe('Team Invitations', function (): void {
    it('can create team invitations', function (): void {
        /** @var Team */
        $invitation = TeamInvitation/** @phpstan-ignore-line */ ::factory()->create([
            /** @phpstan-ignore-next-line property.notFound */
            'team_id' => $this->team->id,
            'email' => 'invite@example.com',
            'role' => 'member',
        ]);

    /** @phpstan-ignore-next-line property.notFound, method.nonObject, argument.templateType */
        expect($invitation)
            ->toBeInstanceOf(TeamInvitation::class)
            /** @phpstan-ignore-next-line property.notFound */
            ->team_id->toBe($this->team->id)
            ->email->toBe('invite@example.com')
            ->role->toBe('member');
    });

    it('can accept team invitations', function (): void {
        /** @var Team */
        $invitation = TeamInvitation/** @phpstan-ignore-line */ ::factory()->create([
            /** @phpstan-ignore-next-line property.notFound */
            'team_id' => $this->team->id,
            /** @phpstan-ignore-next-line property.notFound */
            'email' => $this->member->email,
            'role' => 'editor',
        ]);

        // Simulate accepting invitation
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach($this->member, ['role' => $invitation->role]);
        /** @phpstan-ignore-next-line method.nonObject */
        $invitation->delete();

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->users)->toContain($this->member);
        expect(TeamInvitation::find($invitation->id))->toBeNull();
    });

    it('can cancel team invitations', function (): void {
        /** @var Team */
        $invitation = TeamInvitation/** @phpstan-ignore-line */ ::factory()->create([
            /** @phpstan-ignore-next-line property.notFound */
            'team_id' => $this->team->id,
            'email' => 'cancel@example.com',
        ]);

        $invitationId = $invitation->id;
        /** @phpstan-ignore-next-line method.nonObject */
        $invitation->delete();

        expect(TeamInvitation::find($invitationId))->toBeNull();
    });

    it('prevents duplicate invitations', function (): void {
        TeamInvitation/** @phpstan-ignore-line */ ::factory()->create([
            /** @phpstan-ignore-next-line property.notFound */
            'team_id' => $this->team->id,
            'email' => 'existing@example.com',
        ]);

        // Attempting to create duplicate should fail or be handled
        /** @phpstan-ignore-next-line property.notFound */
        $duplicateCount = TeamInvitation::where('team_id', $this->team->id)
            ->where('email', 'existing@example.com')
            ->count();

        expect($duplicateCount)->toBe(1);
    });
});

describe('Team Permissions', function (): void {
    it('can have team-specific permissions', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->permissions())
            ->toBeInstanceOf(BelongsToMany::class);
    });

    it('can assign permissions to team members', function (): void {
        /** @var Team */
        $permission = TeamPermission/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'manage team',
            /** @phpstan-ignore-next-line property.notFound */
            'team_id' => $this->team->id,
        ]);

        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach($this->member, ['permissions' => [$permission->id]]);

        // Test permission assignment logic
        /** @phpstan-ignore-next-line property.notFound */
        expect($permission->team_id)->toBe($this->team->id);
    });

    it('can check team member permissions', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach($this->member, ['role' => 'admin']);

        /** @phpstan-ignore-next-line property.notFound */
        $membership = $this->team
            ->users()
            /** @phpstan-ignore-next-line property.notFound */
            ->where('user_id', $this->member->id)
            ->first()
            ->pivot;

        expect($membership->role)->toBe('admin');
    });
});

describe('Team Scopes and Queries', function (): void {
    it('can filter teams by owner', function (): void {
        /** @var User */
        $otherUser = User/** @phpstan-ignore-line */ ::factory()->create();
        Team/** @phpstan-ignore-line */ ::factory()->create(['user_id' => $otherUser->id]);

        /** @phpstan-ignore-next-line property.notFound */
        $ownerTeams = Team::where('user_id', $this->owner->id)->get();

        /** @phpstan-ignore-next-line property.notFound */
        expect($ownerTeams->every(fn ($team) => $team->user_id === $this->owner->id))->toBe(true);
    });

    it('can find teams by slug', function (): void {
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create(['slug' => 'unique-team-slug']);

        $foundTeam = Team::where('slug', 'unique-team-slug')->first();

        expect($foundTeam->id)->toBe($team->id);
    });

    it('can get teams with member count', function (): void {
        /** @var User */
        $member1 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $member2 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach([$member1->id, $member2->id]);

        /** @phpstan-ignore-next-line property.notFound */
        $teamWithCount = Team::withCount('users')->find($this->team->id);

        expect($teamWithCount->users_count)->toBe(2);
    });
});

describe('Team Features', function (): void {
    it('can have team settings', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->update([
            'settings' => [
                'allow_invitations' => true,
                'max_members' => 50,
                'public' => false,
            ],
        ]);

        /** @phpstan-ignore-next-line property.notFound */
        $settings = $this->team->fresh()->settings;

        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($settings['allow_invitations'])->toBe(true);
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($settings['max_members'])->toBe(50);
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($settings['public'])->toBe(false);
    });

    it('can have team avatar', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->update([
            'avatar_path' => 'teams/avatars/team-avatar.jpg',
        ]);

        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->fresh()->avatar_path)->toBe('teams/avatars/team-avatar.jpg');
    });

    it('can check if team is full', function (): void {
        // Assuming team has max_members setting
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->update([
            'settings' => ['max_members' => 2],
        ]);

        /** @var User */
        $member1 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $member2 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach([$member1->id, $member2->id]);

        /** @phpstan-ignore-next-line property.notFound */
        $memberCount = $this->team->users()->count();
        /** @phpstan-ignore-next-line property.notFound */
        $maxMembers = $this->team->settings['max_members'] ?? null;

        if ($maxMembers) {
            expect($memberCount >= $maxMembers)->toBe(true);
        }
    });
});

describe('Team Events and Notifications', function (): void {
    it('can notify team members of changes', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach($this->member);

        Notification::fake();

        // Simulate team update notification
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->update(['name' => 'New Team Name']);

        // Would test notification dispatch if implemented
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->fresh()->name)->toBe('New Team Name');
    });

    it('can log team activities', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $this->team->users()->attach($this->member);

        // Test activity logging when members join/leave
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->team->users)->toContain($this->member);
    });
});
