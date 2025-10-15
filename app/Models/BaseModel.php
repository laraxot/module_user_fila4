<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\Xot\Models\XotBaseModel;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Traits\RelationX;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends XotBaseModel
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'user';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'verified_at' => 'datetime', // ✅ User-specific cast
        ]);
    }
}
