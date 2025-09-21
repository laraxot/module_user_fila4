<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Tests\TestCase;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Illuminate\Support\HtmlString;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use Modules\User\Enums\UserType;
=======
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use Modules\User\Enums\UserType;
=======
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Support\Facades\Hash;
use Modules\User\Enums\UserType;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Filament\Resources\UserResource\Pages\EditUser;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Models\User;
<<<<<<< HEAD

uses(TestCase::class);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Enums\UserType;
use Illuminate\Support\Facades\Hash;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)

uses(TestCase::class);
=======
use Modules\User\Enums\UserType;
use Illuminate\Support\Facades\Hash;

uses(Tests\TestCase::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

beforeEach(function (): void {
    $this->user = User::factory()->create([
        'type' => UserType::MasterAdmin,
        'email' => 'admin@example.com',
        'password' => Hash::make('password123'),
    ]);
});

test('user resource has correct navigation icon', function (): void {
    expect(UserResource::getNavigationIcon())->toBe('heroicon-o-users');
});

test('user resource has correct widgets', function (): void {
    $widgets = UserResource::getWidgets();
<<<<<<< HEAD

    expect($widgets)->toHaveCount(1);
    expect($widgets)->toContain(UserOverview::class);
=======
<<<<<<< HEAD

    expect($widgets)->toHaveCount(1);
    expect($widgets)->toContain(UserOverview::class);
=======
    
    expect($widgets)->toHaveCount(1);
    expect($widgets)->toContain(\Modules\User\Filament\Resources\UserResource\Widgets\UserOverview::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('user resource has correct form schema', function (): void {
    $schema = UserResource::getFormSchema();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    expect($schema)->toHaveKey('section01');
    expect($schema)->toHaveKey('section02');

    // Test section01
    $section01 = $schema['section01'];
    expect($section01)->toBeInstanceOf(Section::class);

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
    $section02 = $schema['section02'];
    expect($section02)->toBeInstanceOf(Section::class);

    $section02Schema = $section02->getDefaultChildComponents();
    expect($section02Schema)->toHaveCount(1);

    // Check if created_at field exists
    $createdAtField = collect($section02Schema)->firstWhere('name', 'created_at');
    expect($createdAtField)->not->toBeNull();
    expect($createdAtField)->toBeInstanceOf(Placeholder::class);
<<<<<<< HEAD
=======
=======
    
    expect($schema)->toHaveKey('section01');
    expect($schema)->toHaveKey('section02');
    
    // Test section01
    $section01 = $schema['section01'];
    expect($section01)->toBeInstanceOf(\Filament\Forms\Components\Section::class);
    
    $section01Schema = $section01->getChildComponents();
    expect($section01Schema)->toHaveCount(3);
    
    // Check if name field exists
    $nameField = collect($section01Schema)->firstWhere('name', 'name');
    expect($nameField)->not->toBeNull();
    expect($nameField)->toBeInstanceOf(\Filament\Forms\Components\TextInput::class);
    
    // Check if email field exists
    $emailField = collect($section01Schema)->firstWhere('name', 'email');
    expect($emailField)->not->toBeNull();
    expect($emailField)->toBeInstanceOf(\Filament\Forms\Components\TextInput::class);
    
    // Check if password field exists
    $passwordField = collect($section01Schema)->firstWhere('name', 'password');
    expect($passwordField)->not->toBeNull();
    expect($passwordField)->toBeInstanceOf(\Filament\Forms\Components\TextInput::class);
    
    // Test section02
    $section02 = $schema['section02'];
    expect($section02)->toBeInstanceOf(\Filament\Forms\Components\Section::class);
    
    $section02Schema = $section02->getChildComponents();
    expect($section02Schema)->toHaveCount(1);
    
    // Check if created_at field exists
    $createdAtField = collect($section02Schema)->firstWhere('name', 'created_at');
    expect($createdAtField)->not->toBeNull();
    expect($createdAtField)->toBeInstanceOf(\Filament\Forms\Components\Placeholder::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('user resource has combined relation manager tabs', function (): void {
    $resource = new UserResource();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($resource->hasCombinedRelationManagerTabsWithContent())->toBeTrue();
});

test('user resource extends correct base class', function (): void {
    $resource = new UserResource();
<<<<<<< HEAD

    expect($resource)->toBeInstanceOf(XotBaseResource::class);
=======
<<<<<<< HEAD

    expect($resource)->toBeInstanceOf(XotBaseResource::class);
=======
    
    expect($resource)->toBeInstanceOf(\Modules\Xot\Filament\Resources\XotBaseResource::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('user resource form schema has correct column spans', function (): void {
    $schema = UserResource::getFormSchema();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    $section01 = $schema['section01'];
    $section02 = $schema['section02'];

<<<<<<< HEAD
=======
=======
    
    $section01 = $schema['section01'];
    $section02 = $schema['section02'];
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($section01->getColumnSpan())->toBe(8);
    expect($section02->getColumnSpan())->toBe(4);
});

test('user resource name field is required', function (): void {
    $schema = UserResource::getFormSchema();
    $section01 = $schema['section01'];
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    $section01Schema = $section01->getDefaultChildComponents();

    $nameField = collect($section01Schema)->firstWhere('name', 'name');

<<<<<<< HEAD
=======
=======
    $section01Schema = $section01->getChildComponents();
    
    $nameField = collect($section01Schema)->firstWhere('name', 'name');
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($nameField->isRequired())->toBeTrue();
});

test('user resource email field is required', function (): void {
    $schema = UserResource::getFormSchema();
    $section01 = $schema['section01'];
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    $section01Schema = $section01->getDefaultChildComponents();

    $emailField = collect($section01Schema)->firstWhere('name', 'email');

<<<<<<< HEAD
=======
=======
    $section01Schema = $section01->getChildComponents();
    
    $emailField = collect($section01Schema)->firstWhere('name', 'email');
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($emailField->isRequired())->toBeTrue();
});

test('user resource password field is required only on create', function (): void {
    $schema = UserResource::getFormSchema();
    $section01 = $schema['section01'];
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    $section01Schema = $section01->getDefaultChildComponents();

    $passwordField = collect($section01Schema)->firstWhere('name', 'password');

    // Test with CreateUser page
    $createUserPage = new CreateUser();
    expect($passwordField->isRequired($createUserPage))->toBeTrue();

<<<<<<< HEAD
=======
=======
    $section01Schema = $section01->getChildComponents();
    
    $passwordField = collect($section01Schema)->firstWhere('name', 'password');
    
    // Test with CreateUser page
    $createUserPage = new CreateUser();
    expect($passwordField->isRequired($createUserPage))->toBeTrue();
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Test with EditUser page
    $editUserPage = new EditUser();
    expect($passwordField->isRequired($editUserPage))->toBeFalse();
});

test('user resource password field has correct type', function (): void {
    $schema = UserResource::getFormSchema();
    $section01 = $schema['section01'];
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    $section01Schema = $section01->getDefaultChildComponents();

    $passwordField = collect($section01Schema)->firstWhere('name', 'password');

<<<<<<< HEAD
=======
=======
    $section01Schema = $section01->getChildComponents();
    
    $passwordField = collect($section01Schema)->firstWhere('name', 'password');
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($passwordField->getType())->toBe('password');
});

test('user resource email field has unique validation', function (): void {
    $schema = UserResource::getFormSchema();
    $section01 = $schema['section01'];
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    $section01Schema = $section01->getDefaultChildComponents();

    $emailField = collect($section01Schema)->firstWhere('name', 'email');

<<<<<<< HEAD
=======
=======
    $section01Schema = $section01->getChildComponents();
    
    $emailField = collect($section01Schema)->firstWhere('name', 'email');
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Check if the field has unique validation
    $validationRules = $emailField->getValidationRules();
    expect($validationRules)->toContain('unique');
});

test('user resource created_at field shows diff for humans', function (): void {
    $schema = UserResource::getFormSchema();
    $section02 = $schema['section02'];
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    $section02Schema = $section02->getDefaultChildComponents();

    $createdAtField = collect($section02Schema)->firstWhere('name', 'created_at');

    // Test with a record
    $content = $createdAtField->getContent($this->user);
    expect($content)->toBe($this->user->created_at->diffForHumans());

    // Test with null record
    $contentNull = $createdAtField->getContent(null);
    expect($contentNull)->toBeInstanceOf(HtmlString::class);
<<<<<<< HEAD
=======
=======
    $section02Schema = $section02->getChildComponents();
    
    $createdAtField = collect($section02Schema)->firstWhere('name', 'created_at');
    
    // Test with a record
    $content = $createdAtField->getContent($this->user);
    expect($content)->toBe($this->user->created_at->diffForHumans());
    
    // Test with null record
    $contentNull = $createdAtField->getContent(null);
    expect($contentNull)->toBeInstanceOf(\Illuminate\Support\HtmlString::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect((string) $contentNull)->toContain('&mdash;');
});

test('user resource can be instantiated', function (): void {
    $resource = new UserResource();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($resource)->toBeInstanceOf(UserResource::class);
});

test('user resource has correct model', function (): void {
    // Since the model is commented out, we'll test the default behavior
    $resource = new UserResource();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // The resource should work with the default model resolution
    expect($resource)->toBeInstanceOf(UserResource::class);
});
