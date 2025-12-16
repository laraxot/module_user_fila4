<?php

declare(strict_types=1);

namespace Modules\User\Observers;

use Throwable;
use Illuminate\Support\Facades\Log;
use Modules\User\Models\Team;
use Modules\User\Models\User;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
<<<<<<< HEAD
<<<<<<< HEAD
use Throwable;
=======
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
>>>>>>> e4cd89fa (.)

/**
 * Observer per gestire eventi del modello User.
 *
 * Questo observer gestisce la creazione automatica del personal team
 * quando viene creato un nuovo utente, se configurato.
 */
class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * Crea automaticamente un personal team per l'utente se configurato.
     */
    public function created(User $user): void
    {
        // Verifica se la creazione automatica del personal team è abilitata
        $createPersonalTeam = config('user.create_personal_team', false);

        if (! $createPersonalTeam) {
            return;
        }

        // Evita di creare team duplicati
        if ($user->personalTeam() !== null) {
            return;
        }

        try {
            // Crea il personal team
            $personalTeam = Team::create([
                'user_id' => $user->id,
                'name' => $user->name."'s Team",
                'personal_team' => true,
            ]);

            Assert::isInstanceOf($personalTeam, Team::class);

            // Imposta come current team
            $teamId = $personalTeam->id;
            $user->current_team_id = is_numeric($teamId) ? (int) $teamId : null;
            $user->saveQuietly(); // Evita di triggerare eventi ricorsivi
        } catch (Throwable $e) {
            // Log dell'errore ma non bloccare la creazione dell'utente
            Log::error('Failed to create personal team for user', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the User "deleting" event.
     *
     * Gestisce la pulizia dei team quando un utente viene eliminato.
     */
    public function deleting(User $user): void
    {
        // Se l'utente ha un personal team, eliminalo
        $personalTeam = $user->personalTeam();

<<<<<<< HEAD
        if ($personalTeam instanceof Team) {
=======
        if ($personalTeam !== null) {
>>>>>>> e4cd89fa (.)
            try {
                $personalTeam->delete();
            } catch (Throwable $e) {
                Log::error('Failed to delete personal team for user', [
                    'user_id' => $user->id,
                    'team_id' => $personalTeam->id,
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }
}
