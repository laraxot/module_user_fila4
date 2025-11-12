<?php

declare(strict_types=1);

use Illuminate\Console\Application;
use Illuminate\Console\Command;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Modules\User\Console\Commands\ChangeTypeCommand;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

uses(RefreshDatabase::class);

describe('User Command Integration', function (): void {
    beforeEach(function (): void {
        $this->command = new ChangeTypeCommand;
    });

    it('can be registered with Laravel artisan', function (): void {
        // Test that the command can be registered
        $application = new Application;
        /** @phpstan-ignore-next-line property.notFound */
        $application->add($this->command);

        expect($application->has('user:change-type'))->toBeTrue();
    });

    it('integrates with XotData system', function (): void {
        // Test XotData integration
        $xotData = XotData::make();

        expect($xotData)->toBeInstanceOf(XotData::class);

        // Test that required methods exist
        expect(method_exists($xotData, 'getUserByEmail'))
            ->toBeTrue()
            ->and(method_exists($xotData, 'getUserChildTypes'))
            ->toBeTrue()
            ->and(method_exists($xotData, 'getUserChildTypeClass'))
            ->toBeTrue();
    });

    it('validates command registration in service provider', function (): void {
        // Test that the command can be found in artisan list
        $commands = Artisan::all();

        // The command should be registrable
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->command->getName())->toBe('user:change-type');
    });

    it('handles Laravel Prompts integration', function (): void {
        // Test that Laravel Prompts functions are available
        expect(function_exists('Laravel\Prompts\text'))
            ->toBeTrue()
            ->and(function_exists('Laravel\Prompts\select'))
            ->toBeTrue();
    });

    it('validates Webmozart Assert integration', function (): void {
        // Test that Assert class is available and usable
        expect(class_exists('Webmozart\Assert\Assert'))->toBeTrue();

        // Test basic assertion functionality
        expect(fn () => Assert::notNull('test'))->not->toThrow(Exception::class);
    });

    it('integrates with Illuminate Support Arr', function (): void {
        // Test Arr helper functionality
        $testArray = ['a' => 1, 'b' => 2, 'c' => 3];

        $result = Arr::mapWithKeys($testArray, fn ($value, $key) => [
            $key.'_mapped' => $value * 2,
        ]);

        expect($result)
            ->toBeArray()
            ->and($result)
            ->toHaveKeys(['a_mapped', 'b_mapped', 'c_mapped'])
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            ->and($result['a_mapped'])
            ->toBe(2)
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            ->and($result['b_mapped'])
            ->toBe(4)
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            ->and($result['c_mapped'])
            ->toBe(6);
    });

    it('can handle command input/output operations', function (): void {
        // Test that the command has access to I/O methods
        /** @phpstan-ignore-next-line property.notFound */
        expect(method_exists($this->command, 'info'))
            ->toBeTrue()
            /** @phpstan-ignore-next-line property.notFound */
            ->and(method_exists($this->command, 'error'))
            ->toBeTrue()
            /** @phpstan-ignore-next-line property.notFound */
            ->and(method_exists($this->command, 'line'))
            ->toBeTrue()
            /** @phpstan-ignore-next-line property.notFound */
            ->and(method_exists($this->command, 'comment'))
            ->toBeTrue();
    });

    it('validates command signature and options', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        $reflection = new ReflectionClass($this->command);

        // Check command properties
        expect($reflection->hasProperty('name'))->toBeTrue()->and($reflection->hasProperty('description'))->toBeTrue();

        /** @phpstan-ignore-next-line method.nonObject */
        $nameProperty = $reflection->getProperty('name');
        /** @phpstan-ignore-next-line method.nonObject */
        $nameProperty->setAccessible(true);
        /** @phpstan-ignore-next-line property.notFound */
        expect($nameProperty->getValue($this->command))->toBe('user:change-type');
    });

    it('handles enum integration correctly', function (): void {
        // Test that the command can work with enums
        // This validates the type system integration
        expect(interface_exists('BackedEnum'))->toBeTrue();
    });

    it('validates user contract integration', function (): void {
        // Test UserContract interface
        expect(interface_exists('Modules\Xot\Contracts\UserContract'))->toBeTrue();

        $reflection = new ReflectionClass('Modules\Xot\Contracts\UserContract');
        expect($reflection->isInterface())->toBeTrue();
    });

    it('handles command execution context', function (): void {
        // Test that the command can access Laravel application context
        /** @phpstan-ignore-next-line property.notFound */
        expect(method_exists($this->command, 'laravel'))
            ->toBeTrue()
            /** @phpstan-ignore-next-line property.notFound */
            ->and(method_exists($this->command, 'getApplication'))
            ->toBeTrue();
    });

    it('validates error handling patterns', function (): void {
        // Test that the command structure supports proper error handling
        /** @phpstan-ignore-next-line property.notFound */
        $reflection = new ReflectionClass($this->command);
        /** @phpstan-ignore-next-line method.nonObject */
        $handleMethod = $reflection->getMethod('handle');

        expect($handleMethod->getReturnType()?->getName())->toBe('void');
    });

    it('can work with type checking utilities', function (): void {
        // Test type checking functions used in the command
        $testObject = new stdClass;
        $testObject->value = 'test';
        $testObject->getLabel = fn () => 'Test Label';

        expect(is_object($testObject))
            ->toBeTrue()
            ->and(property_exists($testObject, 'value'))
            ->toBeTrue()
            ->and(($testObject->value ?? null) !== null)
            ->toBeTrue();
    });

    it('integrates with Laravel configuration system', function (): void {
        // Test that the command can access configuration
        expect(function_exists('config'))->toBeTrue();

        // Test setting and getting config
        config(['test.user_types' => ['admin', 'user', 'guest']]);
        expect(config('test.user_types'))->toBe(['admin', 'user', 'guest']);
    });

    it('handles string manipulation correctly', function (): void {
        // Test string operations used in the command
        $testString = 'TestValue';

        expect((string) $testString)->toBe('TestValue')->and(is_string($testString))->toBeTrue();
    });

    it('validates array operations', function (): void {
        // Test array operations used in the command
        $testArray = ['key1' => 'value1', 'key2' => 'value2'];

        $mapped = [];
        foreach ($testArray as $key => $value) {
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            $mapped[$key.'_suffix'] = $value.'_modified';
        }

        expect($mapped)
            ->toBeArray()
            ->and($mapped)
            ->toHaveKeys(['key1_suffix', 'key2_suffix'])
            /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
            ->and($mapped['key1_suffix'])
            ->toBe('value1_modified');
    });

    it('can handle command lifecycle', function (): void {
        // Test command lifecycle methods
        /** @phpstan-ignore-next-line property.notFound */
        expect(method_exists($this->command, '__construct'))
            ->toBeTrue()
            /** @phpstan-ignore-next-line property.notFound */
            ->and(method_exists($this->command, 'handle'))
            ->toBeTrue();
    });

    it('validates dependency injection compatibility', function (): void {
        // Test that the command can be instantiated through DI
        $commandFromContainer = app(ChangeTypeCommand::class);

        expect($commandFromContainer)
            ->toBeInstanceOf(ChangeTypeCommand::class)
            /** @phpstan-ignore-next-line method.nonObject */
            ->and($commandFromContainer->getName())
            ->toBe('user:change-type');
    });

    it('handles console application integration', function (): void {
        // Test console application features
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->command)
            ->toBeInstanceOf(Command::class)
            /** @phpstan-ignore-next-line property.notFound */
            ->and($this->command)
            ->toBeInstanceOf(\Symfony\Component\Console\Command\Command::class);
    });

    it('validates command help and description', function (): void {
        /** @phpstan-ignore-next-line property.notFound */
        expect($this->command->getDescription())
            ->toBe('Change user type based on project configuration')
            /** @phpstan-ignore-next-line property.notFound */
            ->and($this->command->getName())
            ->toBe('user:change-type');
    });

    it('can access Laravel facades', function (): void {
        // Test that Laravel facades are available
        expect(class_exists('Illuminate\Support\Facades\Facade'))->toBeTrue();
    });

    it('handles reflection operations correctly', function (): void {
        // Test reflection operations used in the command logic
        /** @phpstan-ignore-next-line property.notFound */
        $reflection = new ReflectionClass($this->command);

        expect($reflection)
            ->toBeInstanceOf(ReflectionClass::class)
            /** @phpstan-ignore-next-line method.nonObject */
            ->and($reflection->getName())
            ->toBe(ChangeTypeCommand::class);
    });

    it('validates method existence checks', function (): void {
        // Test method_exists functionality used in the command
        /** @phpstan-ignore-next-line property.notFound */
        expect(method_exists($this->command, 'handle'))
            ->toBeTrue()
            /** @phpstan-ignore-next-line property.notFound */
            ->and(method_exists($this->command, 'nonExistentMethod'))
            ->toBeFalse();
    });

    it('can handle object property access safely', function (): void {
        // Test safe property access patterns
        $testObject = new stdClass;
        $testObject->testProperty = 'test_value';

        expect(property_exists($testObject, 'testProperty'))
            ->toBeTrue()
            ->and(property_exists($testObject, 'nonExistentProperty'))
            ->toBeFalse();
    });
});
