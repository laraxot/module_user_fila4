<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Modules\User\Models\DeviceUser;
use Modules\User\Models\OauthRefreshToken;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class LogoutUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(UserContract $user): void
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        Assert::notNull($accessToken = $user->token(), '[' . __FILE__ . '][' . __LINE__ . ']');
        /*
         * DB::table('oauth_refresh_tokens')
         * ->where('access_token_id', $accessToken->)
         * ->delete();
         */
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        Assert::notNull($accessToken = $user->token(), '['.__FILE__.']['.__LINE__.']');
        /*
            DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $accessToken->)
                ->delete();
            */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        Assert::notNull($accessToken = $user->token(), '[' . __FILE__ . '][' . __LINE__ . ']');
        /*
         * DB::table('oauth_refresh_tokens')
         * ->where('access_token_id', $accessToken->)
         * ->delete();
         */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        // Assert::methodExists($accessToken, 'delete');
        if (method_exists($accessToken, 'getKey')) {
            OauthRefreshToken::where('access_token_id', $accessToken->getKey())->delete();
        }

        if (method_exists($accessToken, 'delete')) {
            $accessToken->delete();
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // $user->token()->delete();
        }

        /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
         * MobileDeviceUser::where('user_id', $user->getKey())
         * ->update(['logout_at' => now()]);
         */
        DeviceUser::where('user_id', $user->getKey())->update(['logout_at' => now()]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        MobileDeviceUser::where('user_id', $user->getKey())
            ->update(['logout_at' => now()]);
        */
        DeviceUser::where('user_id', $user->getKey())
            ->update(['logout_at' => now()]);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
