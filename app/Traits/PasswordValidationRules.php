<?php

declare(strict_types=1);

namespace Modules\User\Traits;

use Illuminate\Contracts\Validation\Rule;
use Modules\User\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, (Rule|array|string)>
     */
    protected function passwordRules(): array
    {
<<<<<<< HEAD
        return ['required', 'string', new Password(), 'confirmed'];
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return ['required', 'string', new Password(), 'confirmed'];
=======
        return ['required', 'string', new Password, 'confirmed'];
>>>>>>> a12f125f4a (.)
=======
        return ['required', 'string', new Password(), 'confirmed'];
>>>>>>> b93ef594b4 (.)
=======
        return ['required', 'string', new Password, 'confirmed'];
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
