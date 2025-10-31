<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Filament\Models\Contracts\HasName;
use Filament\Models\Contracts\HasTenants as HasTenantsContract;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Parental\HasChildren;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Models\Traits\RelationX;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Modules\User\Models\Traits\HasDevices;
use Modules\User\Models\Traits\HasSocialite;
use Modules\User\Models\Traits\HasTeams;
use Modules\User\Models\Traits\HasTenants;

/**
 * Base User Model.
 *
 * @property string|null $two_factor_recovery_codes
 */
abstract class BaseUser extends Authenticatable implements HasMedia, HasName, HasTenantsContract, MustVerifyEmail, UserContract
{
    use HasApiTokens;
    use HasChildren;
    use HasXotFactory;
    use HasPermissions;
    use HasRoles;
    use HasUuids;
    use InteractsWithMedia;
    use Notifiable;
    use RelationX;
    use HasTenants;
    use HasTeams;
    use HasDevices;
    use HasSocialite;
    
    public $incrementing = false;

    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'users';

    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    /** @var list<string> */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /** @var \Illuminate\Database\Eloquent\Model|null */
    protected $currentTenant;

    /** @var \Illuminate\Database\Eloquent\Model|null */
    protected $currentTeam;

    /** @var string */
    protected $guard_name = 'web';

    /**
     * @param array<string, mixed> $attributes
     */
    public function __construct(array $attributes = [])
    {
        try {
            $this->fillable = array_values(array_merge(parent::getFillable(), $this->getFillable()));
            parent::__construct($attributes);
        } catch (\Throwable $e) {
            $this->fillable = array_values($this->getFillable());
            $this->attributes = $attributes;
        }
    }

    /**
     * Get the name attribute for Filament.
     */
    public function getName(): string
    {
        return $this->name ?? $this->email ?? 'Unknown';
    }

    /**
     * Get the Filament name for the model.
     */
    public function getFilamentName(): string
    {
        return $this->getName();
    }

    /**
     * Get the user's profile.
     */
    public function profile(): HasOne
    {
        // Utilizza esplicitamente il modello Profile del modulo User per garantire la connessione corretta
        // Questo evita conflitti quando esistono modelli Profile in connessioni diverse (quaeris, gdpr, etc.)
        return $this->hasOne(\Modules\User\Models\Profile::class);
    }

    /**
     * Check if the user can access a specific panel.
     */
    public function canAccessPanel(\Filament\Panel $_panel): bool
    {
        return true; // Default implementation - allow access to all panels
    }

    /**
     * Get the user's display name.
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->name ?? $this->email ?? 'Unknown User';
    }

    /**
     * Get the user's full name.
     */
    public function getFullNameAttribute(): string
    {
        return $this->name ?? $this->email ?? 'Unknown User';
    }

    /**
     * Get the user's first name.
     */
    public function getFirstNameAttribute(): string
    {
        $name = $this->name ?? '';
        $parts = explode(' ', $name);

        return $parts[0] ?? '';
    }

    /**
     * Get the user's last name.
     */
    public function getLastNameAttribute(): string
    {
        $name = $this->name ?? '';
        $parts = explode(' ', $name);

        return count($parts) > 1 ? implode(' ', array_slice($parts, 1)) : '';
    }


    

    /**
     * Get the user's avatar.
     */
    public function getAvatarAttribute(): ?string
    {
        return $this->getFirstMediaUrl('avatar');
    }

    /**
     * Get the user's initials.
     */
    public function getInitialsAttribute(): string
    {
        $name = $this->name ?? $this->email ?? 'Unknown';
        $words = explode(' ', $name);
        $initials = '';

        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper(substr($word, 0, 1));
            }
        }

        return $initials ?: 'U';
    }

    /**
     * Get the default guard name.
     */
    public function getDefaultGuardName(): string
    {
        return $this->guard_name;
    }
}
