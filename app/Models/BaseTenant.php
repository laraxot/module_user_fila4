<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Modules\User\Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
=======
<<<<<<< HEAD
use Modules\User\Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Modules\User\Contracts\TenantContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Modules\User\Models\Tenant.
 *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static TenantFactory factory($count = null, $state = [])
 * @method static Builder|Tenant newModelQuery()
 * @method static Builder|Tenant newQuery()
 * @method static Builder|Tenant query()
 *
 * @property EloquentCollection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
=======
=======
 * @method static \Modules\User\Database\Factories\TenantFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant query()
 *
 * @property EloquentCollection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 *
 * @mixin \Eloquent
 */
abstract class BaseTenant extends BaseModel implements HasAvatar, HasMedia, TenantContract
{
    use HasSlug;
    use InteractsWithMedia;

    /** @var list<string> */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'email_address',
        'phone',
        'mobile',
        'address',
        'primary_color',
        'secondary_color',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
<<<<<<< HEAD
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
=======
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
>>>>>>> a12f125f4a (.)
=======
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
>>>>>>> b93ef594b4 (.)
=======
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Ottiene tutti i membri associati al tenant.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @return BelongsToMany<Model, \Modules\User\Models\BaseTenant>
     */
    public function members(): BelongsToMany
    {
        /** @var class-string<Model> $user_class */
<<<<<<< HEAD
=======
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Illuminate\Database\Eloquent\Model, \Modules\User\Models\BaseTenant>
     */
    public function members(): BelongsToMany
    {
        /** @var class-string<\Illuminate\Database\Eloquent\Model> $user_class */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $user_class = XotData::make()->getUserClass();

        return $this->belongsToManyX($user_class);
    }

    /**
     * Ottiene tutti gli utenti associati al tenant.
     *
<<<<<<< HEAD
     * @return BelongsToMany<Model, \Modules\User\Models\BaseTenant>
=======
<<<<<<< HEAD
     * @return BelongsToMany<Model, \Modules\User\Models\BaseTenant>
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Illuminate\Database\Eloquent\Model, \Modules\User\Models\BaseTenant>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function users(): BelongsToMany
    {
        $xot = XotData::make();
<<<<<<< HEAD
        /** @var class-string<Model> $userClass */
=======
<<<<<<< HEAD
        /** @var class-string<Model> $userClass */
=======
        /** @var class-string<\Illuminate\Database\Eloquent\Model> $userClass */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $userClass = $xot->getUserClass();

        // $this->setConnection('mysql');
        //return $this->belongsToManyX($userClass, null, 'tenant_id', 'user_id');
        return $this->belongsToManyX($userClass);
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
        // ->as('membership')
    }

    /**
     * Ottiene l'URL dell'avatar del tenant per Filament.
     *
     * @return string|null URL dell'avatar o null se non presente
     */
<<<<<<< HEAD
    public function getFilamentAvatarUrl(): null|string
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getFilamentAvatarUrl(): null|string
=======
    public function getFilamentAvatarUrl(): ?string
>>>>>>> a12f125f4a (.)
=======
    public function getFilamentAvatarUrl(): null|string
>>>>>>> b93ef594b4 (.)
=======
    public function getFilamentAvatarUrl(): ?string
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        // return $this->avatar_url;
        return $this->getFirstMediaUrl('avatar');
    }

    // public function getSlugAttribute(?string $value): ?string
    // {
    //     if(is_string($value) || $this->getKey() == null) {
    //         return $value;
    //     }
    //     $slug = Str::slug($this->name);
    //     $this->slug = $slug;
    //     $this->save();
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
    //     return $slug;
    // }
}
