<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreateUserWithMinimalData(): void
    {
<<<<<<< HEAD
        $user = User/** @phpstan-ignore-line */ ::factory()->create([
=======
        $user = User/* @phpstan-ignore-line */ ::factory()->create([
>>>>>>> laraxot/develop
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'test@example.com',
        ]);

        static::assertTrue(Hash::check('password', $user->password));
    }

    public function testCanCreateUserWithAllFields(): void
    {
        $userData = [
            'name' => 'John Doe',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'phone' => '+1234567890',
            'address' => '123 Main St',
            'city' => 'New York',
            'state' => 'NY',
            'registration_number' => 'REG123',
            'status' => 'active',
            'type' => 'individual',
            'lang' => 'en',
            'is_active' => true,
            'is_otp' => false,
        ];

<<<<<<< HEAD
        $user = User/** @phpstan-ignore-line */ ::factory()->create($userData);
=======
        $user = User/* @phpstan-ignore-line */ ::factory()->create($userData);
>>>>>>> laraxot/develop

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'john@example.com',
            'name' => 'John Doe',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone' => '+1234567890',
            'address' => '123 Main St',
            'city' => 'New York',
            'state' => 'NY',
            'registration_number' => 'REG123',
            'status' => 'active',
            'type' => 'individual',
            'lang' => 'en',
            'is_active' => true,
            'is_otp' => false,
        ]);
    }

    public function testUserHasSoftDeletes(): void
    {
<<<<<<< HEAD
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
=======
        $user = User/* @phpstan-ignore-line */ ::factory()->create();
>>>>>>> laraxot/develop
        $userId = $user->id;

        $user->delete();

        $this->assertSoftDeleted('users', ['id' => $userId]);
        $this->assertDatabaseMissing('users', ['id' => $userId]);
    }

    public function testCanRestoreSoftDeletedUser(): void
    {
        if (! method_exists(User::class, 'withTrashed')) {
            $this->markTestSkipped('SoftDeletes trait not present on User model');

            return;
        }

<<<<<<< HEAD
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
=======
        $user = User/* @phpstan-ignore-line */ ::factory()->create();
>>>>>>> laraxot/develop
        $userId = $user->id;

        $user->delete();
        $this->assertSoftDeleted('users', ['id' => $userId]);

        /** @var User $restoredUser */
        $restoredUser = User::withTrashed()->find($userId);
        $restoredUser->restore();

        $this->assertDatabaseHas('users', ['id' => $userId]);
        static::assertNull($restoredUser->deleted_at);
    }

    public function testCanFindUserByEmail(): void
    {
<<<<<<< HEAD
        $user = User/** @phpstan-ignore-line */ ::factory()->create(['email' => 'unique@example.com']);
=======
        $user = User/* @phpstan-ignore-line */ ::factory()->create(['email' => 'unique@example.com']);
>>>>>>> laraxot/develop

        $foundUser = User::where('email', 'unique@example.com')->first();

        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
    }

    public function testCanFindUserByNamePattern(): void
    {
<<<<<<< HEAD
        User/** @phpstan-ignore-line */ ::factory()->create(['name' => 'John Doe']);
        User/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Jane Doe']);
        User/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Bob Smith']);
=======
        User/* @phpstan-ignore-line */ ::factory()->create(['name' => 'John Doe']);
        User/* @phpstan-ignore-line */ ::factory()->create(['name' => 'Jane Doe']);
        User/* @phpstan-ignore-line */ ::factory()->create(['name' => 'Bob Smith']);
>>>>>>> laraxot/develop

        $doeUsers = User::where('name', 'like', '%Doe%')->get();

        static::assertCount(2, $doeUsers);
        static::assertTrue($doeUsers->every(fn ($user) => str_contains($user->name, 'Doe')));
    }

    public function testCanFindUserByStatus(): void
    {
<<<<<<< HEAD
        User/** @phpstan-ignore-line */ ::factory()->create(['status' => 'active']);
        User/** @phpstan-ignore-line */ ::factory()->create(['status' => 'inactive']);
        User/** @phpstan-ignore-line */ ::factory()->create(['status' => 'pending']);
=======
        User/* @phpstan-ignore-line */ ::factory()->create(['status' => 'active']);
        User/* @phpstan-ignore-line */ ::factory()->create(['status' => 'inactive']);
        User/* @phpstan-ignore-line */ ::factory()->create(['status' => 'pending']);
>>>>>>> laraxot/develop

        $activeUsers = User::where('status', 'active')->get();

        static::assertCount(1, $activeUsers);
        static::assertSame('active', $activeUsers->first()->status);
    }

    public function testCanFindUserByType(): void
    {
<<<<<<< HEAD
        User/** @phpstan-ignore-line */ ::factory()->create(['type' => 'individual']);
        User/** @phpstan-ignore-line */ ::factory()->create(['type' => 'company']);
        User/** @phpstan-ignore-line */ ::factory()->create(['type' => 'organization']);
=======
        User/* @phpstan-ignore-line */ ::factory()->create(['type' => 'individual']);
        User/* @phpstan-ignore-line */ ::factory()->create(['type' => 'company']);
        User/* @phpstan-ignore-line */ ::factory()->create(['type' => 'organization']);
>>>>>>> laraxot/develop

        $individualUsers = User::where('type', 'individual')->get();

        static::assertCount(1, $individualUsers);
        static::assertSame('individual', $individualUsers->first()->type);
    }

    public function testCanFindUserByCity(): void
    {
<<<<<<< HEAD
        User/** @phpstan-ignore-line */ ::factory()->create(['city' => 'New York']);
        User/** @phpstan-ignore-line */ ::factory()->create(['city' => 'Los Angeles']);
        User/** @phpstan-ignore-line */ ::factory()->create(['city' => 'Chicago']);
=======
        User/* @phpstan-ignore-line */ ::factory()->create(['city' => 'New York']);
        User/* @phpstan-ignore-line */ ::factory()->create(['city' => 'Los Angeles']);
        User/* @phpstan-ignore-line */ ::factory()->create(['city' => 'Chicago']);
>>>>>>> laraxot/develop

        $nyUsers = User::where('city', 'New York')->get();

        static::assertCount(1, $nyUsers);
        static::assertSame('New York', $nyUsers->first()->city);
    }

    public function testCanFindUserByRegistrationNumber(): void
    {
<<<<<<< HEAD
        $user = User/** @phpstan-ignore-line */ ::factory()->create(['registration_number' => 'REG123456']);
=======
        $user = User/* @phpstan-ignore-line */ ::factory()->create(['registration_number' => 'REG123456']);
>>>>>>> laraxot/develop

        $foundUser = User::where('registration_number', 'REG123456')->first();

        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
    }

    public function testCanFindUserByPhone(): void
    {
<<<<<<< HEAD
        $user = User/** @phpstan-ignore-line */ ::factory()->create(['phone' => '+1234567890']);
=======
        $user = User/* @phpstan-ignore-line */ ::factory()->create(['phone' => '+1234567890']);
>>>>>>> laraxot/develop

        $foundUser = User::where('phone', '+1234567890')->first();

        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
    }

    public function testCanFindUserByLanguage(): void
    {
<<<<<<< HEAD
        User/** @phpstan-ignore-line */ ::factory()->create(['lang' => 'en']);
        User/** @phpstan-ignore-line */ ::factory()->create(['lang' => 'it']);
        User/** @phpstan-ignore-line */ ::factory()->create(['lang' => 'de']);
=======
        User/* @phpstan-ignore-line */ ::factory()->create(['lang' => 'en']);
        User/* @phpstan-ignore-line */ ::factory()->create(['lang' => 'it']);
        User/* @phpstan-ignore-line */ ::factory()->create(['lang' => 'de']);
>>>>>>> laraxot/develop

        $englishUsers = User::where('lang', 'en')->get();

        static::assertCount(1, $englishUsers);
        static::assertSame('en', $englishUsers->first()->lang);
    }

    public function testCanFindActiveUsers(): void
    {
<<<<<<< HEAD
        User/** @phpstan-ignore-line */ ::factory()->create(['is_active' => true]);
        User/** @phpstan-ignore-line */ ::factory()->create(['is_active' => false]);
        User/** @phpstan-ignore-line */ ::factory()->create(['is_active' => true]);
=======
        User/* @phpstan-ignore-line */ ::factory()->create(['is_active' => true]);
        User/* @phpstan-ignore-line */ ::factory()->create(['is_active' => false]);
        User/* @phpstan-ignore-line */ ::factory()->create(['is_active' => true]);
>>>>>>> laraxot/develop

        $activeUsers = User::where('is_active', true)->get();

        static::assertCount(2, $activeUsers);
        static::assertTrue($activeUsers->every(fn ($user) => $user->is_active));
    }

    public function testCanFindOtpUsers(): void
    {
<<<<<<< HEAD
        User/** @phpstan-ignore-line */ ::factory()->create(['is_otp' => true]);
        User/** @phpstan-ignore-line */ ::factory()->create(['is_otp' => false]);
        User/** @phpstan-ignore-line */ ::factory()->create(['is_otp' => true]);
=======
        User/* @phpstan-ignore-line */ ::factory()->create(['is_otp' => true]);
        User/* @phpstan-ignore-line */ ::factory()->create(['is_otp' => false]);
        User/* @phpstan-ignore-line */ ::factory()->create(['is_otp' => true]);
>>>>>>> laraxot/develop

        $otpUsers = User::where('is_otp', true)->get();

        static::assertCount(2, $otpUsers);
        static::assertTrue($otpUsers->every(fn ($user) => $user->is_otp));
    }

    public function testCanUpdateUser(): void
    {
<<<<<<< HEAD
        $user = User/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Old Name']);
=======
        $user = User/* @phpstan-ignore-line */ ::factory()->create(['name' => 'Old Name']);
>>>>>>> laraxot/develop

        $user->update(['name' => 'New Name']);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'New Name',
        ]);
    }

    public function testCanAccessSocialite(): void
    {
<<<<<<< HEAD
        $user = User/** @phpstan-ignore-line */ ::factory()->create();
=======
        $user = User/* @phpstan-ignore-line */ ::factory()->create();
>>>>>>> laraxot/develop

        static::assertTrue($user->canAccessSocialite());
    }

    public function testUserHasConnectionAttribute(): void
    {
        $user = new User();

        static::assertSame('user', $user->connection);
    }

    public function testCanFindUsersByMultipleCriteria(): void
    {
<<<<<<< HEAD
        User/** @phpstan-ignore-line */ ::factory()->create([
=======
        User/* @phpstan-ignore-line */ ::factory()->create([
>>>>>>> laraxot/develop
            'status' => 'active',
            'type' => 'individual',
            'city' => 'New York',
        ]);

<<<<<<< HEAD
        User/** @phpstan-ignore-line */ ::factory()->create([
=======
        User/* @phpstan-ignore-line */ ::factory()->create([
>>>>>>> laraxot/develop
            'status' => 'active',
            'type' => 'company',
            'city' => 'New York',
        ]);

<<<<<<< HEAD
        User/** @phpstan-ignore-line */ ::factory()->create([
=======
        User/* @phpstan-ignore-line */ ::factory()->create([
>>>>>>> laraxot/develop
            'status' => 'inactive',
            'type' => 'individual',
            'city' => 'Los Angeles',
        ]);

        $users = User::where('status', 'active')->where('city', 'New York')->get();

        static::assertCount(2, $users);
        static::assertTrue($users->every(fn ($user) => 'active' === $user->status && 'New York' === $user->city));
    }

    public function testCanHandleNullValues(): void
    {
<<<<<<< HEAD
        $user = User/** @phpstan-ignore-line */ ::factory()->create([
=======
        $user = User/* @phpstan-ignore-line */ ::factory()->create([
>>>>>>> laraxot/develop
            'phone' => null,
            'address' => null,
            'city' => null,
            'state' => null,
            'registration_number' => null,
            'status' => null,
            'type' => null,
            'lang' => null,
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'phone' => null,
            'address' => null,
            'city' => null,
            'state' => null,
            'registration_number' => null,
            'status' => null,
            'type' => null,
            'lang' => null,
        ]);
    }
}
