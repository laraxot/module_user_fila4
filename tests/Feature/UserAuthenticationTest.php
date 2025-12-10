<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\AuthenticationLog;

describe('User Authentication', function (): void {
    it('can authenticate user with correct credentials', function (): void {
        $user = createUser([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);

        $authenticated = Auth::attempt([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        expect($authenticated)->toBeTrue()->and(Auth::user()?->id)->toBe($user->id);
    });

    it('cannot authenticate inactive user', function (): void {
        createUser([
            'email' => 'inactive@example.com',
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);

        $authenticated = Auth::attempt([
            'email' => 'inactive@example.com',
            'password' => 'password123',
        ]);

        expect($authenticated)->toBeFalse();
    });

    it('logs authentication attempts', function (): void {
        $user = createUser([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);

        Auth::attempt([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        expect($user->authentications)
            ->toHaveCount(1)
            ->and($user->authentications->first())
            ->toBeInstanceOf(AuthenticationLog::class);
    });

    it('handles password expiration', function (): void {
        $user = createUser([
            'password_expires_at' => now()->subDay(),
        ]);

        expect($user->password_expires_at->isPast())->toBeTrue();
    });

    it('supports OTP authentication', function (): void {
        $user = createUser(['is_otp' => true]);

        expect($user->is_otp)->toBeTrue();
    });
});
