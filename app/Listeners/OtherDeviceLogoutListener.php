<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\User\Contracts\HasAuthentications;
use Modules\User\Models\AuthenticationLog;
<<<<<<< HEAD
=======
=======
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Http\Request;
use Modules\User\Models\AuthenticationLog;
=======
>>>>>>> b93ef594b4 (.)
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\User\Contracts\HasAuthentications;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Modules\User\Models\AuthenticationLog;
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Http\Request;
use Modules\User\Models\AuthenticationLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Modules\User\Contracts\HasAuthentications;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

// use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class OtherDeviceLogoutListener
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(OtherDeviceLogout $event): void
    {
        if ($event->user && $event->user instanceof HasAuthentications) {
            $user = $event->user;
            $ip = $this->request->ip();

            $userAgent = $this->request->userAgent();
            $authenticationLog = $user->authentications()->whereIpAddress($ip)->whereUserAgent($userAgent)->first();

<<<<<<< HEAD
            if (!$authenticationLog) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            if (!$authenticationLog) {
=======
            if (! $authenticationLog) {
>>>>>>> a12f125f4a (.)
=======
            if (!$authenticationLog) {
>>>>>>> b93ef594b4 (.)
=======
            if (! $authenticationLog) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                $authenticationLog = new AuthenticationLog([
                    'ip_address' => $ip,
                    'user_agent' => $userAgent,
                ]);
            }

            foreach ($user->authentications()->whereLoginSuccessful(true)->whereNull('logout_at')->get() as $log) {
                if ($log->getKey() !== $authenticationLog->getKey()) {
                    $log->update([
                        'cleared_by_user' => true,
                        'logout_at' => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Handle the event.
     */
    public function handleLogin(Login $event): void
    {
<<<<<<< HEAD
        if (!config('authentication-log.notify_other_devices', false)) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!config('authentication-log.notify_other_devices', false)) {
=======
        if (! config('authentication-log.notify_other_devices', false)) {
>>>>>>> a12f125f4a (.)
=======
        if (!config('authentication-log.notify_other_devices', false)) {
>>>>>>> b93ef594b4 (.)
=======
        if (! config('authentication-log.notify_other_devices', false)) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            return;
        }

        $newIP = $this->request->ip();
        $newUserAgent = $this->request->userAgent();

        $user = $event->user;
        if (!$user || !($user instanceof HasAuthentications)) {
            return;
        }

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        $logs = $user
            ->authentications()
            ->orderByDesc('login_at')
            ->where(function ($query) use ($newIP, $newUserAgent) {
                $query->where('ip_address', '!=', $newIP)->orWhere('user_agent', '!=', $newUserAgent);
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $logs = $user->authentications()
            ->orderByDesc('login_at')
            ->where(function ($query) use ($newIP, $newUserAgent) {
                $query->where('ip_address', '!=', $newIP)
                    ->orWhere('user_agent', '!=', $newUserAgent);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $logs = $user
            ->authentications()
            ->orderByDesc('login_at')
            ->where(function ($query) use ($newIP, $newUserAgent) {
                $query->where('ip_address', '!=', $newIP)->orWhere('user_agent', '!=', $newUserAgent);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            })
            ->where('login_successful', true)
            ->get();
    }
}
