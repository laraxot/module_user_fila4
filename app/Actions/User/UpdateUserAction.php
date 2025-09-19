<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

use Exception;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
 * Questa action gestisce l'aggiornamento dei dati di base dell'utente.
 * Può essere estesa dai moduli specifici per aggiungere logica personalizzata.
 */
class UpdateUserAction
{
    use QueueableAction;
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
    /**
     * Esegue l'aggiornamento dell'utente.
     *
     * @param Model $user L'utente da aggiornare
     * @param array<string, mixed> $data I dati da aggiornare
     * @return Model L'utente aggiornato
     *
     * @throws Exception Se l'aggiornamento fallisce
     */
    public function execute(Model $user, array $data): Model
    {
        try {
            DB::beginTransaction();
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

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
                throw new Exception('Failed to refresh user model after update');
            }
            
            return $updatedUser;
            
        } catch (Exception $e) {
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
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD

        $updateData = array_diff_key($data, array_flip($excludeFields));

=======
        
        $updateData = array_diff_key($data, array_flip($excludeFields));
        
>>>>>>> fbc8f8e (.)
=======

        $updateData = array_diff_key($data, array_flip($excludeFields));

>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        // Gestione dell'email per evitare duplicati
        if (isset($updateData['email'])) {
            $email = SafeStringCastAction::cast($updateData['email']);
            $updateData['email'] = strtolower($email);
        }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

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
        
        return $updateData;
    }
    
    /**
     * Valida i dati di aggiornamento.
     * 
     * @param Model $user
     * @param array<string, mixed> $data
     * @return void
     * 
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
     * @throws ValidationException
     */
    protected function validateUpdateData(Model $user, array $data): void
    {
        // Validazione email univoca
        if (isset($data['email'])) {
<<<<<<< HEAD
<<<<<<< HEAD
            $existingUser = $user
                ->newQuery()
=======
            $existingUser = $user->newQuery()
>>>>>>> fbc8f8e (.)
=======
            $existingUser = $user
                ->newQuery()
>>>>>>> 6d20fbe (.)
                ->where('email', $data['email'])
                ->where('id', '!=', $user->getKey())
                ->first();

            if ($existingUser) {
                throw ValidationException::withMessages([
<<<<<<< HEAD
<<<<<<< HEAD
                    'email' => __('user::validation.email_already_taken'),
=======
                    'email' => __('user::validation.email_already_taken')
>>>>>>> fbc8f8e (.)
=======
                    'email' => __('user::validation.email_already_taken'),
>>>>>>> 6d20fbe (.)
                ]);
            }
        }

        // Validazioni aggiuntive possono essere aggiunte qui
        // o nelle classi che estendono questa action
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

    /**
     * Operazioni da eseguire dopo l'aggiornamento.
     * Può essere sovrascritto dalle classi che estendono questa action.
     *
<<<<<<< HEAD
=======
    
    /**
     * Operazioni da eseguire dopo l'aggiornamento.
     * Può essere sovrascritto dalle classi che estendono questa action.
     * 
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
}
=======
} 
>>>>>>> fbc8f8e (.)
=======
}
>>>>>>> 6d20fbe (.)
