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
<<<<<<< HEAD
    $this->user = User::factory()->create([
=======
    $user = User::factory()->create([
>>>>>>> 220cf97b (.)
        'type' => UserType::MasterAdmin,
        'email' => fake()->unique()->safeEmail(),
        'password' => Hash::make('password123'),
    ]);
    \assert($user instanceof User);
    $this->user = $user;
});

test('user can be created', function (): void {
<<<<<<< HEAD
=======
    \assert($this->user instanceof User);
>>>>>>> 220cf97b (.)
    expect($this->user)->toBeInstanceOf(User::class);
    expect($this->user->email)->toBeString()->not->toBeEmpty();
    expect($this->user->type)->toBe(UserType::MasterAdmin);
});

test('user has correct type casting', function (): void {
<<<<<<< HEAD
=======
    \assert($this->user instanceof User);
>>>>>>> 220cf97b (.)
    expect($this->user->type)->toBeInstanceOf(UserType::class);
    expect($this->user->type->value)->toBe('master_admin');
});

test('user password is hashed', function (): void {
<<<<<<< HEAD
=======
    \assert($this->user instanceof User);
>>>>>>> 220cf97b (.)
    expect(Hash::check('password123', $this->user->password))->toBeTrue();
    expect(Hash::check('wrongpassword', $this->user->password))->toBeFalse();
});

test('user can change password', function (): void {
<<<<<<< HEAD
    $this->user->update(['password' => Hash::make('newpassword123')]);

    expect(Hash::check('newpassword123', $this->user->fresh()->password))->toBeTrue();
    expect(Hash::check('password123', $this->user->fresh()->password))->toBeFalse();
});

test('user can be updated', function (): void {
=======
    \assert($this->user instanceof User);
    $this->user->update(['password' => Hash::make('newpassword123')]);

    $freshUser = $this->user->fresh();
    \assert($freshUser instanceof User);
    expect(Hash::check('newpassword123', $freshUser->password))->toBeTrue();
    expect(Hash::check('password123', $freshUser->password))->toBeFalse();
});

test('user can be updated', function (): void {
    \assert($this->user instanceof User);
>>>>>>> 220cf97b (.)
    $this->user->update([
        'email' => 'updated@example.com',
        'type' => UserType::BoUser,
    ]);

    $this->user->refresh();

    expect($this->user->email)->toBe('updated@example.com');
    expect($this->user->type)->toBe(UserType::BoUser);
});

test('user can be deleted', function (): void {
<<<<<<< HEAD
=======
    \assert($this->user instanceof User);
>>>>>>> 220cf97b (.)
    $userId = $this->user->id;

    $this->user->delete();

    expect(User::find($userId))->toBeNull();
});

test('user has fillable attributes', function (): void {
<<<<<<< HEAD
=======
    \assert($this->user instanceof User);
>>>>>>> 220cf97b (.)
    $fillable = $this->user->getFillable();

    expect($fillable)->toContain('email');
    expect($fillable)->toContain('password');
    expect($fillable)->toContain('type');
});

test('user has hidden attributes', function (): void {
<<<<<<< HEAD
=======
    \assert($this->user instanceof User);
>>>>>>> 220cf97b (.)
    $hidden = $this->user->getHidden();

    expect($hidden)->toContain('password');
    expect($hidden)->toContain('remember_token');
});

test('user can be found by email', function (): void {
    \assert($this->user instanceof User);
    $foundUser = User::where('email', $this->user->email)->first();

    \assert($foundUser instanceof User);
    expect($foundUser)->toBeInstanceOf(User::class);
    expect($foundUser->id)->toBe($this->user->id);
});

test('user can be found by type', function (): void {
    \assert($this->user instanceof User);
    $admins = User::where('type', UserType::MasterAdmin)->get();

    expect($admins)->toHaveCount(1);
<<<<<<< HEAD
    expect($admins->first()->id)->toBe($this->user->id);
=======
    $firstAdmin = $admins->first();
    \assert($firstAdmin instanceof User);
    expect($firstAdmin->id)->toBe($this->user->id);
>>>>>>> 220cf97b (.)
});

test('user can be created with different types', function (): void {
    $boUser = User::factory()->create(['type' => UserType::BoUser]);
    $customerUser = User::factory()->create(['type' => UserType::CustomerUser]);
<<<<<<< HEAD
=======
    \assert($boUser instanceof User);
    \assert($customerUser instanceof User);
>>>>>>> 220cf97b (.)

    expect($boUser->type)->toBe(UserType::BoUser);
    expect($customerUser->type)->toBe(UserType::CustomerUser);
});

test('user has timestamps', function (): void {
<<<<<<< HEAD
=======
    \assert($this->user instanceof User);
>>>>>>> 220cf97b (.)
    expect($this->user->created_at)->not->toBeNull();
    expect($this->user->updated_at)->not->toBeNull();
});

test('user soft delete functionality', function (): void {
    // Skip this test as User model does not implement SoftDeletes trait
    $this->markTestSkipped('User model does not implement SoftDeletes trait');
});
