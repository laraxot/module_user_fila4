<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\User\Models\Tenant;
use Tests\TestCase;

uses(TestCase::class, DatabaseTransactions::class);

it('can create tenant with minimal data', function () {
    $tenant = Tenant::factory()->create([
        'name' => 'Test Tenant',
    ]);

    expect($tenant)->toBeInstanceOf(Tenant::class);
    
    $this->assertDatabaseHas('tenants', [
        'id' => $tenant->id,
        'name' => 'Test Tenant',
    ]);
});

it('can create tenant with all fields', function () {
    $tenantData = [
        'name' => 'Full Tenant',
        'slug' => 'full-tenant',
        'domain' => 'fulltenant.com',
        'database' => 'fulltenant_db',
        'settings' => ['theme' => 'dark', 'features' => ['chat', 'analytics']],
        'is_active' => true,
        'trial_ends_at' => now()->addDays(30),
    ];

    $tenant = Tenant::factory()->create($tenantData);

    $this->assertDatabaseHas('tenants', [
        'id' => $tenant->id,
        'name' => 'Full Tenant',
        'slug' => 'full-tenant',
        'domain' => 'fulltenant.com',
        'database' => 'fulltenant_db',
        'is_active' => true,
    ]);

    expect($tenant->settings)->toBeArray()
        ->and($tenant->settings)->toEqual(['theme' => 'dark', 'features' => ['chat', 'analytics']]);
});

it('tenant has soft deletes', function () {
    $tenant = Tenant::factory()->create();
    $tenantId = $tenant->id;

    $tenant->delete();

    $this->assertSoftDeleted('tenants', ['id' => $tenantId]);
    $this->assertDatabaseMissing('tenants', ['id' => $tenantId]);
});

it('can restore soft deleted tenant', function () {
    if (! method_exists(Tenant::class, 'withTrashed')) {
        $this->markTestSkipped('SoftDeletes trait not present on Tenant model');
        return;
    }

    $tenant = Tenant::factory()->create();
    $tenantId = $tenant->id;

    $tenant->delete();
    $this->assertSoftDeleted('tenants', ['id' => $tenantId]);

    /** @var Tenant $restoredTenant */
    $restoredTenant = Tenant::withTrashed()->find($tenantId);
    $restoredTenant->restore();

    $this->assertDatabaseHas('tenants', ['id' => $tenantId]);
    expect($restoredTenant->deleted_at)->toBeNull();
});

it('can find tenant by name', function () {
    $tenant = Tenant::factory()->create(['name' => 'Unique Tenant Name']);

    $foundTenant = Tenant::where('name', 'Unique Tenant Name')->first();

    expect($foundTenant)->not()->toBeNull()
        ->and($foundTenant->id)->toBe($tenant->id);
});

it('can find tenant by slug', function () {
    $tenant = Tenant::factory()->create(['slug' => 'unique-tenant']);

    $foundTenant = Tenant::where('slug', 'unique-tenant')->first();

    expect($foundTenant)->not()->toBeNull()
        ->and($foundTenant->id)->toBe($tenant->id);
});

it('can find tenant by domain', function () {
    $tenant = Tenant::factory()->create(['domain' => 'uniquetenant.com']);

    $foundTenant = Tenant::where('domain', 'uniquetenant.com')->first();

    expect($foundTenant)->not()->toBeNull()
        ->and($foundTenant->id)->toBe($tenant->id);
});

it('can find tenant by database', function () {
    $tenant = Tenant::factory()->create(['database' => 'unique_db']);

    $foundTenant = Tenant::where('database', 'unique_db')->first();

    expect($foundTenant)->not()->toBeNull()
        ->and($foundTenant->id)->toBe($tenant->id);
});

it('can find active tenants', function () {
    Tenant::factory()->create(['is_active' => true]);
    Tenant::factory()->create(['is_active' => false]);
    Tenant::factory()->create(['is_active' => true]);

    $activeTenants = Tenant::where('is_active', true)->get();

    expect($activeTenants)->toHaveCount(2)
        ->and($activeTenants->every(fn ($tenant) => $tenant->is_active))->toBeTrue();
});

it('can find tenants by name pattern', function () {
    Tenant::factory()->create(['name' => 'Development Company']);
    Tenant::factory()->create(['name' => 'Marketing Agency']);
    Tenant::factory()->create(['name' => 'Sales Corporation']);

    $companyTenants = Tenant::where('name', 'like', '%Company%')->get();

    expect($companyTenants)->toHaveCount(1)
        ->and($companyTenants->every(fn ($tenant) => str_contains($tenant->name, 'Company')))->toBeTrue();
});

it('can find tenants by domain pattern', function () {
    Tenant::factory()->create(['domain' => 'dev.example.com']);
    Tenant::factory()->create(['domain' => 'staging.example.com']);
    Tenant::factory()->create(['domain' => 'prod.example.com']);

    $exampleTenants = Tenant::where('domain', 'like', '%.example.com')->get();

    expect($exampleTenants)->toHaveCount(3)
        ->and($exampleTenants->every(fn ($tenant) => str_ends_with($tenant->domain, '.example.com')))->toBeTrue();
});

it('can update tenant', function () {
    $tenant = Tenant::factory()->create(['name' => 'Old Name']);

    $tenant->update(['name' => 'New Name']);

    $this->assertDatabaseHas('tenants', [
        'id' => $tenant->id,
        'name' => 'New Name',
    ]);
});

it('can handle null values', function () {
    $tenant = Tenant::factory()->create([
        'name' => 'Test Tenant',
        'slug' => null,
        'domain' => null,
        'database' => null,
    ]);

    $this->assertDatabaseHas('tenants', [
        'id' => $tenant->id,
        'slug' => null,
        'domain' => null,
        'database' => null,
    ]);
});

it('can find tenants by multiple criteria', function () {
    Tenant::factory()->create([
        'name' => 'Active Company',
        'is_active' => true,
        'domain' => 'active.com',
    ]);

    Tenant::factory()->create([
        'name' => 'Inactive Company',
        'is_active' => false,
        'domain' => 'inactive.com',
    ]);

    $tenants = Tenant::where('is_active', true)->where('domain', 'like', '%.com')->get();

    expect($tenants)->toHaveCount(1)
        ->and($tenants->first()->name)->toBe('Active Company')
        ->and($tenants->first()->is_active)->toBeTrue();
});

it('tenant has users relationship', function () {
    $tenant = Tenant::factory()->create();

    expect(method_exists($tenant, 'users'))->toBeTrue();
});

it('tenant has members relationship', function () {
    $tenant = Tenant::factory()->create();

    expect(method_exists($tenant, 'members'))->toBeTrue();
});

it('tenant has media relationship', function () {
    $tenant = Tenant::factory()->create();

    expect(method_exists($tenant, 'media'))->toBeTrue();
});

it('tenant has factory', function () {
    $tenant = Tenant::factory()->create();

    expect($tenant->id)->not()->toBeNull()
        ->and($tenant)->toBeInstanceOf(Tenant::class);
});

it('can find tenants by trial status', function () {
    $activeTenant = Tenant::factory()->create([
        'trial_ends_at' => now()->addDays(30),
    ]);

    $expiredTenant = Tenant::factory()->create([
        'trial_ends_at' => now()->subDays(1),
    ]);

    $activeTrials = Tenant::where('trial_ends_at', '>', now())->get();

    expect($activeTrials)->toHaveCount(1)
        ->and($activeTrials->first()->id)->toBe($activeTenant->id);
});

it('can find tenants by settings value', function () {
    Tenant::factory()->create([
        'settings' => ['theme' => 'dark', 'features' => ['chat']],
    ]);

    Tenant::factory()->create([
        'settings' => ['theme' => 'light', 'features' => ['analytics']],
    ]);

    $darkThemeTenants = Tenant::whereJsonContains('settings->theme', 'dark')->get();

    expect($darkThemeTenants)->toHaveCount(1)
        ->and($darkThemeTenants->first()->settings['theme'])->toBe('dark');
});