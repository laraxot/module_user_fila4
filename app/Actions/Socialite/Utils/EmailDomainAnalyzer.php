<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite\Utils;

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
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User;
use Webmozart\Assert\Assert;

final class EmailDomainAnalyzer
{
    private User $ssoUser;

    public function __construct(
        private readonly string $ssoProvider,
    ) {
        if (empty($ssoProvider)) {
<<<<<<< HEAD
            throw new InvalidArgumentException('Il provider SSO non può essere vuoto');
=======
<<<<<<< HEAD
            throw new InvalidArgumentException('Il provider SSO non può essere vuoto');
=======
            throw new \InvalidArgumentException('Il provider SSO non può essere vuoto');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }
    }

    public function setUser(User $ssoUser): self
    {
        //if ($ssoUser === null) {
        //    throw new \InvalidArgumentException('L\'utente SSO non può essere null');
        //}
        $this->ssoUser = $ssoUser;
        return $this;
    }

    public function hasUnrecognizedDomain(): bool
    {
<<<<<<< HEAD
        return !$this->hasFirstPartyDomain() && !$this->hasClientDomain();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return !$this->hasFirstPartyDomain() && !$this->hasClientDomain();
=======
        return ! $this->hasFirstPartyDomain() && ! $this->hasClientDomain();
>>>>>>> a12f125f4a (.)
=======
        return !$this->hasFirstPartyDomain() && !$this->hasClientDomain();
>>>>>>> b93ef594b4 (.)
=======
        return ! $this->hasFirstPartyDomain() && ! $this->hasClientDomain();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function hasFirstPartyDomain(): bool
    {
        if (!isset($this->ssoUser)) {
<<<<<<< HEAD
            throw new RuntimeException(
                'L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.',
            );
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            throw new RuntimeException(
                'L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.',
            );
=======
            throw new RuntimeException('L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.');
>>>>>>> a12f125f4a (.)
=======
            throw new RuntimeException(
                'L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.',
            );
>>>>>>> b93ef594b4 (.)
=======
            throw new \RuntimeException('L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        $email = $this->ssoUser->getEmail();
        if (!is_string($email) || empty($email)) {
            return false;
        }

        $domain = $this->firstPartyDomain();
        if ($domain === null || empty($domain)) {
            return false;
        }

        $emailDomain = Str::of($email)->after('@')->toString();
        $configDomain = Str::of($domain)->after('@')->toString();

        return $emailDomain === $configDomain;
    }

    public function hasClientDomain(): bool
    {
        if (!isset($this->ssoUser)) {
<<<<<<< HEAD
            throw new RuntimeException(
                'L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.',
            );
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            throw new RuntimeException(
                'L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.',
            );
=======
            throw new RuntimeException('L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.');
>>>>>>> a12f125f4a (.)
=======
            throw new RuntimeException(
                'L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.',
            );
>>>>>>> b93ef594b4 (.)
=======
            throw new \RuntimeException('L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        $email = $this->ssoUser->getEmail();
        if (!is_string($email) || empty($email)) {
            return false;
        }

        $clientEmailDomain = $this->clientDomain();
        if ($clientEmailDomain === null || empty($clientEmailDomain)) {
            return false;
        }

        $emailDomain = Str::of($email)->after('@')->toString();
        $configDomain = Str::of($clientEmailDomain)->after('@')->toString();

        return $emailDomain === $configDomain;
    }

<<<<<<< HEAD
    private function firstPartyDomain(): null|string
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    private function firstPartyDomain(): null|string
=======
    private function firstPartyDomain(): ?string
>>>>>>> a12f125f4a (.)
=======
    private function firstPartyDomain(): null|string
>>>>>>> b93ef594b4 (.)
=======
    private function firstPartyDomain(): ?string
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $res = config(sprintf('services.%s.email_domains.first_party.tld', $this->ssoProvider));
        if (!is_string($res) && $res !== null) {
            return null;
        }
        return $res;
    }

<<<<<<< HEAD
    private function clientDomain(): null|string
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    private function clientDomain(): null|string
=======
    private function clientDomain(): ?string
>>>>>>> a12f125f4a (.)
=======
    private function clientDomain(): null|string
>>>>>>> b93ef594b4 (.)
=======
    private function clientDomain(): ?string
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        $domain = config(sprintf('services.%s.email_domains.client.tld', $this->ssoProvider));
        if (!is_string($domain) && $domain !== null) {
            return null;
        }
        return $domain;
    }
}
