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

    public function test_can_create_user_with_minimal_data(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'test@example.com',
        ]);

<<<<<<< HEAD
        static::assertTrue(Hash::check('password', $user->password));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(Hash::check('password', $user->password));
=======
        $this->assertTrue(Hash::check('password', $user->password));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(Hash::check('password', $user->password));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(Hash::check('password', $user->password));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_create_user_with_all_fields(): void
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

        $user = User::factory()->create($userData);

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

    public function test_user_has_soft_deletes(): void
    {
        $user = User::factory()->create();
        $userId = $user->id;

        $user->delete();

        $this->assertSoftDeleted('users', ['id' => $userId]);
        $this->assertDatabaseMissing('users', ['id' => $userId]);
    }

    public function test_can_restore_soft_deleted_user(): void
    {
        $user = User::factory()->create();
        $userId = $user->id;

        $user->delete();
        $this->assertSoftDeleted('users', ['id' => $userId]);

        $restoredUser = User::withTrashed()->find($userId);
        $restoredUser->restore();

        $this->assertDatabaseHas('users', ['id' => $userId]);
<<<<<<< HEAD
        static::assertNull($restoredUser->deleted_at);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNull($restoredUser->deleted_at);
=======
        $this->assertNull($restoredUser->deleted_at);
>>>>>>> a12f125f4a (.)
=======
        static::assertNull($restoredUser->deleted_at);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNull($restoredUser->deleted_at);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_user_by_email(): void
    {
        $user = User::factory()->create(['email' => 'unique@example.com']);

        $foundUser = User::where('email', 'unique@example.com')->first();

<<<<<<< HEAD
        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
=======
        $this->assertNotNull($foundUser);
        $this->assertEquals($user->id, $foundUser->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundUser);
        $this->assertEquals($user->id, $foundUser->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_user_by_name_pattern(): void
    {
        User::factory()->create(['name' => 'John Doe']);
        User::factory()->create(['name' => 'Jane Doe']);
        User::factory()->create(['name' => 'Bob Smith']);

        $doeUsers = User::where('name', 'like', '%Doe%')->get();

<<<<<<< HEAD
        static::assertCount(2, $doeUsers);
        static::assertTrue($doeUsers->every(fn($user) => str_contains($user->name, 'Doe')));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $doeUsers);
        static::assertTrue($doeUsers->every(fn($user) => str_contains($user->name, 'Doe')));
=======
        $this->assertCount(2, $doeUsers);
        $this->assertTrue($doeUsers->every(fn ($user) => str_contains($user->name, 'Doe')));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $doeUsers);
        static::assertTrue($doeUsers->every(fn($user) => str_contains($user->name, 'Doe')));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $doeUsers);
        $this->assertTrue($doeUsers->every(fn ($user) => str_contains($user->name, 'Doe')));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_user_by_status(): void
    {
        User::factory()->create(['status' => 'active']);
        User::factory()->create(['status' => 'inactive']);
        User::factory()->create(['status' => 'pending']);

        $activeUsers = User::where('status', 'active')->get();

<<<<<<< HEAD
        static::assertCount(1, $activeUsers);
        static::assertSame('active', $activeUsers->first()->status);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(1, $activeUsers);
        static::assertSame('active', $activeUsers->first()->status);
=======
        $this->assertCount(1, $activeUsers);
        $this->assertEquals('active', $activeUsers->first()->status);
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(1, $activeUsers);
        static::assertSame('active', $activeUsers->first()->status);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(1, $activeUsers);
        $this->assertEquals('active', $activeUsers->first()->status);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_user_by_type(): void
    {
        User::factory()->create(['type' => 'individual']);
        User::factory()->create(['type' => 'company']);
        User::factory()->create(['type' => 'organization']);

        $individualUsers = User::where('type', 'individual')->get();

<<<<<<< HEAD
        static::assertCount(1, $individualUsers);
        static::assertSame('individual', $individualUsers->first()->type);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(1, $individualUsers);
        static::assertSame('individual', $individualUsers->first()->type);
=======
        $this->assertCount(1, $individualUsers);
        $this->assertEquals('individual', $individualUsers->first()->type);
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(1, $individualUsers);
        static::assertSame('individual', $individualUsers->first()->type);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(1, $individualUsers);
        $this->assertEquals('individual', $individualUsers->first()->type);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_user_by_city(): void
    {
        User::factory()->create(['city' => 'New York']);
        User::factory()->create(['city' => 'Los Angeles']);
        User::factory()->create(['city' => 'Chicago']);

        $nyUsers = User::where('city', 'New York')->get();

<<<<<<< HEAD
        static::assertCount(1, $nyUsers);
        static::assertSame('New York', $nyUsers->first()->city);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(1, $nyUsers);
        static::assertSame('New York', $nyUsers->first()->city);
=======
        $this->assertCount(1, $nyUsers);
        $this->assertEquals('New York', $nyUsers->first()->city);
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(1, $nyUsers);
        static::assertSame('New York', $nyUsers->first()->city);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(1, $nyUsers);
        $this->assertEquals('New York', $nyUsers->first()->city);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_user_by_registration_number(): void
    {
        $user = User::factory()->create(['registration_number' => 'REG123456']);

        $foundUser = User::where('registration_number', 'REG123456')->first();

<<<<<<< HEAD
        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
=======
        $this->assertNotNull($foundUser);
        $this->assertEquals($user->id, $foundUser->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundUser);
        $this->assertEquals($user->id, $foundUser->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_user_by_phone(): void
    {
        $user = User::factory()->create(['phone' => '+1234567890']);

        $foundUser = User::where('phone', '+1234567890')->first();

<<<<<<< HEAD
        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
=======
        $this->assertNotNull($foundUser);
        $this->assertEquals($user->id, $foundUser->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundUser);
        static::assertSame($user->id, $foundUser->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundUser);
        $this->assertEquals($user->id, $foundUser->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_user_by_language(): void
    {
        User::factory()->create(['lang' => 'en']);
        User::factory()->create(['lang' => 'it']);
        User::factory()->create(['lang' => 'de']);

        $englishUsers = User::where('lang', 'en')->get();

<<<<<<< HEAD
        static::assertCount(1, $englishUsers);
        static::assertSame('en', $englishUsers->first()->lang);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(1, $englishUsers);
        static::assertSame('en', $englishUsers->first()->lang);
=======
        $this->assertCount(1, $englishUsers);
        $this->assertEquals('en', $englishUsers->first()->lang);
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(1, $englishUsers);
        static::assertSame('en', $englishUsers->first()->lang);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(1, $englishUsers);
        $this->assertEquals('en', $englishUsers->first()->lang);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_active_users(): void
    {
        User::factory()->create(['is_active' => true]);
        User::factory()->create(['is_active' => false]);
        User::factory()->create(['is_active' => true]);

        $activeUsers = User::where('is_active', true)->get();

<<<<<<< HEAD
        static::assertCount(2, $activeUsers);
        static::assertTrue($activeUsers->every(fn($user) => $user->is_active));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $activeUsers);
        static::assertTrue($activeUsers->every(fn($user) => $user->is_active));
=======
        $this->assertCount(2, $activeUsers);
        $this->assertTrue($activeUsers->every(fn ($user) => $user->is_active));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $activeUsers);
        static::assertTrue($activeUsers->every(fn($user) => $user->is_active));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $activeUsers);
        $this->assertTrue($activeUsers->every(fn ($user) => $user->is_active));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_otp_users(): void
    {
        User::factory()->create(['is_otp' => true]);
        User::factory()->create(['is_otp' => false]);
        User::factory()->create(['is_otp' => true]);

        $otpUsers = User::where('is_otp', true)->get();

<<<<<<< HEAD
        static::assertCount(2, $otpUsers);
        static::assertTrue($otpUsers->every(fn($user) => $user->is_otp));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $otpUsers);
        static::assertTrue($otpUsers->every(fn($user) => $user->is_otp));
=======
        $this->assertCount(2, $otpUsers);
        $this->assertTrue($otpUsers->every(fn ($user) => $user->is_otp));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $otpUsers);
        static::assertTrue($otpUsers->every(fn($user) => $user->is_otp));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $otpUsers);
        $this->assertTrue($otpUsers->every(fn ($user) => $user->is_otp));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_update_user(): void
    {
        $user = User::factory()->create(['name' => 'Old Name']);

        $user->update(['name' => 'New Name']);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'New Name',
        ]);
    }

    public function test_can_access_socialite(): void
    {
        $user = User::factory()->create();

<<<<<<< HEAD
        static::assertTrue($user->canAccessSocialite());
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue($user->canAccessSocialite());
=======
        $this->assertTrue($user->canAccessSocialite());
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue($user->canAccessSocialite());
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue($user->canAccessSocialite());
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_user_has_connection_attribute(): void
    {
        $user = new User();

<<<<<<< HEAD
        static::assertSame('user', $user->connection);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame('user', $user->connection);
=======
        $this->assertEquals('user', $user->connection);
>>>>>>> a12f125f4a (.)
=======
        static::assertSame('user', $user->connection);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertEquals('user', $user->connection);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_users_by_multiple_criteria(): void
    {
        User::factory()->create([
            'status' => 'active',
            'type' => 'individual',
            'city' => 'New York',
        ]);

        User::factory()->create([
            'status' => 'active',
            'type' => 'company',
            'city' => 'New York',
        ]);

        User::factory()->create([
            'status' => 'inactive',
            'type' => 'individual',
            'city' => 'Los Angeles',
        ]);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $users = User::where('status', 'active')->where('city', 'New York')->get();

        static::assertCount(2, $users);
        static::assertTrue($users->every(fn($user) => $user->status === 'active' && $user->city === 'New York'));
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $users = User::where('status', 'active')
            ->where('city', 'New York')
            ->get();

        $this->assertCount(2, $users);
        $this->assertTrue($users->every(fn ($user) => $user->status === 'active' && $user->city === 'New York'));
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $users = User::where('status', 'active')->where('city', 'New York')->get();

        static::assertCount(2, $users);
        static::assertTrue($users->every(fn($user) => $user->status === 'active' && $user->city === 'New York'));
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_handle_null_values(): void
    {
        $user = User::factory()->create([
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
