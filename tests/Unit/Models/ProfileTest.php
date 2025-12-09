<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\Profile;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreateProfileWithMinimalData(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'user_name' => 'johndoe',
            'email' => 'john@example.com',
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'user_name' => 'johndoe',
            'email' => 'john@example.com',
        ]);
    }

    public function testCanCreateProfileWithAllFields(): void
    {
        $profileData = [
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'user_name' => 'janesmith',
            'email' => 'jane@example.com',
            'phone' => '+1234567890',
            'bio' => 'Software Developer',
            'avatar' => 'avatar.jpg',
            'timezone' => 'UTC',
            'locale' => 'en',
            'preferences' => ['theme' => 'dark', 'notifications' => true],
            'status' => 'active',
            'extra' => ['skills' => ['PHP', 'Laravel'], 'experience' => 5],
        ];

        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create($profileData);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'user_name' => 'janesmith',
            'email' => 'jane@example.com',
            'phone' => '+1234567890',
            'bio' => 'Software Developer',
            'avatar' => 'avatar.jpg',
            'timezone' => 'UTC',
            'locale' => 'en',
            'status' => 'active',
        ]);

        // Verifica campi JSON
        static::assertSame(['theme' => 'dark', 'notifications' => true], $profile->preferences);
        static::assertSame(['skills' => ['PHP', 'Laravel'], 'experience' => 5], $profile->extra);
    }

    public function testProfileHasSchemalessAttributes(): void
    {
        $profile = new Profile;

        $expectedAttributes = ['extra'];
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame($expectedAttributes, $profile->getSchemalessAttributes());
    }

    public function testProfileHasTableName(): void
    {
        $profile = new Profile;

        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame('profiles', $profile->getTable());
    }

    public function testCanFindProfileByEmail(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create(['email' => 'unique@example.com']);

        $foundProfile = Profile::where('email', 'unique@example.com')->first();

        static::assertNotNull($foundProfile);
        static::assertSame($profile->id, $foundProfile->id);
    }

    public function testCanFindProfileByUserName(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create(['user_name' => 'uniqueuser']);

        $foundProfile = Profile::where('user_name', 'uniqueuser')->first();

        static::assertNotNull($foundProfile);
        static::assertSame($profile->id, $foundProfile->id);
    }

    public function testCanFindProfileByFirstName(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create(['first_name' => 'Unique']);

        $foundProfile = Profile::where('first_name', 'Unique')->first();

        static::assertNotNull($foundProfile);
        static::assertSame($profile->id, $foundProfile->id);
    }

    public function testCanFindProfileByLastName(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create(['last_name' => 'Unique']);

        $foundProfile = Profile::where('last_name', 'Unique')->first();

        static::assertNotNull($foundProfile);
        static::assertSame($profile->id, $foundProfile->id);
    }

    public function testCanFindProfileByPhone(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create(['phone' => '+1234567890']);

        $foundProfile = Profile::where('phone', '+1234567890')->first();

        static::assertNotNull($foundProfile);
        static::assertSame($profile->id, $foundProfile->id);
    }

    public function testCanFindProfileByStatus(): void
    {
        Profile::factory()->create(['status' => 'active']);
        Profile::factory()->create(['status' => 'inactive']);
        Profile::factory()->create(['status' => 'pending']);

        $activeProfiles = Profile::where('status', 'active')->get();

        static::assertCount(1, $activeProfiles);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame('active', $activeProfiles->first()->status);
    }

    public function testCanFindProfileByTimezone(): void
    {
        Profile::factory()->create(['timezone' => 'UTC']);
        Profile::factory()->create(['timezone' => 'Europe/Rome']);
        Profile::factory()->create(['timezone' => 'America/New_York']);

        $utcProfiles = Profile::where('timezone', 'UTC')->get();

        static::assertCount(1, $utcProfiles);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame('UTC', $utcProfiles->first()->timezone);
    }

    public function testCanFindProfileByLocale(): void
    {
        Profile::factory()->create(['locale' => 'en']);
        Profile::factory()->create(['locale' => 'it']);
        Profile::factory()->create(['locale' => 'de']);

        $englishProfiles = Profile::where('locale', 'en')->get();

        static::assertCount(1, $englishProfiles);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame('en', $englishProfiles->first()->locale);
    }

    public function testCanFindProfilesByNamePattern(): void
    {
        Profile::factory()->create(['first_name' => 'John', 'last_name' => 'Doe']);
        Profile::factory()->create(['first_name' => 'Jane', 'last_name' => 'Doe']);
        Profile::factory()->create(['first_name' => 'Bob', 'last_name' => 'Smith']);

        $doeProfiles = Profile::where('last_name', 'like', '%Doe%')->get();

        static::assertCount(2, $doeProfiles);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertTrue($doeProfiles->every(fn ($profile) => str_contains($profile->last_name, 'Doe')));
    }

    public function testCanFindProfilesByBioPattern(): void
    {
        Profile::factory()->create(['bio' => 'Software Developer']);
        Profile::factory()->create(['bio' => 'Designer']);
        Profile::factory()->create(['bio' => 'Product Manager']);

        $devProfiles = Profile::where('bio', 'like', '%Developer%')->get();

        static::assertCount(1, $devProfiles);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertTrue($devProfiles->every(fn ($profile) => str_contains($profile->bio, 'Developer')));
    }

    public function testCanUpdateProfile(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create(['first_name' => 'Old Name']);

        /** @phpstan-ignore-next-line method.nonObject */
        $profile->update(['first_name' => 'New Name']);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'first_name' => 'New Name',
        ]);
    }

    public function testCanHandleNullValues(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'user_name' => 'testuser',
            'email' => 'test@example.com',
            'phone' => null,
            'bio' => null,
            'avatar' => null,
            'timezone' => null,
            'locale' => null,
        ]);

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'phone' => null,
            'bio' => null,
            'avatar' => null,
            'timezone' => null,
            'locale' => null,
        ]);
    }

    public function testCanFindProfilesByMultipleCriteria(): void
    {
        Profile::factory()->create([
            'status' => 'active',
            'timezone' => 'UTC',
            'locale' => 'en',
        ]);

        Profile::factory()->create([
            'status' => 'active',
            'timezone' => 'Europe/Rome',
            'locale' => 'it',
        ]);

        Profile::factory()->create([
            'status' => 'inactive',
            'timezone' => 'UTC',
            'locale' => 'en',
        ]);

        $profiles = Profile::where('status', 'active')->where('timezone', 'UTC')->get();

        static::assertCount(1, $profiles);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame('active', $profiles->first()->status);
        /** @phpstan-ignore-next-line method.nonObject */
        static::assertSame('UTC', $profiles->first()->timezone);
    }

    public function testProfileHasRolesRelationship(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create();

        static::assertTrue(method_exists($profile, 'roles'));
    }

    public function testProfileHasPermissionsRelationship(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create();

        static::assertTrue(method_exists($profile, 'permissions'));
    }

    public function testProfileHasTeamsRelationship(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create();

        static::assertTrue(method_exists($profile, 'teams'));
    }

    public function testProfileHasDevicesRelationship(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create();

        static::assertTrue(method_exists($profile, 'devices'));
    }

    public function testProfileHasMediaRelationship(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create();

        static::assertTrue(method_exists($profile, 'media'));
    }

    public function testProfileCanUsePermissionScopes(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create();

        static::assertTrue(method_exists($profile, 'permission'));
        static::assertTrue(method_exists($profile, 'withoutPermission'));
    }

    public function testProfileCanUseRoleScopes(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create();

        static::assertTrue(method_exists($profile, 'role'));
        static::assertTrue(method_exists($profile, 'withoutRole'));
    }

    public function testProfileCanUseExtraAttributesScopes(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create();

        static::assertTrue(method_exists($profile, 'withExtraAttributes'));
    }

    public function testProfileHasFactory(): void
    {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $profile = Profile::factory()->create();

        static::assertNotNull($profile->id);
        static::assertInstanceOf(Profile::class, $profile);
    }
}
