<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\User\Models\User;
use Modules\Xot\Actions\String\GetPronounceablePasswordAction;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
=======
=======
use Illuminate\Support\Str;
use Modules\User\Models\User;
use Modules\Xot\Datas\XotData;
=======
>>>>>>> b93ef594b4 (.)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\User\Models\User;
use Modules\Xot\Actions\String\GetPronounceablePasswordAction;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Modules\Xot\Datas\XotData;
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Support\Str;
use Modules\User\Models\User;
use Modules\Xot\Datas\XotData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Xot\Contracts\UserContract;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Spatie\QueueableAction\QueueableAction;

class GetNewPasswordAction
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    use QueueableAction;

    public function execute(UserContract $record): string
    {
        //$user = XotData::make()->getUserByEmail($record->email);
        $user = $record;

        //$password=trim(Str::random(10));
        //$password='Pgn7T8Bppf';
        [$password, $password_hash] = once(function () {
            //$password=trim(Str::password(10));
            $password = app(GetPronounceablePasswordAction::class)->execute();
            $password_hash = Hash::make($password);
            return [$password, $password_hash];
        });

<<<<<<< HEAD
=======
=======
    use QueueableAction; 
    
=======
    use QueueableAction;

>>>>>>> b93ef594b4 (.)
    public function execute(UserContract $record): string
    {
        //$user = XotData::make()->getUserByEmail($record->email);
        $user = $record;

        //$password=trim(Str::random(10));
        //$password='Pgn7T8Bppf';
        [$password, $password_hash] = once(function () {
            //$password=trim(Str::password(10));
            $password = app(GetPronounceablePasswordAction::class)->execute();
            $password_hash = Hash::make($password);
            return [$password, $password_hash];
        });
<<<<<<< HEAD
         
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
    use QueueableAction; 
    
    public function execute(UserContract $record): string
    {
        //$user = XotData::make()->getUserByEmail($record->email);
        $user=$record;
        /*
        $password=Str::password(10);
        $user->update([
            'password' => Hash::make($password),
        ]);
        */
        //$password=trim(Str::random(10));
        //$password='Pgn7T8Bppf';
        [$password,$password_hash] = once(function () {
            $password=trim(Str::random(10));
            $password_hash=Hash::make($password);
            return [$password,$password_hash];
        });
         
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        $user->forceFill([
            //'password' => Hash::make($password),
            //'password' => '$2y$12$mFdQg0jwDMG2FjemQo9y5u2SbC1G0xSNKS3gQnFO5CQ109YWHTAtG',
            'password' => $password_hash,
        ])->save();
        /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
         * $user->update([
         * 'password' => $password,
         * ]);
         */

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        $user->update([
            'password' => $password,
        ]);
       */
        
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        return $password;
    }
}
