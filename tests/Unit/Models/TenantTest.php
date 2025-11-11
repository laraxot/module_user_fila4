<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\Tenant;
use Tests\TestCase;

class TenantTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_tenant_with_minimal_data(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'Test Tenant',
        ]);

        $this->assertDatabaseHas('tenants', [
            'id' => /** @phpstan-ignore-next-line property.notFound */
        $tenant->id,
            'name' => 'Test Tenant',
        ]);
    }

    public function test_can_create_tenant_with_all_fields(): void
    {
        $tenantData = [
            'name' => 'Full Tenant',
            'slug' => 'full-tenant',
            'domain' => 'fulltenant.com',
            'database' => 'fulltenant_db',
            'settings' => ['theme' => 'dark', 'features' => ['chat', 'analytics']],
            'is_active' => true,
            'trial_ends_at' => now()->addDays(30),
        ];

        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create($tenantData);

        $this->assertDatabaseHas('tenants', [
            'id' => /** @phpstan-ignore-next-line property.notFound */
        $tenant->id,
            'name' => 'Full Tenant',
            'slug' => 'full-tenant',
            'domain' => 'fulltenant.com',
            'database' => 'fulltenant_db',
            'is_active' => true,
        ]);

        // Verifica campi JSON
        static::assertSame(['theme' => 'dark', 'features' => ['chat', 'analytics']], /** @phpstan-ignore-next-line property.notFound */
        $tenant->settings);
    }

    public function test_tenant_has_soft_deletes(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();
        $tenantId = /** @phpstan-ignore-next-line property.notFound */
        $tenant->id;

        $tenant->delete();

        $this->assertSoftDeleted('tenants', ['id' => $tenantId]);
        $this->assertDatabaseMissing('tenants', ['id' => $tenantId]);
    }

    public function test_can_restore_soft_deleted_tenant(): void
    {
        if (! method_exists(Tenant::class, 'withTrashed')) {
            $this->markTestSkipped('SoftDeletes trait not present on Tenant model');

            return;
        }

        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();
        $tenantId = /** @phpstan-ignore-next-line property.notFound */
        $tenant->id;

        $tenant->delete();
        $this->assertSoftDeleted('tenants', ['id' => $tenantId]);

        /** @var Tenant $restoredTenant */
        $restoredTenant = Tenant::withTrashed()->find($tenantId);
        $restoredTenant->restore();

        $this->assertDatabaseHas('tenants', ['id' => $tenantId]);
        static::assertNull($restoredTenant->deleted_at);
    }

    public function test_can_find_tenant_by_name(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Unique Tenant Name']);

        $foundTenant = Tenant::where('name', 'Unique Tenant Name')->first();

        static::assertNotNull($foundTenant);
        static::assertSame(/** @phpstan-ignore-next-line property.notFound */
        $tenant->id, $foundTenant->id);
    }

    public function test_can_find_tenant_by_slug(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create(['slug' => 'unique-tenant']);

        $foundTenant = Tenant::where('slug', 'unique-tenant')->first();

        static::assertNotNull($foundTenant);
        static::assertSame(/** @phpstan-ignore-next-line property.notFound */
        $tenant->id, $foundTenant->id);
    }

    public function test_can_find_tenant_by_domain(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create(['domain' => 'uniquetenant.com']);

        $foundTenant = Tenant::where('domain', 'uniquetenant.com')->first();

        static::assertNotNull($foundTenant);
        static::assertSame(/** @phpstan-ignore-next-line property.notFound */
        $tenant->id, $foundTenant->id);
    }

    public function test_can_find_tenant_by_database(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create(['database' => 'unique_db']);

        $foundTenant = Tenant::where('database', 'unique_db')->first();

        static::assertNotNull($foundTenant);
        static::assertSame(/** @phpstan-ignore-next-line property.notFound */
        $tenant->id, $foundTenant->id);
    }

    public function test_can_find_active_tenants(): void
    {
        Tenant/** @phpstan-ignore-line */ ::factory()->create(['is_active' => true]);
        Tenant/** @phpstan-ignore-line */ ::factory()->create(['is_active' => false]);
        Tenant/** @phpstan-ignore-line */ ::factory()->create(['is_active' => true]);

        $activeTenants = Tenant::where('is_active', true)->get();

        static::assertCount(2, $activeTenants);
    }

    public function test_can_find_tenants_by_name_pattern(): void
    {
        Tenant/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Development Company']);
        Tenant/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Marketing Agency']);
        Tenant/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Sales Corporation']);

        $companyTenants = Tenant::where('name', 'like', '%Company%')->get();

        static::assertCount(1, $companyTenants);
    }

    public function test_can_find_tenants_by_domain_pattern(): void
    {
        Tenant/** @phpstan-ignore-line */ ::factory()->create(['domain' => 'dev.example.com']);
        Tenant/** @phpstan-ignore-line */ ::factory()->create(['domain' => 'staging.example.com']);
        Tenant/** @phpstan-ignore-line */ ::factory()->create(['domain' => 'prod.example.com']);

        $exampleTenants = Tenant::where('domain', 'like', '%.example.com')->get();

        static::assertCount(3, $exampleTenants);
    }

    public function test_can_update_tenant(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create(['name' => 'Old Name']);

        $tenant->update(['name' => 'New Name']);

        $this->assertDatabaseHas('tenants', [
            'id' => /** @phpstan-ignore-next-line property.notFound */
        $tenant->id,
            'name' => 'New Name',
        ]);
    }

    public function test_can_handle_null_values(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'Test Tenant',
            'slug' => null,
            'domain' => null,
            'database' => null,
        ]);

        $this->assertDatabaseHas('tenants', [
            'id' => /** @phpstan-ignore-next-line property.notFound */
        $tenant->id,
            'slug' => null,
            'domain' => null,
            'database' => null,
        ]);
    }

    public function test_can_find_tenants_by_multiple_criteria(): void
    {
        Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'Active Company',
            'is_active' => true,
            'domain' => 'active.com',
        ]);

        Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'name' => 'Inactive Company',
            'is_active' => false,
            'domain' => 'inactive.com',
        ]);

        $tenants = Tenant::where('is_active', true)->where('domain', 'like', '%.com')->get();

        static::assertCount(1, $tenants);
        static::assertSame('Active Company', $tenants->first()->name);
        static::assertTrue($tenants->first()->is_active);
    }

    public function test_tenant_has_users_relationship(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();

        static::assertTrue(method_exists($tenant, 'users'));
    }

    public function test_tenant_has_members_relationship(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();

        static::assertTrue(method_exists($tenant, 'members'));
    }

    public function test_tenant_has_media_relationship(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();

        static::assertTrue(method_exists($tenant, 'media'));
    }

    public function test_tenant_has_factory(): void
    {
        $tenant = Tenant/** @phpstan-ignore-line */ ::factory()->create();

        static::assertNotNull(/** @phpstan-ignore-next-line property.notFound */
        $tenant->id);
        static::assertInstanceOf(Tenant::class, $tenant);
    }

    public function test_can_find_tenants_by_trial_status(): void
    {
        $activeTenant = Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'trial_ends_at' => now()->addDays(30),
        ]);

        $expiredTenant = Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'trial_ends_at' => now()->subDays(1),
        ]);

        $activeTrials = Tenant::where('trial_ends_at', '>', now())->get();

        static::assertCount(1, $activeTrials);
        static::assertSame($activeTenant->id, $activeTrials->first()->id);
    }

    public function test_can_find_tenants_by_settings_value(): void
    {
        Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'settings' => ['theme' => 'dark', 'features' => ['chat']],
        ]);

        Tenant/** @phpstan-ignore-line */ ::factory()->create([
            'settings' => ['theme' => 'light', 'features' => ['analytics']],
        ]);

        $darkThemeTenants = Tenant::whereJsonContains('settings->theme', 'dark')->get();

        static::assertCount(1, $darkThemeTenants);
        static::assertSame('dark', $darkThemeTenants->first()->settings['theme']);
    }
}
