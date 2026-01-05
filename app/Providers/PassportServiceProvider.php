<?php

declare(strict_types=1);

namespace Modules\User\Providers;

use Carbon\CarbonInterval;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Modules\User\Models;

class PassportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (method_exists(Passport::class, 'routes')) {
            Passport::routes();
        }

        Passport::tokensExpireIn(CarbonInterval::days(15));
        Passport::refreshTokensExpireIn(CarbonInterval::days(30));
        Passport::personalAccessTokensExpireIn(CarbonInterval::months(6));

        Passport::useTokenModel(Models\OauthToken::class);
        Passport::useRefreshTokenModel(Models\OauthRefreshToken::class);
        Passport::useAuthCodeModel(Models\OauthAuthCode::class);
        Passport::useClientModel(Models\OauthClient::class);
        Passport::useDeviceCodeModel(Models\OauthDeviceCode::class);
<<<<<<< HEAD
=======
        Passport::enablePasswordGrant();
>>>>>>> cf5d6db (.)

        Passport::tokensCan([
            'view-user' => 'View user information',
            'core-technicians' => 'the technicians can ',
        ]);
    }
}
