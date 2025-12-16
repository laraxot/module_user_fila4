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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @var object{user: mixed} $this */ $this->user = User/** @phpstan-ignore-line */ ::factory()->create([
=======
    /* @var object{user: mixed} $this */ $this->user = User/* @phpstan-ignore-line */ ::factory()->create([
>>>>>>> laraxot/develop
=======
    $this->user = User::factory()->create([
>>>>>>> a382d4f1 (.)
=======
    $this->user = User::factory()->create([
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
        'type' => UserType::MasterAdmin,
        'email' => fake()->unique()->safeEmail(),
        'password' => Hash::make('password123'),
    ]);
});

test('user can be created', function (): void {
<<<<<<< HEAD
    expect($this->user)->toBeInstanceOf(User::class);
    expect($this->user->email)->toBeString()->not->toBeEmpty();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
>>>>>>> a382d4f1 (.)
    expect($this->user)->toBeInstanceOf(User::class);
    expect($this->user->email)->toBeString()->not->toBeEmpty();
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->user)->toBeInstanceOf(User::class);
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->user->email)->toBeString()->not->toBeEmpty();
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
=======
    expect($this->user)->toBeInstanceOf(User::class);
    expect($this->user->email)->toBeString()->not->toBeEmpty();
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    expect($this->user->type)->toBe(UserType::MasterAdmin);
});

test('user has correct type casting', function (): void {
<<<<<<< HEAD
    expect($this->user->type)->toBeInstanceOf(UserType::class);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->type)->toBeInstanceOf(UserType::class);
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->user->type)->toBeInstanceOf(UserType::class);
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
    expect($this->user->type)->toBeInstanceOf(UserType::class);
>>>>>>> a382d4f1 (.)
=======
    expect($this->user->type)->toBeInstanceOf(UserType::class);
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    expect($this->user->type->value)->toBe('master_admin');
});

test('user password is hashed', function (): void {
<<<<<<< HEAD
    expect(Hash::check('password123', $this->user->password))->toBeTrue();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
    expect(Hash::check('password123', $this->user->password))->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
    expect(Hash::check('password123', $this->user->password))->toBeTrue();
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
    expect(Hash::check('password123', $this->user->password))->toBeTrue();
>>>>>>> a382d4f1 (.)
=======
    expect(Hash::check('password123', $this->user->password))->toBeTrue();
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    expect(Hash::check('wrongpassword', $this->user->password))->toBeFalse();
});

test('user can change password', function (): void {
<<<<<<< HEAD
    $this->user->update(['password' => Hash::make('newpassword123')]);

    expect(Hash::check('newpassword123', $this->user->fresh()->password))->toBeTrue();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
>>>>>>> a382d4f1 (.)
    $this->user->update(['password' => Hash::make('newpassword123')]);

    expect(Hash::check('newpassword123', $this->user->fresh()->password))->toBeTrue();
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
    $this->user->update(['password' => Hash::make('newpassword123')]);

    /* @phpstan-ignore-next-line property.notFound */
    expect(Hash::check('newpassword123', $this->user->fresh()->password))->toBeTrue();
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
=======
    $this->user->update(['password' => Hash::make('newpassword123')]);

    expect(Hash::check('newpassword123', $this->user->fresh()->password))->toBeTrue();
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    expect(Hash::check('password123', $this->user->fresh()->password))->toBeFalse();
});

test('user can be updated', function (): void {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
=======
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    $this->user->update([
        'email' => 'updated@example.com',
        'type' => UserType::BoUser,
    ]);

<<<<<<< HEAD
    $this->user->refresh();

    expect($this->user->email)->toBe('updated@example.com');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
>>>>>>> a382d4f1 (.)
    $this->user->refresh();

    expect($this->user->email)->toBe('updated@example.com');
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
    $this->user->refresh();

    /* @phpstan-ignore-next-line property.notFound */
    expect($this->user->email)->toBe('updated@example.com');
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
=======
    $this->user->refresh();

    expect($this->user->email)->toBe('updated@example.com');
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    expect($this->user->type)->toBe(UserType::BoUser);
});

test('user can be deleted', function (): void {
    $userId = $this->user->id;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
=======
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    $this->user->delete();

    expect(User::find($userId))->toBeNull();
});

test('user has fillable attributes', function (): void {
    $fillable = $this->user->getFillable();

    expect($fillable)->toContain('email');
    expect($fillable)->toContain('password');
    expect($fillable)->toContain('type');
});

test('user has hidden attributes', function (): void {
    $hidden = $this->user->getHidden();

    expect($hidden)->toContain('password');
    expect($hidden)->toContain('remember_token');
});

test('user can be found by email', function (): void {
    $foundUser = User::where('email', 'admin@example.com')->first();

    expect($foundUser)->toBeInstanceOf(User::class);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
=======
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    expect($foundUser->id)->toBe($this->user->id);
});

test('user can be found by type', function (): void {
    $admins = User::where('type', UserType::MasterAdmin)->get();

    expect($admins)->toHaveCount(1);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
=======
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    expect($admins->first()->id)->toBe($this->user->id);
});

test('user can be created with different types', function (): void {
<<<<<<< HEAD
    $boUser = User::factory()->create(['type' => UserType::BoUser]);
    $customerUser = User::factory()->create(['type' => UserType::CustomerUser]);
=======
<<<<<<< HEAD
<<<<<<< HEAD
    /** @var User */
<<<<<<< HEAD
        $boUser = User/** @phpstan-ignore-line */ ::factory()->create(['type' => UserType::BoUser]);
    /** @var User */
        $customerUser = User/** @phpstan-ignore-line */ ::factory()->create(['type' => UserType::CustomerUser]);
=======
    $boUser = User/* @phpstan-ignore-line */ ::factory()->create(['type' => UserType::BoUser]);
    /** @var User */
    $customerUser = User/* @phpstan-ignore-line */ ::factory()->create(['type' => UserType::CustomerUser]);
>>>>>>> laraxot/develop
=======
    $boUser = User::factory()->create(['type' => UserType::BoUser]);
    $customerUser = User::factory()->create(['type' => UserType::CustomerUser]);
>>>>>>> a382d4f1 (.)
=======
    $boUser = User::factory()->create(['type' => UserType::BoUser]);
    $customerUser = User::factory()->create(['type' => UserType::CustomerUser]);
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)

    expect($boUser->type)->toBe(UserType::BoUser);
    expect($customerUser->type)->toBe(UserType::CustomerUser);
});

test('user has timestamps', function (): void {
<<<<<<< HEAD
    expect($this->user->created_at)->not->toBeNull();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->user->created_at)->not->toBeNull();
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->user->created_at)->not->toBeNull();
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
    expect($this->user->created_at)->not->toBeNull();
>>>>>>> a382d4f1 (.)
=======
    expect($this->user->created_at)->not->toBeNull();
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    expect($this->user->updated_at)->not->toBeNull();
});

test('user soft delete functionality', function (): void {
    // Skip this test as User model does not implement SoftDeletes trait
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
=======
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> laraxot/develop
=======
>>>>>>> a382d4f1 (.)
=======
>>>>>>> ebb22862 (.)
>>>>>>> e4cd89fa (.)
    $this->markTestSkipped('User model does not implement SoftDeletes trait');
});
