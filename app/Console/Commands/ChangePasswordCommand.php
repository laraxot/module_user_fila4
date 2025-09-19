<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
<<<<<<< HEAD
=======

use function Laravel\Prompts\password;

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
<<<<<<< HEAD
use function Laravel\Prompts\password;

=======
>>>>>>> fbc8f8e (.)
=======
use function Laravel\Prompts\password;

>>>>>>> 6d20fbe (.)
class ChangePasswordCommand extends Command
{
    protected $signature = 'user:change-password';

    protected $description = 'Change user password';

    public function handle(): void
    {
        Assert::string($email = $this->ask('Enter the user email:'));
        try {
            $user = XotData::make()->getUserByEmail($email);
        } catch (Exception $e) {
            $this->error($e->getMessage());

            return;
        }

        // Ensure we fetched a persisted user and not a transient instance to avoid accidental insert
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        if (!$user->exists()) {
            Assert::false(
                $user->exists(),
                __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__) . ' - User model should exist in database before password change'
            );
<<<<<<< HEAD
=======
        if (null == $user || ! $user->exists) {
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
         * $user->is_otp = false;
         * $user->password = Hash::make($password);
         * $user->save();
         */
<<<<<<< HEAD
=======
        $user->is_otp = false;
        $user->password = Hash::make($password);
        $user->save();
        */
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        $user = tap($user)->update([
            'password_expires_at' => $passwordExpiryDateTime,
            'is_otp' => false,
            'password' => Hash::make($password),
        ]);

        event(new NewPasswordSet($user));

        $this->info('Password changed successfully!');
    }
}
