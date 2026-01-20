<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);

use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Models\Device;
use Illuminate\Support\Facades\App;

test('GetCurrentDeviceAction can be instantiated', function () {
    $action = new GetCurrentDeviceAction();
    
    expect($action)->toBeInstanceOf(GetCurrentDeviceAction::class);
    
    // Check that execute method exists using reflection
    expect(method_exists($action, 'execute'))->toBeTrue();
});