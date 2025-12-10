<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\Notifiable;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class TestUserBaseModel extends BaseUser
{
    /** @var string */
    protected $table = 'test_users';

    /**
     * Determine if the user belongs to the given team.
     *
     * @param  mixed  $team
     */
    public function belongsToTeam($team): bool
    {
        return false; // Stub implementation for testing
    }
}

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function (): void {
    $this->baseUser = new TestUserBaseModel();
});

test('base user extends eloquent model', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseUser)->toBeInstanceOf(Model::class);
});

test('base user has correct table name', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseUser->getTable())->toBe('test_users');
});

test('base user can be instantiated', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseUser)->toBeInstanceOf(BaseUser::class);
});

test('base user has proper inheritance chain', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseUser)->toBeInstanceOf(BaseUser::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->baseUser)->toBeInstanceOf(Model::class);
});

test('base user has authentication traits', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $traits = class_uses($this->baseUser);

    expect($traits)->toContain(User::class);
    expect($traits)->toContain(Notifiable::class);
});
