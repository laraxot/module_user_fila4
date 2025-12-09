<?php

declare(strict_types=1);

use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Contracts\TenantContract;
use Modules\User\Models\BaseTenant;
use Modules\User\Models\Tenant;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    $this->tenant = Tenant::factory()->create([
        'name' => 'Test Tenant',
        'email_address' => 'test@tenant.com',
        'phone' => '+39 123 456 789',
        'mobile' => '+39 987 654 321',
        'address' => 'Via Roma 123',
        'primary_color' => '#FF0000',
        'secondary_color' => '#00FF00',
    ]);
});

test('tenant can be created', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant)->toBeInstanceOf(Tenant::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->name)->toBe('Test Tenant');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->email_address)->toBe('test@tenant.com');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->phone)->toBe('+39 123 456 789');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->mobile)->toBe('+39 987 654 321');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->address)->toBe('Via Roma 123');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->primary_color)->toBe('#FF0000');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->secondary_color)->toBe('#00FF00');
});

test('tenant extends correct base class', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant)->toBeInstanceOf(BaseTenant::class);
});

test('tenant has correct fillable attributes', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $fillable = $this->tenant->getFillable();

    expect($fillable)->toContain('id');
    expect($fillable)->toContain('name');
    expect($fillable)->toContain('slug');
    expect($fillable)->toContain('email_address');
    expect($fillable)->toContain('phone');
    expect($fillable)->toContain('mobile');
    expect($fillable)->toContain('address');
    expect($fillable)->toContain('primary_color');
    expect($fillable)->toContain('secondary_color');
});

test('tenant has slug generated from name', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->slug)->toBe('test-tenant');
});

test('tenant slug is automatically generated', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $newTenant = Tenant::factory()->create([
        'name' => 'Another Test Tenant',
    ]);

    expect($newTenant->slug)->toBe('another-test-tenant');
});

test('tenant has users relationship', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant)->toHaveMethod('users');

    /** @phpstan-ignore-next-line property.notFound */
    $users = $this->tenant->users();
    expect($users)->toBeInstanceOf(BelongsToMany::class);
});

test('tenant has members relationship', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant)->toHaveMethod('members');

    /** @phpstan-ignore-next-line property.notFound */
    $members = $this->tenant->members();
    expect($members)->toBeInstanceOf(BelongsToMany::class);
});

test('tenant implements required interfaces', function (): void {
    $reflection = new ReflectionClass(Tenant::class);

    expect($reflection->implementsInterface(HasAvatar::class))->toBeTrue();
    expect($reflection->implementsInterface(HasMedia::class))->toBeTrue();
    expect($reflection->implementsInterface(TenantContract::class))->toBeTrue();
});

test('tenant has slug options configuration', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant)->toHaveMethod('getSlugOptions');

    /** @phpstan-ignore-next-line property.notFound */
    $slugOptions = $this->tenant->getSlugOptions();
    expect($slugOptions)->toBeInstanceOf(SlugOptions::class);
});

test('tenant has filament avatar url method', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant)->toHaveMethod('getFilamentAvatarUrl');

    /** @phpstan-ignore-next-line property.notFound */
    $avatarUrl = $this->tenant->getFilamentAvatarUrl();
    expect($avatarUrl)->toBeNull(); // Default implementation returns null
});

test('tenant can be found by slug', function (): void {
    $foundTenant = Tenant::where('slug', 'test-tenant')->first();

    expect($foundTenant)->not->toBeNull();
    /** @phpstan-ignore-next-line property.notFound */
    expect($foundTenant->id)->toBe($this->tenant->id);
    expect($foundTenant->name)->toBe('Test Tenant');
});

test('tenant has correct table name', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->getTable())->toBe('tenants');
});

test('tenant has correct primary key', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->getKeyName())->toBe('id');
});

test('tenant has correct connection', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->getConnectionName())->toBe('default');
});

test('tenant can be updated', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->tenant->update([
        'name' => 'Updated Tenant Name',
        'email_address' => 'updated@tenant.com',
    ]);

    /** @phpstan-ignore-next-line property.notFound */
    $this->tenant->refresh();

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->name)->toBe('Updated Tenant Name');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->email_address)->toBe('updated@tenant.com');
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->tenant->slug)->toBe('updated-tenant-name');
});

test('tenant can be deleted', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $tenantId = $this->tenant->id;

    /** @phpstan-ignore-next-line property.notFound */
    $this->tenant->delete();

    expect(Tenant::find($tenantId))->toBeNull();
});
