<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Auth;

<<<<<<< HEAD
use Filament\Pages\Concerns\HasRoutes;

class Login extends \Filament\Auth\Pages\Login
=======
<<<<<<< HEAD
use Filament\Pages\Concerns\HasRoutes;

class Login extends \Filament\Auth\Pages\Login
=======
use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Pages\Concerns\HasRoutes;

class Login extends BaseLogin
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
{
    use HasRoutes;

    protected static string $routePath = 'newlogin';
<<<<<<< HEAD

    /* var view-string */
    // protected static string $view = 'filament-panels::pages.auth.register';
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

    /* var view-string */
    // protected static string $view = 'filament-panels::pages.auth.register';
=======
    /* var view-string */
    // protected static string $view = 'filament-panels::pages.auth.register';

>>>>>>> a12f125f4a (.)
=======

    /* var view-string */
    // protected static string $view = 'filament-panels::pages.auth.register';
>>>>>>> b93ef594b4 (.)
=======
    /* var view-string */
    // protected static string $view = 'filament-panels::pages.auth.register';

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Any customizations will go here
}
