<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Hash;
use Modules\User\Enums\UserType;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
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
=======
beforeEach(function (): void {
    $this->user = User::factory()->create([
        'type' => UserType::MasterAdmin,
        'email' => fake()->unique()->safeEmail(),
        'password' => Hash::make('password123'),
    ]);
});

test('user can be created', function (): void {
    expect($this->user)->toBeInstanceOf(User::class);
    expect($this->user->email)->toBeString()->not->toBeEmpty();
    expect($this->user->type)->toBe(UserType::MasterAdmin);
});
>>>>>>> 220cf97b (.)

test('user has correct type casting', function (): void {
    expect($this->user->type)->toBeInstanceOf(UserType::class);
    expect($this->user->type->value)->toBe('master_admin');
});

test('user password is hashed', function (): void {
    expect(Hash::check('password123', $this->user->password))->toBeTrue();
    expect(Hash::check('wrongpassword', $this->user->password))->toBeFalse();
});

<<<<<<< HEAD
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
        if (! method_exists(User::class, 'withTrashed')) {
            $this->markTestSkipped('SoftDeletes trait not present on User model');

            return;
        }

        $user = User::factory()->create();
        $userId = $user->id;

        $user->delete();
        $this->assertSoftDeleted('users', ['id' => $userId]);

        /** @var User $restoredUser */
        $restoredUser = User::withTrashed()->find($userId);
        $restoredUser->restore();

        $this->assertDatabaseHas('users', ['id' => $userId]);
        static::assertNull($restoredUser->deleted_at);
    }

    public function test_can_find_user_by_email(): void
    {
        $user = User::factory()->create(['email' => 'unique@example.com']);
=======
test('user can change password', function (): void {
    $this->user->update(['password' => Hash::make('newpassword123')]);

    expect(Hash::check('newpassword123', $this->user->fresh()->password))->toBeTrue();
    expect(Hash::check('password123', $this->user->fresh()->password))->toBeFalse();
});

test('user can be updated', function (): void {
    $this->user->update([
        'email' => 'updated@example.com',
        'type' => UserType::BoUser,
    ]);

    $this->user->refresh();

    expect($this->user->email)->toBe('updated@example.com');
    expect($this->user->type)->toBe(UserType::BoUser);
});

test('user can be deleted', function (): void {
    $userId = $this->user->id;

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
>>>>>>> 220cf97b (.)

    expect($hidden)->toContain('password');
    expect($hidden)->toContain('remember_token');
});

test('user can be found by email', function (): void {
    $foundUser = User::where('email', $this->user->email)->first();

<<<<<<< HEAD
    public function test_can_find_user_by_name_pattern(): void
    {
        User::factory()->create(['name' => 'John Doe']);
        User::factory()->create(['name' => 'Jane Doe']);
        User::factory()->create(['name' => 'Bob Smith']);
=======
    expect($foundUser)->toBeInstanceOf(User::class);
    expect($foundUser->id)->toBe($this->user->id);
});
>>>>>>> 220cf97b (.)

test('user can be found by type', function (): void {
    $admins = User::where('type', UserType::MasterAdmin)->get();

<<<<<<< HEAD
        static::assertCount(2, $doeUsers);
        static::assertTrue($doeUsers->every(fn ($user) => str_contains($user->name, 'Doe')));
    }

    public function test_can_find_user_by_status(): void
    {
        User::factory()->create(['status' => 'active']);
        User::factory()->create(['status' => 'inactive']);
        User::factory()->create(['status' => 'pending']);
=======
    expect($admins->count())->toBeGreaterThanOrEqual(1);
    expect($admins->first()->id)->toBe($this->user->id);
});

test('user can be created with different types', function (): void {
    $boUser = User::factory()->create(['type' => UserType::BoUser]);
    $customerUser = User::factory()->create(['type' => UserType::CustomerUser]);
>>>>>>> 220cf97b (.)

    expect($boUser->type)->toBe(UserType::BoUser);
    expect($customerUser->type)->toBe(UserType::CustomerUser);
});

<<<<<<< HEAD
        static::assertCount(1, $activeUsers);
        static::assertSame('active', $activeUsers->first()->status);
    }

    public function test_can_find_user_by_type(): void
    {
        User::factory()->create(['type' => 'individual']);
        User::factory()->create(['type' => 'company']);
        User::factory()->create(['type' => 'organization']);
=======
test('user has timestamps', function (): void {
    expect($this->user->created_at)->not->toBeNull();
    expect($this->user->updated_at)->not->toBeNull();
});

test('user can access socialite', function (): void {
    expect($this->user->canAccessSocialite())->toBeTrue();
});
>>>>>>> 220cf97b (.)

test('user has connection attribute', function (): void {
    expect($this->user->connection)->toBe('user');
});

<<<<<<< HEAD
        static::assertCount(1, $individualUsers);
        static::assertSame('individual', $individualUsers->first()->type);
    }

    public function test_can_find_user_by_city(): void
    {
        User::factory()->create(['city' => 'New York']);
        User::factory()->create(['city' => 'Los Angeles']);
        User::factory()->create(['city' => 'Chicago']);
=======
test('user can be found by name pattern', function (): void {
    User::factory()->create(['name' => 'John Doe']);
    User::factory()->create(['name' => 'Jane Doe']);
    User::factory()->create(['name' => 'Bob Smith']);

    $doeUsers = User::where('name', 'like', '%Doe%')->get();
>>>>>>> 220cf97b (.)

    expect($doeUsers->count())->toBeGreaterThanOrEqual(2);
    expect($doeUsers->every(fn ($user) => str_contains($user->name ?? '', 'Doe')))->toBeTrue();
});

<<<<<<< HEAD
        static::assertCount(1, $nyUsers);
        static::assertSame('New York', $nyUsers->first()->city);
    }

    public function test_can_find_user_by_registration_number(): void
    {
        $user = User::factory()->create(['registration_number' => 'REG123456']);
=======
test('user can be found by language', function (): void {
    User::factory()->create(['lang' => 'en']);
    User::factory()->create(['lang' => 'it']);
    User::factory()->create(['lang' => 'de']);

    $englishUsers = User::where('lang', 'en')->get();
>>>>>>> 220cf97b (.)

    expect($englishUsers->count())->toBeGreaterThanOrEqual(1);
    expect($englishUsers->first()->lang)->toBe('en');
});

test('user can be found by active status', function (): void {
    User::factory()->create(['is_active' => true]);
    User::factory()->create(['is_active' => false]);
    User::factory()->create(['is_active' => true]);

<<<<<<< HEAD
    public function test_can_find_user_by_phone(): void
    {
        $user = User::factory()->create(['phone' => '+1234567890']);
=======
    $activeUsers = User::where('is_active', true)->get();
>>>>>>> 220cf97b (.)

    expect($activeUsers->count())->toBeGreaterThanOrEqual(2);
    expect($activeUsers->every(fn ($user) => $user->is_active))->toBeTrue();
});

test('user can be found by otp status', function (): void {
    User::factory()->create(['is_otp' => true]);
    User::factory()->create(['is_otp' => false]);
    User::factory()->create(['is_otp' => true]);

<<<<<<< HEAD
    public function test_can_find_user_by_language(): void
    {
        User::factory()->create(['lang' => 'en']);
        User::factory()->create(['lang' => 'it']);
        User::factory()->create(['lang' => 'de']);
=======
    $otpUsers = User::where('is_otp', true)->get();
>>>>>>> 220cf97b (.)

    expect($otpUsers->count())->toBeGreaterThanOrEqual(2);
    expect($otpUsers->every(fn ($user) => $user->is_otp))->toBeTrue();
});

<<<<<<< HEAD
        static::assertCount(1, $englishUsers);
        static::assertSame('en', $englishUsers->first()->lang);
    }

    public function test_can_find_active_users(): void
    {
        User::factory()->create(['is_active' => true]);
        User::factory()->create(['is_active' => false]);
        User::factory()->create(['is_active' => true]);

        $activeUsers = User::where('is_active', true)->get();

        static::assertCount(2, $activeUsers);
        static::assertTrue($activeUsers->every(fn ($user) => $user->is_active));
    }

    public function test_can_find_otp_users(): void
    {
        User::factory()->create(['is_otp' => true]);
        User::factory()->create(['is_otp' => false]);
        User::factory()->create(['is_otp' => true]);

        $otpUsers = User::where('is_otp', true)->get();

        static::assertCount(2, $otpUsers);
        static::assertTrue($otpUsers->every(fn ($user) => $user->is_otp));
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

        static::assertTrue($user->canAccessSocialite());
    }

    public function test_user_has_connection_attribute(): void
    {
        $user = new User;

        static::assertSame('user', $user->connection);
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

        $users = User::where('status', 'active')->where('city', 'New York')->get();

        static::assertCount(2, $users);
        static::assertTrue($users->every(fn ($user) => $user->status === 'active' && $user->city === 'New York'));
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
=======
test('user can handle null values', function (): void {
    $user = User::factory()->create([
        'name' => null,
        'first_name' => null,
        'last_name' => null,
        'lang' => null,
    ]);

    expect($user->name)->toBeNull();
    expect($user->first_name)->toBeNull();
    expect($user->last_name)->toBeNull();
    expect($user->lang)->toBeNull();
});
>>>>>>> 220cf97b (.)
