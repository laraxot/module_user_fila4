<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Livewire\Livewire;
use Modules\User\Datas\PasswordData;
use Modules\User\Http\Livewire\Auth\Login;
use Modules\User\Tests\TestCase;

<<<<<<< HEAD
uses(TestCase::class);
=======
class PasswordDataLabelsTest extends TestCase
{
    /**
     * Test that PasswordData generates components with correct labels.
     */
    public function test_password_data_labels_are_translated(): void
    {
        // Arrange
        // We ensure we are in a known locale
        app()->setLocale('it');
>>>>>>> 32e772a8 (.)

test('password data labels are translated', function (): void {
    // Arrange
    app()->setLocale('it');

    $passwordData = PasswordData::make();
    $passwordData->setFieldName('password');

    // Act
    $passwordComponent = $passwordData->getPasswordFormComponent('password');
    $confirmationComponent = $passwordData->getPasswordConfirmationFormComponent();

    // Assert
    expect($passwordComponent->getLabel())->toBe('Password');
    expect($confirmationComponent->getLabel())->toBe('Conferma Password');
});

<<<<<<< HEAD
test('login form labels are translated', function (): void {
    // Assemble
    app()->setLocale('it');
=======
    /**
     * Test that Login form components have correct labels.
     */
    public function test_login_form_labels_are_translated(): void
    {
        // Assemble
        app()->setLocale('it');
        $component = new Login();
>>>>>>> 32e772a8 (.)

    // Using Livewire test helper
    $livewire = Livewire::test(Login::class);
    $instance = $livewire->instance();

    // Filament forms are initialized on mount or when accessed.
    $instance->mount();

    $form = $instance->getForm('form');
    $components = $form->getComponents();

    // Find components
    $email = collect($components)->first(fn ($c) => 'email' === $c->getName());
    $password = collect($components)->first(fn ($c) => 'password' === $c->getName());
    $remember = collect($components)->first(fn ($c) => 'remember' === $c->getName());

    // Assert
    expect($email)->not->toBeNull();
    expect($email->getLabel())->toBe('Email');

    expect($password)->not->toBeNull();
    expect($password->getLabel())->toBe('Password');

<<<<<<< HEAD
    expect($remember)->not->toBeNull();
    expect($remember->getLabel())->toBe('Ricordami');
});
=======
        // Find components
        $email = collect($components)->first(fn ($c) => $c->getName() === 'email');
        $password = collect($components)->first(fn ($c) => $c->getName() === 'password');
        $remember = collect($components)->first(fn ($c) => $c->getName() === 'remember');

        // Assert
        $this->assertNotNull($email);
        $this->assertEquals('Email', $email->getLabel());

        $this->assertNotNull($password);
        $this->assertEquals('Password', $password->getLabel());

        $this->assertNotNull($remember);
        $this->assertEquals('Ricordami', $remember->getLabel());
    }
}
>>>>>>> 32e772a8 (.)
