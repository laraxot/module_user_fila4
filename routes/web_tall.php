<?php

/**
 * routes from laravel preset Tall.
 */

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Modules\User\Http\Livewire\Auth\Passwords\Email;
use Modules\User\Http\Livewire\Auth\Passwords\Reset;
use Modules\User\Http\Livewire\Auth\Verify;
use Modules\User\Http\Livewire\Auth\Passwords\Confirm;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Auth\EmailVerificationController;
use Modules\User\Http\Controllers\Auth\LogoutController;
use Modules\User\Http\Livewire\Auth\Register;

/*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

// Route::view('/', 'welcome')->name('home');
Route::prefix('{lang}')->group(function () {
    Route::middleware('guest')
        ->namespace('\Modules\User\Http\Livewire\Auth')
        ->group(static function (): void {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            Route::get('login', 'Login')->name('login');

            Route::get('register', Register::class)->name('register');
        });

    Route::middleware([])->namespace('\Modules\User\Http\Livewire\Auth')->group(static function (): void {
        Route::get('password/reset', Email::class)->name('password.request');

        Route::get('password/reset/{token}', Reset::class)->name(
            'password.reset',
        );
    });
<<<<<<< HEAD
=======
=======
            Route::get('login', 'Login')
                ->name('login');
=======
            Route::get('login', 'Login')->name('login');
>>>>>>> b93ef594b4 (.)

            Route::get('register', Register::class)->name('register');
        });

    Route::middleware([])->namespace('\Modules\User\Http\Livewire\Auth')->group(static function (): void {
        Route::get('password/reset', Email::class)->name('password.request');

<<<<<<< HEAD
            Route::get('password/reset/{token}', Reset::class)
                ->name('password.reset');
        });
>>>>>>> a12f125f4a (.)
=======
        Route::get('password/reset/{token}', Reset::class)->name(
            'password.reset',
        );
    });
>>>>>>> b93ef594b4 (.)
=======
            Route::get('login', 'Login')
                ->name('login');

            Route::get('register', Register::class)
                ->name('register');
        });

    Route::middleware([])
        ->namespace('\Modules\User\Http\Livewire\Auth')
        ->group(static function (): void {
            Route::get('password/reset', Modules\User\Http\Livewire\Auth\Passwords\Email::class)
                ->name('password.request');

            Route::get('password/reset/{token}', Modules\User\Http\Livewire\Auth\Passwords\Reset::class)
                ->name('password.reset');
        });
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    Route::middleware('auth')
        ->namespace('\Modules\User\Http\Livewire\Auth')
        ->group(static function (): void {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            Route::get('email/verify', Verify::class)
                ->middleware('throttle:6,1')
                ->name('verification.notice');

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            Route::get('password/confirm', Confirm::class)->name(
                'password.confirm',
            );
        });

    Route::middleware('auth')
        // ->namespace('\Modules\User\Http\Livewire\Auth')
<<<<<<< HEAD
=======
=======
            Route::get('password/confirm', Confirm::class)
=======
            Route::get('email/verify', Modules\User\Http\Livewire\Auth\Verify::class)
                ->middleware('throttle:6,1')
                ->name('verification.notice');

            Route::get('password/confirm', Modules\User\Http\Livewire\Auth\Passwords\Confirm::class)
>>>>>>> origin/develop
                ->name('password.confirm');
        });

    Route::middleware('auth')
    // ->namespace('\Modules\User\Http\Livewire\Auth')
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            Route::get('password/confirm', Confirm::class)->name(
                'password.confirm',
            );
        });

    Route::middleware('auth')
        // ->namespace('\Modules\User\Http\Livewire\Auth')
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        ->group(static function (): void {
            Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
                ->middleware('signed')
                ->name('verification.verify');

<<<<<<< HEAD
            Route::match(['get', 'post'], 'logout', LogoutController::class)->name('logout');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            Route::match(['get', 'post'], 'logout', LogoutController::class)->name('logout');
=======
            Route::match(['get', 'post'], 'logout', LogoutController::class)
                ->name('logout');
>>>>>>> a12f125f4a (.)
=======
            Route::match(['get', 'post'], 'logout', LogoutController::class)->name('logout');
>>>>>>> b93ef594b4 (.)
=======
            Route::match(['get', 'post'], 'logout', LogoutController::class)
                ->name('logout');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        });
})->whereIn('lang', ['it', 'en']);

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
            '/login/{provider}',
            'RedirectToProviderController',
        // 'LoginController@redirectToProvider',
        );
        // ->name('oauth.redirect')
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        Route::get('/sso/{provider}/callback', 'ProcessCallbackController');

        // ->name('oauth.callback');
    });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    ->group(
        static function (): void {
            Route::get(
                '/login/{provider}',
                'RedirectToProviderController',
                // 'LoginController@redirectToProvider',
            );
            // ->name('oauth.redirect')

            Route::get(
                '/sso/{provider}/callback',
                'ProcessCallbackController',
            );
            // ->name('oauth.callback');
        }
    );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        Route::get('/sso/{provider}/callback', 'ProcessCallbackController');

        // ->name('oauth.callback');
    });
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
