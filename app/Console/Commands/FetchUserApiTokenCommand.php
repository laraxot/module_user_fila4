<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

class FetchUserApiTokenCommand extends Command
{
    private const INVALID_ENV = 1;

    private const USER_NOT_FOUND = 2;

    protected $signature = 'passport:fetch-user-token
                            {email : The email of the user to impersonate}';

    protected $description = 'Fetches an OAuth Token to be able to test APIs';

<<<<<<< HEAD
    
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    
=======
=======
>>>>>>> origin/develop
    public function __construct()
    {
        parent::__construct();
    }
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    public function handle(): int
    {
        if (app()->isProduction()) {
            $this->error('The command cannot be used in PRODUCTION environments');

            return self::INVALID_ENV;
        }
        Assert::string($email = $this->argument('email'));
        $userEmail = trim($email);
        if (empty($userEmail)) {
            Assert::string($userEmail = $this->ask('Please enter the email of the user to impersonate'));
            $userEmail = trim($userEmail);
        }

        $user_class = XotData::make()->getUserClass();
<<<<<<< HEAD
        /** @var UserContract */
=======
<<<<<<< HEAD
        /** @var UserContract */
=======
        /** @var \Modules\Xot\Contracts\UserContract */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $user = XotData::make()->getUserByEmail($userEmail);

        if ($user === null) {
            $this->error('User not found!');

            return self::USER_NOT_FOUND;
        }

        $oauthScopes = ['core-technicians'];

        $token = $user->createToken(
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
            name: sprintf('Debug Token [%s]', Carbon::now()->format('Y-m-d H:i:s')),
            scopes: $oauthScopes,
        );

        $this->info("Access token for `{$userEmail}`:");
        $this->comment($token->accessToken);
        $this->info('Scopes included: ' . implode(', ', $oauthScopes));
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
            name: sprintf(
                'Debug Token [%s]',
                Carbon::now()->format('Y-m-d H:i:s'),
            ),
<<<<<<< HEAD
=======
            name: sprintf('Debug Token [%s]', Carbon::now()->format('Y-m-d H:i:s')),
>>>>>>> b93ef594b4 (.)
            scopes: $oauthScopes,
        );

        $this->info("Access token for `{$userEmail}`:");
        $this->comment($token->accessToken);
<<<<<<< HEAD
        $this->info('Scopes included: '.implode(', ', $oauthScopes));
>>>>>>> a12f125f4a (.)
=======
        $this->info('Scopes included: ' . implode(', ', $oauthScopes));
>>>>>>> b93ef594b4 (.)
=======
            scopes: $oauthScopes,
        );

        $this->info("Access token for `$userEmail`:");
        $this->comment($token->accessToken);
        $this->info('Scopes included: '.implode(', ', $oauthScopes));
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        return self::SUCCESS;
    }
}
