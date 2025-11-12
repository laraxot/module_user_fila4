<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> a12f125f4a (.)
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

/**
 * Undocumented trait.
 *
 * @property TeamContract $currentTeam
 */
trait IsTenant
{
    /**
     * Get all users associated with this tenant.
<<<<<<< HEAD
     *
     * @return BelongsToMany<Model&UserContract, static>
=======
<<<<<<< HEAD
     *
     * @return BelongsToMany<Model&UserContract, static>
=======
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\UserContract, static>
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function users(): BelongsToMany
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();

        // $this->setConnection('mysql');
<<<<<<< HEAD
        /** @var class-string<Model&UserContract> $userClass */
        return $this->belongsToManyX($userClass, null, 'tenant_id', 'user_id');

=======
<<<<<<< HEAD
        /** @var class-string<Model&UserContract> $userClass */
        return $this->belongsToManyX($userClass, null, 'tenant_id', 'user_id');
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
        /** @var class-string<\Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\UserContract> $userClass */
        return $this->belongsToManyX($userClass, null, 'tenant_id', 'user_id');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // ->as('membership')
    }

    /*
     * Method to create a belongsToMany relationship.
<<<<<<< HEAD
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
=======
     * 
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     * 
>>>>>>> a12f125f4a (.)
=======
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
>>>>>>> b93ef594b4 (.)
=======
     * 
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     * 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @param class-string<TRelatedModel> $related The related model class
     * @param string|null $table The pivot table name
     * @param string $foreignPivotKey The foreign key in pivot table
     * @param string $relatedPivotKey The related key in pivot table
     * @param string|null $parentKey The parent key
     * @param string|null $relatedKey The related key
     * @param string|null $relation The relation name
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<TRelatedModel, static>
     *
     * public function belongsToManyX(
     * string $related,
     * ?string $table = null,
     * ?string $foreignPivotKey = 'tenant_id',
     * ?string $relatedPivotKey = 'user_id',
     * ?string $parentKey = null,
     * ?string $relatedKey = null,
     * ?string $relation = null
     * ): BelongsToMany {
     * return $this->belongsToMany($related, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relation);
     * }
     */
<<<<<<< HEAD
=======
=======
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<TRelatedModel, static>

=======
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<TRelatedModel, static>
     
>>>>>>> origin/develop
    public function belongsToManyX(
        string $related,
        ?string $table = null,
        ?string $foreignPivotKey = 'tenant_id',
        ?string $relatedPivotKey = 'user_id',
        ?string $parentKey = null,
        ?string $relatedKey = null,
        ?string $relation = null
    ): BelongsToMany {
        return $this->belongsToMany($related, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relation);
    }
        */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<TRelatedModel, static>
     *
     * public function belongsToManyX(
     * string $related,
     * ?string $table = null,
     * ?string $foreignPivotKey = 'tenant_id',
     * ?string $relatedPivotKey = 'user_id',
     * ?string $parentKey = null,
     * ?string $relatedKey = null,
     * ?string $relation = null
     * ): BelongsToMany {
     * return $this->belongsToMany($related, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relation);
     * }
     */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
}
