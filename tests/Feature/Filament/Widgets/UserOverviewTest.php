<?php

declare(strict_types=1);

<<<<<<< HEAD
use Tests\TestCase;
use Filament\Widgets\Widget;
=======
<<<<<<< HEAD
use Tests\TestCase;
use Filament\Widgets\Widget;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Model;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;
<<<<<<< HEAD

uses(TestCase::class);
=======
=======
=======
>>>>>>> origin/develop
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;
use Modules\User\Enums\UserType;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;
>>>>>>> b93ef594b4 (.)

uses(TestCase::class);
=======

uses(Tests\TestCase::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

beforeEach(function (): void {
    $this->widget = new UserOverview();
    $this->user = User::factory()->create([
        'type' => UserType::MasterAdmin,
        'email' => 'admin@example.com',
    ]);
});

test('user overview widget extends correct base class', function (): void {
<<<<<<< HEAD
    expect($this->widget)->toBeInstanceOf(Widget::class);
=======
<<<<<<< HEAD
    expect($this->widget)->toBeInstanceOf(Widget::class);
=======
    expect($this->widget)->toBeInstanceOf(\Filament\Widgets\Widget::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('user overview widget has correct view', function (): void {
    $reflection = new ReflectionClass(UserOverview::class);
    $viewProperty = $reflection->getProperty('view');
    $viewProperty->setAccessible(true);
<<<<<<< HEAD

    expect($viewProperty->getValue($this->widget))
        ->toBe('user::filament.resources.user-resource.widgets.user-overview');
=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
    expect($viewProperty->getValue($this->widget))
        ->toBe('user::filament.resources.user-resource.widgets.user-overview');
=======
    expect($viewProperty->getValue($this->widget))->toBe('user::filament.resources.user-resource.widgets.user-overview');
>>>>>>> a12f125f4a (.)
=======
    expect($viewProperty->getValue($this->widget))
        ->toBe('user::filament.resources.user-resource.widgets.user-overview');
>>>>>>> b93ef594b4 (.)
=======
    
    expect($viewProperty->getValue($this->widget))->toBe('user::filament.resources.user-resource.widgets.user-overview');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
});

test('user overview widget has record property', function (): void {
    expect($this->widget)->toHaveProperty('record');
    expect($this->widget->record)->toBeNull();
});

test('user overview widget can set record', function (): void {
    $this->widget->record = $this->user;
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($this->widget->record)->toBe($this->user);
    expect($this->widget->record)->toBeInstanceOf(Model::class);
});

test('user overview widget record property is nullable', function (): void {
    $reflection = new ReflectionClass(UserOverview::class);
    $recordProperty = $reflection->getProperty('record');
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($recordProperty->getType()->allowsNull())->toBeTrue();
});

test('user overview widget has correct namespace', function (): void {
    expect(UserOverview::class)->toContain('Modules\User\Filament\Resources\UserResource\Widgets');
});

test('user overview widget can be instantiated', function (): void {
    expect($this->widget)->toBeInstanceOf(UserOverview::class);
});

test('user overview widget has correct static properties', function (): void {
    $reflection = new ReflectionClass(UserOverview::class);
    $viewProperty = $reflection->getProperty('view');
    $viewProperty->setAccessible(true);
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    expect($viewProperty->isStatic())->toBeTrue();
});

test('user overview widget view path is correct', function (): void {
    $reflection = new ReflectionClass(UserOverview::class);
    $viewProperty = $reflection->getProperty('view');
    $viewProperty->setAccessible(true);
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
    
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    $viewPath = $viewProperty->getValue($this->widget);
    expect($viewPath)->toContain('user::');
    expect($viewPath)->toContain('widgets.user-overview');
});
