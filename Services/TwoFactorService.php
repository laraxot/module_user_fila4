<?php

declare(strict_types=1);

namespace Modules\User\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Modules\User\Models\User;

/**
 * Two-Factor Authentication Service
 * 
 * Manages TOTP-based 2FA with recovery codes
 */
class TwoFactorService
{
    protected Google2FA $google2fa;

    public function __construct()
    {
        $this->google2fa = new Google2FA();
    }

    /**
     * Enable 2FA for user
     */
    public function enable(User $user): array
    {
        $secret = $this->google2fa->generateSecretKey();
        
        $user->update([
            'two_factor_secret' => encrypt($secret),
            'two_factor_enabled' => false, // Will be enabled after confirmation
        ]);

        $recoveryCodes = $this->generateRecoveryCodes();
        $user->setRecoveryCodes($recoveryCodes);

        return [
            'secret' => $secret,
            'qr_code' => $this->generateQrCode($user, $secret),
            'recovery_codes' => $recoveryCodes,
        ];
    }

    /**
     * Confirm 2FA setup
     */
    public function confirm(User $user, string $code): bool
    {
        if ($this->verify($user, $code)) {
            $user->update([
                'two_factor_enabled' => true,
                'two_factor_confirmed_at' => now(),
            ]);
            return true;
        }
        
        return false;
    }

    /**
     * Disable 2FA for user
     */
    public function disable(User $user): void
    {
        $user->update([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
            'two_factor_enabled' => false,
        ]);
    }

    /**
     * Verify TOTP code
     */
    public function verify(User $user, string $code): bool
    {
        if (! $user->two_factor_secret) {
            return false;
        }

        $secret = decrypt($user->two_factor_secret);
        
        if (! is_string($secret)) {
            return false;
        }
        
        return (bool) $this->google2fa->verifyKey($secret, $code);
    }

    /**
     * Verify recovery code
     */
    public function verifyRecoveryCode(User $user, string $code): bool
    {
        return $user->useRecoveryCode($code);
    }

    /**
     * Generate QR code
     */
    protected function generateQrCode(User $user, string $secret): string
    {
        $appName = config('app.name');
        if (! is_string($appName)) {
            $appName = 'Application';
        }
        
        $qrCodeUrl = $this->google2fa->getQRCodeUrl(
            $appName,
            $user->email,
            $secret
        );

        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        
        return $writer->writeString($qrCodeUrl);
    }

    /**
     * Generate recovery codes
     *
     * @return array<int, string>
     */
    protected function generateRecoveryCodes(): array
    {
        /** @var array<int, string> $codes */
        $codes = Collection::times(10, function () {
            return Str::random(10) . '-' . Str::random(10);
        })->all();

        return $codes;
    }

    /**
     * Regenerate recovery codes
     *
     * @return array<int, string>
     */
    public function regenerateRecoveryCodes(User $user): array
    {
        /** @var array<int, string> $codes */
        $codes = $this->generateRecoveryCodes();
        $user->setRecoveryCodes($codes);
        
        return $codes;
    }
}
