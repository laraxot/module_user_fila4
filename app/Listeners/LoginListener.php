<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Modules\User\Actions\GetCurrentDeviceAction;
<<<<<<< HEAD
use Modules\User\Contracts\HasAuthentications;
use Modules\User\Models\DeviceUser;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Contracts\HasAuthentications;
use Modules\User\Models\DeviceUser;
=======
use Modules\User\Models\DeviceUser;
use Modules\User\Contracts\HasAuthentications;
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Contracts\HasAuthentications;
use Modules\User\Models\DeviceUser;
>>>>>>> b93ef594b4 (.)
=======
use Modules\User\Models\DeviceUser;
use Modules\User\Contracts\HasAuthentications;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class LoginListener
{
    public Request $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // Session::flash('login-success', 'Hello ' . $event->user->name . ', welcome back!');
        $device = app(GetCurrentDeviceAction::class)->execute();
        $user = $event->user;
        // $user->devices()->syncWithoutDetaching($device->,['login_at'=>now(),'logout_at'=>null]);
        // $res= $user->devices()->syncWithPivotValues($device->,['login_at'=>now(),'logout_at'=>null]);
        $pivot = DeviceUser::firstOrCreate(['user_id' => $user->getAuthIdentifier(), 'device_id' => $device->id]);
        $pivot->update(['login_at' => now(), 'logout_at' => null]);

        // -----
        if ($user && $user instanceof HasAuthentications) {
            $ip = $this->request->ip();
            $userAgent = $this->request->userAgent();
            // $location = optional(geoip()->getLocation($ip))->toArray();
            $location = [];

            $log = $user->authentications()->create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'login_at' => now(),
                'login_successful' => true,
                'location' => $location,
            ]);
        }
    }
}
