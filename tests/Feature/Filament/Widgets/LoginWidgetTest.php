<?php

declare(strict_types=1);

use Tests\TestCase;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Modules\User\Filament\Widgets\LoginWidget;
use Modules\User\Models\User;
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
use function Pest\Laravel\assertAuthenticatedAs;

uses(TestCase::class);

beforeEach(function (): void {
    $this->widget = new LoginWidget();
});

test('it can render widget', function (): void {
    $widget = new LoginWidget();

    // Use reflection to access the protected view property
    $reflection = new ReflectionClass($widget);
    /** @phpstan-ignore-next-line method.nonObject */
    $property = $reflection->getProperty('view');
    /** @phpstan-ignore-next-line method.nonObject */
    $property->setAccessible(true);
    /** @phpstan-ignore-next-line method.nonObject */
    $view = $property->getValue($widget);

    expect($view)->toContain('pub_theme::filament.widgets.auth.login');
});

test('it has correct form schema', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $form = $this->widget->getFormSchema();

    expect($form)->toHaveCount(3);

    // Check that the schema contains components with the expected names
    /** @phpstan-ignore-next-line method.nonObject */
    $componentNames = array_map(fn($component) => $component->getName(), $form);
    expect($componentNames)->toContain('email');
    expect($componentNames)->toContain('password');
    expect($componentNames)->toContain('remember');
});

test('it can authenticate user', function (): void {
    // Skip if we can't use the database
    if (!class_exists('CreateUsersTable')) {
        /** @phpstan-ignore-next-line property.notFound */
        $this->markTestSkipped('Database not available for testing');
        return;
    }

    /** @var User $user */
    $user = User/** @phpstan-ignore-line */ ::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password123'),
    ]);

    /** @phpstan-ignore-next-line property.notFound */
    $this->widget->form->fill([
        'email' => 'test@example.com',
        'password' => 'password123',
        'remember' => true,
    ]);

    /** @phpstan-ignore-next-line property.notFound */
    $this->widget->save();

    assertAuthenticatedAs($user);
});

test('it validates credentials', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->widget->form->fill([
        'email' => 'nonexistent@example.com',
        'password' => 'wrongpassword',
    ]);

    // The widget should handle validation internally without throwing exceptions
    /** @phpstan-ignore-next-line property.notFound */
    $this->widget->save();

    // Check that the widget has error messages for invalid credentials
    /** @phpstan-ignore-next-line property.notFound */
    $errorBag = $this->widget->getErrorBag();
    expect($errorBag->isNotEmpty())->toBeTrue();
    expect(implode(' ', $errorBag->all()))->toContain('errore');
});

test('it requires email and password', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->widget->form->fill([
        'email' => '',
        'password' => '',
    ]);

    // The widget should handle validation internally without throwing exceptions
    /** @phpstan-ignore-next-line property.notFound */
    $this->widget->save();

    // Check that the widget has error messages for required fields
    /** @phpstan-ignore-next-line property.notFound */
    $errorBag = $this->widget->getErrorBag();
    expect($errorBag->isNotEmpty())->toBeTrue();

    /** @phpstan-ignore-next-line method.nonObject */
    $errorMessages = implode(' ', $errorBag->all());
    expect($errorMessages)->toContain('email');
    expect($errorMessages)->toContain('password');
});
