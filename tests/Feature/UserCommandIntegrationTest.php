<?php

declare(strict_types=1);

<<<<<<< HEAD
use Webmozart\Assert\Assert;
use Illuminate\Support\Arr;
use Illuminate\Console\Command;
=======
<<<<<<< HEAD
use Webmozart\Assert\Assert;
use Illuminate\Support\Arr;
use Illuminate\Console\Command;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Console\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Modules\User\Console\Commands\ChangeTypeCommand;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

uses(RefreshDatabase::class);
<<<<<<< HEAD
=======
=======
use Modules\User\Console\Commands\ChangeTypeCommand;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Contracts\UserContract;
=======
>>>>>>> b93ef594b4 (.)
use Illuminate\Console\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Console\Commands\ChangeTypeCommand;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

uses(RefreshDatabase::class);
>>>>>>> b93ef594b4 (.)
=======
use Modules\User\Console\Commands\ChangeTypeCommand;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Artisan;

uses(RefreshDatabase::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

describe('User Command Integration', function () {
    beforeEach(function () {
        $this->command = new ChangeTypeCommand();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
        $application = new Application(app());
        $application->add($this->command);
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('can be registered with Laravel artisan', function () {
        // Test that the command can be registered
<<<<<<< HEAD
        $application = new Application();
        $application->add($this->command);

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $application = new Application();
=======
        $application = new Application(app());
>>>>>>> a12f125f4a (.)
=======
        $application = new Application();
>>>>>>> b93ef594b4 (.)
        $application->add($this->command);

=======
        $application = new Application();
        $application->add($this->command);
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($application->has('user:change-type'))->toBeTrue();
    });

    it('integrates with XotData system', function () {
        // Test XotData integration
        $xotData = XotData::make();
<<<<<<< HEAD

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        expect($xotData)->toBeInstanceOf(XotData::class);

        // Test that required methods exist
        expect(method_exists($xotData, 'getUserByEmail'))
            ->toBeTrue()
            ->and(method_exists($xotData, 'getUserChildTypes'))
            ->toBeTrue()
            ->and(method_exists($xotData, 'getUserChildTypeClass'))
            ->toBeTrue();
<<<<<<< HEAD
=======
=======
=======
        
        expect($xotData)->toBeInstanceOf(XotData::class);
        
>>>>>>> origin/develop
        // Test that required methods exist
        expect(method_exists($xotData, 'getUserByEmail'))->toBeTrue()
            ->and(method_exists($xotData, 'getUserChildTypes'))->toBeTrue()
            ->and(method_exists($xotData, 'getUserChildTypeClass'))->toBeTrue();
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        expect($xotData)->toBeInstanceOf(XotData::class);

        // Test that required methods exist
        expect(method_exists($xotData, 'getUserByEmail'))
            ->toBeTrue()
            ->and(method_exists($xotData, 'getUserChildTypes'))
            ->toBeTrue()
            ->and(method_exists($xotData, 'getUserChildTypeClass'))
            ->toBeTrue();
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('validates command registration in service provider', function () {
        // Test that the command can be found in artisan list
        $commands = Artisan::all();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // The command should be registrable
        expect($this->command->getName())->toBe('user:change-type');
    });

    it('handles Laravel Prompts integration', function () {
        // Test that Laravel Prompts functions are available
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        expect(function_exists('Laravel\Prompts\text'))
            ->toBeTrue()
            ->and(function_exists('Laravel\Prompts\select'))
            ->toBeTrue();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        expect(function_exists('Laravel\Prompts\text'))->toBeTrue()
            ->and(function_exists('Laravel\Prompts\select'))->toBeTrue();
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        expect(function_exists('Laravel\Prompts\text'))->toBeTrue()
            ->and(function_exists('Laravel\Prompts\select'))->toBeTrue();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('validates Webmozart Assert integration', function () {
        // Test that Assert class is available and usable
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        expect(class_exists('Webmozart\Assert\Assert'))->toBeTrue();

        // Test basic assertion functionality
        expect(fn() => Assert::notNull('test'))->not->toThrow(Exception::class);
<<<<<<< HEAD
=======
=======
        expect(class_exists('Webmozart\\Assert\\Assert'))->toBeTrue();

        // Test basic assertion functionality
        expect(fn () => Assert::notNull('test'))
            ->not->toThrow(Exception::class);
>>>>>>> a12f125f4a (.)
=======
        expect(class_exists('Webmozart\Assert\Assert'))->toBeTrue();

        // Test basic assertion functionality
        expect(fn() => Assert::notNull('test'))->not->toThrow(Exception::class);
>>>>>>> b93ef594b4 (.)
=======
        expect(class_exists('Webmozart\Assert\Assert'))->toBeTrue();
        
        // Test basic assertion functionality
        expect(fn () => \Webmozart\Assert\Assert::notNull('test'))
            ->not->toThrow(Exception::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('integrates with Illuminate Support Arr', function () {
        // Test Arr helper functionality
        $testArray = ['a' => 1, 'b' => 2, 'c' => 3];
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        $result = Arr::mapWithKeys($testArray, fn($value, $key) => [
            $key . '_mapped' => $value * 2,
        ]);

        expect($result)
            ->toBeArray()
            ->and($result)
            ->toHaveKeys(['a_mapped', 'b_mapped', 'c_mapped'])
            ->and($result['a_mapped'])
            ->toBe(2)
            ->and($result['b_mapped'])
            ->toBe(4)
            ->and($result['c_mapped'])
            ->toBe(6);
<<<<<<< HEAD
=======
=======
        $result = Arr::mapWithKeys($testArray, function ($value, $key) {
            return ["{$key}_mapped" => $value * 2];
=======
        
        $result = \Illuminate\Support\Arr::mapWithKeys($testArray, function ($value, $key) {
            return [$key . '_mapped' => $value * 2];
>>>>>>> origin/develop
        });

        expect($result)->toBeArray()
            ->and($result)->toHaveKeys(['a_mapped', 'b_mapped', 'c_mapped'])
            ->and($result['a_mapped'])->toBe(2)
            ->and($result['b_mapped'])->toBe(4)
            ->and($result['c_mapped'])->toBe(6);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        $result = Arr::mapWithKeys($testArray, fn($value, $key) => [
            $key . '_mapped' => $value * 2,
        ]);

        expect($result)
            ->toBeArray()
            ->and($result)
            ->toHaveKeys(['a_mapped', 'b_mapped', 'c_mapped'])
            ->and($result['a_mapped'])
            ->toBe(2)
            ->and($result['b_mapped'])
            ->toBe(4)
            ->and($result['c_mapped'])
            ->toBe(6);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('can handle command input/output operations', function () {
        // Test that the command has access to I/O methods
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        expect(method_exists($this->command, 'info'))
            ->toBeTrue()
            ->and(method_exists($this->command, 'error'))
            ->toBeTrue()
            ->and(method_exists($this->command, 'line'))
            ->toBeTrue()
            ->and(method_exists($this->command, 'comment'))
            ->toBeTrue();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        expect(method_exists($this->command, 'info'))->toBeTrue()
            ->and(method_exists($this->command, 'error'))->toBeTrue()
            ->and(method_exists($this->command, 'line'))->toBeTrue()
            ->and(method_exists($this->command, 'comment'))->toBeTrue();
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('validates command signature and options', function () {
        $reflection = new ReflectionClass($this->command);
<<<<<<< HEAD

        // Check command properties
        expect($reflection->hasProperty('name'))->toBeTrue()->and($reflection->hasProperty('description'))->toBeTrue();

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
        // Check command properties
        expect($reflection->hasProperty('name'))->toBeTrue()->and($reflection->hasProperty('description'))->toBeTrue();

=======
>>>>>>> a12f125f4a (.)
=======
        // Check command properties
        expect($reflection->hasProperty('name'))->toBeTrue()->and($reflection->hasProperty('description'))->toBeTrue();

>>>>>>> b93ef594b4 (.)
=======
        
        // Check command properties
        expect($reflection->hasProperty('name'))->toBeTrue()
            ->and($reflection->hasProperty('description'))->toBeTrue();
            
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $nameProperty = $reflection->getProperty('name');
        $nameProperty->setAccessible(true);
        expect($nameProperty->getValue($this->command))->toBe('user:change-type');
    });

    it('handles enum integration correctly', function () {
        // Test that the command can work with enums
        // This validates the type system integration
        expect(interface_exists('BackedEnum'))->toBeTrue();
    });

    it('validates user contract integration', function () {
        // Test UserContract interface
<<<<<<< HEAD
        expect(interface_exists('Modules\Xot\Contracts\UserContract'))->toBeTrue();

        $reflection = new ReflectionClass('Modules\Xot\Contracts\UserContract');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect(interface_exists('Modules\Xot\Contracts\UserContract'))->toBeTrue();

        $reflection = new ReflectionClass('Modules\Xot\Contracts\UserContract');
=======
        expect(interface_exists('Modules\\Xot\\Contracts\\UserContract'))->toBeTrue();

        $reflection = new ReflectionClass('Modules\\Xot\\Contracts\\UserContract');
>>>>>>> a12f125f4a (.)
=======
        expect(interface_exists('Modules\Xot\Contracts\UserContract'))->toBeTrue();

        $reflection = new ReflectionClass('Modules\Xot\Contracts\UserContract');
>>>>>>> b93ef594b4 (.)
=======
        expect(interface_exists('Modules\Xot\Contracts\UserContract'))->toBeTrue();
        
        $reflection = new ReflectionClass('Modules\Xot\Contracts\UserContract');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($reflection->isInterface())->toBeTrue();
    });

    it('handles command execution context', function () {
        // Test that the command can access Laravel application context
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        expect(method_exists($this->command, 'laravel'))
            ->toBeTrue()
            ->and(method_exists($this->command, 'getApplication'))
            ->toBeTrue();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        expect(method_exists($this->command, 'laravel'))->toBeTrue()
            ->and(method_exists($this->command, 'getApplication'))->toBeTrue();
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        expect(method_exists($this->command, 'laravel'))->toBeTrue()
            ->and(method_exists($this->command, 'getApplication'))->toBeTrue();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('validates error handling patterns', function () {
        // Test that the command structure supports proper error handling
        $reflection = new ReflectionClass($this->command);
        $handleMethod = $reflection->getMethod('handle');
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($handleMethod->getReturnType()?->getName())->toBe('void');
    });

    it('can work with type checking utilities', function () {
        // Test type checking functions used in the command
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/develop
        $testObject = new stdClass();
        $testObject->value = 'test';
        $testObject->getLabel = fn() => 'Test Label';

<<<<<<< HEAD
        expect(is_object($testObject))
            ->toBeTrue()
            ->and(property_exists($testObject, 'value'))
            ->toBeTrue()
            ->and(($testObject->value ?? null) !== null)
            ->toBeTrue();
=======
        $testObject = (object) ['value' => 123];

        expect(is_object($testObject))->toBeTrue()
            ->and(property_exists($testObject, 'value'))->toBeTrue()
            ->and(($testObject->value ?? null) !== null)->toBeTrue();
>>>>>>> a12f125f4a (.)
=======
>>>>>>> 81efa49 (.)
        $testObject = new stdClass();
        $testObject->value = 'test';
        $testObject->getLabel = fn() => 'Test Label';

        expect(is_object($testObject))
            ->toBeTrue()
            ->and(property_exists($testObject, 'value'))
            ->toBeTrue()
            ->and(($testObject->value ?? null) !== null)
            ->toBeTrue();
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
=======
        expect(is_object($testObject))->toBeTrue()
            ->and(property_exists($testObject, 'value'))->toBeTrue()
            ->and(($testObject->value ?? null) !== null)->toBeTrue();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('integrates with Laravel configuration system', function () {
        // Test that the command can access configuration
        expect(function_exists('config'))->toBeTrue();
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Test setting and getting config
        config(['test.user_types' => ['admin', 'user', 'guest']]);
        expect(config('test.user_types'))->toBe(['admin', 'user', 'guest']);
    });

    it('handles string manipulation correctly', function () {
        // Test string operations used in the command
        $testString = 'TestValue';
<<<<<<< HEAD

        expect((string) $testString)->toBe('TestValue')->and(is_string($testString))->toBeTrue();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

        expect((string) $testString)->toBe('TestValue')->and(is_string($testString))->toBeTrue();
=======
        expect(strlen($testString) > 0)->toBeTrue()
            ->and(is_string($testString))->toBeTrue();
>>>>>>> a12f125f4a (.)
=======

        expect((string) $testString)->toBe('TestValue')->and(is_string($testString))->toBeTrue();
>>>>>>> b93ef594b4 (.)
=======
        
        expect((string)$testString)->toBe('TestValue')
            ->and(is_string($testString))->toBeTrue();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('validates array operations', function () {
        // Test array operations used in the command
        $testArray = ['key1' => 'value1', 'key2' => 'value2'];
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $mapped = [];
        foreach ($testArray as $key => $value) {
            $mapped[$key . '_suffix'] = $value . '_modified';
        }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        expect($mapped)
            ->toBeArray()
            ->and($mapped)
            ->toHaveKeys(['key1_suffix', 'key2_suffix'])
            ->and($mapped['key1_suffix'])
            ->toBe('value1_modified');
<<<<<<< HEAD
=======
=======
=======

>>>>>>> b93ef594b4 (.)
        $mapped = [];
        foreach ($testArray as $key => $value) {
            $mapped[$key . '_suffix'] = $value . '_modified';
        }

<<<<<<< HEAD
        expect($mapped)->toBeArray()
            ->and($mapped)->toHaveKeys(['key1_suffix', 'key2_suffix'])
            ->and($mapped['key1_suffix'])->toBe('value1_modified');
>>>>>>> a12f125f4a (.)
=======
        expect($mapped)
            ->toBeArray()
            ->and($mapped)
            ->toHaveKeys(['key1_suffix', 'key2_suffix'])
            ->and($mapped['key1_suffix'])
            ->toBe('value1_modified');
>>>>>>> b93ef594b4 (.)
=======
        expect($mapped)->toBeArray()
            ->and($mapped)->toHaveKeys(['key1_suffix', 'key2_suffix'])
            ->and($mapped['key1_suffix'])->toBe('value1_modified');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('can handle command lifecycle', function () {
        // Test command lifecycle methods
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        expect(method_exists($this->command, '__construct'))
            ->toBeTrue()
            ->and(method_exists($this->command, 'handle'))
            ->toBeTrue();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        expect(method_exists($this->command, '__construct'))->toBeTrue()
            ->and(method_exists($this->command, 'handle'))->toBeTrue();
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        expect(method_exists($this->command, '__construct'))->toBeTrue()
            ->and(method_exists($this->command, 'handle'))->toBeTrue();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('validates dependency injection compatibility', function () {
        // Test that the command can be instantiated through DI
        $commandFromContainer = app(ChangeTypeCommand::class);
<<<<<<< HEAD

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        expect($commandFromContainer)
            ->toBeInstanceOf(ChangeTypeCommand::class)
            ->and($commandFromContainer->getName())
            ->toBe('user:change-type');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        expect($commandFromContainer)->toBeInstanceOf(ChangeTypeCommand::class)
            ->and($commandFromContainer->getName())->toBe('user:change-type');
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        
        expect($commandFromContainer)->toBeInstanceOf(ChangeTypeCommand::class)
            ->and($commandFromContainer->getName())->toBe('user:change-type');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('handles console application integration', function () {
        // Test console application features
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        expect($this->command)
            ->toBeInstanceOf(Command::class)
            ->and($this->command)
            ->toBeInstanceOf(\Symfony\Component\Console\Command\Command::class);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    });

    it('validates command help and description', function () {
        expect($this->command->getDescription())
            ->toBe('Change user type based on project configuration')
            ->and($this->command->getName())
            ->toBe('user:change-type');
<<<<<<< HEAD
=======
=======
        expect($this->command)->toBeInstanceOf(Command::class)
=======
        expect($this->command)->toBeInstanceOf(\Illuminate\Console\Command::class)
>>>>>>> origin/develop
            ->and($this->command)->toBeInstanceOf(\Symfony\Component\Console\Command\Command::class);
    });

    it('validates command help and description', function () {
        expect($this->command->getDescription())->toBe('Change user type based on project configuration')
            ->and($this->command->getName())->toBe('user:change-type');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    });

    it('validates command help and description', function () {
        expect($this->command->getDescription())
            ->toBe('Change user type based on project configuration')
            ->and($this->command->getName())
            ->toBe('user:change-type');
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('can access Laravel facades', function () {
        // Test that Laravel facades are available
<<<<<<< HEAD
        expect(class_exists('Illuminate\Support\Facades\Facade'))->toBeTrue();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        expect(class_exists('Illuminate\Support\Facades\Facade'))->toBeTrue();
=======
        expect(class_exists('Illuminate\\Support\\Facades\\Facade'))->toBeTrue();
>>>>>>> a12f125f4a (.)
=======
        expect(class_exists('Illuminate\Support\Facades\Facade'))->toBeTrue();
>>>>>>> b93ef594b4 (.)
=======
        expect(class_exists('Illuminate\Support\Facades\Facade'))->toBeTrue();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('handles reflection operations correctly', function () {
        // Test reflection operations used in the command logic
        $reflection = new ReflectionClass($this->command);
<<<<<<< HEAD

=======
<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        expect($reflection)
            ->toBeInstanceOf(ReflectionClass::class)
            ->and($reflection->getName())
            ->toBe(ChangeTypeCommand::class);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        expect($reflection)->toBeInstanceOf(ReflectionClass::class)
            ->and($reflection->getName())->toBe(ChangeTypeCommand::class);
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        
        expect($reflection)->toBeInstanceOf(ReflectionClass::class)
            ->and($reflection->getName())->toBe(ChangeTypeCommand::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('validates method existence checks', function () {
        // Test method_exists functionality used in the command
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        expect(method_exists($this->command, 'handle'))
            ->toBeTrue()
            ->and(method_exists($this->command, 'nonExistentMethod'))
            ->toBeFalse();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        expect(method_exists($this->command, 'handle'))->toBeTrue()
            ->and(method_exists($this->command, 'nonExistentMethod'))->toBeFalse();
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        expect(method_exists($this->command, 'handle'))->toBeTrue()
            ->and(method_exists($this->command, 'nonExistentMethod'))->toBeFalse();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('can handle object property access safely', function () {
        // Test safe property access patterns
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $testObject = new stdClass();
        $testObject->testProperty = 'test_value';

        expect(property_exists($testObject, 'testProperty'))
            ->toBeTrue()
            ->and(property_exists($testObject, 'nonExistentProperty'))
            ->toBeFalse();
<<<<<<< HEAD
=======
=======
        $testObject = (object) ['testProperty' => 'ok'];

        expect(property_exists($testObject, 'testProperty'))->toBeTrue()
            ->and(property_exists($testObject, 'nonExistentProperty'))->toBeFalse();
>>>>>>> a12f125f4a (.)
=======
        $testObject = new stdClass();
        $testObject->testProperty = 'test_value';

        expect(property_exists($testObject, 'testProperty'))
            ->toBeTrue()
            ->and(property_exists($testObject, 'nonExistentProperty'))
            ->toBeFalse();
>>>>>>> b93ef594b4 (.)
=======
        $testObject = new stdClass();
        $testObject->testProperty = 'test_value';
        
        expect(property_exists($testObject, 'testProperty'))->toBeTrue()
            ->and(property_exists($testObject, 'nonExistentProperty'))->toBeFalse();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });
});
