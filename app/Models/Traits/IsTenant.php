<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> fbc8f8e (.)
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> 6d20fbe (.)
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

/**
 * Undocumented trait.
 *
 * @property TeamContract $currentTeam
 */
trait IsTenant
{
    /**
     * Get all users associated with this tenant.
     *
     * @return BelongsToMany<Model&UserContract, static>
     */
    public function users(): BelongsToMany
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();

        // $this->setConnection('mysql');
        /* @var class-string<Model&UserContract> $userClass */
        return $this->belongsToManyX($userClass, null, 'tenant_id', 'user_id');
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> fbc8f8e (.)
=======

>>>>>>> 6d20fbe (.)
        // ->as('membership')
    }

    /*
     * Method to create a belongsToMany relationship.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
=======
     * 
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     * 
>>>>>>> fbc8f8e (.)
=======
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
>>>>>>> 6d20fbe (.)
     * @param class-string<TRelatedModel> $related The related model class
     * @param string|null $table The pivot table name
     * @param string $foreignPivotKey The foreign key in pivot table
     * @param string $relatedPivotKey The related key in pivot table
     * @param string|null $parentKey The parent key
     * @param string|null $relatedKey The related key
     * @param string|null $relation The relation name
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
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
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<TRelatedModel, static>

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
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
}
