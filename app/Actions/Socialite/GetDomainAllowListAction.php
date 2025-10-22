<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

<<<<<<< HEAD
use Exception;
=======
<<<<<<< HEAD
use Exception;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

class GetDomainAllowListAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(): array
    {
        $res = config('filament-socialite.domain_allowlist');
        if (\is_string($res)) {
            return Arr::wrap($res);
        }

        if (\is_array($res)) {
            return $res;
        }

<<<<<<< HEAD
        throw new Exception('check config filament-socialite.domain_allowlist');
=======
<<<<<<< HEAD
        throw new Exception('check config filament-socialite.domain_allowlist');
=======
        throw new \Exception('check config filament-socialite.domain_allowlist');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
