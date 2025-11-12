<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * OAuth Client Model
 *
 * @property string $user_id
 * @property string $name
 * @property string $secret
 * @property string|null $provider
 * @property string $redirect
 * @property bool $personal_access_client
 * @property bool $password_client
 * @property bool $revoked
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\OauthAccessToken> $accessTokens
 * @property-read int|null $access_tokens_count
 * @property-read \Modules\User\Models\User|null $user
 *
 * @method static \Modules\User\Database\Factories\OauthClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient query()
 *
 * @mixin \Eloquent
 */
class OauthClient extends BaseModel
{
    use \Modules\Xot\Models\Traits\HasXotFactory;

    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'oauth_clients';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'secret',
        'provider',
        'redirect',
        'personal_access_client',
        'password_client',
        'revoked',
        'grant_types',
        'scopes',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'personal_access_client' => 'boolean',
            'password_client' => 'boolean',
            'revoked' => 'boolean',
            'grant_types' => 'array',
            'scopes' => 'array',
        ];
    }

    /**
     * Get the user that owns the client.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the access tokens for the client.
     */
    public function accessTokens(): HasMany
    {
        return $this->hasMany(OauthAccessToken::class, 'client_id');
    }
}
