<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

<<<<<<< HEAD
use ArrayAccess;
=======
<<<<<<< HEAD
use ArrayAccess;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

class GetProviderScopesAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $provider): array
    {
        /**
<<<<<<< HEAD
         * @var array|ArrayAccess
         */
        $services = config('services');
        $scopes = Arr::get($services, $provider . '.scopes');
        if (!\is_array($scopes)) {
=======
<<<<<<< HEAD
         * @var array|ArrayAccess
         */
        $services = config('services');
<<<<<<< HEAD
<<<<<<< HEAD
        $scopes = Arr::get($services, $provider . '.scopes');
        if (!\is_array($scopes)) {
=======
        $scopes = Arr::get($services, $provider.'.scopes');
        if (! \is_array($scopes)) {
>>>>>>> a12f125f4a (.)
=======
        $scopes = Arr::get($services, $provider . '.scopes');
        if (!\is_array($scopes)) {
>>>>>>> b93ef594b4 (.)
=======
         * @var array|\ArrayAccess
         */
        $services = config('services');
        $scopes = Arr::get($services, $provider.'.scopes');
        if (! \is_array($scopes)) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            return [];
        }

        return $scopes;
    }
}
