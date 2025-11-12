<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\User\Models\BaseUser;
=======
<<<<<<< HEAD
use Modules\User\Models\BaseUser;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\User\Models\User;

describe('User Business Logic', function () {
    test('user extends base user', function () {
<<<<<<< HEAD
        expect(User::class)->toBeSubclassOf(BaseUser::class);
=======
<<<<<<< HEAD
        expect(User::class)->toBeSubclassOf(BaseUser::class);
=======
        expect(User::class)->toBeSubclassOf(\Modules\User\Models\BaseUser::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    test('user has authentication capabilities', function () {
        $user = new User;
        $user->email = 'test@example.com';
        $user->password = 'hashed-password';
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($user->email)->toBe('test@example.com');
        expect($user->password)->toBe('hashed-password');
    });

    test('user can have name components', function () {
        $user = new User;
        $user->first_name = 'Mario';
        $user->last_name = 'Rossi';
        $user->name = 'Mario Rossi';
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($user->first_name)->toBe('Mario');
        expect($user->last_name)->toBe('Rossi');
        expect($user->name)->toBe('Mario Rossi');
    });

    test('user has activation status', function () {
        $user = new User;
        $user->is_active = true;
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($user->is_active)->toBe(true);
    });

    test('user has otp capability', function () {
        $user = new User;
        $user->is_otp = true;
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($user->is_otp)->toBe(true);
    });

    test('user can have language preference', function () {
        $user = new User;
        $user->lang = 'it';
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($user->lang)->toBe('it');
    });

    test('user has email verification tracking', function () {
        $user = new User;
        $user->email_verified_at = '2023-01-01 12:00:00';
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($user->email_verified_at)->toBe('2023-01-01 12:00:00');
    });

    test('user has password expiry tracking', function () {
        $user = new User;
        $user->password_expires_at = '2023-12-31 23:59:59';
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($user->password_expires_at)->toBe('2023-12-31 23:59:59');
    });

    test('user can have current team', function () {
        $user = new User;
        $user->current_team_id = 1;
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($user->current_team_id)->toBe(1);
    });

    test('user can have profile photo', function () {
        $user = new User;
        $user->profile_photo_path = '/storage/profile-photos/user.jpg';
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($user->profile_photo_path)->toBe('/storage/profile-photos/user.jpg');
    });

    test('user can have remember token', function () {
        $user = new User;
        $user->remember_token = 'abc123def456';
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        expect($user->remember_token)->toBe('abc123def456');
    });
});
<<<<<<< HEAD
=======
=======
        
        expect($user->remember_token)->toBe('abc123def456');
    });
});
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
