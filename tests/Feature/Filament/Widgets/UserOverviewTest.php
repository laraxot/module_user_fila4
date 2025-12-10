<?php

declare(strict_types=1);

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    $this->widget = new UserOverview;
    $this->user = User::factory()->create([
        'type' => UserType::MasterAdmin,
        'email' => 'admin@example.com',
    ]);
});

/*
 * @property \Modules\User\Models\User $user
 */
test('user overview widget extends correct base class', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->widget)->toBeInstanceOf(Widget::class);
});

/*
 * @property \Modules\User\Models\User $user
 */
test('user overview widget has correct view', function (): void {
    $reflection = new ReflectionClass(UserOverview::class);
    /** @phpstan-ignore-next-line method.nonObject */
    $viewProperty = $reflection->getProperty('view');
    /* @phpstan-ignore-next-line method.nonObject */
    $viewProperty->setAccessible(true);

    /* @phpstan-ignore-next-line property.notFound */
    expect($viewProperty->getValue($this->widget))
        ->toBe('user::filament.resources.user-resource.widgets.user-overview');
});

/*
 * @property \Modules\User\Models\User $user
 */
test('user overview widget has record property', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->widget)->toHaveProperty('record');
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->widget->record)->toBeNull();
});

/*
 * @property \Modules\User\Models\User $user
 */
test('user overview widget can set record', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    $this->widget->record = $this->user;

    /* @phpstan-ignore-next-line property.notFound */
    expect($this->widget->record)->toBe($this->user);
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->widget->record)->toBeInstanceOf(Model::class);
});

/*
 * @property \Modules\User\Models\User $user
 */
test('user overview widget record property is nullable', function (): void {
    $reflection = new ReflectionClass(UserOverview::class);
    /** @phpstan-ignore-next-line method.nonObject */
    $recordProperty = $reflection->getProperty('record');

    expect($recordProperty->getType()->allowsNull())->toBeTrue();
});

/*
 * @property \Modules\User\Models\User $user
 */
test('user overview widget has correct namespace', function (): void {
    expect(UserOverview::class)->toContain('Modules\User\Filament\Resources\UserResource\Widgets');
});

/*
 * @property \Modules\User\Models\User $user
 */
test('user overview widget can be instantiated', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->widget)->toBeInstanceOf(UserOverview::class);
});

/*
 * @property \Modules\User\Models\User $user
 */
test('user overview widget has correct static properties', function (): void {
    $reflection = new ReflectionClass(UserOverview::class);
    /** @phpstan-ignore-next-line method.nonObject */
    $viewProperty = $reflection->getProperty('view');
    /* @phpstan-ignore-next-line method.nonObject */
    $viewProperty->setAccessible(true);

    expect($viewProperty->isStatic())->toBeTrue();
});

/*
 * @property \Modules\User\Models\User $user
 */
test('user overview widget view path is correct', function (): void {
    $reflection = new ReflectionClass(UserOverview::class);
    /** @phpstan-ignore-next-line method.nonObject */
    $viewProperty = $reflection->getProperty('view');
    /* @phpstan-ignore-next-line method.nonObject */
    $viewProperty->setAccessible(true);

    /** @phpstan-ignore-next-line property.notFound */
    $viewPath = $viewProperty->getValue($this->widget);
    expect($viewPath)->toContain('user::');
    expect($viewPath)->toContain('widgets.user-overview');
});
