<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthPersonalAccessClient;

/**
 * OauthPersonalAccessClient Factory
 *
 * @extends Factory<OauthPersonalAccessClient>
 */
class OauthPersonalAccessClientFactory extends Factory
{
    protected $model = OauthPersonalAccessClient::class;

    public function definition(): array
    {
        /** @var \Modules\User\Database\Factories\OauthClientFactory $factory */
        $factory = OauthClient::factory();
        /** @var \Modules\User\Models\OauthClient $oauthClient */
        $oauthClient = $factory->personalAccess()->create();

        return [
            'client_id' => $oauthClient->getKey(),
        ];
    }
}
