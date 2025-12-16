<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Illuminate\Database\QueryException;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Tests\TestCase;
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\User\Models\TeamUser;
use Modules\User\Models\TeamPermission;
use Modules\User\Models\TeamInvitation;
use Modules\User\Models\Membership;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

class TeamManagementBusinessLogicTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itCanCreateTeam(): void
    {
        // Arrange
        $teamData = [
            'name' => 'Studio Dentistico Milano',
            'slug' => 'studio-milano',
            'description' => 'Studio dentistico specializzato in Milano',
            'personal_team' => false,
        ];

        // Act
        $team = Team::create($teamData);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
            'name' => 'Studio Dentistico Milano',
            'slug' => 'studio-milano',
            'description' => 'Studio dentistico specializzato in Milano',
            'personal_team' => false,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('Studio Dentistico Milano', $team->name);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('studio-milano', $team->slug);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($team->personal_team);
    }

    /** @test */
    public function itCanAddUserToTeam(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user->id, [
            'role' => 'member',
            'permissions' => ['read', 'write'],
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('team_user', [
            'team_id' => $team->id,
            'user_id' => $user->id,
            'role' => 'member',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($team->hasUser($user));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($user->belongsToTeam($team));
    }

    /** @test */
    public function itCanRemoveUserFromTeam(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user->id, ['role' => 'member']);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->detach($user->id);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('team_user', [
            'team_id' => $team->id,
            'user_id' => $user->id,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($team->hasUser($user));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($user->belongsToTeam($team));
    }

    /** @test */
    public function itCanAssignTeamRoleToUser(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user->id, ['role' => 'member']);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->updateExistingPivot($user->id, ['role' => 'admin']);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('team_user', [
            'team_id' => $team->id,
            'user_id' => $user->id,
            'role' => 'admin',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('admin', $team->users()->find($user->id)->pivot->role);
    }

    /** @test */
    public function itCanAssignTeamPermissionsToUser(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $permissions = ['read', 'write', 'delete'];

        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user->id, [
            'role' => 'member',
            'permissions' => $permissions,
        ]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $userPermissions = $team->users()->find($user->id)->pivot->permissions;

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsArray($userPermissions);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertContains('read', $userPermissions);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertContains('write', $userPermissions);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertContains('delete', $userPermissions);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(3, $userPermissions);
    }

    /** @test */
    public function itCanCheckUserTeamPermissions(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $permissions = ['read', 'write'];

        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user->id, [
            'role' => 'member',
            'permissions' => $permissions,
        ]);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($team->userHasPermission($user, 'read'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($team->userHasPermission($user, 'write'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($team->userHasPermission($user, 'delete'));
    }

    /** @test */
    public function itCanCreateTeamInvitation(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $inviter = User/** @phpstan-ignore-line */ ::factory()->create();
        $invitationData = [
            'email' => 'invited@example.com',
            'role' => 'member',
            'permissions' => ['read'],
        ];

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $invitation = $team->invitations()->create([
            'team_id' => $team->id,
            'user_id' => $inviter->id,
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            'email' => $invitationData['email'],
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            'role' => $invitationData['role'],
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            'permissions' => $invitationData['permissions'],
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('team_invitations', [
            'id' => $invitation->id,
            'team_id' => $team->id,
            'user_id' => $inviter->id,
            'email' => 'invited@example.com',
            'role' => 'member',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals($team->id, $invitation->team_id);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals($inviter->id, $invitation->user_id);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('invited@example.com', $invitation->email);
    }

    /** @test */
    public function itCanAcceptTeamInvitation(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $inviter = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $invitedUser = User/** @phpstan-ignore-line */ ::factory()->create(['email' => 'invited@example.com']);

        /** @phpstan-ignore-next-line method.nonObject */
        $invitation = $team->invitations()->create([
            'team_id' => $team->id,
            'user_id' => $inviter->id,
            'email' => 'invited@example.com',
            'role' => 'member',
            'permissions' => ['read'],
        ]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $invitation->accept($invitedUser);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($team->hasUser($invitedUser));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('team_user', [
            'team_id' => $team->id,
            'user_id' => $invitedUser->id,
            'role' => 'member',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('team_invitations', [
            'id' => $invitation->id,
        ]);
    }

    /** @test */
    public function itCanDeclineTeamInvitation(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $inviter = User/** @phpstan-ignore-line */ ::factory()->create();

        /** @phpstan-ignore-next-line method.nonObject */
        $invitation = $team->invitations()->create([
            'team_id' => $team->id,
            'user_id' => $inviter->id,
            'email' => 'invited@example.com',
            'role' => 'member',
        ]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $invitation->decline();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('team_invitations', [
            'id' => $invitation->id,
        ]);
    }

    /** @test */
    public function itCanCreateTeamMembership(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $membershipData = [
            'role' => 'member',
            'permissions' => ['read', 'write'],
            'joined_at' => now(),
        ];

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $membership = $team->memberships()->create([
            'team_id' => $team->id,
            'user_id' => $user->id,
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            'role' => $membershipData['role'],
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            'permissions' => $membershipData['permissions'],
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            'joined_at' => $membershipData['joined_at'],
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('memberships', [
            'id' => $membership->id,
            'team_id' => $team->id,
            'user_id' => $user->id,
            'role' => 'member',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals($team->id, $membership->team_id);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals($user->id, $membership->user_id);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('member', $membership->role);
    }

    /** @test */
    public function itCanUpdateTeamMembership(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $membership = $team->memberships()->create([
            'team_id' => $team->id,
            'user_id' => $user->id,
            'role' => 'member',
            'permissions' => ['read'],
        ]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $membership->update([
            'role' => 'admin',
            'permissions' => ['read', 'write', 'delete'],
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('memberships', [
            'id' => $membership->id,
            'role' => 'admin',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('admin', $membership->fresh()->role);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertContains('delete', $membership->fresh()->permissions);
    }

    /** @test */
    public function itCanRemoveTeamMembership(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $membership = $team->memberships()->create([
            'team_id' => $team->id,
            'user_id' => $user->id,
            'role' => 'member',
        ]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $membership->delete();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('memberships', [
            'id' => $membership->id,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($team->hasUser($user));
    }

    /** @test */
    public function itCanCreateTeamPermission(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        $permissionData = [
            'name' => 'patients.manage',
            'description' => 'Manage patients in the team',
            'guard_name' => 'web',
        ];

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $permission = $team->permissions()->create($permissionData);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('team_permissions', [
            'id' => $permission->id,
            'team_id' => $team->id,
            'name' => 'patients.manage',
            'description' => 'Manage patients in the team',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals($team->id, $permission->team_id);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('patients.manage', $permission->name);
    }

    /** @test */
    public function itCanAssignPermissionToTeamRole(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $permission = $team->permissions()->create([
            'name' => 'patients.manage',
            'description' => 'Manage patients',
        ]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $team->roles()->create([
            'name' => 'doctor',
            'permissions' => [$permission->id],
        ]);

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('team_roles', [
            'team_id' => $team->id,
            'name' => 'doctor',
        ]);
    }

    /** @test */
    public function itCanCheckTeamUserRole(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user->id, ['role' => 'admin']);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($team->userHasRole($user, 'admin'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($team->userHasRole($user, 'member'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals('admin', $team->getUserRole($user));
    }

    /** @test */
    public function itCanGetTeamMembers(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user1 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user2 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user3 = User/** @phpstan-ignore-line */ ::factory()->create();

        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user1->id, ['role' => 'admin']);
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user2->id, ['role' => 'member']);
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user3->id, ['role' => 'member']);

        // Act
        $members = $team->users;

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(3, $members);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($members->contains($user1));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($members->contains($user2));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($members->contains($user3));
    }

    /** @test */
    public function itCanGetTeamAdmins(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $admin1 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $admin2 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $member = User/** @phpstan-ignore-line */ ::factory()->create();

        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($admin1->id, ['role' => 'admin']);
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($admin2->id, ['role' => 'admin']);
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($member->id, ['role' => 'member']);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $admins = $team->users()->wherePivot('role', 'admin')->get();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(2, $admins);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($admins->contains($admin1));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($admins->contains($admin2));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($admins->contains($member));
    }

    /** @test */
    public function itCanGetTeamMembersByRole(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $doctor1 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $doctor2 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $nurse = User/** @phpstan-ignore-line */ ::factory()->create();

        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($doctor1->id, ['role' => 'doctor']);
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($doctor2->id, ['role' => 'doctor']);
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($nurse->id, ['role' => 'nurse']);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $doctors = $team->users()->wherePivot('role', 'doctor')->get();
        /** @phpstan-ignore-next-line method.nonObject */
        $nurses = $team->users()->wherePivot('role', 'nurse')->get();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(2, $doctors);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(1, $nurses);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($doctors->contains($doctor1));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($doctors->contains($doctor2));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($nurses->contains($nurse));
    }

    /** @test */
    public function itCanCheckTeamIsPersonal(): void
    {
        // Arrange
        /** @var Team */
        $personalTeam = Team/** @phpstan-ignore-line */ ::factory()->create(['personal_team' => true]);
        /** @var Team */
        $regularTeam = Team/** @phpstan-ignore-line */ ::factory()->create(['personal_team' => false]);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($personalTeam->personal_team);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($regularTeam->personal_team);
    }

    /** @test */
    public function itCanCheckTeamHasUserWithPermission(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        $permissions = ['read', 'write'];

        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user->id, [
            'role' => 'member',
            'permissions' => $permissions,
        ]);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($team->hasUserWithPermission($user, 'read'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($team->hasUserWithPermission($user, 'write'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($team->hasUserWithPermission($user, 'delete'));
    }

    /** @test */
    public function itCanGetTeamInvitations(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $inviter = User/** @phpstan-ignore-line */ ::factory()->create();

        /** @phpstan-ignore-next-line method.nonObject */
        $invitation1 = $team->invitations()->create([
            'team_id' => $team->id,
            'user_id' => $inviter->id,
            'email' => 'user1@example.com',
            'role' => 'member',
        ]);

        /** @phpstan-ignore-next-line method.nonObject */
        $invitation2 = $team->invitations()->create([
            'team_id' => $team->id,
            'user_id' => $inviter->id,
            'email' => 'user2@example.com',
            'role' => 'admin',
        ]);

        // Act
        $invitations = $team->invitations;

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(2, $invitations);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($invitations->contains($invitation1));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($invitations->contains($invitation2));
    }

    /** @test */
    public function itCanGetPendingTeamInvitations(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $inviter = User/** @phpstan-ignore-line */ ::factory()->create();

        /** @phpstan-ignore-next-line method.nonObject */
        $pendingInvitation = $team->invitations()->create([
            'team_id' => $team->id,
            'user_id' => $inviter->id,
            'email' => 'pending@example.com',
            'role' => 'member',
            'accepted_at' => null,
        ]);

        /** @phpstan-ignore-next-line method.nonObject */
        $acceptedInvitation = $team->invitations()->create([
            'team_id' => $team->id,
            'user_id' => $inviter->id,
            'email' => 'accepted@example.com',
            'role' => 'member',
            'accepted_at' => now(),
        ]);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $pendingInvitations = $team->invitations()->whereNull('accepted_at')->get();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertCount(1, $pendingInvitations);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($pendingInvitations->contains($pendingInvitation));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($pendingInvitations->contains($acceptedInvitation));
    }

    /** @test */
    public function itCanGetTeamStatistics(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user1 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user2 = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user3 = User/** @phpstan-ignore-line */ ::factory()->create();

        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user1->id, ['role' => 'admin']);
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user2->id, ['role' => 'member']);
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user3->id, ['role' => 'member']);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $totalMembers = $team->users()->count();
        /** @phpstan-ignore-next-line method.nonObject */
        $adminCount = $team->users()->wherePivot('role', 'admin')->count();
        /** @phpstan-ignore-next-line method.nonObject */
        $memberCount = $team->users()->wherePivot('role', 'member')->count();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(3, $totalMembers);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(1, $adminCount);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(2, $memberCount);
    }

    /** @test */
    public function itCanValidateTeamSlugUniqueness(): void
    {
        // Arrange
        Team/** @phpstan-ignore-line */ ::factory()->create(['slug' => 'unique-team']);

        // Act & Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->expectException(QueryException::class);

        Team::create([
            'name' => 'Another Team',
            'slug' => 'unique-team', // Same slug
            'personal_team' => false,
        ]);
    }

    /** @test */
    public function itCanHandleTeamSoftDelete(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $team->delete();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertSoftDeleted('teams', ['id' => $team->id]);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('teams', ['id' => $team->id]);
    }

    /** @test */
    public function itCanRestoreSoftDeletedTeam(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $team->delete();

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $team->restore();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertNotSoftDeleted('teams', ['id' => $team->id]);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('teams', ['id' => $team->id]);
    }

    /** @test */
    public function itCanForceDeleteTeam(): void
    {
        // Arrange
        /** @var Team */
        $team = Team/** @phpstan-ignore-line */ ::factory()->create();
        /** @var User */
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $team->users()->attach($user->id, ['role' => 'member']);

        // Act
        /** @phpstan-ignore-next-line method.nonObject */
        $team->forceDelete();

        // Assert
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('teams', ['id' => $team->id]);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseMissing('team_user', [
            'team_id' => $team->id,
            'user_id' => $user->id,
        ]);
    }
}
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
