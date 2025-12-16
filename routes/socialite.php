<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::namespace('Socialite')
    ->name('socialite.')
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    ->group(static function (): void {
        Route::get(
            '/admin/login/{provider}',
            // 'LoginController@redirectToProvider',
            'RedirectToProviderController',
        )->name('oauth.redirect');
        Route::get('/sso/{provider}/callback', 'ProcessCallbackController')->name('oauth.callback');
    });
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
    ->group(
        static function (): void {
            Route::get(
                '/admin/login/{provider}',
                // 'LoginController@redirectToProvider',
                'RedirectToProviderController',
            )
                ->name('oauth.redirect');
            Route::get(
                '/sso/{provider}/callback',
                'ProcessCallbackController',
            )
                ->name('oauth.callback');
        }
<<<<<<< HEAD
    );
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    );
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
