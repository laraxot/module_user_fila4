<?php

declare(strict_types=1);

/*
Route::prefix('{lang}')->group(function () {
    Route::middleware('guest')->group(function () {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        Volt::route('register', 'pages.auth.register')->name('register');

        Volt::route('login', 'pages.auth.login')->name('login');

        Volt::route('forgot-password', 'pages.auth.forgot-password')->name('password.request');

        Volt::route('reset-password/{token}', 'pages.auth.reset-password')->name('password.reset');
    });

    Route::middleware('auth')->group(function () {
        Volt::route('verify-email', 'pages.auth.verify-email')->name('verification.notice');
<<<<<<< HEAD
=======
=======
        Volt::route('register', 'pages.auth.register')
            ->name('register');
=======
        Volt::route('register', 'pages.auth.register')->name('register');
>>>>>>> b93ef594b4 (.)

        Volt::route('login', 'pages.auth.login')->name('login');

        Volt::route('forgot-password', 'pages.auth.forgot-password')->name('password.request');

        Volt::route('reset-password/{token}', 'pages.auth.reset-password')->name('password.reset');
    });

    Route::middleware('auth')->group(function () {
<<<<<<< HEAD
        Volt::route('verify-email', 'pages.auth.verify-email')
            ->name('verification.notice');
>>>>>>> a12f125f4a (.)
=======
        Volt::route('verify-email', 'pages.auth.verify-email')->name('verification.notice');
>>>>>>> b93ef594b4 (.)
=======
        Volt::route('register', 'pages.auth.register')
            ->name('register');

        Volt::route('login', 'pages.auth.login')
            ->name('login');

        Volt::route('forgot-password', 'pages.auth.forgot-password')
            ->name('password.request');

        Volt::route('reset-password/{token}', 'pages.auth.reset-password')
            ->name('password.reset');
    });

    Route::middleware('auth')->group(function () {
        Volt::route('verify-email', 'pages.auth.verify-email')
            ->name('verification.notice');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

<<<<<<< HEAD
        Volt::route('confirm-password', 'pages.auth.confirm-password')->name('password.confirm');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Volt::route('confirm-password', 'pages.auth.confirm-password')->name('password.confirm');
=======
        Volt::route('confirm-password', 'pages.auth.confirm-password')
            ->name('password.confirm');
>>>>>>> a12f125f4a (.)
=======
        Volt::route('confirm-password', 'pages.auth.confirm-password')->name('password.confirm');
>>>>>>> b93ef594b4 (.)
=======
        Volt::route('confirm-password', 'pages.auth.confirm-password')
            ->name('password.confirm');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });
});
*/
