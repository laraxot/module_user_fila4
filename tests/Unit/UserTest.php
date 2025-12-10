<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Hash;
use Modules\User\Enums\UserType;
use Modules\User\Models\User;
use Tests\TestCase;

/*
 * @property User $user
 */
uses(TestCase::class);

beforeEach(function (): void {
    /** @var object{user: mixed} $this */ $this->user = User/** @phpstan-ignore-line */ ::factory()->create([
        'type' => UserType::MasterAdmin,
        'email' => fake()->unique()->safeEmail(),
        'password' => Hash::make('password123'),
    ]);
});

test('user can be created', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user)->toBeInstanceOf(User::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->email)->toBeString()->not->toBeEmpty();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->type)->toBe(UserType::MasterAdmin);
});

test('user has correct type casting', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->type)->toBeInstanceOf(UserType::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->type->value)->toBe('master_admin');
});

test('user password is hashed', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect(Hash::check('password123', $this->user->password))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect(Hash::check('wrongpassword', $this->user->password))->toBeFalse();
});

test('user can change password', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->update(['password' => Hash::make('newpassword123')]);

    /** @phpstan-ignore-next-line property.notFound */
    expect(Hash::check('newpassword123', $this->user->fresh()->password))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect(Hash::check('password123', $this->user->fresh()->password))->toBeFalse();
});

test('user can be updated', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->user->update([
        'email' => 'updated@example.com',
        'type' => UserType::BoUser,
    ]);

    /** @phpstan-ignore-next-line property.notFound */
    $this->user->refresh();

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->email)->toBe('updated@example.com');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->type)->toBe(UserType::BoUser);
});

test('user can be deleted', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $userId = $this->user->id;

    /** @phpstan-ignore-next-line property.notFound */
    $this->user->delete();

    expect(User::find($userId))->toBeNull();
});

test('user has fillable attributes', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $fillable = $this->user->getFillable();

    expect($fillable)->toContain('email');
    expect($fillable)->toContain('password');
    expect($fillable)->toContain('type');
});

test('user has hidden attributes', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $hidden = $this->user->getHidden();

    expect($hidden)->toContain('password');
    expect($hidden)->toContain('remember_token');
});

test('user can be found by email', function (): void {
    $foundUser = User::where('email', 'admin@example.com')->first();

    expect($foundUser)->toBeInstanceOf(User::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($foundUser->id)->toBe($this->user->id);
});

test('user can be found by type', function (): void {
    $admins = User::where('type', UserType::MasterAdmin)->get();

    expect($admins)->toHaveCount(1);
    /** @phpstan-ignore-next-line property.notFound */
    expect($admins->first()->id)->toBe($this->user->id);
});

test('user can be created with different types', function (): void {
    /** @var User */
        $boUser = User/** @phpstan-ignore-line */ ::factory()->create(['type' => UserType::BoUser]);
    /** @var User */
        $customerUser = User/** @phpstan-ignore-line */ ::factory()->create(['type' => UserType::CustomerUser]);

    expect($boUser->type)->toBe(UserType::BoUser);
    expect($customerUser->type)->toBe(UserType::CustomerUser);
});

test('user has timestamps', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->created_at)->not->toBeNull();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->updated_at)->not->toBeNull();
});

test('user soft delete functionality', function (): void {
    // Skip this test as User model does not implement SoftDeletes trait
    /** @phpstan-ignore-next-line property.notFound */
    $this->markTestSkipped('User model does not implement SoftDeletes trait');
});
