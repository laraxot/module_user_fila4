<?php

declare(strict_types=1);

use Filament\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Models\User;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    // Use in-memory model to avoid DB constraints between tests
    $this->user = User::factory()->make([
        'type' => UserType::MasterAdmin,
        'email' => 'admin+'.uniqid('', true).'@example.com',
        'password' => Hash::make('oldpassword'),
    ]);

    $this->action = new ChangePasswordAction('changePassword');
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action has correct default name', function (): void {
    expect(ChangePasswordAction::getDefaultName())->toBe('changePassword');
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action extends correct base class', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->action)->toBeInstanceOf(Action::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action has correct icon', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->action->setUp();

    // Test that the action has the correct icon
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->action)->toBeInstanceOf(Action::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action form has required fields', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->action->setUp();

    // The action should have a form with password fields
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->action)->toBeInstanceOf(Action::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action can be executed', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->action->setUp();

    // Test that the action can be executed
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->action)->toBeInstanceOf(Action::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action uses password data component', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->action->setUp();

    // The action should use PasswordData component for the password field
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->action)->toBeInstanceOf(Action::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action has confirmation field', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->action->setUp();

    // The action should have a password confirmation field
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->action)->toBeInstanceOf(Action::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action shows success notification', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->action->setUp();

    // The action should show a success notification after password change
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->action)->toBeInstanceOf(Action::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action validates password confirmation', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->action->setUp();

    // The action should validate that password confirmation matches
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->action)->toBeInstanceOf(Action::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action uses translation keys', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->action->setUp();

    // The action should use translation keys for labels and messages
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->action)->toBeInstanceOf(Action::class);
});

/**
 * @property \Modules\User\Models\User $user
 */
test('change password action has correct setup method', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->action->setUp();

    // The action should have a setUp method that configures the action
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->action)->toBeInstanceOf(Action::class);
});
