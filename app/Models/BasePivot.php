<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\Xot\Models\XotBasePivot;

/**
 * Base Pivot for User module.
 *
 * Extends XotBasePivot which provides all standard properties and casts.
 *
 * @see \Modules\Xot\Models\XotBasePivot
 */
abstract class BasePivot extends XotBasePivot
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'user';
}
