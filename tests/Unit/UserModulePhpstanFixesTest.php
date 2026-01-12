<?php

declare(strict_types=1);

use Illuminate\Validation\Rules\Password;
use Modules\User\Datas\PasswordData;
use Modules\User\Events\AddingTeam;
use Modules\User\Events\Login;
use Modules\User\Events\Registered;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Models\SocialiteUser;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

<<<<<<< HEAD
uses(TestCase::class);
=======
class UserModulePhpstanFixesTest extends TestCase
{
    /** @test */
    public function password_data_can_be_instantiated(): void
    {
        $passwordData = new PasswordData();
>>>>>>> 32e772a8 (.)

it('password data can be instantiated', function (): void {
    $passwordData = new PasswordData();

<<<<<<< HEAD
    $this->assertInstanceOf(PasswordData::class, $passwordData);
    $this->assertSame(5, $passwordData->otp_expiration_minutes);
    $this->assertSame(6, $passwordData->otp_length);
    $this->assertSame(60, $passwordData->expires_in);
    $this->assertSame(8, $passwordData->min);
    $this->assertTrue($passwordData->mixedCase);
    $this->assertTrue($passwordData->letters);
    $this->assertTrue($passwordData->numbers);
    $this->assertTrue($passwordData->symbols);
    $this->assertTrue($passwordData->uncompromised);
    $this->assertSame(0, $passwordData->compromisedThreshold);
});
=======
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
>>>>>>> 32e772a8 (.)

it('password data can be configured', function (): void {
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

<<<<<<< HEAD
    $this->assertSame(30, $passwordData->otp_expiration_minutes);
    $this->assertSame(8, $passwordData->otp_length);
    $this->assertSame(60, $passwordData->expires_in);
    $this->assertSame(8, $passwordData->min);
    $this->assertTrue($passwordData->mixedCase);
    $this->assertTrue($passwordData->letters);
    $this->assertTrue($passwordData->numbers);
    $this->assertTrue($passwordData->symbols);
    $this->assertTrue($passwordData->uncompromised);
    $this->assertSame(5, $passwordData->compromisedThreshold);
});
=======
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
>>>>>>> 32e772a8 (.)

it('password data get password rule works', function (): void {
    $passwordData = new PasswordData(
        min: 8,
        mixedCase: true,
        letters: true,
        numbers: true,
        symbols: true,
        uncompromised: true,
        compromisedThreshold: 3
    );

    $rule = $passwordData->getPasswordRule();

<<<<<<< HEAD
    $this->assertInstanceOf(Password::class, $rule);
});
=======
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
>>>>>>> 32e772a8 (.)

it('password data get helper text works', function (): void {
    $passwordData = new PasswordData(
        min: 8,
        mixedCase: true,
        letters: true,
        numbers: true,
        symbols: true,
        uncompromised: true
    );

    $helperText = $passwordData->getHelperText();

<<<<<<< HEAD
    $this->assertIsString($helperText);
    $this->assertStringContainsString('8 caratteri', $helperText);
    $this->assertStringContainsString('maiuscola e una minuscola', $helperText);
    $this->assertStringContainsString('lettera', $helperText);
    $this->assertStringContainsString('numero', $helperText);
    $this->assertStringContainsString('carattere speciale', $helperText);
    $this->assertStringContainsString('compromessa', $helperText);
});
=======
    /** @test */
    public function password_data_get_form_components_returns_array(): void
    {
        $passwordData = new PasswordData();
>>>>>>> 32e772a8 (.)

it('password data get form components returns array', function (): void {
    $passwordData = new PasswordData();

    // Smoke tests: methods should be callable without throwing.
    $passwordData->getPasswordFormComponent('password');
    $passwordData->setFieldName('password');
    $passwordData->getPasswordConfirmationFormComponent();
});

it('events can be instantiated', function (): void {
    $userFactory = User::factory();
    \assert($userFactory instanceof Illuminate\Database\Eloquent\Factories\Factory);
    $owner = $userFactory->create();
    \assert($owner instanceof User);

<<<<<<< HEAD
    $socialiteFactory = SocialiteUser::factory();
    \assert($socialiteFactory instanceof Illuminate\Database\Eloquent\Factories\Factory);
    $socialiteUser = $socialiteFactory->create();
    \assert($socialiteUser instanceof SocialiteUser);
=======
    /** @test */
    public function events_can_be_instantiated(): void
    {
        $addingTeam = new AddingTeam();
        $login = new Login();
        $registered = new Registered();
        $socialiteUserConnected = new SocialiteUserConnected();
>>>>>>> 32e772a8 (.)

    $addingTeam = new AddingTeam($owner);
    $login = new Login($socialiteUser);
    $registered = new Registered($socialiteUser);
    $socialiteUserConnected = new SocialiteUserConnected($socialiteUser);

<<<<<<< HEAD
    $this->assertInstanceOf(AddingTeam::class, $addingTeam);
    $this->assertInstanceOf(Login::class, $login);
    $this->assertInstanceOf(Registered::class, $registered);
    $this->assertInstanceOf(SocialiteUserConnected::class, $socialiteUserConnected);
});
=======
    /** @test */
    public function events_have_dispatchable_trait(): void
    {
        $addingTeam = new AddingTeam();
        $login = new Login();
>>>>>>> 32e772a8 (.)

it('events have dispatchable trait', function (): void {
    $userFactory = User::factory();
    \assert($userFactory instanceof Illuminate\Database\Eloquent\Factories\Factory);
    $owner = $userFactory->create();
    \assert($owner instanceof User);

<<<<<<< HEAD
    $socialiteFactory = SocialiteUser::factory();
    \assert($socialiteFactory instanceof Illuminate\Database\Eloquent\Factories\Factory);
    $socialiteUser = $socialiteFactory->create();
    \assert($socialiteUser instanceof SocialiteUser);

    // Smoke: calling dispatch should not error.
    AddingTeam::dispatch($owner);
    Login::dispatch($socialiteUser);
});
=======
    /** @test */
    public function password_data_static_make_method_exists(): void
    {
        $this->assertTrue(method_exists(PasswordData::class, 'make'));
    }

    /** @test */
    public function password_data_get_validation_messages_method_exists(): void
    {
        $passwordData = new PasswordData();
>>>>>>> 32e772a8 (.)

it('password data static make method exists', function (): void {
    $passwordData = PasswordData::make();
    $this->assertInstanceOf(PasswordData::class, $passwordData);
});

<<<<<<< HEAD
it('password data get validation messages method exists', function (): void {
    $passwordData = new PasswordData();

    $messages = $passwordData->getValidationMessages();
    $this->assertIsArray($messages);
});

it('password data get form schema method exists', function (): void {
    $schema = PasswordData::getFormSchema();
    $this->assertIsArray($schema);
});
=======
    /** @test */
    public function password_data_get_form_schema_method_exists(): void
    {
        $this->assertTrue(method_exists(PasswordData::class, 'getFormSchema'));
    }
}
>>>>>>> 32e772a8 (.)
