<?php

declare(strict_types=1);

use Modules\User\Models\Profile;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

/*
 * |--------------------------------------------------------------------------
 * | Test Case
 * |--------------------------------------------------------------------------
 * |
 * | The closure you provide to your test functions is always bound to a specific PHPUnit test
 * | case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
 * | need to change it using the "pest()" function to bind a different classes or traits.
 * |
 */

pest()->extend(TestCase::class)->in('Feature', 'Unit');

/*
 * |--------------------------------------------------------------------------
 * | Expectations
 * |--------------------------------------------------------------------------
 * |
 * | When you're writing tests, you often need to check that values meet certain conditions. The
 * | "expect()" function gives you access to a set of "expectations" methods that you can use
 * | to assert different things. Of course, you may extend the Expectation API at any time.
 * |
 */

/* @phpstan-ignore-next-line argument.type */
expect()->extend('toBeUser', function (): mixed {
    /* @phpstan-ignore-next-line method.nonObject */
    return $this->toBeInstanceOf(User::class);
});

/* @phpstan-ignore-next-line argument.type */
expect()->extend('toBeTeam', function (): mixed {
    /* @phpstan-ignore-next-line method.nonObject */
    return $this->toBeInstanceOf(Team::class);
});

/* @phpstan-ignore-next-line argument.type */
expect()->extend('toBeRole', function (): mixed {
    /* @phpstan-ignore-next-line method.nonObject */
    return $this->toBeInstanceOf(Role::class);
});

/*
 * |--------------------------------------------------------------------------
 * | Functions
 * |--------------------------------------------------------------------------
 * |
 * | While Pest is very powerful out-of-the-box, you may have some testing code specific to your
 * | project that you don't want to repeat in every file. Here you can also expose helpers as
 * | global functions to help you to reduce the number of lines of code in your test files.
 * |
 */

/**
 * @param array<string, mixed> $attributes
 */
function createUser(array $attributes = []): User
{
    /* @phpstan-ignore-next-line method.nonObject */
    $User = User::factory()->create($attributes);
    assert($User instanceof User);
    return $User;
}

/**
 * @param array<string, mixed> $attributes
 */
function makeUser(array $attributes = []): User
{
    /* @phpstan-ignore-next-line method.nonObject */
    $User = User::factory()->make($attributes);
    assert($User instanceof User);
    return $User;
}

/**
 * @param array<string, mixed> $attributes
 */
function createTeam(array $attributes = []): Team
{
    /* @phpstan-ignore-next-line method.nonObject */
    $Team = Team::factory()->create($attributes);
    assert($Team instanceof Team);
    return $Team;
}

/**
 * @param array<string, mixed> $attributes
 */
function createProfile(array $attributes = []): Profile
{
    /* @phpstan-ignore-next-line method.nonObject */
    $Profile = Profile::factory()->create($attributes);
    assert($Profile instanceof Profile);
    return $Profile;
}
