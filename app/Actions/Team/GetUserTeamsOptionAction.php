<?php

declare(strict_types=1);

namespace Modules\User\Actions\Team;

<<<<<<< HEAD
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\TeamUser;
use Modules\User\Models\User;
=======
use Modules\User\Models\TeamUser;
>>>>>>> 220cf97b (.)
use Spatie\QueueableAction\QueueableAction;

class GetUserTeamsOptionAction
{
    use QueueableAction;

    public function execute(): array
    {
        $teams = TeamUser::where('user_id', authId())->get();

<<<<<<< HEAD
        return [ '' => '--- Select ---' ] + $teams->pluck('team.name', 'team.id')->toArray();
=======
        return ['' => '--- Select ---'] + $teams->pluck('team.name', 'team.id')->toArray();
>>>>>>> 220cf97b (.)
    }
}
