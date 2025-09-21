<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

<<<<<<< HEAD
use Exception;
=======
<<<<<<< HEAD
use Exception;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;

/**
 * UpdateUserAction: Action generica per l'aggiornamento dei dati utente.
 *
<<<<<<< HEAD
=======
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> b93ef594b4 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;

/**
 * UpdateUserAction: Action generica per l'aggiornamento dei dati utente.
<<<<<<< HEAD
 * 
>>>>>>> a12f125f4a (.)
=======
 *
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use Illuminate\Validation\ValidationException;
use Modules\Xot\Actions\Cast\SafeStringCastAction;

/**
 * UpdateUserAction: Action generica per l'aggiornamento dei dati utente.
 * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * Questa action gestisce l'aggiornamento dei dati di base dell'utente.
 * Può essere estesa dai moduli specifici per aggiungere logica personalizzata.
 */
class UpdateUserAction
{
    use QueueableAction;
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    /**
     * Esegue l'aggiornamento dell'utente.
     *
     * @param Model $user L'utente da aggiornare
     * @param array<string, mixed> $data I dati da aggiornare
     * @return Model L'utente aggiornato
     *
     * @throws Exception Se l'aggiornamento fallisce
<<<<<<< HEAD
=======
=======
    /**
     * Esegue l'aggiornamento dell'utente.
     * 
     * @param Model $user L'utente da aggiornare
     * @param array<string, mixed> $data I dati da aggiornare
     * @return Model L'utente aggiornato
     * 
     * @throws \Exception Se l'aggiornamento fallisce
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function execute(Model $user, array $data): Model
    {
        try {
            DB::beginTransaction();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

            // Prepara i dati per l'aggiornamento
            $updateData = $this->prepareUpdateData($data);

            // Valida i dati specifici per l'aggiornamento
            $this->validateUpdateData($user, $updateData);

            // Aggiorna l'utente
            $user->fill($updateData);
            $user->save();

            // Esegue operazioni post-aggiornamento se necessarie
            $this->afterUpdate($user, $updateData);

            DB::commit();

            Log::info('Utente aggiornato con successo', [
                'user_id' => $user->getKey(),
                'updated_fields' => array_keys($updateData),
            ]);

            $updatedUser = $user->fresh();
            if (!($updatedUser instanceof Model)) {
                throw new Exception('Failed to refresh user model after update');
            }

            return $updatedUser;
        } catch (Exception $e) {
            DB::rollBack();

            Log::error("Errore nell'aggiornamento utente", [
                'user_id' => $user->getKey(),
                'error' => $e->getMessage(),
                'data' => $updateData ?? [],
            ]);

            throw $e;
        }
    }

    /**
     * Prepara i dati per l'aggiornamento rimuovendo campi non aggiornabili.
     *
<<<<<<< HEAD
=======
=======
            
=======

>>>>>>> b93ef594b4 (.)
            // Prepara i dati per l'aggiornamento
            $updateData = $this->prepareUpdateData($data);

            // Valida i dati specifici per l'aggiornamento
            $this->validateUpdateData($user, $updateData);

            // Aggiorna l'utente
            $user->fill($updateData);
            $user->save();

            // Esegue operazioni post-aggiornamento se necessarie
            $this->afterUpdate($user, $updateData);

            DB::commit();

            Log::info('Utente aggiornato con successo', [
                'user_id' => $user->getKey(),
                'updated_fields' => array_keys($updateData),
            ]);

            $updatedUser = $user->fresh();
            if (!($updatedUser instanceof Model)) {
                throw new Exception('Failed to refresh user model after update');
            }

            return $updatedUser;
        } catch (Exception $e) {
            DB::rollBack();

            Log::error("Errore nell'aggiornamento utente", [
                'user_id' => $user->getKey(),
                'error' => $e->getMessage(),
                'data' => $updateData ?? [],
            ]);

            throw $e;
        }
    }

    /**
     * Prepara i dati per l'aggiornamento rimuovendo campi non aggiornabili.
<<<<<<< HEAD
     * 
>>>>>>> a12f125f4a (.)
=======
     *
>>>>>>> b93ef594b4 (.)
=======
            
            // Prepara i dati per l'aggiornamento
            $updateData = $this->prepareUpdateData($data);
            
            // Valida i dati specifici per l'aggiornamento
            $this->validateUpdateData($user, $updateData);
            
            // Aggiorna l'utente
            $user->fill($updateData);
            $user->save();
            
            // Esegue operazioni post-aggiornamento se necessarie
            $this->afterUpdate($user, $updateData);
            
            DB::commit();
            
            Log::info("Utente aggiornato con successo", [
                'user_id' => $user->getKey(),
                'updated_fields' => array_keys($updateData)
            ]);
            
            $updatedUser = $user->fresh();
            if (!$updatedUser instanceof Model) {
                throw new \Exception('Failed to refresh user model after update');
            }
            
            return $updatedUser;
            
        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error("Errore nell'aggiornamento utente", [
                'user_id' => $user->getKey(),
                'error' => $e->getMessage(),
                'data' => $updateData ?? []
            ]);
            
            throw $e;
        }
    }
    
    /**
     * Prepara i dati per l'aggiornamento rimuovendo campi non aggiornabili.
     * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    protected function prepareUpdateData(array $data): array
    {
        // Rimuovi campi che non dovrebbero essere aggiornati direttamente
        $excludeFields = [
            'id',
            'email_verified_at',
            'remember_token',
            'created_at',
            'updated_at',
        ];
<<<<<<< HEAD

        $updateData = array_diff_key($data, array_flip($excludeFields));

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

        $updateData = array_diff_key($data, array_flip($excludeFields));

=======
        
        $updateData = array_diff_key($data, array_flip($excludeFields));
        
>>>>>>> a12f125f4a (.)
=======

        $updateData = array_diff_key($data, array_flip($excludeFields));

>>>>>>> b93ef594b4 (.)
=======
        
        $updateData = array_diff_key($data, array_flip($excludeFields));
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Gestione speciale per la password
        if (isset($updateData['password'])) {
            if (empty($updateData['password'])) {
                // Se la password è vuota, rimuovila dai dati di aggiornamento
                unset($updateData['password']);
            } else {
                // Hash della password se presente
                $updateData['password'] = Hash::make(SafeStringCastAction::cast($updateData['password']));
            }
        }
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Gestione dell'email per evitare duplicati
        if (isset($updateData['email'])) {
            $email = SafeStringCastAction::cast($updateData['email']);
            $updateData['email'] = strtolower($email);
        }
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        return $updateData;
    }

    /**
     * Valida i dati di aggiornamento.
     *
     * @param Model $user
     * @param array<string, mixed> $data
     * @return void
     *
<<<<<<< HEAD
=======
=======
        
=======

>>>>>>> b93ef594b4 (.)
        return $updateData;
    }

    /**
     * Valida i dati di aggiornamento.
     *
     * @param Model $user
     * @param array<string, mixed> $data
     * @return void
<<<<<<< HEAD
     * 
>>>>>>> a12f125f4a (.)
=======
     *
>>>>>>> b93ef594b4 (.)
=======
        
        return $updateData;
    }
    
    /**
     * Valida i dati di aggiornamento.
     * 
     * @param Model $user
     * @param array<string, mixed> $data
     * @return void
     * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @throws ValidationException
     */
    protected function validateUpdateData(Model $user, array $data): void
    {
        // Validazione email univoca
        if (isset($data['email'])) {
<<<<<<< HEAD
            $existingUser = $user
                ->newQuery()
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            $existingUser = $user
                ->newQuery()
=======
            $existingUser = $user->newQuery()
>>>>>>> a12f125f4a (.)
=======
            $existingUser = $user
                ->newQuery()
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                ->where('email', $data['email'])
                ->where('id', '!=', $user->getKey())
                ->first();

            if ($existingUser) {
                throw ValidationException::withMessages([
<<<<<<< HEAD
                    'email' => __('user::validation.email_already_taken'),
=======
<<<<<<< HEAD
<<<<<<< HEAD
                    'email' => __('user::validation.email_already_taken'),
=======
                    'email' => __('user::validation.email_already_taken')
>>>>>>> a12f125f4a (.)
=======
                    'email' => __('user::validation.email_already_taken'),
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
                ]);
            }
        }

        // Validazioni aggiuntive possono essere aggiunte qui
        // o nelle classi che estendono questa action
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    /**
     * Operazioni da eseguire dopo l'aggiornamento.
     * Può essere sovrascritto dalle classi che estendono questa action.
     *
<<<<<<< HEAD
=======
=======
=======
            $existingUser = $user->newQuery()
                ->where('email', $data['email'])
                ->where('id', '!=', $user->getKey())
                ->first();
                
            if ($existingUser) {
                throw ValidationException::withMessages([
                    'email' => __('user::validation.email_already_taken')
                ]);
            }
        }
        
        // Validazioni aggiuntive possono essere aggiunte qui
        // o nelle classi che estendono questa action
    }
>>>>>>> origin/develop
    
    /**
     * Operazioni da eseguire dopo l'aggiornamento.
     * Può essere sovrascritto dalle classi che estendono questa action.
     * 
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

    /**
     * Operazioni da eseguire dopo l'aggiornamento.
     * Può essere sovrascritto dalle classi che estendono questa action.
     *
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @param Model $user
     * @param array<string, mixed> $data
     * @return void
     */
    protected function afterUpdate(Model $user, array $data): void
    {
        // Implementazione di default vuota
        // Le classi derivate possono sovrascrivere questo metodo per:
        // - Inviare notifiche
        // - Aggiornare cache
        // - Registrare log di audit
        // - Gestire relazioni
    }
<<<<<<< HEAD
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
} 
>>>>>>> a12f125f4a (.)
=======
}
>>>>>>> b93ef594b4 (.)
=======
} 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
