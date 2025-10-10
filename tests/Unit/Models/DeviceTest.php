<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\Device;
use Tests\TestCase;

class DeviceTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_device_with_minimal_data(): void
    {
        $device = Device::factory()->create([
            'device' => 'iPhone',
            'platform' => 'iOS',
        ]);

        $this->assertDatabaseHas('devices', [
            'id' => $device->id,
            'device' => 'iPhone',
            'platform' => 'iOS',
        ]);
    }

    public function test_can_create_device_with_all_fields(): void
    {
        $deviceData = [
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
            'mobile_id' => 'mobile123',
            'languages' => ['en', 'it', 'de'],
            'device' => 'iPhone 13',
            'platform' => 'iOS',
            'browser' => 'Safari',
            'version' => '15.0',
            'is_robot' => false,
            'robot' => null,
            'is_desktop' => false,
            'is_mobile' => true,
            'is_tablet' => false,
            'is_phone' => true,
        ];

        $device = Device::factory()->create($deviceData);

        $this->assertDatabaseHas('devices', [
            'id' => $device->id,
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
            'mobile_id' => 'mobile123',
            'device' => 'iPhone 13',
            'platform' => 'iOS',
            'browser' => 'Safari',
            'version' => '15.0',
            'is_robot' => false,
            'is_desktop' => false,
            'is_mobile' => true,
            'is_tablet' => false,
            'is_phone' => true,
        ]);

        // Verifica campi JSON
<<<<<<< HEAD
        static::assertSame(['en', 'it', 'de'], $device->languages);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame(['en', 'it', 'de'], $device->languages);
=======
        $this->assertEquals(['en', 'it', 'de'], $device->languages);
>>>>>>> a12f125f4a (.)
=======
        static::assertSame(['en', 'it', 'de'], $device->languages);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertEquals(['en', 'it', 'de'], $device->languages);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_device_has_soft_deletes(): void
    {
        $device = Device::factory()->create();
        $deviceId = $device->id;

        $device->delete();

        $this->assertSoftDeleted('devices', ['id' => $deviceId]);
        $this->assertDatabaseMissing('devices', ['id' => $deviceId]);
    }

    public function test_can_restore_soft_deleted_device(): void
    {
        if (!method_exists(Device::class, 'withTrashed')) {
            $this->markTestSkipped('SoftDeletes trait not present on Device model');
            return;
        }

        $device = Device::factory()->create();
        $deviceId = $device->id;

        $device->delete();
        $this->assertSoftDeleted('devices', ['id' => $deviceId]);

        /** @var Device $restoredDevice */
        $restoredDevice = Device::withTrashed()->find($deviceId);
        $restoredDevice->restore();

        $this->assertDatabaseHas('devices', ['id' => $deviceId]);
<<<<<<< HEAD
        static::assertNull($restoredDevice->deleted_at);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNull($restoredDevice->deleted_at);
=======
        $this->assertNull($restoredDevice->deleted_at);
>>>>>>> a12f125f4a (.)
=======
        static::assertNull($restoredDevice->deleted_at);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNull($restoredDevice->deleted_at);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_device_by_uuid(): void
    {
        $uuid = '550e8400-e29b-41d4-a716-446655440000';
        $device = Device::factory()->create(['uuid' => $uuid]);

        $foundDevice = Device::where('uuid', $uuid)->first();

<<<<<<< HEAD
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
=======
        $this->assertNotNull($foundDevice);
        $this->assertEquals($device->id, $foundDevice->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundDevice);
        $this->assertEquals($device->id, $foundDevice->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_device_by_mobile_id(): void
    {
        $device = Device::factory()->create(['mobile_id' => 'unique_mobile_123']);

        $foundDevice = Device::where('mobile_id', 'unique_mobile_123')->first();

<<<<<<< HEAD
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
=======
        $this->assertNotNull($foundDevice);
        $this->assertEquals($device->id, $foundDevice->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundDevice);
        $this->assertEquals($device->id, $foundDevice->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_device_by_device_type(): void
    {
        $device = Device::factory()->create(['device' => 'iPhone 13 Pro']);

        $foundDevice = Device::where('device', 'iPhone 13 Pro')->first();

<<<<<<< HEAD
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
=======
        $this->assertNotNull($foundDevice);
        $this->assertEquals($device->id, $foundDevice->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundDevice);
        $this->assertEquals($device->id, $foundDevice->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_device_by_platform(): void
    {
        Device::factory()->create(['platform' => 'iOS']);
        Device::factory()->create(['platform' => 'Android']);
        Device::factory()->create(['platform' => 'Windows']);

        $iosDevices = Device::where('platform', 'iOS')->get();

<<<<<<< HEAD
        static::assertCount(1, $iosDevices);
        static::assertSame('iOS', $iosDevices->first()->platform);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(1, $iosDevices);
        static::assertSame('iOS', $iosDevices->first()->platform);
=======
        $this->assertCount(1, $iosDevices);
        $this->assertEquals('iOS', $iosDevices->first()->platform);
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(1, $iosDevices);
        static::assertSame('iOS', $iosDevices->first()->platform);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(1, $iosDevices);
        $this->assertEquals('iOS', $iosDevices->first()->platform);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_device_by_browser(): void
    {
        Device::factory()->create(['browser' => 'Safari']);
        Device::factory()->create(['browser' => 'Chrome']);
        Device::factory()->create(['browser' => 'Firefox']);

        $safariDevices = Device::where('browser', 'Safari')->get();

<<<<<<< HEAD
        static::assertCount(1, $safariDevices);
        static::assertSame('Safari', $safariDevices->first()->browser);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(1, $safariDevices);
        static::assertSame('Safari', $safariDevices->first()->browser);
=======
        $this->assertCount(1, $safariDevices);
        $this->assertEquals('Safari', $safariDevices->first()->browser);
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(1, $safariDevices);
        static::assertSame('Safari', $safariDevices->first()->browser);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(1, $safariDevices);
        $this->assertEquals('Safari', $safariDevices->first()->browser);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_device_by_version(): void
    {
        $device = Device::factory()->create(['version' => '15.0.1']);

        $foundDevice = Device::where('version', '15.0.1')->first();

<<<<<<< HEAD
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
=======
        $this->assertNotNull($foundDevice);
        $this->assertEquals($device->id, $foundDevice->id);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($foundDevice);
        static::assertSame($device->id, $foundDevice->id);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($foundDevice);
        $this->assertEquals($device->id, $foundDevice->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_desktop_devices(): void
    {
        Device::factory()->create(['is_desktop' => true]);
        Device::factory()->create(['is_desktop' => false]);
        Device::factory()->create(['is_desktop' => true]);

        $desktopDevices = Device::where('is_desktop', true)->get();

<<<<<<< HEAD
        static::assertCount(2, $desktopDevices);
        static::assertTrue($desktopDevices->every(fn($device) => $device->is_desktop));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $desktopDevices);
        static::assertTrue($desktopDevices->every(fn($device) => $device->is_desktop));
=======
        $this->assertCount(2, $desktopDevices);
        $this->assertTrue($desktopDevices->every(fn ($device) => $device->is_desktop));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $desktopDevices);
        static::assertTrue($desktopDevices->every(fn($device) => $device->is_desktop));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $desktopDevices);
        $this->assertTrue($desktopDevices->every(fn ($device) => $device->is_desktop));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_mobile_devices(): void
    {
        Device::factory()->create(['is_mobile' => true]);
        Device::factory()->create(['is_mobile' => false]);
        Device::factory()->create(['is_mobile' => true]);

        $mobileDevices = Device::where('is_mobile', true)->get();

<<<<<<< HEAD
        static::assertCount(2, $mobileDevices);
        static::assertTrue($mobileDevices->every(fn($device) => $device->is_mobile));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $mobileDevices);
        static::assertTrue($mobileDevices->every(fn($device) => $device->is_mobile));
=======
        $this->assertCount(2, $mobileDevices);
        $this->assertTrue($mobileDevices->every(fn ($device) => $device->is_mobile));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $mobileDevices);
        static::assertTrue($mobileDevices->every(fn($device) => $device->is_mobile));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $mobileDevices);
        $this->assertTrue($mobileDevices->every(fn ($device) => $device->is_mobile));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_tablet_devices(): void
    {
        Device::factory()->create(['is_tablet' => true]);
        Device::factory()->create(['is_tablet' => false]);
        Device::factory()->create(['is_tablet' => true]);

        $tabletDevices = Device::where('is_tablet', true)->get();

<<<<<<< HEAD
        static::assertCount(2, $tabletDevices);
        static::assertTrue($tabletDevices->every(fn($device) => $device->is_tablet));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $tabletDevices);
        static::assertTrue($tabletDevices->every(fn($device) => $device->is_tablet));
=======
        $this->assertCount(2, $tabletDevices);
        $this->assertTrue($tabletDevices->every(fn ($device) => $device->is_tablet));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $tabletDevices);
        static::assertTrue($tabletDevices->every(fn($device) => $device->is_tablet));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $tabletDevices);
        $this->assertTrue($tabletDevices->every(fn ($device) => $device->is_tablet));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_phone_devices(): void
    {
        Device::factory()->create(['is_phone' => true]);
        Device::factory()->create(['is_phone' => false]);
        Device::factory()->create(['is_phone' => true]);

        $phoneDevices = Device::where('is_phone', true)->get();

<<<<<<< HEAD
        static::assertCount(2, $phoneDevices);
        static::assertTrue($phoneDevices->every(fn($device) => $device->is_phone));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $phoneDevices);
        static::assertTrue($phoneDevices->every(fn($device) => $device->is_phone));
=======
        $this->assertCount(2, $phoneDevices);
        $this->assertTrue($phoneDevices->every(fn ($device) => $device->is_phone));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $phoneDevices);
        static::assertTrue($phoneDevices->every(fn($device) => $device->is_phone));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $phoneDevices);
        $this->assertTrue($phoneDevices->every(fn ($device) => $device->is_phone));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_robot_devices(): void
    {
        Device::factory()->create(['is_robot' => true, 'robot' => 'Googlebot']);
        Device::factory()->create(['is_robot' => false, 'robot' => null]);
        Device::factory()->create(['is_robot' => true, 'robot' => 'Bingbot']);

        $robotDevices = Device::where('is_robot', true)->get();

<<<<<<< HEAD
        static::assertCount(2, $robotDevices);
        static::assertTrue($robotDevices->every(fn($device) => $device->is_robot));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $robotDevices);
        static::assertTrue($robotDevices->every(fn($device) => $device->is_robot));
=======
        $this->assertCount(2, $robotDevices);
        $this->assertTrue($robotDevices->every(fn ($device) => $device->is_robot));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $robotDevices);
        static::assertTrue($robotDevices->every(fn($device) => $device->is_robot));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $robotDevices);
        $this->assertTrue($robotDevices->every(fn ($device) => $device->is_robot));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_devices_by_language(): void
    {
        Device::factory()->create(['languages' => ['en', 'it']]);
        Device::factory()->create(['languages' => ['en', 'de']]);
        Device::factory()->create(['languages' => ['fr', 'es']]);

        $englishDevices = Device::whereJsonContains('languages', 'en')->get();

<<<<<<< HEAD
        static::assertCount(2, $englishDevices);
        static::assertTrue($englishDevices->every(fn($device) => in_array('en', $device->languages, strict: true)));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $englishDevices);
        static::assertTrue($englishDevices->every(fn($device) => in_array('en', $device->languages, strict: true)));
=======
        $this->assertCount(2, $englishDevices);
        $this->assertTrue($englishDevices->every(fn ($device) => in_array('en', $device->languages)));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $englishDevices);
        static::assertTrue($englishDevices->every(fn($device) => in_array('en', $device->languages, strict: true)));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $englishDevices);
        $this->assertTrue($englishDevices->every(fn ($device) => in_array('en', $device->languages)));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_find_devices_by_device_pattern(): void
    {
        Device::factory()->create(['device' => 'iPhone 13']);
        Device::factory()->create(['device' => 'iPhone 14']);
        Device::factory()->create(['device' => 'Samsung Galaxy']);

        $iphoneDevices = Device::where('device', 'like', '%iPhone%')->get();

<<<<<<< HEAD
        static::assertCount(2, $iphoneDevices);
        static::assertTrue($iphoneDevices->every(fn($device) => str_contains($device->device, 'iPhone')));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertCount(2, $iphoneDevices);
        static::assertTrue($iphoneDevices->every(fn($device) => str_contains($device->device, 'iPhone')));
=======
        $this->assertCount(2, $iphoneDevices);
        $this->assertTrue($iphoneDevices->every(fn ($device) => str_contains($device->device, 'iPhone')));
>>>>>>> a12f125f4a (.)
=======
        static::assertCount(2, $iphoneDevices);
        static::assertTrue($iphoneDevices->every(fn($device) => str_contains($device->device, 'iPhone')));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertCount(2, $iphoneDevices);
        $this->assertTrue($iphoneDevices->every(fn ($device) => str_contains($device->device, 'iPhone')));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_can_update_device(): void
    {
        $device = Device::factory()->create(['device' => 'Old Device']);

        $device->update(['device' => 'New Device']);

        $this->assertDatabaseHas('devices', [
            'id' => $device->id,
            'device' => 'New Device',
        ]);
    }

    public function test_can_handle_null_values(): void
    {
        $device = Device::factory()->create([
            'device' => 'Test Device',
            'platform' => 'Test Platform',
            'mobile_id' => null,
            'languages' => null,
            'browser' => null,
            'version' => null,
            'robot' => null,
        ]);

        $this->assertDatabaseHas('devices', [
            'id' => $device->id,
            'mobile_id' => null,
            'browser' => null,
            'version' => null,
            'robot' => null,
        ]);
    }

    public function test_can_find_devices_by_multiple_criteria(): void
    {
        Device::factory()->create([
            'platform' => 'iOS',
            'is_mobile' => true,
            'browser' => 'Safari',
        ]);

        Device::factory()->create([
            'platform' => 'Android',
            'is_mobile' => true,
            'browser' => 'Chrome',
        ]);

        Device::factory()->create([
            'platform' => 'Windows',
            'is_mobile' => false,
            'browser' => 'Edge',
        ]);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $devices = Device::where('is_mobile', true)->where('browser', 'Safari')->get();

        static::assertCount(1, $devices);
        static::assertSame('iOS', $devices->first()->platform);
        static::assertTrue($devices->first()->is_mobile);
        static::assertSame('Safari', $devices->first()->browser);
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $devices = Device::where('is_mobile', true)
            ->where('browser', 'Safari')
            ->get();

        $this->assertCount(1, $devices);
        $this->assertEquals('iOS', $devices->first()->platform);
        $this->assertTrue($devices->first()->is_mobile);
        $this->assertEquals('Safari', $devices->first()->browser);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $devices = Device::where('is_mobile', true)->where('browser', 'Safari')->get();

        static::assertCount(1, $devices);
        static::assertSame('iOS', $devices->first()->platform);
        static::assertTrue($devices->first()->is_mobile);
        static::assertSame('Safari', $devices->first()->browser);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_device_has_users_relationship(): void
    {
        $device = Device::factory()->create();

<<<<<<< HEAD
        static::assertTrue(method_exists($device, 'users'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertTrue(method_exists($device, 'users'));
=======
        $this->assertTrue(method_exists($device, 'users'));
>>>>>>> a12f125f4a (.)
=======
        static::assertTrue(method_exists($device, 'users'));
>>>>>>> b93ef594b4 (.)
=======
        $this->assertTrue(method_exists($device, 'users'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_device_has_factory(): void
    {
        $device = Device::factory()->create();

<<<<<<< HEAD
        static::assertNotNull($device->id);
        static::assertInstanceOf(Device::class, $device);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertNotNull($device->id);
        static::assertInstanceOf(Device::class, $device);
=======
        $this->assertNotNull($device->id);
        $this->assertInstanceOf(Device::class, $device);
>>>>>>> a12f125f4a (.)
=======
        static::assertNotNull($device->id);
        static::assertInstanceOf(Device::class, $device);
>>>>>>> b93ef594b4 (.)
=======
        $this->assertNotNull($device->id);
        $this->assertInstanceOf(Device::class, $device);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_device_has_fillable_attributes(): void
    {
        $device = new Device();

        $expectedFillable = [
            'id',
            'uuid',
            'mobile_id',
            'languages',
            'device',
            'platform',
            'browser',
            'version',
            'is_robot',
            'robot',
            'is_desktop',
            'is_mobile',
            'is_tablet',
            'is_phone',
        ];

<<<<<<< HEAD
        static::assertSame($expectedFillable, $device->getFillable());
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame($expectedFillable, $device->getFillable());
=======
        $this->assertEquals($expectedFillable, $device->getFillable());
>>>>>>> a12f125f4a (.)
=======
        static::assertSame($expectedFillable, $device->getFillable());
>>>>>>> b93ef594b4 (.)
=======
        $this->assertEquals($expectedFillable, $device->getFillable());
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function test_device_has_casts(): void
    {
        $device = new Device();

        $expectedCasts = [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'languages' => 'array',
            'is_robot' => 'boolean',
            'is_desktop' => 'boolean',
            'is_mobile' => 'boolean',
            'is_tablet' => 'boolean',
            'is_phone' => 'boolean',
        ];

<<<<<<< HEAD
        static::assertSame($expectedCasts, $device->getCasts());
    }
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        static::assertSame($expectedCasts, $device->getCasts());
    }
}
=======
=======
>>>>>>> origin/develop
        $this->assertEquals($expectedCasts, $device->getCasts());
    }
}







<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        static::assertSame($expectedCasts, $device->getCasts());
    }
}
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
