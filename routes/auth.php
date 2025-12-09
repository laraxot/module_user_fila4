<?php

declare(strict_types=1);

/*
Route::prefix('{lang}')->group(function () {
    Route::middleware('guest')->group(function () {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        Volt::route('register', 'pages.auth.register')->name('register');

        Volt::route('login', 'pages.auth.login')->name('login');

        Volt::route('forgot-password', 'pages.auth.forgot-password')->name('password.request');

        Volt::route('reset-password/{token}', 'pages.auth.reset-password')->name('password.reset');
    });

    Route::middleware('auth')->group(function () {
        Volt::route('verify-email', 'pages.auth.verify-email')->name('verification.notice');
<<<<<<< HEAD
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
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

<<<<<<< HEAD
<<<<<<< HEAD
        Volt::route('confirm-password', 'pages.auth.confirm-password')->name('password.confirm');
=======
        Volt::route('confirm-password', 'pages.auth.confirm-password')
            ->name('password.confirm');
>>>>>>> fbc8f8e (.)
=======
        Volt::route('confirm-password', 'pages.auth.confirm-password')->name('password.confirm');
>>>>>>> 6d20fbe (.)
    });
});
*/
