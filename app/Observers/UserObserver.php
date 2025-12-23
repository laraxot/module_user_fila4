<?php

declare(strict_types=1);

namespace Modules\User\Observers;

<<<<<<< HEAD
<<<<<<< HEAD
use Throwable;
=======
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop
use Illuminate\Support\Facades\Log;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Webmozart\Assert\Assert;

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
        if (null !== $user->personalTeam()) {
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
<<<<<<< HEAD
<<<<<<< HEAD
            $user->current_team_id = is_int($personalTeam->id) ? $personalTeam->id : (int) $personalTeam->id;
=======
            $teamId = $personalTeam->id;
            $user->current_team_id = is_numeric($teamId) ? (int) $teamId : null;
>>>>>>> 220cf97b (.)
            $user->saveQuietly(); // Evita di triggerare eventi ricorsivi
        } catch (Throwable $e) {
=======
            $teamId = $personalTeam->id;
            $user->current_team_id = is_numeric($teamId) ? (int) $teamId : null;
            $user->saveQuietly(); // Evita di triggerare eventi ricorsivi
        } catch (\Throwable $e) {
>>>>>>> laraxot/develop
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

        if ($personalTeam instanceof Team) {
            try {
                $personalTeam->delete();
<<<<<<< HEAD
<<<<<<< HEAD
            } catch (Throwable $e) {
=======
            } catch (\Throwable $e) {
>>>>>>> 220cf97b (.)
=======
            } catch (\Throwable $e) {
>>>>>>> laraxot/develop
                Log::error('Failed to delete personal team for user', [
                    'user_id' => $user->id,
                    'team_id' => $personalTeam->id,
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }
}
