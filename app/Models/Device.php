<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Device Model
 */
class Device extends Model
{
    use \Modules\Xot\Models\Traits\HasXotFactory;
    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'devices';

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'device_id',
        'device_type',
        'device_name',
        'os',
        'os_version',
        'browser',
        'browser_version',
        'ip_address',
        'user_agent',
        'last_used_at',
    ];

    

    /**
     * Get the user that owns the device.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the attributes that should be cast.
     * 
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'last_used_at' => 'datetime',
        ];
    }
}