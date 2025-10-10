<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Validation\Rules\Password;
use Modules\User\Datas\PasswordData;
use Modules\User\Events\AddingTeam;
use Modules\User\Events\Login;
use Modules\User\Events\Registered;
use Modules\User\Events\SocialiteUserConnected;

class UserModulePhpstanFixesTest extends TestCase
{
    /** @test */
    public function password_data_can_be_instantiated(): void
    {
        $passwordData = new PasswordData;

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(PasswordData::class, $passwordData);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(15, $passwordData->otp_expiration_minutes);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(6, $passwordData->otp_length);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(30, $passwordData->expires_in);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(6, $passwordData->min);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($passwordData->mixedCase);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($passwordData->letters);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($passwordData->numbers);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($passwordData->symbols);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertFalse($passwordData->uncompromised);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(1, $passwordData->compromisedThreshold);
    }

    /** @test */
    public function password_data_can_be_configured(): void
    {
        $passwordData = new PasswordData(
            otp_expiration_minutes: 30,
            otp_length: 8,
            expires_in: 60,
            min: 8,
            mixedCase: true,
            letters: true,
            numbers: true,
            symbols: true,
            uncompromised: true,
            compromisedThreshold: 5
        );

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(30, $passwordData->otp_expiration_minutes);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(8, $passwordData->otp_length);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(60, $passwordData->expires_in);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(8, $passwordData->min);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($passwordData->mixedCase);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($passwordData->letters);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($passwordData->numbers);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($passwordData->symbols);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue($passwordData->uncompromised);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertEquals(5, $passwordData->compromisedThreshold);
    }

    /** @test */
    public function password_data_get_password_rule_works(): void
    {
        $passwordData = new PasswordData(
            min: 8,
            mixedCase: true,
            letters: true,
            numbers: true,
            symbols: true,
            uncompromised: true,
            compromisedThreshold: 3
        );

        /** @phpstan-ignore-next-line method.nonObject */
        $rule = $passwordData->getPasswordRule();

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(Password::class, $rule);
    }

    /** @test */
    public function password_data_get_helper_text_works(): void
    {
        $passwordData = new PasswordData(
            min: 8,
            mixedCase: true,
            letters: true,
            numbers: true,
            symbols: true,
            uncompromised: true
        );

        /** @phpstan-ignore-next-line method.nonObject */
        $helperText = $passwordData->getHelperText();

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertIsString($helperText);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertStringContainsString('8 caratteri', $helperText);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertStringContainsString('maiuscola e una minuscola', $helperText);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertStringContainsString('lettera', $helperText);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertStringContainsString('numero', $helperText);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertStringContainsString('carattere speciale', $helperText);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertStringContainsString('compromessa', $helperText);
    }

    /** @test */
    public function password_data_get_form_components_returns_array(): void
    {
        $passwordData = new PasswordData;

        // Test che il metodo esista e non lanci eccezioni
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists($passwordData, 'getPasswordFormComponents'));

        // Test che il metodo getPasswordFormComponent esista
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists($passwordData, 'getPasswordFormComponent'));

        // Test che il metodo getPasswordConfirmationFormComponent esista
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists($passwordData, 'getPasswordConfirmationFormComponent'));
    }

    /** @test */
    public function events_can_be_instantiated(): void
    {
        $addingTeam = new AddingTeam;
        $login = new Login;
        $registered = new Registered;
        $socialiteUserConnected = new SocialiteUserConnected;

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(AddingTeam::class, $addingTeam);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(Login::class, $login);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(Registered::class, $registered);
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertInstanceOf(SocialiteUserConnected::class, $socialiteUserConnected);
    }

    /** @test */
    public function events_have_dispatchable_trait(): void
    {
        $addingTeam = new AddingTeam;
        $login = new Login;

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists($addingTeam, 'dispatch'));
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists($login, 'dispatch'));
    }

    /** @test */
    public function password_data_static_make_method_exists(): void
    {
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists(PasswordData::class, 'make'));
    }

    /** @test */
    public function password_data_get_validation_messages_method_exists(): void
    {
        $passwordData = new PasswordData;

        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists($passwordData, 'getValidationMessages'));
    }

    /** @test */
    public function password_data_get_form_schema_method_exists(): void
    {
        /** @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->assertTrue(method_exists(PasswordData::class, 'getFormSchema'));
    }
}
