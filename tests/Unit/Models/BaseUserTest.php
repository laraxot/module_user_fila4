<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
namespace Modules\User\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    $this->baseUser = new class extends BaseUser {
<<<<<<< HEAD
=======
namespace Modules\User\Tests\Unit\Models\BaseUserTest;

namespace Modules\User\Tests\Unit\Models;


>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
    expect($traits)->toContain(User::class);
    expect($traits)->toContain(Notifiable::class);
=======
    expect($traits)->toContain(\Illuminate\Foundation\Auth\User::class);
    expect($traits)->toContain(\Illuminate\Notifications\Notifiable::class);
>>>>>>> fbc8f8e (.)
=======
    expect($traits)->toContain(User::class);
    expect($traits)->toContain(Notifiable::class);
>>>>>>> 6d20fbe (.)
});
