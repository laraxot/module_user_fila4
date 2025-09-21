<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\TechPlanner\Models\Profile;
=======

>>>>>>> b93ef594b4 (.)
=======
use Modules\TechPlanner\Models\Profile;
>>>>>>> 634583fb55 (.)
>>>>>>> 81efa49 (.)
use Modules\User\Models\Traits\HasAuthenticationLogTrait;
use Throwable;
use Override;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use Modules\User\Models\Traits\HasAuthenticationLogTrait;
use Throwable;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Exception;
use Modules\Xot\Contracts\ProfileContract;
use DateTime;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Filament\Models\Contracts\HasName;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Traits\HasTeams;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Models\Traits\RelationX;
use Parental\HasChildren;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
<<<<<<< HEAD
=======
=======
use Filament\Panel;
use Parental\HasChildren;
use Illuminate\Support\Str;
use Modules\Xot\Datas\XotData;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> b93ef594b4 (.)
use Filament\Models\Contracts\HasName;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Traits\HasTeams;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Models\Traits\RelationX;
use Parental\HasChildren;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
>>>>>>> b93ef594b4 (.)
=======
use Filament\Panel;
use Parental\HasChildren;
use Illuminate\Support\Str;
use Modules\Xot\Datas\XotData;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Filament\Models\Contracts\HasName;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Notifications\Notifiable;
use Modules\User\Models\Traits\HasTeams;
use Modules\Xot\Models\Traits\RelationX;
use Filament\Models\Contracts\HasTenants;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Database\Factories\UserFactory;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\DatabaseNotificationCollection;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

/**
 * Base User Model
 *
 * This is the base user model that provides the core authentication and authorization
 * functionality for the application. It extends Laravel's Authenticatable class
 * and implements the required interfaces for Filament and multi-tenancy.
 * @property Collection<int, OauthClient> $clients
 * @property int|null $clients_count
 * @property Team|null $currentTeam
 * @property Collection<int, Device> $devices
 * @property int|null $devices_count
 * @property string|null $full_name
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null $notifications_count
 * @property Collection<int, Team> $ownedTeams
 * @property int|null $owned_teams_count
 * @property Collection<int, Permission> $permissions
 * @property int|null $permissions_count
<<<<<<< HEAD
 * @property ProfileContract|null $profile
=======
<<<<<<< HEAD
 * @property ProfileContract|null $profile
=======
 * @property \Modules\Xot\Contracts\ProfileContract|null $profile
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property Collection<int, Role> $roles
 * @property int|null $roles_count
 * @property Collection<int, Team> $teams
 * @property int|null $teams_count
 * @property Collection<int, Tenant> $tenants
 * @property int|null $tenants_count
 * @property Collection<int, OauthAccessToken> $tokens
 * @property int|null $tokens_count
 * @property string $last_name
 * @property string|null $facebook_id
 * @property Collection<int, SocialiteUser> $socialiteUsers
 * @property int|null $socialite_users_count
 * @property string|null $name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $lang
 * @property string|null $current_team_id
 * @property bool|null $is_active
 * @property bool|null $is_otp
<<<<<<< HEAD
 * @property string|null $type
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string|null $type
=======
>>>>>>> a12f125f4a (.)
=======
 * @property string|null $type
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
 * @property DateTime|null $password_expires_at
 * @property DateTime|null $email_verified_at
 * @property string|null $remember_token
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 * @property DateTime|null $deleted_at
<<<<<<< HEAD
=======
=======
 * @property \DateTime|null $password_expires_at
 * @property \DateTime|null $email_verified_at
 * @property string|null $remember_token
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 * @property \DateTime|null $deleted_at
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property string|null $profile_photo_path
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @property Pivot|null $pivot
 *
 * @method static UserFactory factory($count = null, $state = [])
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions, $without = false)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null, $without = false)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCreatedBy($value)
 * @method static Builder|User whereCurrentTeamId($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereDeletedBy($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsActive($value)
 * @method static Builder|User whereLang($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereProfilePhotoPath($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUpdatedBy($value)
 * @method static Builder|User withoutPermission($permissions)
 * @method static Builder|User withoutRole($roles, $guard = null)
 * @method static Builder|User whereFacebookId($value)
 * @method static Builder|User whereIsOtp($value)
 * @method static Builder|User wherePasswordExpiresAt($value)
 * @method static Builder|User whereSurname($value)
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
abstract class BaseUser extends Authenticatable implements HasName, HasTenants, UserContract, HasMedia, MustVerifyEmail
{
    use HasApiTokens;
    use HasChildren;
    use HasFactory;
    use HasPermissions;
    use HasRoles;
    use HasUuids;
    use InteractsWithMedia;
<<<<<<< HEAD
=======
=======
abstract class BaseUser extends Authenticatable implements HasName, HasTenants, UserContract,HasMedia
=======
abstract class BaseUser extends Authenticatable implements HasName, HasTenants, UserContract, HasMedia, MustVerifyEmail
>>>>>>> b93ef594b4 (.)
{
    use HasApiTokens;
    use HasChildren;
    use HasFactory;
    use HasPermissions;
    use HasRoles;
    use HasUuids;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    use InteractsWithMedia;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    use Notifiable;
    use RelationX;
    use HasAuthenticationLogTrait;
    use Traits\HasTenants;
    use HasTeams;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
    use HasChildren;
    use InteractsWithMedia;

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
 * @property \Illuminate\Database\Eloquent\Relations\Pivot|null $pivot
 *
 * @method static \Modules\User\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFacebookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsOtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswordExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 *
 * @mixin \Eloquent
 */
abstract class BaseUser extends Authenticatable implements HasName, HasTenants, UserContract,HasMedia
{


    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    // Guard coerente con Spatie/Permission
    use HasUuids;
    use Notifiable;
    use RelationX;
    use Traits\HasAuthenticationLogTrait;
    use Traits\HasTenants;
    use Traits\HasTeams;
    use HasChildren;
    use InteractsWithMedia;

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    public $incrementing = false;

    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @var string */
    protected $childColumn = 'type';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'lang',
        'current_team_id',
        'is_active',
        'is_otp', // is One Time Password
        'password_expires_at',
        'type',
    ];

    /** @var list<string> */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /** @var list<string> */
    protected $with = [
<<<<<<< HEAD
        // Removed 'roles' to reduce memory usage - load explicitly when needed
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        // Removed 'roles' to reduce memory usage - load explicitly when needed
=======
        'roles',
>>>>>>> a12f125f4a (.)
=======
        // Removed 'roles' to reduce memory usage - load explicitly when needed
>>>>>>> b93ef594b4 (.)
=======
        'roles',
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    ];

    /** @var list<string> */
    protected $appends = [
        // 'profile_photo_url',
    ];

    /** @var array<string, class-string> */
<<<<<<< HEAD
    protected $childTypes = [];
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected $childTypes = [];
=======
    protected $childTypes = [

    ];
>>>>>>> a12f125f4a (.)
=======
    protected $childTypes = [];
>>>>>>> b93ef594b4 (.)
=======
    protected $childTypes = [

    ];
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /** @var array<string, mixed>  */
    protected $attributes = [
        //'state' => Pending::class,
        //'state' => 'pending',
<<<<<<< HEAD
        'is_otp' => false,
        'is_active' => true,
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        'is_otp' => false,
        'is_active' => true,
=======
        'is_otp'=>false,
        'is_active'=>true,
>>>>>>> a12f125f4a (.)
=======
        'is_otp' => false,
        'is_active' => true,
>>>>>>> b93ef594b4 (.)
=======
        'is_otp'=>false,
        'is_active'=>true,
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    ];

    /**
     * Guard coerente con Spatie/Permission: deve essere 'web'.
     * @var string
     */
    protected $guard_name = 'web';

<<<<<<< HEAD
    /** @var Pivot|null */
=======
<<<<<<< HEAD
    /** @var Pivot|null */
=======
    /** @var \Illuminate\Database\Eloquent\Relations\Pivot|null */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public $pivot;

    public function __construct(array $attributes = [])
    {
        // Concateno i fillable del parent con quelli della classe corrente
        // array_values() garantisce che sia un array indicizzato (list<string>)
        try {
            $this->fillable = array_values(array_merge(parent::getFillable(), $this->getFillable()));
            parent::__construct($attributes);
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
        } catch (\Throwable $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Fallback in case database connection is not available (e.g., during testing)
            $this->fillable = array_values($this->getFillable());
            // Avoid calling parent constructor if database is not available
            $this->attributes = $attributes;
        }
    }

<<<<<<< HEAD
    public function canAccessFilament(null|Panel $panel = null): bool
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function canAccessFilament(null|Panel $panel = null): bool
=======
    public function canAccessFilament(?Panel $panel = null): bool
>>>>>>> a12f125f4a (.)
=======
    public function canAccessFilament(null|Panel $panel = null): bool
>>>>>>> b93ef594b4 (.)
=======
    public function canAccessFilament(?Panel $panel = null): bool
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        // return $this->role_id === Role::ROLE_ADMINISTRATOR;
        return true;
    }

    /**
     * Get the user's name for Filament.
     *
     * @return string
     */
    public function getFilamentName(): string
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $name = (string) ($this->getAttribute('name') ?? '');
        $firstName = (string) ($this->getAttribute('first_name') ?? '');
        $lastName = (string) ($this->getAttribute('last_name') ?? '');

        $fullName = trim(sprintf('%s %s %s', $name, $firstName, $lastName));
        
        // Ensure we always return a non-empty string
        if (empty($fullName)) {
            $email = (string) ($this->getAttribute('email') ?? '');
            return !empty($email) ? $email : 'User';
        }
        
        return $fullName;
    }

    #[Override]
    public function profile(): HasOne
    {
<<<<<<< HEAD
        /** @var class-string<Model> $profileClass */
        $profileClass = XotData::make()->getProfileClass();

        /** @var HasOne<Model, $this> */
        return $this->hasOne($profileClass);
=======
        try {
            /** @var class-string<Model> */
            $profileClass = XotData::make()->getProfileClass();
<<<<<<< HEAD

            return $this->hasOne($profileClass);
        } catch (Exception $e) {
            // Fallback: se non riesce a ottenere la classe Profile, usa una relazione generica
            // Questo evita l'errore "Target [Illuminate\Database\Eloquent\Model] is not instantiable"
            return $this->hasOne(Profile::class);
        }
=======
        /** @var string|null */
        $name = $this->getAttribute('name');
=======
        $name = (string) ($this->getAttribute('name') ?? '');
        $firstName = (string) ($this->getAttribute('first_name') ?? '');
        $lastName = (string) ($this->getAttribute('last_name') ?? '');
>>>>>>> b93ef594b4 (.)

        $fullName = trim(sprintf('%s %s %s', $name, $firstName, $lastName));
        
        // Ensure we always return a non-empty string
        if (empty($fullName)) {
            $email = (string) ($this->getAttribute('email') ?? '');
            return !empty($email) ? $email : 'User';
        }
        
        return $fullName;
    }

    #[Override]
    public function profile(): HasOne
    {
        
=======
        /** @var string|null */
        $name = $this->getAttribute('name');

        /** @var string|null */
        $firstName = $this->getAttribute('first_name');

        /** @var string|null */
        $lastName = $this->getAttribute('last_name');

        return trim(sprintf(
            '%s %s %s',
            $name ?? '',
            $firstName ?? '',
            $lastName ?? '',
        ));
    }

    public function profile(): HasOne
    {
>>>>>>> origin/develop
        /** @var class-string<Model> */
        $profileClass = XotData::make()->getProfileClass();

        return $this->hasOne($profileClass);
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        
>>>>>>> b93ef594b4 (.)
=======

            return $this->hasOne($profileClass);
        } catch (Exception $e) {
            // Fallback: se non riesce a ottenere la classe Profile, usa una relazione generica
            // Questo evita l'errore "Target [Illuminate\Database\Eloquent\Model] is not instantiable"
            return $this->hasOne(Profile::class);
        }
>>>>>>> 634583fb55 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Verifica se l'utente ha il ruolo di super-admin.
     *
     * @return bool True se l'utente è super-admin, altrimenti false
     */
    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }

    public function assignModule(string $module): void
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    {
        $role_name = $module . '::admin';
        $role = Role::firstOrCreate(['name' => $role_name]);
        $this->assignRole($role);
    }

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    {   
        $role_name=$module.'::admin';
        $role=Role::firstOrCreate(['name' => $role_name]);
        $this->assignRole($role);
    }


<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    {
        $role_name = $module . '::admin';
        $role = Role::firstOrCreate(['name' => $role_name]);
        $this->assignRole($role);
    }

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function canAccessPanel(Panel $panel): bool
    {
        // $panel->default('admin');
        if ($panel->getId() !== 'admin') {
            $role = $panel->getId();
            /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
             * $xot = XotData::make();
             * if ($xot->super_admin === $this->email) {
             * $role = Role::firstOrCreate(['name' => $role]);
             * $this->assignRole($role);
             * }
             */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
            $xot = XotData::make();
            if ($xot->super_admin === $this->email) {
                $role = Role::firstOrCreate(['name' => $role]);
                $this->assignRole($role);
            }
            */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

            return $this->hasRole($role);
        }

        return true; // str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    }

    public function canAccessSocialite(): bool
    {
        return true;
    }

    public function detach(Model $model): void
    {
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($this, 'teams')) {
            // @phpstan-ignore function.alreadyNarrowedType
            $this->teams()->detach($model);
        }
    }

    public function attach(Model $model): void
    {
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($this, 'teams')) {
            // @phpstan-ignore function.alreadyNarrowedType
            $this->teams()->attach($model);
        }
    }

    public function treeLabel(): string
    {
        return strval($this->name ?? $this->email);
    }

    public function treeSons(): Collection
    {
        return $this->teams ?? new Collection();
    }

    /**
     * Get the devices associated with the user.
     *
     * @return BelongsToMany<Device, static>
     */
    public function devices(): BelongsToMany
    {
<<<<<<< HEAD
        return $this->belongsToManyX(Device::class);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->belongsToManyX(Device::class);
=======
        return $this
            ->belongsToManyX(Device::class);
>>>>>>> a12f125f4a (.)
=======
        return $this->belongsToManyX(Device::class);
>>>>>>> b93ef594b4 (.)
=======
        return $this
            ->belongsToManyX(Device::class);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Get the socialite users associated with the user.
     *
     * @return HasMany<SocialiteUser, $this>
     */
    public function socialiteUsers(): HasMany
    {
        return $this->hasMany(SocialiteUser::class);
    }

    public function getProviderField(string $provider, string $field): string
    {
        $socialiteUser = $this->socialiteUsers()->firstWhere(['provider' => $provider]);
<<<<<<< HEAD
        if ($socialiteUser === null) {
            throw new Exception('SocialiteUser not found');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if ($socialiteUser === null) {
=======
        if ($socialiteUser == null) {
>>>>>>> a12f125f4a (.)
=======
        if ($socialiteUser === null) {
>>>>>>> b93ef594b4 (.)
            throw new Exception('SocialiteUser not found');
=======
        if ($socialiteUser == null) {
            throw new \Exception('SocialiteUser not found');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        $res = $socialiteUser->{$field};
        return (string) $res;
    }

    /**
     * Get the entity's notifications.
     *
     * @return MorphMany<Notification, static|$this>
     */
    public function notifications()
    {
        // @phpstan-ignore return.type
        return $this->morphMany(Notification::class, 'notifiable');
    }

    /**
     * Get the user's latest authentication log.
     *
     * @return MorphOne<AuthenticationLog, static>
     */
    public function latestAuthentication(): MorphOne
    {
        // @phpstan-ignore return.type
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        return $this->morphOne(AuthenticationLog::class, 'authenticatable')->latestOfMany();
    }

    public function getFullNameAttribute(null|string $value): string
    {
        if ($value !== null) {
            return $value;
        }
        
        $fullName = trim(($this->first_name ?? '') . ' ' . ($this->last_name ?? ''));
        
        return $fullName !== '' ? $fullName : ($this->email ?? 'User');
    }

    public function getNameAttribute(null|string $value): string
    {
        if ($value !== null) {
            return $value;
        }
        
        if ($this->getKey() === null) {
            return $this->email ?? 'User';
        }
<<<<<<< HEAD
=======
=======
        return $this->morphOne(AuthenticationLog::class, 'authenticatable')
            ->latestOfMany();
=======
        return $this->morphOne(AuthenticationLog::class, 'authenticatable')->latestOfMany();
>>>>>>> b93ef594b4 (.)
    }

    public function getFullNameAttribute(null|string $value): string
    {
        if ($value !== null) {
            return $value;
        }
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        
        $fullName = trim(($this->first_name ?? '') . ' ' . ($this->last_name ?? ''));
        
        return $fullName !== '' ? $fullName : ($this->email ?? 'User');
    }

    public function getNameAttribute(null|string $value): string
    {
        if ($value !== null) {
            return $value;
        }
        
        if ($this->getKey() === null) {
            return $this->email ?? 'User';
        }
>>>>>>> b93ef594b4 (.)
=======
        return $this->morphOne(AuthenticationLog::class, 'authenticatable')
            ->latestOfMany();
    }

    public function getFullNameAttribute(?string $value): ?string
    {
        return $value ?? $this->first_name . ' ' . $this->last_name;
    }

    public function getNameAttribute(?string $value): ?string
    {
        if ($value !== null || $this->getKey() === null) {
            return $value;
        }
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        $name = Str::of((string) $this->email)->before('@')->toString();
        $i = 1;
        $candidate = $name . '-' . $i;

        // During unit tests, avoid any DB interaction.
        $isTesting = (function (): bool {
            $app = app();
            if (method_exists($app, 'environment') && $app->environment('testing')) {
                return true;
            }
<<<<<<< HEAD
            return PHP_SAPI === 'cli' && (getenv('APP_ENV') === 'testing' || getenv('ENV') === 'testing');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            return PHP_SAPI === 'cli' && (getenv('APP_ENV') === 'testing' || getenv('ENV') === 'testing');
=======
            return (PHP_SAPI === 'cli' && (getenv('APP_ENV') === 'testing' || getenv('ENV') === 'testing'));
>>>>>>> a12f125f4a (.)
=======
            return PHP_SAPI === 'cli' && (getenv('APP_ENV') === 'testing' || getenv('ENV') === 'testing');
>>>>>>> b93ef594b4 (.)
=======
            return (PHP_SAPI === 'cli' && (getenv('APP_ENV') === 'testing' || getenv('ENV') === 'testing'));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        })();
        if ($isTesting) {
            // Do not call update() here to avoid hitting the database.
            $this->attributes['name'] = $candidate;
            return $candidate;
        }

        try {
            $value = $candidate;
            while (self::firstWhere(['name' => $value]) !== null) {
                $i++;
                $value = $name . '-' . $i;
            }
            $this->update(['name' => $value]);

            return $value;
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
        } catch (\Throwable $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // If any issue occurs (e.g., missing connection/table), fall back without DB.
            $this->attributes['name'] = $candidate;
            return $candidate;
        }
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return app(GetFactoryAction::class)->execute(static::class);
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'email_verified_at' => 'datetime',
            // 'password' => 'hashed', //Call to undefined cast [hashed] on column [password] in model [Modules\User\Models\User].
            'is_active' => 'boolean',
            'roles.pivot.id' => 'string',
            // https://github.com/beitsafe/laravel-uuid-auditing
            // ALTER TABLE model_has_role CHANGE COLUMN `id` `id` CHAR(37) NOT NULL DEFAULT uuid();

            'is_otp' => 'boolean',
            'password_expires_at' => 'datetime',
<<<<<<< HEAD
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
=======
=======
>>>>>>> origin/develop

            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }

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
    //public function authentications(): MorphMany
    //{
    //    return $this->morphMany(\Modules\User\Models\Authentication::class, 'authenticatable');
    //}

    /**
     * Check if the user has a specific role.
     *
     * @param array|\Illuminate\Support\Collection|int|\Spatie\Permission\Contracts\Role|string $roles
     * @param string|null $guard
     * @return bool
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function hasRole($roles, null|string $guard = null): bool
    {
        // Se è una stringa semplice, utilizziamo il metodo interno tramite relazione roles
        if (is_string($roles)) {
            return once(fn (): bool => $this->roles()->where('name', $roles)->exists());
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    public function hasRole($roles, ?string $guard = null): bool
    {
        // Se è una stringa semplice, utilizziamo il metodo interno tramite relazione roles
        if (is_string($roles)) {
            return once(function () use ($roles) {
                return $this->roles()->where('name', $roles)->exists();
            });
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function hasRole($roles, null|string $guard = null): bool
    {
        // Se è una stringa semplice, utilizziamo il metodo interno tramite relazione roles
        if (is_string($roles)) {
            return once(fn (): bool => $this->roles()->where('name', $roles)->exists());
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        // Per gli altri tipi, implementiamo una logica di base
        if (is_array($roles) || $roles instanceof \Illuminate\Support\Collection) {
            foreach ($roles as $role) {
                if ($this->hasRole($role, $guard)) {
                    return true;
                }
            }
            return false;
        }

        if ($roles instanceof \Spatie\Permission\Contracts\Role) {
            return $this->roles()->where('id', $roles->id)->exists();
        }

        if (is_int($roles)) {
            return $this->roles()->where('id', $roles)->exists();
        }

        return false;
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    public function setPasswordAttribute(null|string $value): void
    {
        if (empty($value)) {
            unset($this->attributes['password']);
            return;
        }
        if (strlen($value) < 32) {
            $this->attributes['password'] = Hash::make($value);
            return;
        }
        $this->attributes['password'] = $value;
    }
<<<<<<< HEAD
=======
=======
    public function setPasswordAttribute(?string $value): void{
        if(empty($value)){
=======
    public function setPasswordAttribute(null|string $value): void
    {
        if (empty($value)) {
>>>>>>> b93ef594b4 (.)
            unset($this->attributes['password']);
            return;
        }
        if (strlen($value) < 32) {
            $this->attributes['password'] = Hash::make($value);
            return;
        }
        $this->attributes['password'] = $value;
    }
<<<<<<< HEAD

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    public function setPasswordAttribute(?string $value): void{
        if(empty($value)){
            unset($this->attributes['password']);
            return;
        }
        if(strlen($value)<32){
            $this->attributes['password']=Hash::make($value);
            return;
        }
        $this->attributes['password']=$value;
    }

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
