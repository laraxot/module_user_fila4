<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * User Settings Model
 */
class Settings extends Model
{
    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'user_settings';

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'theme',
        'language',
        'timezone',
        'notifications',
        'privacy',
        'preferences',
    ];

    /**
     * Get the attributes that should be cast.
     * 
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'notifications' => 'array',
            'privacy' => 'array',
            'preferences' => 'array',
        ];
    }

    /**
     * Get the user that owns the settings.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}


