<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * User Preferences Model
 */
/** */
class Preferences extends BaseModel
{
    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'user_preferences';

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'email_notifications',
        'push_notifications',
        'sms_notifications',
        'marketing_emails',
        'data_collection',
        'analytics',
        'custom_preferences',
    ];

    /**
     * Get the attributes that should be cast.
     * 
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_notifications' => 'boolean',
            'push_notifications' => 'boolean',
            'sms_notifications' => 'boolean',
            'marketing_emails' => 'boolean',
            'data_collection' => 'boolean',
            'analytics' => 'boolean',
            'custom_preferences' => 'array',
        ];
    }

    /**
     * Get the user that owns the preferences.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}


