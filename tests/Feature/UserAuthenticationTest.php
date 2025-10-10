<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\User;
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
use Modules\User\Models\User;
use Modules\User\Models\AuthenticationLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\User;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

describe('User Authentication', function () {
    it('can authenticate user with correct credentials', function () {
        $user = createUser([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $authenticated = Auth::attempt([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
<<<<<<< HEAD

        expect($authenticated)->toBeTrue()->and(Auth::user()?->id)->toBe($user->id);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

        expect($authenticated)->toBeTrue()->and(Auth::user()?->id)->toBe($user->id);
=======
        
        expect($authenticated)->toBeTrue()
            ->and(Auth::user()->id)->toBe($user->id);
>>>>>>> a12f125f4a (.)
=======

        expect($authenticated)->toBeTrue()->and(Auth::user()?->id)->toBe($user->id);
>>>>>>> b93ef594b4 (.)
=======
        
        expect($authenticated)->toBeTrue()
            ->and(Auth::user()->id)->toBe($user->id);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('cannot authenticate inactive user', function () {
        createUser([
            'email' => 'inactive@example.com',
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $authenticated = Auth::attempt([
            'email' => 'inactive@example.com',
            'password' => 'password123',
        ]);
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($authenticated)->toBeFalse();
    });

    it('logs authentication attempts', function () {
        $user = createUser([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        Auth::attempt([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)

        expect($user->authentications)
            ->toHaveCount(1)
            ->and($user->authentications->first())
            ->toBeInstanceOf(AuthenticationLog::class);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        
        expect($user->authentications)->toHaveCount(1)
            ->and($user->authentications->first())->toBeInstanceOf(AuthenticationLog::class);
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        
        expect($user->authentications)->toHaveCount(1)
            ->and($user->authentications->first())->toBeInstanceOf(AuthenticationLog::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    });

    it('handles password expiration', function () {
        $user = createUser([
            'password_expires_at' => now()->subDay(),
        ]);
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        expect($user->password_expires_at->isPast())->toBeTrue();
    });

    it('supports OTP authentication', function () {
        $user = createUser(['is_otp' => true]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        expect($user->is_otp)->toBeTrue();
    });
});
<<<<<<< HEAD
=======
=======
        
        expect($user->is_otp)->toBeTrue();
    });
});
>>>>>>> a12f125f4a (.)
=======

        expect($user->is_otp)->toBeTrue();
    });
});
>>>>>>> b93ef594b4 (.)
=======
        
        expect($user->is_otp)->toBeTrue();
    });
});
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
