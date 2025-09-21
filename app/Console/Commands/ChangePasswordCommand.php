<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

<<<<<<< HEAD
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
=======
<<<<<<< HEAD
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
<<<<<<< HEAD
=======

use function Laravel\Prompts\password;

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
use function Laravel\Prompts\password;

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use function Laravel\Prompts\password;

=======
>>>>>>> a12f125f4a (.)
=======
use function Laravel\Prompts\password;

>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
class ChangePasswordCommand extends Command
{
    protected $signature = 'user:change-password';

    protected $description = 'Change user password';

    public function handle(): void
    {
        Assert::string($email = $this->ask('Enter the user email:'));
        try {
            $user = XotData::make()->getUserByEmail($email);
<<<<<<< HEAD
        } catch (Exception $e) {
=======
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            $this->error($e->getMessage());

            return;
        }

        // Ensure we fetched a persisted user and not a transient instance to avoid accidental insert
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        if (!$user->exists()) {
            Assert::false(
                $user->exists(),
                __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__) . ' - User model should exist in database before password change'
            );
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        if (null == $user || ! $user->exists) {
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        if (null == $user || ! $user->exists) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            $this->error('User not found or not persisted. Please create the user first (name, email, type, etc.).');

            return;
        }

        Assert::string($password = $this->secret('Enter the new password:'));
        $confirmPassword = $this->secret('Confirm the new password:');

        if ($password !== $confirmPassword) {
            $this->error('Passwords do not match!');

            return;
        }
        $pwd_data = PasswordData::make();
        $passwordExpiryDateTime = now()->addDays($pwd_data->expires_in);
        /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
         * $user->is_otp = false;
         * $user->password = Hash::make($password);
         * $user->save();
         */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        $user->is_otp = false;
        $user->password = Hash::make($password);
        $user->save();
        */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $user = tap($user)->update([
            'password_expires_at' => $passwordExpiryDateTime,
            'is_otp' => false,
            'password' => Hash::make($password),
        ]);

        event(new NewPasswordSet($user));

        $this->info('Password changed successfully!');
    }
}
