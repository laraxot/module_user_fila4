<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use InvalidArgumentException;
use RuntimeException;
use ReflectionClass;
use ReflectionException;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Models\SocialiteUser;
use Spatie\QueueableAction\QueueableAction;

class RetrieveSocialiteUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
<<<<<<< HEAD
    public function execute(string $provider, SocialiteUserContract $user): null|SocialiteUser
    {
        if (empty($provider)) {
            throw new InvalidArgumentException('Il provider non può essere vuoto');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function execute(string $provider, SocialiteUserContract $user): null|SocialiteUser
=======
    public function execute(string $provider, SocialiteUserContract $user): ?SocialiteUser
>>>>>>> a12f125f4a (.)
=======
    public function execute(string $provider, SocialiteUserContract $user): null|SocialiteUser
>>>>>>> b93ef594b4 (.)
    {
        if (empty($provider)) {
            throw new InvalidArgumentException('Il provider non può essere vuoto');
=======
    public function execute(string $provider, SocialiteUserContract $user): ?SocialiteUser
    {
        if (empty($provider)) {
            throw new \InvalidArgumentException('Il provider non può essere vuoto');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        $providerId = $user->getId();
        if (!is_string($providerId) && !is_int($providerId)) {
<<<<<<< HEAD
            throw new RuntimeException('L\'ID del provider deve essere una stringa o un intero');
=======
<<<<<<< HEAD
            throw new RuntimeException('L\'ID del provider deve essere una stringa o un intero');
=======
            throw new \RuntimeException('L\'ID del provider deve essere una stringa o un intero');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        $res = SocialiteUser::query()
            ->with(['user'])
            ->where('provider', $provider)
            ->where('provider_id', $providerId)
            ->first();

        if ($res === null) {
            return null;
        }

        // Accesso sicuro alla proprietà token in modo type-safe
        $token = '';
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // Utilizzo ReflectionClass per accedere in modo sicuro alle proprietà/metodi
        try {
            $reflection = new ReflectionClass($user);

<<<<<<< HEAD
=======
=======
        
        // Utilizzo ReflectionClass per accedere in modo sicuro alle proprietà/metodi
        try {
            $reflection = new ReflectionClass($user);
            
>>>>>>> a12f125f4a (.)
=======

        // Utilizzo ReflectionClass per accedere in modo sicuro alle proprietà/metodi
        try {
            $reflection = new ReflectionClass($user);

>>>>>>> b93ef594b4 (.)
=======
        
        // Utilizzo ReflectionClass per accedere in modo sicuro alle proprietà/metodi
        try {
            $reflection = new \ReflectionClass($user);
            
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Prova prima i metodi standard
            if ($reflection->hasMethod('getToken')) {
                $method = $reflection->getMethod('getToken');
                $method->setAccessible(true);
                $tokenValue = $method->invoke($user);
                if (is_string($tokenValue)) {
                    $token = $tokenValue;
                }
            } elseif ($reflection->hasMethod('token')) {
                $method = $reflection->getMethod('token');
                $method->setAccessible(true);
                $tokenValue = $method->invoke($user);
                if (is_string($tokenValue)) {
                    $token = $tokenValue;
                }
<<<<<<< HEAD
            } elseif ($reflection->hasProperty('token')) { // Prova poi ad accedere alla proprietà
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            } elseif ($reflection->hasProperty('token')) { // Prova poi ad accedere alla proprietà
=======
            } 
            // Prova poi ad accedere alla proprietà
            elseif ($reflection->hasProperty('token')) {
>>>>>>> a12f125f4a (.)
=======
            } elseif ($reflection->hasProperty('token')) { // Prova poi ad accedere alla proprietà
>>>>>>> b93ef594b4 (.)
=======
            } 
            // Prova poi ad accedere alla proprietà
            elseif ($reflection->hasProperty('token')) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                $property = $reflection->getProperty('token');
                $property->setAccessible(true);
                $tokenValue = $property->getValue($user);
                if (is_string($tokenValue)) {
                    $token = $tokenValue;
                }
<<<<<<< HEAD
            } elseif (isset($user->token) && is_string($user->token)) { // Fallback su accesso diretto con var_export
                $token = $user->token;
            }
        } catch (ReflectionException $e) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            } elseif (isset($user->token) && is_string($user->token)) { // Fallback su accesso diretto con var_export
=======
            }
            // Fallback su accesso diretto con var_export
            elseif (isset($user->token) && is_string($user->token)) {
>>>>>>> a12f125f4a (.)
=======
            } elseif (isset($user->token) && is_string($user->token)) { // Fallback su accesso diretto con var_export
>>>>>>> b93ef594b4 (.)
                $token = $user->token;
            }
        } catch (ReflectionException $e) {
=======
            }
            // Fallback su accesso diretto con var_export
            elseif (isset($user->token) && is_string($user->token)) {
                $token = $user->token;
            }
        } catch (\ReflectionException $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Fallback silenzioso
        }

        if (empty($token)) {
            // Se non riusciamo a ottenere un token valido, utilizziamo un valore predefinito
            $token = 'no_token_' . time();
        }

        $res->update([
            'token' => $token,
        ]);

        return $res;
    }
}
