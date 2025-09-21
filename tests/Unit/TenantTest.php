<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Tests\TestCase;
use Modules\User\Models\BaseTenant;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Filament\Models\Contracts\HasAvatar;
use Spatie\MediaLibrary\HasMedia;
use Modules\User\Contracts\TenantContract;
use Spatie\Sluggable\SlugOptions;
<<<<<<< HEAD
use Modules\User\Models\Tenant;

uses(TestCase::class);
=======
<<<<<<< HEAD
use Modules\User\Models\Tenant;

uses(TestCase::class);
=======
namespace Modules\User\Tests\Unit\TenantTest;

namespace Modules\User\Tests\Unit\Widgets;

=======
>>>>>>> b93ef594b4 (.)
use Modules\User\Models\Tenant;

<<<<<<< HEAD
uses(Tests\TestCase::class);
>>>>>>> a12f125f4a (.)
=======
uses(TestCase::class);
>>>>>>> b93ef594b4 (.)
=======
use Modules\User\Models\Tenant;
use Modules\User\Models\User;
use Illuminate\Support\Str;

uses(Tests\TestCase::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

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
    expect($this->tenant)->toBeInstanceOf(Tenant::class);
    expect($this->tenant->name)->toBe('Test Tenant');
    expect($this->tenant->email_address)->toBe('test@tenant.com');
    expect($this->tenant->phone)->toBe('+39 123 456 789');
    expect($this->tenant->mobile)->toBe('+39 987 654 321');
    expect($this->tenant->address)->toBe('Via Roma 123');
    expect($this->tenant->primary_color)->toBe('#FF0000');
    expect($this->tenant->secondary_color)->toBe('#00FF00');
});

test('tenant extends correct base class', function (): void {
<<<<<<< HEAD
    expect($this->tenant)->toBeInstanceOf(BaseTenant::class);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    expect($this->tenant)->toBeInstanceOf(BaseTenant::class);
=======
    expect($this->tenant)->toBeInstanceOf(\Modules\User\Models\BaseTenant::class);
>>>>>>> a12f125f4a (.)
=======
    expect($this->tenant)->toBeInstanceOf(BaseTenant::class);
>>>>>>> b93ef594b4 (.)
=======
    expect($this->tenant)->toBeInstanceOf(\Modules\User\Models\BaseTenant::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('tenant has correct fillable attributes', function (): void {
    $fillable = $this->tenant->getFillable();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
    expect($this->tenant->slug)->toBe('test-tenant');
});

test('tenant slug is automatically generated', function (): void {
    $newTenant = Tenant::factory()->create([
        'name' => 'Another Test Tenant',
    ]);
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($newTenant->slug)->toBe('another-test-tenant');
});

test('tenant has users relationship', function (): void {
    expect($this->tenant)->toHaveMethod('users');
<<<<<<< HEAD

    $users = $this->tenant->users();
    expect($users)->toBeInstanceOf(BelongsToMany::class);
=======
<<<<<<< HEAD

    $users = $this->tenant->users();
<<<<<<< HEAD
<<<<<<< HEAD
    expect($users)->toBeInstanceOf(BelongsToMany::class);
=======
    expect($users)->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsToMany::class);
>>>>>>> a12f125f4a (.)
=======
    expect($users)->toBeInstanceOf(BelongsToMany::class);
>>>>>>> b93ef594b4 (.)
=======
    
    $users = $this->tenant->users();
    expect($users)->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsToMany::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('tenant has members relationship', function (): void {
    expect($this->tenant)->toHaveMethod('members');
<<<<<<< HEAD

    $members = $this->tenant->members();
    expect($members)->toBeInstanceOf(BelongsToMany::class);
=======
<<<<<<< HEAD

    $members = $this->tenant->members();
<<<<<<< HEAD
<<<<<<< HEAD
    expect($members)->toBeInstanceOf(BelongsToMany::class);
=======
    expect($members)->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsToMany::class);
>>>>>>> a12f125f4a (.)
=======
    expect($members)->toBeInstanceOf(BelongsToMany::class);
>>>>>>> b93ef594b4 (.)
=======
    
    $members = $this->tenant->members();
    expect($members)->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsToMany::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('tenant implements required interfaces', function (): void {
    $reflection = new ReflectionClass(Tenant::class);
<<<<<<< HEAD

    expect($reflection->implementsInterface(HasAvatar::class))->toBeTrue();
    expect($reflection->implementsInterface(HasMedia::class))->toBeTrue();
    expect($reflection->implementsInterface(TenantContract::class))->toBeTrue();
=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    expect($reflection->implementsInterface(HasAvatar::class))->toBeTrue();
    expect($reflection->implementsInterface(HasMedia::class))->toBeTrue();
    expect($reflection->implementsInterface(TenantContract::class))->toBeTrue();
=======
    expect($reflection->implementsInterface(\Filament\Models\Contracts\HasAvatar::class))->toBeTrue();
    expect($reflection->implementsInterface(\Spatie\MediaLibrary\HasMedia::class))->toBeTrue();
    expect($reflection->implementsInterface(\Modules\User\Contracts\TenantContract::class))->toBeTrue();
>>>>>>> a12f125f4a (.)
=======
    expect($reflection->implementsInterface(HasAvatar::class))->toBeTrue();
    expect($reflection->implementsInterface(HasMedia::class))->toBeTrue();
    expect($reflection->implementsInterface(TenantContract::class))->toBeTrue();
>>>>>>> b93ef594b4 (.)
=======
    
    expect($reflection->implementsInterface(\Filament\Models\Contracts\HasAvatar::class))->toBeTrue();
    expect($reflection->implementsInterface(\Spatie\MediaLibrary\HasMedia::class))->toBeTrue();
    expect($reflection->implementsInterface(\Modules\User\Contracts\TenantContract::class))->toBeTrue();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('tenant has slug options configuration', function (): void {
    expect($this->tenant)->toHaveMethod('getSlugOptions');
<<<<<<< HEAD

    $slugOptions = $this->tenant->getSlugOptions();
    expect($slugOptions)->toBeInstanceOf(SlugOptions::class);
=======
<<<<<<< HEAD

    $slugOptions = $this->tenant->getSlugOptions();
<<<<<<< HEAD
<<<<<<< HEAD
    expect($slugOptions)->toBeInstanceOf(SlugOptions::class);
=======
    expect($slugOptions)->toBeInstanceOf(\Spatie\Sluggable\SlugOptions::class);
>>>>>>> a12f125f4a (.)
=======
    expect($slugOptions)->toBeInstanceOf(SlugOptions::class);
>>>>>>> b93ef594b4 (.)
=======
    
    $slugOptions = $this->tenant->getSlugOptions();
    expect($slugOptions)->toBeInstanceOf(\Spatie\Sluggable\SlugOptions::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('tenant has filament avatar url method', function (): void {
    expect($this->tenant)->toHaveMethod('getFilamentAvatarUrl');
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    $avatarUrl = $this->tenant->getFilamentAvatarUrl();
    expect($avatarUrl)->toBeNull(); // Default implementation returns null
});

test('tenant can be found by slug', function (): void {
    $foundTenant = Tenant::where('slug', 'test-tenant')->first();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($foundTenant)->not->toBeNull();
    expect($foundTenant->id)->toBe($this->tenant->id);
    expect($foundTenant->name)->toBe('Test Tenant');
});

test('tenant has correct table name', function (): void {
    expect($this->tenant->getTable())->toBe('tenants');
});

test('tenant has correct primary key', function (): void {
    expect($this->tenant->getKeyName())->toBe('id');
});

test('tenant has correct connection', function (): void {
    expect($this->tenant->getConnectionName())->toBe('default');
});

test('tenant can be updated', function (): void {
    $this->tenant->update([
        'name' => 'Updated Tenant Name',
        'email_address' => 'updated@tenant.com',
    ]);
<<<<<<< HEAD

    $this->tenant->refresh();

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    $this->tenant->refresh();

=======
>>>>>>> a12f125f4a (.)
=======
    $this->tenant->refresh();

>>>>>>> b93ef594b4 (.)
=======
    
    $this->tenant->refresh();
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->tenant->name)->toBe('Updated Tenant Name');
    expect($this->tenant->email_address)->toBe('updated@tenant.com');
    expect($this->tenant->slug)->toBe('updated-tenant-name');
});

test('tenant can be deleted', function (): void {
    $tenantId = $this->tenant->id;
<<<<<<< HEAD

    $this->tenant->delete();

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    $this->tenant->delete();

=======
>>>>>>> a12f125f4a (.)
=======
    $this->tenant->delete();

>>>>>>> b93ef594b4 (.)
=======
    
    $this->tenant->delete();
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect(Tenant::find($tenantId))->toBeNull();
});
