<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);

use Modules\User\Actions\GetCurrentDeviceAction;

test('GetCurrentDeviceAction can be instantiated', function () {
    $action = new GetCurrentDeviceAction();

    expect($action)->toBeInstanceOf(GetCurrentDeviceAction::class);

    // Check that execute method exists using reflection
    expect(method_exists($action, 'execute'))->toBeTrue();
});
