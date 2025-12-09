<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\Xot\Models\XotBaseMorphPivot;

/**
 * Class BaseMorphPivot.
 */
abstract class BaseMorphPivot extends XotBaseMorphPivot
{
    /** @var string */
    protected $connection = 'user';

    /** @var list<string> */
    protected $fillable = [
        'id',
<<<<<<< HEAD
        'post_id',
        'post_type',
=======
        'post_id', 'post_type',
>>>>>>> fbc8f8e (.)
        'related_type',
        'user_id',
        'note',
    ];

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'string', // must be string else primary key of related model will be typed as int
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
<<<<<<< HEAD
=======

>>>>>>> fbc8f8e (.)
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }
}
