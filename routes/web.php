<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Modules\User\Http\Controllers\Auth\LogoutController;
use Modules\Xot\Datas\XotData;

require 'socialite.php';

if (XotData::make()->register_pub_theme) {
    // require 'web_tall.php';
} else {
    Route::get('/login', static fn() => redirect('/admin/login'))->name('login');
}

Route::post('/logout', LogoutController::class)->name('logout');

<<<<<<< HEAD
=======
=======
use Modules\Xot\Datas\XotData;
=======
>>>>>>> b93ef594b4 (.)
use Modules\User\Http\Controllers\Auth\LogoutController;
use Modules\Xot\Datas\XotData;

require 'socialite.php';

if (XotData::make()->register_pub_theme) {
    // require 'web_tall.php';
} else {
    Route::get('/login', static fn() => redirect('/admin/login'))->name('login');
}

Route::post('/logout', LogoutController::class)->name('logout');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
use Modules\Xot\Datas\XotData;
use Modules\User\Http\Controllers\Auth\LogoutController;

require 'socialite.php';


if (XotData::make()->register_pub_theme) {
    // require 'web_tall.php';
} else {
    Route::get('/login', static fn () => redirect('/admin/login'))->name('login');
}

Route::post('/logout', LogoutController::class)->name('logout');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
//Route::get('/upgrade', 'UpgradeController');
