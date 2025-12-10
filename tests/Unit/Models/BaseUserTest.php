<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
=======
namespace Modules\User\Tests\Unit\Models;

use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Model;
>>>>>>> origin/develop

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->baseUser = new class extends BaseUser {
<<<<<<< HEAD
=======
namespace Modules\User\Tests\Unit\Models\BaseUserTest;

=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
namespace Modules\User\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\Notifiable;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> 81efa49 (.)
uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->baseUser = new class extends BaseUser {
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        protected $table = 'test_users';
    };
});

test('base user extends eloquent model', function () {
    expect($this->baseUser)->toBeInstanceOf(Model::class);
});

test('base user has correct table name', function () {
    expect($this->baseUser->getTable())->toBe('test_users');
});

test('base user can be instantiated', function () {
    expect($this->baseUser)->toBeInstanceOf(BaseUser::class);
});

test('base user has proper inheritance chain', function () {
    expect($this->baseUser)->toBeInstanceOf(BaseUser::class);
    expect($this->baseUser)->toBeInstanceOf(Model::class);
});

test('base user has authentication traits', function () {
    $traits = class_uses($this->baseUser);
<<<<<<< HEAD

    expect($traits)->toContain(User::class);
    expect($traits)->toContain(Notifiable::class);
=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    expect($traits)->toContain(User::class);
    expect($traits)->toContain(Notifiable::class);
=======
    expect($traits)->toContain(\Illuminate\Foundation\Auth\User::class);
    expect($traits)->toContain(\Illuminate\Notifications\Notifiable::class);
>>>>>>> a12f125f4a (.)
=======
    expect($traits)->toContain(User::class);
    expect($traits)->toContain(Notifiable::class);
>>>>>>> b93ef594b4 (.)
=======
    
    expect($traits)->toContain(\Illuminate\Foundation\Auth\User::class);
    expect($traits)->toContain(\Illuminate\Notifications\Notifiable::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});
