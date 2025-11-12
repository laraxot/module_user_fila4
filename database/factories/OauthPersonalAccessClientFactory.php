<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthPersonalAccessClient;
use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> e058848 (.)
 * OauthPersonalAccessClient Factory.
 *
=======
 * OauthPersonalAccessClient Factory
<<<<<<< HEAD
>>>>>>> 4cdb5c7 (.)
 *
=======
 * 
>>>>>>> fbc8f8e (.)
 * @extends Factory<OauthPersonalAccessClient>
 */
class OauthPersonalAccessClientFactory extends Factory
{
    protected $model = OauthPersonalAccessClient::class;

    public function definition(): array
    {
<<<<<<< HEAD
        /** @phpstan-ignore-next-line - Factory method returns proper object */
<<<<<<< HEAD
        $client = OauthClient::factory()->create();
=======
        $clientFactory = OauthClient::factory();
        Assert::isInstanceOf($clientFactory, \Illuminate\Database\Eloquent\Factories\Factory::class);

        $client = $clientFactory->create();
=======
        /** @var \Illuminate\Database\Eloquent\Factories\Factory<OauthClient> $clientFactory */
        $clientFactory = OauthClient::factory();
        Assert::object($clientFactory, 'OauthClient factory must be an object');

        $client = $clientFactory->create();
        Assert::object($client, 'OauthClient must be an object');
>>>>>>> e058848 (.)
        Assert::isInstanceOf($client, OauthClient::class);
>>>>>>> 6849bc76 (.)

        /** @phpstan-ignore-next-line - Method exists on Eloquent model */
        $clientId = $client->getKey();
        Assert::notNull($clientId);

        return [
            'client_id' => $clientId,
        ];
    }
}
