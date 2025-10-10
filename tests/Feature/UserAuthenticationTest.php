<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\User;
<<<<<<< HEAD
=======
use Modules\User\Models\User;
use Modules\User\Models\AuthenticationLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

describe('User Authentication', function () {
    it('can authenticate user with correct credentials', function () {
        $user = createUser([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        $authenticated = Auth::attempt([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
<<<<<<< HEAD
<<<<<<< HEAD

        expect($authenticated)->toBeTrue()->and(Auth::user()?->id)->toBe($user->id);
=======
        
        expect($authenticated)->toBeTrue()
            ->and(Auth::user()->id)->toBe($user->id);
>>>>>>> fbc8f8e (.)
=======

        expect($authenticated)->toBeTrue()->and(Auth::user()?->id)->toBe($user->id);
>>>>>>> 6d20fbe (.)
    });

    it('cannot authenticate inactive user', function () {
        createUser([
            'email' => 'inactive@example.com',
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        $authenticated = Auth::attempt([
            'email' => 'inactive@example.com',
            'password' => 'password123',
        ]);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        expect($authenticated)->toBeFalse();
    });

    it('logs authentication attempts', function () {
        $user = createUser([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        Auth::attempt([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

        expect($user->authentications)
            ->toHaveCount(1)
            ->and($user->authentications->first())
            ->toBeInstanceOf(AuthenticationLog::class);
<<<<<<< HEAD
=======
        
        expect($user->authentications)->toHaveCount(1)
            ->and($user->authentications->first())->toBeInstanceOf(AuthenticationLog::class);
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    });

    it('handles password expiration', function () {
        $user = createUser([
            'password_expires_at' => now()->subDay(),
        ]);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        expect($user->password_expires_at->isPast())->toBeTrue();
    });

    it('supports OTP authentication', function () {
        $user = createUser(['is_otp' => true]);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)

        expect($user->is_otp)->toBeTrue();
    });
});
<<<<<<< HEAD
=======
        
        expect($user->is_otp)->toBeTrue();
    });
});
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
