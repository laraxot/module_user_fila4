<?php

declare(strict_types=1);

use Modules\User\Datas\PasswordData;
use Spatie\LaravelData\Data;

uses(TestCase::class);

beforeEach(function (): void {
    $this->passwordData = new PasswordData(
        otp_expiration_minutes: 10,
        otp_length: 8,
        expires_in: 120,
        min: 12,
        mixedCase: true,
        letters: true,
        numbers: true,
        symbols: true,
        uncompromised: true,
        compromisedThreshold: 5,
        failMessage: 'Password non valida',
    );
});

test('password data can be created with custom parameters', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData)->toBeInstanceOf(PasswordData::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->otp_expiration_minutes)->toBe(10);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->otp_length)->toBe(8);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->expires_in)->toBe(120);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->min)->toBe(12);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->mixedCase)->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->letters)->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->numbers)->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->symbols)->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->uncompromised)->toBeTrue();
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->compromisedThreshold)->toBe(5);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData->failMessage)->toBe('Password non valida');
});

test('password data has default values', function (): void {
    $defaultPasswordData = new PasswordData;

    expect($defaultPasswordData->otp_expiration_minutes)->toBe(5);
    expect($defaultPasswordData->otp_length)->toBe(6);
    expect($defaultPasswordData->expires_in)->toBe(60);
    expect($defaultPasswordData->min)->toBe(8);
    expect($defaultPasswordData->mixedCase)->toBeTrue();
    expect($defaultPasswordData->letters)->toBeTrue();
    expect($defaultPasswordData->numbers)->toBeTrue();
    expect($defaultPasswordData->symbols)->toBeTrue();
    expect($defaultPasswordData->uncompromised)->toBeTrue();
    expect($defaultPasswordData->compromisedThreshold)->toBe(0);
    expect($defaultPasswordData->failMessage)->toBeNull();
});

test('password data extends spatie data class', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->passwordData)->toBeInstanceOf(Data::class);
});

test('password data has correct properties', function (): void {
    $reflection = new ReflectionClass(PasswordData::class);
    /** @phpstan-ignore-next-line method.nonObject */
    $properties = $reflection->getProperties();

    /** @phpstan-ignore-next-line method.nonObject */
    $propertyNames = array_map(fn ($prop) => $prop->getName(), $properties);

    expect($propertyNames)->toContain('otp_expiration_minutes');
    expect($propertyNames)->toContain('otp_length');
    expect($propertyNames)->toContain('expires_in');
    expect($propertyNames)->toContain('min');
    expect($propertyNames)->toContain('mixedCase');
    expect($propertyNames)->toContain('letters');
    expect($propertyNames)->toContain('numbers');
    expect($propertyNames)->toContain('symbols');
    expect($propertyNames)->toContain('uncompromised');
    expect($propertyNames)->toContain('compromisedThreshold');
    expect($propertyNames)->toContain('failMessage');
});

test('password data has correct types', function (): void {
    $reflection = new ReflectionClass(PasswordData::class);

    /** @phpstan-ignore-next-line method.nonObject */
    $otpExpirationProperty = $reflection->getProperty('otp_expiration_minutes');
    /** @phpstan-ignore-next-line method.nonObject */
    $otpLengthProperty = $reflection->getProperty('otp_length');
    /** @phpstan-ignore-next-line method.nonObject */
    $expiresInProperty = $reflection->getProperty('expires_in');
    /** @phpstan-ignore-next-line method.nonObject */
    $minProperty = $reflection->getProperty('min');
    /** @phpstan-ignore-next-line method.nonObject */
    $mixedCaseProperty = $reflection->getProperty('mixedCase');
    /** @phpstan-ignore-next-line method.nonObject */
    $lettersProperty = $reflection->getProperty('letters');
    /** @phpstan-ignore-next-line method.nonObject */
    $numbersProperty = $reflection->getProperty('numbers');
    /** @phpstan-ignore-next-line method.nonObject */
    $symbolsProperty = $reflection->getProperty('symbols');
    /** @phpstan-ignore-next-line method.nonObject */
    $uncompromisedProperty = $reflection->getProperty('uncompromised');
    /** @phpstan-ignore-next-line method.nonObject */
    $compromisedThresholdProperty = $reflection->getProperty('compromisedThreshold');
    /** @phpstan-ignore-next-line method.nonObject */
    $failMessageProperty = $reflection->getProperty('failMessage');

    expect($otpExpirationProperty->getType()->getName())->toBe('int');
    expect($otpLengthProperty->getType()->getName())->toBe('int');
    expect($expiresInProperty->getType()->getName())->toBe('int');
    expect($minProperty->getType()->getName())->toBe('int');
    expect($mixedCaseProperty->getType()->getName())->toBe('bool');
    expect($lettersProperty->getType()->getName())->toBe('bool');
    expect($numbersProperty->getType()->getName())->toBe('bool');
    expect($symbolsProperty->getType()->getName())->toBe('bool');
    expect($uncompromisedProperty->getType()->getName())->toBe('bool');
    expect($compromisedThresholdProperty->getType()->getName())->toBe('int');
    expect($failMessageProperty->getType()->getName())->toBe('string');
    expect($failMessageProperty->getType()->allowsNull())->toBeTrue();
});

test('password data has correct constructor parameters', function (): void {
    $reflection = new ReflectionClass(PasswordData::class);
    /** @phpstan-ignore-next-line method.nonObject */
    $constructor = $reflection->getConstructor();

    expect($constructor)->not->toBeNull();

    /** @phpstan-ignore-next-line method.nonObject */
    $parameters = $constructor->getParameters();
    expect($parameters)->toHaveCount(12);

    // Check first few parameters
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($parameters[0]->getName())->toBe('otp_expiration_minutes');
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($parameters[0]->getType()->getName())->toBe('int');
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($parameters[0]->isOptional())->toBeTrue();
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($parameters[0]->getDefaultValue())->toBe(5);

    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($parameters[1]->getName())->toBe('otp_length');
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($parameters[1]->getType()->getName())->toBe('int');
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($parameters[1]->isOptional())->toBeTrue();
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    expect($parameters[1]->getDefaultValue())->toBe(6);
});

test('password data has correct namespace', function (): void {
    expect(PasswordData::class)->toContain('Modules\User\Datas');
});

test('password data has correct strict types declaration', function (): void {
    $reflection = new ReflectionClass(PasswordData::class);
    /** @phpstan-ignore-next-line method.nonObject */
    $filename = $reflection->getFileName();

    if ($filename) {
        $content = file_get_contents($filename);
        expect($content)->toContain('declare(strict_types=1);');
    }
});
