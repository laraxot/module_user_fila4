<?php

declare(strict_types=1);

/**
 * @see https://github.com/rappasoft/laravel-authentication-log/blob/main/src/Listeners/LogoutListener.php
 */

namespace Modules\User\Listeners;

use Exception;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
use Illuminate\Support\Facades\Log;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Contracts\HasAuthentications;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\DeviceUser;
<<<<<<< HEAD
=======
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\DeviceUser;
use Modules\User\Contracts\HasAuthentications;
use Illuminate\Support\Facades\Log;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
use Modules\User\Traits\HasAuthentications as HasAuthenticationsTrait;

class LogoutListener
{
    protected Request $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        try {
            // Verifica se l'utente esiste prima di procedere
            if (!$event->user) {
                Log::warning('Tentativo di logout per un utente non autenticato');
                return;
            }

            $device = app(GetCurrentDeviceAction::class)->execute();

            // Aggiorna il pivot solo se abbiamo sia l'utente che il device
            if ($device) {
                try {
                    $pivot = DeviceUser::firstOrCreate([
                        'user_id' => $event->user->getAuthIdentifier(),
<<<<<<< HEAD
<<<<<<< HEAD
                        'device_id' => $device->id,
=======
                        'device_id' => $device->id
>>>>>>> fbc8f8e (.)
=======
                        'device_id' => $device->id,
>>>>>>> 6d20fbe (.)
                    ]);
                    $pivot->update(['logout_at' => now()]);
                } catch (Exception $e) {
                    Log::error('Errore durante l\'aggiornamento del pivot device-user', [
                        'error' => $e->getMessage(),
                        'user_id' => $event->user->getAuthIdentifier(),
<<<<<<< HEAD
<<<<<<< HEAD
                        'device_id' => $device->id,
=======
                        'device_id' => $device->id
>>>>>>> fbc8f8e (.)
=======
                        'device_id' => $device->id,
>>>>>>> 6d20fbe (.)
                    ]);
                }
            }

            // Gestione delle autenticazioni
            if ($event->user instanceof HasAuthentications) {
                try {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
                    $event
                        ->user
                        ->authentications()
                        ->create([
                            'type' => 'logout',
                            'ip_address' => request()->ip(),
                            'user_agent' => request()->userAgent(),
                        ]);
                } catch (Exception $e) {
                    Log::error('Errore durante la creazione del log di autenticazione', [
                        'error' => $e->getMessage(),
                        'user_id' => $event->user->getAuthIdentifier(),
<<<<<<< HEAD
=======
                    $event->user->authentications()->create([
                        'type' => 'logout',
                        'ip_address' => request()->ip(),
                        'user_agent' => request()->userAgent(),
                    ]);
                } catch (Exception $e) {
                    Log::error('Errore durante la creazione del log di autenticazione', [
                        'error' => $e->getMessage(),
                        'user_id' => $event->user->getAuthIdentifier()
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
                    ]);
                }
            }

            // Log dell'evento
            Log::info('Logout effettuato', [
                'user_id' => $event->user->getAuthIdentifier(),
                'device_id' => $device->id,
<<<<<<< HEAD
<<<<<<< HEAD
                'timestamp' => now(),
            ]);
=======
                'timestamp' => now()
            ]);

>>>>>>> fbc8f8e (.)
=======
                'timestamp' => now(),
            ]);
>>>>>>> 6d20fbe (.)
        } catch (Exception $e) {
            Log::error('Errore durante il logout', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
<<<<<<< HEAD
<<<<<<< HEAD
                'user_id' => $event->user->getAuthIdentifier(),
=======
                'user_id' => $event->user->getAuthIdentifier()
>>>>>>> fbc8f8e (.)
=======
                'user_id' => $event->user->getAuthIdentifier(),
>>>>>>> 6d20fbe (.)
            ]);
        }
    }

    /**
     * Rimuove i remember tokens.
     */
    public function forgetRememberTokens(Logout $event): void
    {
        if ($event->user && $event->user instanceof HasAuthentications) {
            try {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
                $event
                    ->user
                    ->authentications()
                    ->whereNotNull('remember_token')
                    ->update([
                        'remember_token' => null,
                    ]);
            } catch (Exception $e) {
                Log::error('Errore durante la rimozione dei remember tokens', [
                    'error' => $e->getMessage(),
                    'user_id' => $event->user->getAuthIdentifier(),
<<<<<<< HEAD
=======
                $event->user->authentications()->whereNotNull('remember_token')->update([
                    'remember_token' => null,
                ]);
            } catch (Exception $e) {
                Log::error('Errore durante la rimozione dei remember tokens', [
                    'error' => $e->getMessage(),
                    'user_id' => $event->user->getAuthIdentifier()
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
                ]);
            }
        }
    }
}
