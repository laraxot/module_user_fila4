<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * OAuth Access Token Model
 *
 * @property string $id
 * @property string $user_id
 * @property string $client_id
 * @property string|null $name
 * @property string|null $scopes
 * @property bool $revoked
 * @property \DateTime|null $expires_at
 */
/** */
class OauthAccessToken extends BaseModel
{
    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'oauth_access_tokens';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'user_id',
        'client_id',
        'name',
        'scopes',
        'revoked',
        'expires_at',
    ];

    /**
     * Get the attributes that should be cast.
     * 
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'scopes' => 'array',
            'revoked' => 'boolean',
            'expires_at' => 'datetime',
        ];
    }

    /**
     * Get the user that owns the access token.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the client that owns the access token.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(OauthClient::class, 'client_id');
    }
}