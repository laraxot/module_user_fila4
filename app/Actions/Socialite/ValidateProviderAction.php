<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Modules\User\Exceptions\ProviderNotConfigured;
use Spatie\QueueableAction\QueueableAction;

class ValidateProviderAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $provider): void
    {
<<<<<<< HEAD
        $res = config()->has('services.' . $provider);
        if (!$res) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $res = config()->has('services.' . $provider);
        if (!$res) {
=======
        $res = config()->has('services.'.$provider);
        if (! $res) {
>>>>>>> a12f125f4a (.)
=======
        $res = config()->has('services.' . $provider);
        if (!$res) {
>>>>>>> b93ef594b4 (.)
=======
        $res = config()->has('services.'.$provider);
        if (! $res) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            throw ProviderNotConfigured::make($provider);
        }
    }
}
