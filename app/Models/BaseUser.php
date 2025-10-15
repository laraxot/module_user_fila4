<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Parental\HasChildren;
use Webmozart\Assert\Assert;
use function Safe\json_decode;
use function Safe\json_encode;
use Modules\Xot\Datas\XotData;
use Modules\User\Models\Tenant;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Filament\Models\Contracts\HasName;
use Spatie\Permission\Traits\HasRoles;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Notifications\Notifiable;
use Modules\Xot\Models\Traits\RelationX;
use Filament\Models\Contracts\HasTenants as HasTenantsContract;
use Spatie\MediaLibrary\InteractsWithMedia;
use Modules\Xot\Models\Traits\HasXotFactory;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Modules\User\Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    use Traits\HasTenants;
    use Traits\HasTeams;

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
        return $this->hasOne(Profile::class);
    }

    

    /**
     * Check if the user can access a specific panel.
     */
    public function canAccessPanel(\Filament\Panel $panel): bool
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
            if (! empty($word)) {
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
