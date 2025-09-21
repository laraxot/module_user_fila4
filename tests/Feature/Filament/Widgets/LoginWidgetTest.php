<?php

declare(strict_types=1);

<<<<<<< HEAD
use Tests\TestCase;
=======
<<<<<<< HEAD
use Tests\TestCase;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Modules\User\Filament\Widgets\LoginWidget;
use Modules\User\Models\User;
<<<<<<< HEAD

use function Pest\Laravel\assertAuthenticatedAs;

uses(TestCase::class);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
use function Pest\Laravel\assertAuthenticatedAs;

uses(TestCase::class);
=======
use function Pest\Laravel\assertAuthenticatedAs;

uses(Tests\TestCase::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

beforeEach(function (): void {
    $this->widget = new LoginWidget();
});

test('it can render widget', function (): void {
    $widget = new LoginWidget();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    // Use reflection to access the protected view property
    $reflection = new ReflectionClass($widget);
    $property = $reflection->getProperty('view');
    $property->setAccessible(true);
    $view = $property->getValue($widget);

<<<<<<< HEAD
=======
=======
    
    // Use reflection to access the protected view property
    $reflection = new \ReflectionClass($widget);
    $property = $reflection->getProperty('view');
    $property->setAccessible(true);
    $view = $property->getValue($widget);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($view)->toContain('pub_theme::filament.widgets.auth.login');
});

test('it has correct form schema', function (): void {
    $schema = $this->widget->getFormSchema();
<<<<<<< HEAD

    expect($schema)->toHaveCount(3);

=======
<<<<<<< HEAD

    expect($schema)->toHaveCount(3);

=======
    
    expect($schema)->toHaveCount(3);
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Check that the schema contains components with the expected names
    $componentNames = array_map(fn($component) => $component->getName(), $schema);
    expect($componentNames)->toContain('email');
    expect($componentNames)->toContain('password');
    expect($componentNames)->toContain('remember');
});

test('it can authenticate user', function (): void {
    // Skip if we can't use the database
    if (!class_exists('CreateUsersTable')) {
        $this->markTestSkipped('Database not available for testing');
        return;
    }
<<<<<<< HEAD

    /** @var User $user */
=======
<<<<<<< HEAD

    /** @var User $user */
=======
    
    /** @var \Modules\User\Models\User $user */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password123'),
    ]);

    $this->widget->form->fill([
        'email' => 'test@example.com',
        'password' => 'password123',
        'remember' => true,
    ]);

    $this->widget->save();

    assertAuthenticatedAs($user);
});

test('it validates credentials', function (): void {
    $this->widget->form->fill([
        'email' => 'nonexistent@example.com',
        'password' => 'wrongpassword',
    ]);

    // The widget should handle validation internally without throwing exceptions
    $this->widget->save();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // Check that the widget has error messages for invalid credentials
    $errorBag = $this->widget->getErrorBag();
    expect($errorBag->isNotEmpty())->toBeTrue();
    expect(implode(' ', $errorBag->all()))->toContain('errore');
});

test('it requires email and password', function (): void {
    $this->widget->form->fill([
        'email' => '',
        'password' => '',
    ]);

    // The widget should handle validation internally without throwing exceptions
    $this->widget->save();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

    // Check that the widget has error messages for required fields
    $errorBag = $this->widget->getErrorBag();
    expect($errorBag->isNotEmpty())->toBeTrue();

<<<<<<< HEAD
=======
=======
    
    // Check that the widget has error messages for required fields
    $errorBag = $this->widget->getErrorBag();
    expect($errorBag->isNotEmpty())->toBeTrue();
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    $errorMessages = implode(' ', $errorBag->all());
    expect($errorMessages)->toContain('email');
    expect($errorMessages)->toContain('password');
});
