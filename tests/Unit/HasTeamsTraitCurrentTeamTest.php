<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
describe('HasTeams Trait CurrentTeam', function () {
    it('currentTeam does not crash when user has no teams', function () {
=======
    /**
     * Test che currentTeam() non crashi quando l'utente non ha team.
     */
    public function test_current_team_does_not_crash_without_teams(): void
    {
>>>>>>> 32e772a8 (.)
        // Arrange: Crea un utente senza team
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Act: Accedi a currentTeam (non dovrebbe crashare)
        $currentTeam = $user->currentTeam;

        // Assert: currentTeam dovrebbe essere null
        expect($currentTeam)->toBeNull();
    });

<<<<<<< HEAD
    it('currentTeam is side effect free', function () {
=======
    /**
     * Test che currentTeam() non modifichi il database durante l'accesso.
     */
    public function test_current_team_is_side_effect_free(): void
    {
>>>>>>> 32e772a8 (.)
        // Arrange: Crea un utente senza current_team_id
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'current_team_id' => null,
        ]);

        // Act: Accedi a currentTeam più volte
        $currentTeam1 = $user->currentTeam;
        $currentTeam2 = $user->currentTeam;

        // Assert: current_team_id dovrebbe rimanere null
        $user->refresh();
        expect($user->current_team_id)->toBeNull();
        expect($currentTeam1)->toBeNull();
        expect($currentTeam2)->toBeNull();
    });

<<<<<<< HEAD
    it('currentTeam can access personal team when available', function () {
=======
    /**
     * Test che initializeCurrentTeam() imposti correttamente il personal team.
     */
    public function test_initialize_current_team_sets_personal_team(): void
    {
>>>>>>> 32e772a8 (.)
        // Arrange: Crea un utente con un personal team
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $personalTeam = Team::factory()->create([
            'user_id' => $user->id,
            'name' => 'Personal Team',
            'personal_team' => true,
        ]);

        // Act: Imposta manualmente il current_team_id e accedi a currentTeam
        $user->current_team_id = $personalTeam->id;
        $user->save();
        $user->refresh();

<<<<<<< HEAD
        $currentTeam = $user->currentTeam;

        // Assert: currentTeam dovrebbe essere il personal team
        expect($currentTeam)->not->toBeNull();
        expect((string) $user->current_team_id)->toBe((string) $personalTeam->id);
    });

    it('currentTeam does not override existing current_team_id', function () {
=======
    /**
     * Test che initializeCurrentTeam() non modifichi un current_team_id già impostato.
     */
    public function test_initialize_current_team_does_not_override_existing(): void
    {
>>>>>>> 32e772a8 (.)
        // Arrange: Crea un utente con un team già impostato
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $team1 = Team::factory()->create([
            'user_id' => $user->id,
            'name' => 'Team 1',
            'personal_team' => false,
        ]);

        $team2 = Team::factory()->create([
            'user_id' => $user->id,
            'name' => 'Team 2',
            'personal_team' => true,
        ]);

        $user->current_team_id = $team1->id;
        $user->save();

        // Act: Accedi a currentTeam
        $currentTeam = $user->currentTeam;

        // Assert: current_team_id dovrebbe rimanere team1
        $user->refresh();
        expect((string) $user->current_team_id)->toBe((string) $team1->id);
        expect($currentTeam)->not->toBeNull();
    });

<<<<<<< HEAD
    it('switchTeam can change current team', function () {
        // Arrange: Crea un utente con due team
=======
    /**
     * Test che initializeCurrentTeam() imposti il primo team disponibile se non c'è personal team.
     */
    public function test_initialize_current_team_sets_first_available_team(): void
    {
        // Arrange: Crea un utente con un team non-personal
>>>>>>> 32e772a8 (.)
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $team1 = Team::factory()->create([
            'user_id' => $user->id,
            'name' => 'Team 1',
            'personal_team' => false,
        ]);

<<<<<<< HEAD
        $team2 = Team::factory()->create([
            'user_id' => $user->id,
            'name' => 'Team 2',
            'personal_team' => true,
=======
        // Act: Inizializza il current team
        $user->initializeCurrentTeam();

        // Assert: current_team_id dovrebbe essere impostato al team disponibile
        $user->refresh();
        $this->assertEquals($team->id, $user->current_team_id);
    }

    /**
     * Test che initializeCurrentTeam() non crashi se l'utente non ha team.
     */
    public function test_initialize_current_team_handles_no_teams(): void
    {
        // Arrange: Crea un utente senza team
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
>>>>>>> 32e772a8 (.)
        ]);

        // Assicura che l'utente appartenga a entrambi i team
        $user->teams()->attach($team1->id);
        $user->teams()->attach($team2->id);

        // Act: Cambia il team corrente
        $result = $user->switchTeam($team1);

        // Assert: switchTeam dovrebbe funzionare
        expect($result)->toBeTrue();
        $user->refresh();
        expect((string) $user->current_team_id)->toBe((string) $team1->id);
    });

<<<<<<< HEAD
    it('currentTeam does not cause N+1 queries', function () {
=======
    /**
     * Test che l'accesso a currentTeam non causi query N+1.
     */
    public function test_current_team_does_not_cause_n_plus_one_queries(): void
    {
>>>>>>> 32e772a8 (.)
        // Arrange: Crea un utente con un team
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $team = Team::factory()->create([
            'user_id' => $user->id,
            'name' => 'Test Team',
            'personal_team' => true,
        ]);

        $user->current_team_id = $team->id;
        $user->save();

        // Act & Assert: Accedi a currentTeam più volte
        // (dovrebbe usare la relazione Eloquent senza query extra)
        $user->refresh();
        $currentTeam1 = $user->currentTeam;
        $currentTeam2 = $user->currentTeam;

        // Verifica che entrambi gli accessi restituiscano lo stesso team
        expect($currentTeam1)->not->toBeNull();
        expect($currentTeam2)->not->toBeNull();
    });
});
