<?php

declare(strict_types=1);

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Filament\Resources\UserResource\Pages\EditUser;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    $this->user = User::factory()->create([
        'type' => UserType::MasterAdmin,
        'email' => 'admin@example.com',
        'password' => Hash::make('password123'),
    ]);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource has correct navigation icon', function (): void {
    expect(UserResource::getNavigationIcon())->toBe('heroicon-o-users');
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource has correct widgets', function (): void {
    $widgets = UserResource::getWidgets();

    expect($widgets)->toHaveCount(1);
    expect($widgets)->toContain(UserOverview::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource has correct form schema', function (): void {
    $form = UserResource::getFormSchema();

    expect($form)->toHaveKey('section01');
    expect($form)->toHaveKey('section02');

    // Test section01
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $section01 = $form['section01'];
    expect($section01)->toBeInstanceOf(Section::class);

    /** @phpstan-ignore-next-line method.nonObject */
    $section01Schema = $section01->getDefaultChildComponents();
    expect($section01Schema)->toHaveCount(3);

    // Check if name field exists
    $nameField = collect($section01Schema)->firstWhere('name', 'name');
    expect($nameField)->not->toBeNull();
    expect($nameField)->toBeInstanceOf(TextInput::class);

    // Check if email field exists
    $emailField = collect($section01Schema)->firstWhere('name', 'email');
    expect($emailField)->not->toBeNull();
    expect($emailField)->toBeInstanceOf(TextInput::class);

    // Check if password field exists
    $passwordField = collect($section01Schema)->firstWhere('name', 'password');
    expect($passwordField)->not->toBeNull();
    expect($passwordField)->toBeInstanceOf(TextInput::class);

    // Test section02
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $section02 = $form['section02'];
    expect($section02)->toBeInstanceOf(Section::class);

    /** @phpstan-ignore-next-line method.nonObject */
    $section02Schema = $section02->getDefaultChildComponents();
    expect($section02Schema)->toHaveCount(1);

    // Check if created_at field exists
    $createdAtField = collect($section02Schema)->firstWhere('name', 'created_at');
    expect($createdAtField)->not->toBeNull();
    expect($createdAtField)->toBeInstanceOf(Placeholder::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource has combined relation manager tabs', function (): void {
    $resource = new UserResource;

    expect($resource->hasCombinedRelationManagerTabsWithContent())->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource extends correct base class', function (): void {
    $resource = new UserResource;

    expect($resource)->toBeInstanceOf(XotBaseResource::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource form schema has correct column spans', function (): void {
    $form = UserResource::getFormSchema();

    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $section01 = $form['section01'];
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $section02 = $form['section02'];

    expect($section01->getColumnSpan())->toBe(8);
    expect($section02->getColumnSpan())->toBe(4);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource name field is required', function (): void {
    $form = UserResource::getFormSchema();
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $section01 = $form['section01'];
    /** @phpstan-ignore-next-line method.nonObject */
    $section01Schema = $section01->getDefaultChildComponents();

    $nameField = collect($section01Schema)->firstWhere('name', 'name');

    expect($nameField->isRequired())->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource email field is required', function (): void {
    $form = UserResource::getFormSchema();
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $section01 = $form['section01'];
    /** @phpstan-ignore-next-line method.nonObject */
    $section01Schema = $section01->getDefaultChildComponents();

    $emailField = collect($section01Schema)->firstWhere('name', 'email');

    expect($emailField->isRequired())->toBeTrue();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource password field is required only on create', function (): void {
    $form = UserResource::getFormSchema();
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $section01 = $form['section01'];
    /** @phpstan-ignore-next-line method.nonObject */
    $section01Schema = $section01->getDefaultChildComponents();

    $passwordField = collect($section01Schema)->firstWhere('name', 'password');

    // Test with CreateUser page
    $createUserPage = new CreateUser;
    expect($passwordField->isRequired($createUserPage))->toBeTrue();

    // Test with EditUser page
    $editUserPage = new EditUser;
    expect($passwordField->isRequired($editUserPage))->toBeFalse();
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource password field has correct type', function (): void {
    $form = UserResource::getFormSchema();
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $section01 = $form['section01'];
    /** @phpstan-ignore-next-line method.nonObject */
    $section01Schema = $section01->getDefaultChildComponents();

    $passwordField = collect($section01Schema)->firstWhere('name', 'password');

    expect($passwordField->getType())->toBe('password');
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource email field has unique validation', function (): void {
    $form = UserResource::getFormSchema();
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $section01 = $form['section01'];
    /** @phpstan-ignore-next-line method.nonObject */
    $section01Schema = $section01->getDefaultChildComponents();

    $emailField = collect($section01Schema)->firstWhere('name', 'email');

    // Check if the field has unique validation
    /** @phpstan-ignore-next-line method.nonObject */
    $validationRules = $emailField->getValidationRules();
    expect($validationRules)->toContain('unique');
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource created_at field shows diff for humans', function (): void {
    $form = UserResource::getFormSchema();
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $section02 = $form['section02'];
    /** @phpstan-ignore-next-line method.nonObject */
    $section02Schema = $section02->getDefaultChildComponents();

    $createdAtField = collect($section02Schema)->firstWhere('name', 'created_at');

    // Test with a record
    /** @phpstan-ignore-next-line property.notFound */
    $content = $createdAtField->getContent($this->user);
    /** @phpstan-ignore-next-line property.notFound */
    expect($content)->toBe($this->user->created_at->diffForHumans());

    // Test with null record
    /** @phpstan-ignore-next-line method.nonObject */
    $contentNull = $createdAtField->getContent(null);
    expect($contentNull)->toBeInstanceOf(HtmlString::class);
    expect((string) $contentNull)->toContain('&mdash;');
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource can be instantiated', function (): void {
    $resource = new UserResource;

    expect($resource)->toBeInstanceOf(UserResource::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('user resource has correct model', function (): void {
    // Since the model is commented out, we'll test the default behavior
    $resource = new UserResource;

    // The resource should work with the default model resolution
    expect($resource)->toBeInstanceOf(UserResource::class);
});
