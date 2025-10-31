<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthPersonalAccessClient;
use Webmozart\Assert\Assert;

/**
 * OauthPersonalAccessClient Factory.
 *
 * @extends Factory<OauthPersonalAccessClient>
 */
class OauthPersonalAccessClientFactory extends Factory
{
    protected $model = OauthPersonalAccessClient::class;

    public function definition(): array
    {
        /** @var \Illuminate\Database\Eloquent\Factories\Factory<OauthClient> $clientFactory */
        $clientFactory = OauthClient::factory();
        Assert::object($clientFactory, 'OauthClient factory must be an object');

        $client = $clientFactory->create();
        Assert::object($client, 'OauthClient must be an object');
        Assert::isInstanceOf($client, OauthClient::class);

        $clientId = $client->getKey();
        Assert::notNull($clientId);

        return [
            'client_id' => $clientId,
        ];
    }
}
