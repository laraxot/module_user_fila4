<?php

declare(strict_types=1);

use Modules\User\Models\BaseUser;
use Modules\User\Models\User;

describe('User Business Logic', function (): void {
    test('user extends base user', function (): void {
        expect(User::class)->toBeSubclassOf(BaseUser::class);
    });

<<<<<<< HEAD
    test('user has authentication capabilities', function () {
        $user = new User();
=======
    test('user has authentication capabilities', function (): void {
        $user = new User;
>>>>>>> 4cf202bd (.)
        $user->email = 'test@example.com';
        $user->password = 'hashed-password';

        expect($user->email)->toBe('test@example.com');
        expect($user->password)->toBe('hashed-password');
    });

<<<<<<< HEAD
    test('user can have name components', function () {
        $user = new User();
=======
    test('user can have name components', function (): void {
        $user = new User;
>>>>>>> 4cf202bd (.)
        $user->first_name = 'Mario';
        $user->last_name = 'Rossi';
        $user->name = 'Mario Rossi';

        expect($user->first_name)->toBe('Mario');
        expect($user->last_name)->toBe('Rossi');
        expect($user->name)->toBe('Mario Rossi');
    });

<<<<<<< HEAD
    test('user has activation status', function () {
        $user = new User();
=======
    test('user has activation status', function (): void {
        $user = new User;
>>>>>>> 4cf202bd (.)
        $user->is_active = true;

        expect($user->is_active)->toBe(true);
    });

<<<<<<< HEAD
    test('user has otp capability', function () {
        $user = new User();
=======
    test('user has otp capability', function (): void {
        $user = new User;
>>>>>>> 4cf202bd (.)
        $user->is_otp = true;

        expect($user->is_otp)->toBe(true);
    });

<<<<<<< HEAD
    test('user can have language preference', function () {
        $user = new User();
=======
    test('user can have language preference', function (): void {
        $user = new User;
>>>>>>> 4cf202bd (.)
        $user->lang = 'it';

        expect($user->lang)->toBe('it');
    });

<<<<<<< HEAD
    test('user has email verification tracking', function () {
        $user = new User();
=======
    test('user has email verification tracking', function (): void {
        $user = new User;
>>>>>>> 4cf202bd (.)
        $user->email_verified_at = '2023-01-01 12:00:00';

        expect($user->email_verified_at)->toBe('2023-01-01 12:00:00');
    });

<<<<<<< HEAD
    test('user has password expiry tracking', function () {
        $user = new User();
=======
    test('user has password expiry tracking', function (): void {
        $user = new User;
>>>>>>> 4cf202bd (.)
        $user->password_expires_at = '2023-12-31 23:59:59';

        expect($user->password_expires_at)->toBe('2023-12-31 23:59:59');
    });

<<<<<<< HEAD
    test('user can have current team', function () {
        $user = new User();
=======
    test('user can have current team', function (): void {
        $user = new User;
>>>>>>> 4cf202bd (.)
        $user->current_team_id = 1;

        expect($user->current_team_id)->toBe(1);
    });

<<<<<<< HEAD
    test('user can have profile photo', function () {
        $user = new User();
=======
    test('user can have profile photo', function (): void {
        $user = new User;
>>>>>>> 4cf202bd (.)
        $user->profile_photo_path = '/storage/profile-photos/user.jpg';

        expect($user->profile_photo_path)->toBe('/storage/profile-photos/user.jpg');
    });

<<<<<<< HEAD
    test('user can have remember token', function () {
        $user = new User();
=======
    test('user can have remember token', function (): void {
        $user = new User;
>>>>>>> 4cf202bd (.)
        $user->remember_token = 'abc123def456';

        expect($user->remember_token)->toBe('abc123def456');
    });
});
