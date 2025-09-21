<?php

declare(strict_types=1);

/**
 * @see https://github.com/rappasoft/laravel-authentication-log/blob/main/src/Listeners/LogoutListener.php
 */

namespace Modules\User\Listeners;

<<<<<<< HEAD
use Exception;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
=======
<<<<<<< HEAD
use Exception;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Support\Facades\Log;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Contracts\HasAuthentications;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\DeviceUser;
<<<<<<< HEAD
=======
=======
=======
use Illuminate\Support\Facades\Log;
>>>>>>> b93ef594b4 (.)
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Contracts\HasAuthentications;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\DeviceUser;
<<<<<<< HEAD
use Modules\User\Contracts\HasAuthentications;
use Illuminate\Support\Facades\Log;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\DeviceUser;
use Modules\User\Contracts\HasAuthentications;
use Illuminate\Support\Facades\Log;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
                        'device_id' => $device->id,
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                        'device_id' => $device->id,
=======
                        'device_id' => $device->id
>>>>>>> a12f125f4a (.)
=======
                        'device_id' => $device->id,
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                    ]);
                    $pivot->update(['logout_at' => now()]);
                } catch (Exception $e) {
                    Log::error('Errore durante l\'aggiornamento del pivot device-user', [
                        'error' => $e->getMessage(),
                        'user_id' => $event->user->getAuthIdentifier(),
<<<<<<< HEAD
                        'device_id' => $device->id,
=======
<<<<<<< HEAD
<<<<<<< HEAD
                        'device_id' => $device->id,
=======
                        'device_id' => $device->id
>>>>>>> a12f125f4a (.)
=======
                        'device_id' => $device->id,
>>>>>>> b93ef594b4 (.)
=======
                        'device_id' => $device->id
                    ]);
                    $pivot->update(['logout_at' => now()]);
                } catch (\Exception $e) {
                    Log::error('Errore durante l\'aggiornamento del pivot device-user', [
                        'error' => $e->getMessage(),
                        'user_id' => $event->user->getAuthIdentifier(),
                        'device_id' => $device->id
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                    ]);
                }
            }

            // Gestione delle autenticazioni
            if ($event->user instanceof HasAuthentications) {
                try {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                    $event
                        ->user
                        ->authentications()
                        ->create([
                            'type' => 'logout',
                            'ip_address' => request()->ip(),
                            'user_agent' => request()->userAgent(),
                        ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                } catch (Exception $e) {
                    Log::error('Errore durante la creazione del log di autenticazione', [
                        'error' => $e->getMessage(),
                        'user_id' => $event->user->getAuthIdentifier(),
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
                    $event->user->authentications()->create([
                        'type' => 'logout',
                        'ip_address' => request()->ip(),
                        'user_agent' => request()->userAgent(),
                    ]);
<<<<<<< HEAD
                } catch (Exception $e) {
                    Log::error('Errore durante la creazione del log di autenticazione', [
                        'error' => $e->getMessage(),
                        'user_id' => $event->user->getAuthIdentifier()
>>>>>>> a12f125f4a (.)
=======
                } catch (Exception $e) {
                    Log::error('Errore durante la creazione del log di autenticazione', [
                        'error' => $e->getMessage(),
                        'user_id' => $event->user->getAuthIdentifier(),
>>>>>>> b93ef594b4 (.)
=======
                } catch (\Exception $e) {
                    Log::error('Errore durante la creazione del log di autenticazione', [
                        'error' => $e->getMessage(),
                        'user_id' => $event->user->getAuthIdentifier()
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                    ]);
                }
            }

            // Log dell'evento
            Log::info('Logout effettuato', [
                'user_id' => $event->user->getAuthIdentifier(),
                'device_id' => $device->id,
<<<<<<< HEAD
                'timestamp' => now(),
            ]);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'timestamp' => now(),
            ]);
=======
                'timestamp' => now()
            ]);

>>>>>>> a12f125f4a (.)
=======
                'timestamp' => now(),
            ]);
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        } catch (Exception $e) {
            Log::error('Errore durante il logout', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
<<<<<<< HEAD
                'user_id' => $event->user->getAuthIdentifier(),
=======
<<<<<<< HEAD
<<<<<<< HEAD
                'user_id' => $event->user->getAuthIdentifier(),
=======
                'user_id' => $event->user->getAuthIdentifier()
>>>>>>> a12f125f4a (.)
=======
                'user_id' => $event->user->getAuthIdentifier(),
>>>>>>> b93ef594b4 (.)
=======
                'timestamp' => now()
            ]);

        } catch (\Exception $e) {
            Log::error('Errore durante il logout', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => $event->user->getAuthIdentifier()
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                $event
                    ->user
                    ->authentications()
                    ->whereNotNull('remember_token')
                    ->update([
                        'remember_token' => null,
                    ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            } catch (Exception $e) {
                Log::error('Errore durante la rimozione dei remember tokens', [
                    'error' => $e->getMessage(),
                    'user_id' => $event->user->getAuthIdentifier(),
<<<<<<< HEAD
=======
=======
                $event->user->authentications()->whereNotNull('remember_token')->update([
                    'remember_token' => null,
                ]);
            } catch (Exception $e) {
                Log::error('Errore durante la rimozione dei remember tokens', [
                    'error' => $e->getMessage(),
                    'user_id' => $event->user->getAuthIdentifier()
>>>>>>> a12f125f4a (.)
=======
            } catch (Exception $e) {
                Log::error('Errore durante la rimozione dei remember tokens', [
                    'error' => $e->getMessage(),
                    'user_id' => $event->user->getAuthIdentifier(),
>>>>>>> b93ef594b4 (.)
=======
                $event->user->authentications()->whereNotNull('remember_token')->update([
                    'remember_token' => null,
                ]);
            } catch (\Exception $e) {
                Log::error('Errore durante la rimozione dei remember tokens', [
                    'error' => $e->getMessage(),
                    'user_id' => $event->user->getAuthIdentifier()
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                ]);
            }
        }
    }
}
