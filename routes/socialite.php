<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::namespace('Socialite')
    ->name('socialite.')
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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
    );
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
