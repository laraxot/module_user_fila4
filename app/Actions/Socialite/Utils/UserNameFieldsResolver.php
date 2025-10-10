<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite\Utils;

<<<<<<< HEAD
use InvalidArgumentException;
use ReflectionClass;
use ReflectionException;
=======
<<<<<<< HEAD
use InvalidArgumentException;
use ReflectionClass;
use ReflectionException;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Laravel\Socialite\Contracts\User;

/**
 * Classe che risolve e normalizza i campi del nome utente da dati di provider Socialite.
 */
<<<<<<< HEAD
final readonly class UserNameFieldsResolver
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
final readonly class UserNameFieldsResolver
=======
final class UserNameFieldsResolver
>>>>>>> a12f125f4a (.)
=======
final readonly class UserNameFieldsResolver
>>>>>>> b93ef594b4 (.)
=======
final class UserNameFieldsResolver
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    private const NAME_SEARCH = 'before';

    private const SURNAME_SEARCH = 'after';

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public  null|string $name;

    public  null|string $first_name;

    public  null|string $last_name;
<<<<<<< HEAD
=======
=======
    public readonly ?string $name;
=======
    public  null|string $name;
>>>>>>> b93ef594b4 (.)

    public  null|string $first_name;

<<<<<<< HEAD
    public readonly ?string $last_name;
>>>>>>> a12f125f4a (.)
=======
    public  null|string $last_name;
>>>>>>> b93ef594b4 (.)
=======
    public readonly ?string $name;

    public readonly ?string $first_name;

    public readonly ?string $last_name;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    public function __construct(User $user)
    {
        $this->name = $this->resolveName($user);
        $this->first_name = $this->resolveName($user);
        $this->last_name = $this->resolveSurname($user);
    }

    public static function make(User $user): self
    {
        return new self($user);
    }

    private function resolveName(User $idpUser): string
    {
        return $this->resolveNameFields($idpUser, self::NAME_SEARCH);
    }

    private function resolveSurname(User $idpUser): string
    {
        return $this->resolveNameFields($idpUser, self::SURNAME_SEARCH);
    }

    /**
     * @param  string $searchMethod  use self constants (NAME_SEARCH, SURNAME_SEARCH)
     */
    private function resolveNameFields(User $idpUser, string $searchMethod): string
    {
<<<<<<< HEAD
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH], strict: true)) {
            throw new InvalidArgumentException('Metodo di ricerca non valido');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH], strict: true)) {
=======
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH])) {
>>>>>>> a12f125f4a (.)
=======
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH], strict: true)) {
>>>>>>> b93ef594b4 (.)
            throw new InvalidArgumentException('Metodo di ricerca non valido');
=======
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH])) {
            throw new \InvalidArgumentException('Metodo di ricerca non valido');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        $name = $idpUser->getName();
        if (!is_string($name) || empty($name)) {
            return '';
        }

        $nameSection = $this->resolveNameFieldByNameAttributeAnalysis($name, $searchMethod);

        if ($nameSection->isNotEmpty()) {
            return $nameSection->toString();
        }

        // Ottenere i dati raw in modo sicuro attraverso reflection
        $raw = [];
        try {
<<<<<<< HEAD
            $reflection = new ReflectionClass($idpUser);
=======
<<<<<<< HEAD
            $reflection = new ReflectionClass($idpUser);
=======
            $reflection = new \ReflectionClass($idpUser);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            if ($reflection->hasMethod('getRaw')) {
                $method = $reflection->getMethod('getRaw');
                $method->setAccessible(true);
                $rawValue = $method->invoke($idpUser);
                if (is_array($rawValue)) {
                    $raw = $rawValue;
                }
            } elseif ($reflection->hasProperty('user')) {
                $property = $reflection->getProperty('user');
                $property->setAccessible(true);
                $userData = $property->getValue($idpUser);
                if (is_array($userData)) {
                    $raw = $userData;
                }
            }
<<<<<<< HEAD
        } catch (ReflectionException $e) {
=======
<<<<<<< HEAD
        } catch (ReflectionException $e) {
=======
        } catch (\ReflectionException $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Fallback silenzioso
        }

        // Tenta di ottenere un nome dai dati raw
        $nameField = '';
        if (isset($raw['name']) && is_string($raw['name']) && !empty($raw['name'])) {
            $nameField = $raw['name'];
        }

        if (empty($nameField)) {
            return '';
        }

        $nameSection = $this->resolveNameFieldByNameAttributeAnalysis($nameField, $searchMethod);
        if (!$nameSection->isNotEmpty()) {
            // If both sections were empty, try the "hardest way"
            // by analyzing email address
            $email = $idpUser->getEmail();
            if (!is_string($email) || empty($email)) {
                return '';
            }

            return Str::of($email)
                ->trim()
                ->before('@')
                ->$searchMethod('.') // If no point is available, the whole string should be returned
                ->trim()
                ->title()
                ->toString();
        }

        if (filter_var($nameSection->toString(), FILTER_VALIDATE_EMAIL)) {
            // If both sections were empty, try the "hardest way"
            // by analyzing email address
            $email = $idpUser->getEmail();
            if (!is_string($email) || empty($email)) {
                return '';
            }

            return Str::of($email)
                ->trim()
                ->before('@')
                ->$searchMethod('.') // If no point is available, the whole string should be returned
                ->trim()
                ->title()
                ->toString();
        }

        return $nameSection->toString();
    }

    private function resolveNameFieldByNameAttributeAnalysis(string $nameField, string $searchMethod): Stringable
    {
        if (empty($nameField)) {
            return Str::of('');
        }

<<<<<<< HEAD
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH], strict: true)) {
            throw new InvalidArgumentException('Metodo di ricerca non valido');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH], strict: true)) {
=======
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH])) {
>>>>>>> a12f125f4a (.)
=======
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH], strict: true)) {
>>>>>>> b93ef594b4 (.)
            throw new InvalidArgumentException('Metodo di ricerca non valido');
=======
        if (!in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH])) {
            throw new \InvalidArgumentException('Metodo di ricerca non valido');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        return Str::of($nameField)
            ->trim()
            ->$searchMethod(' ')
            ->trim();
    }
}
