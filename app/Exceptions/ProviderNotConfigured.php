<?php

declare(strict_types=1);

namespace Modules\User\Exceptions;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use LogicException;

final class ProviderNotConfigured extends LogicException
{
    public static function make(string $provider): static
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        return new self('Provider "' .
            $provider .
            '" is not configured. tips: add ' .
            $provider .
            ' to config/services.php');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        return new self('Provider "'.$provider.'" is not configured. tips: add '.$provider.' to config/services.php');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
final class ProviderNotConfigured extends \LogicException
{
    public static function make(string $provider): static
    {
        return new self('Provider "'.$provider.'" is not configured. tips: add '.$provider.' to config/services.php');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
