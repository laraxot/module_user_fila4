<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Database\Eloquent\Model;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Handles the creation of a new user from a socialite authentication.
 */
class CreateUserAction
{
    use QueueableAction;

    /**
     * Execute the action to create a new user from socialite authentication.
     *
     * @param  string  $provider  The socialite provider name (e.g., 'github', 'google')
     * @param  SocialiteUserContract  $oauthUser  The socialite user instance
     * @return UserContract The created user instance
     */
    public function execute(string $provider, SocialiteUserContract $oauthUser): UserContract
    {
        // Resolve user attributes from the identity provider
        $userAttributes = app(GetUserModelAttributesFromSocialiteAction::class, [
            'provider' => $provider,
            'oauthUser' => $oauthUser,
        ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // Get the user class from Xot configuration
        $userClass = XotData::make()->getUserClass();

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        
        // Get the user class from Xot configuration
        $userClass = XotData::make()->getUserClass();
        
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        // Get the user class from Xot configuration
        $userClass = XotData::make()->getUserClass();

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Create the new user
        $newlyCreatedUser = $userClass::create([
            'name' => $userAttributes->name,
            'first_name' => $userAttributes->name,
            'last_name' => $userAttributes->last_name,
            'email' => $userAttributes->email,
        ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // Ensure the created user implements UserContract
        Assert::isInstanceOf($newlyCreatedUser, Model::class);
        Assert::isInstanceOf($newlyCreatedUser, UserContract::class);

<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        
        // Ensure the created user implements UserContract
        Assert::isInstanceOf($newlyCreatedUser, Model::class);
        Assert::isInstanceOf($newlyCreatedUser, UserContract::class);
        
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        // Ensure the created user implements UserContract
        Assert::isInstanceOf($newlyCreatedUser, Model::class);
        Assert::isInstanceOf($newlyCreatedUser, UserContract::class);

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Assign default roles to the new user
        app(SetDefaultRolesBySocialiteUserAction::class, [
            'provider' => $provider,
            'userModel' => $newlyCreatedUser,
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        ])->execute(
            userModel: $newlyCreatedUser,
            oauthUser: $oauthUser,
        );

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        ])->execute(userModel: $newlyCreatedUser, oauthUser: $oauthUser);
        
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        ])->execute(userModel: $newlyCreatedUser, oauthUser: $oauthUser);
        
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        // Return the refreshed user instance
        /** @var UserContract $refreshedUser */
        $refreshedUser = $newlyCreatedUser->refresh();

        return $refreshedUser;
    }
}
