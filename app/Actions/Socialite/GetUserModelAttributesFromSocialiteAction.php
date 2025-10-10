<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

<<<<<<< HEAD
use InvalidArgumentException;
use RuntimeException;
=======
<<<<<<< HEAD
use InvalidArgumentException;
use RuntimeException;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Actions\Socialite\Utils\UserNameFieldsResolver;
use Spatie\QueueableAction\QueueableAction;

class GetUserModelAttributesFromSocialiteAction
{
    use QueueableAction;

    public readonly string $name;

    public readonly string $first_name;

    public readonly string $last_name;

    public readonly string $email;

    public function __construct(
        private readonly string $provider,
        private readonly SocialiteUserContract $oauthUser,
    ) {
        if (empty($provider)) {
<<<<<<< HEAD
            throw new InvalidArgumentException('Il provider non può essere vuoto');
=======
<<<<<<< HEAD
            throw new InvalidArgumentException('Il provider non può essere vuoto');
=======
            throw new \InvalidArgumentException('Il provider non può essere vuoto');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        $nameFieldsResolver = app(UserNameFieldsResolver::class, ['user' => $this->oauthUser]);
        if ($nameFieldsResolver === null) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            throw new RuntimeException('Impossibile istanziare UserNameFieldsResolver');
        }

        if (!is_string($nameFieldsResolver->name)) {
            throw new RuntimeException('Il nome deve essere una stringa');
        }
        if (!is_string($nameFieldsResolver->last_name)) {
            throw new RuntimeException('Il cognome deve essere una stringa');
<<<<<<< HEAD
=======
=======
            throw new \RuntimeException('Impossibile istanziare UserNameFieldsResolver');
        }

        if (!is_string($nameFieldsResolver->name)) {
            throw new \RuntimeException('Il nome deve essere una stringa');
        }
        if (!is_string($nameFieldsResolver->last_name)) {
            throw new \RuntimeException('Il cognome deve essere una stringa');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        $this->name = $nameFieldsResolver->name;
        $this->first_name = $nameFieldsResolver->name;
        $this->last_name = $nameFieldsResolver->last_name;

        $email = $this->oauthUser->getEmail();
        if (!is_string($email) || empty($email)) {
<<<<<<< HEAD
            throw new RuntimeException('L\'email deve essere una stringa non vuota');
=======
<<<<<<< HEAD
            throw new RuntimeException('L\'email deve essere una stringa non vuota');
=======
            throw new \RuntimeException('L\'email deve essere una stringa non vuota');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }
        $this->email = $email;
    }

    public function getProvider(): string
    {
        return $this->provider;
    }
}
