<?php

/**
 * ----.
 */

declare(strict_types=1);

namespace Modules\User\Providers;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Override;
use Modules\User\Models\TeamUser;
use Modules\User\Models\TeamInvitation;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Laravel\Passport\Passport;
use Modules\Notify\Emails\SpatieEmail;
use Modules\User\Datas\PasswordData;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthPersonalAccessClient;
use Modules\User\Models\OauthRefreshToken;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Providers\XotBaseServiceProvider;
use SocialiteProviders\Manager\ServiceProvider as SocialiteServiceProvider;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
=======
=======
=======
use Override;
>>>>>>> b93ef594b4 (.)
use Modules\User\Models\TeamUser;
use Modules\User\Models\TeamInvitation;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Laravel\Passport\Passport;
use Modules\Notify\Emails\SpatieEmail;
use Modules\User\Datas\PasswordData;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthPersonalAccessClient;
use Modules\User\Models\OauthRefreshToken;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Providers\XotBaseServiceProvider;
use SocialiteProviders\Manager\ServiceProvider as SocialiteServiceProvider;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Webmozart\Assert\Assert;
>>>>>>> b93ef594b4 (.)
=======
use Webmozart\Assert\Assert;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Modules\User\Datas\PasswordData;
use Modules\User\Models\OauthClient;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Modules\Notify\Emails\SpatieEmail;
use Modules\User\Models\OauthAuthCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Validation\Rules\Password;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthRefreshToken;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Modules\Xot\Providers\XotBaseServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\User\Models\OauthPersonalAccessClient;
use SocialiteProviders\Manager\ServiceProvider as SocialiteServiceProvider;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class UserServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'User';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;

<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function boot(): void
    {
        parent::boot();
        $this->registerAuthenticationProviders();
        $this->registerEventListener();
        $this->registerPasswordRules();
        $this->registerPulse();
        $this->registerMailsNotification();
    }

<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function register(): void
    {
        parent::register();
        $this->registerTeamModelBindings();
    }

    /**
     * Register the team model bindings.
     */
    protected function registerTeamModelBindings(): void
    {
<<<<<<< HEAD
        $this->app->bind('team_user_model', fn() => TeamUser::class);

        $this->app->bind('team_invitation_model', fn() => TeamInvitation::class);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->app->bind('team_user_model', fn() => TeamUser::class);

        $this->app->bind('team_invitation_model', fn() => TeamInvitation::class);
=======
        $this->app->bind('team_user_model', function () {
            return TeamUser::class;
        });

        $this->app->bind('team_invitation_model', function () {
            return TeamInvitation::class;
        });
>>>>>>> a12f125f4a (.)
=======
        $this->app->bind('team_user_model', fn() => TeamUser::class);

        $this->app->bind('team_invitation_model', fn() => TeamInvitation::class);
>>>>>>> b93ef594b4 (.)
=======
        $this->app->bind('team_user_model', function () {
            return \Modules\User\Models\TeamUser::class;
        });

        $this->app->bind('team_invitation_model', function () {
            return \Modules\User\Models\TeamInvitation::class;
        });
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function registerMailsNotification(): void
    {
        $app_name = config('app.name');
<<<<<<< HEAD
        if (!is_string($app_name)) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (!is_string($app_name)) {
=======
        if (! is_string($app_name)) {
>>>>>>> a12f125f4a (.)
=======
        if (!is_string($app_name)) {
>>>>>>> b93ef594b4 (.)
=======
        if (! is_string($app_name)) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            $app_name = '';
        }

        ResetPassword::toMailUsing(function ($notifiable, string $token): SpatieEmail {
            /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
             * return (new MailMessage)
             * ->template('user::notifications.email')
             * ->subject(__('user::reset_password.password_reset_subject'))
             * ->line(__('user::reset_password.password_cause_of_email'))
             * ->action(__('user::reset_password.reset_password'), url(route('password.reset', $token, false)))
             * ->line(__('user::reset_password.password_if_not_requested'))
             * ->line(__('user::reset_password.thank_you_for_using_app'))
             * ->salutation(__('user::reset_password.regards'));
             */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
            return (new MailMessage)
                ->template('user::notifications.email')
                ->subject(__('user::reset_password.password_reset_subject'))
                ->line(__('user::reset_password.password_cause_of_email'))
                ->action(__('user::reset_password.reset_password'), url(route('password.reset', $token, false)))
                ->line(__('user::reset_password.password_if_not_requested'))
                ->line(__('user::reset_password.thank_you_for_using_app'))
                ->salutation(__('user::reset_password.regards'));
            */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            Assert::isInstanceOf($notifiable, Model::class);
            $email = new SpatieEmail($notifiable, 'reset-password');
            $email->mergeData([
                'token' => $token,
                'reset_password_url' => url(route('password.reset', ['token' => $token], false)),
            ]);
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
            // ✅ FIX CRITICO: Imposta il destinatario dell'email con metodo Laravel standard
            if (method_exists($notifiable, 'getEmailForPasswordReset')) {
                $email->to($notifiable->getEmailForPasswordReset());
            } elseif (isset($notifiable->email)) {
                $email->to($notifiable->email);
            } else {
                // Fallback per debug
<<<<<<< HEAD
                Log::error('SpatieEmail: Destinatario email non trovato', [
                    'notifiable_class' => get_class($notifiable),
=======
<<<<<<< HEAD
                Log::error('SpatieEmail: Destinatario email non trovato', [
                    'notifiable_class' => get_class($notifiable),
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                    'notifiable_id' => $notifiable->id ?? 'unknown',
                ]);
            }

            return $email;
        });

        /*
         * $salutation = __('user::verify_email.salutation', ['app_name' => $app_name]);
         * VerifyEmail::toMailUsing(function (object $notifiable, string $url) use ($salutation): MailMessage {
         * return (new MailMessage)
         * ->template('user::notifications.email')
         * ->subject(__('user::verify_email.subject'))
         * ->greeting(__('user::verify_email.greeting'))
         * ->line(__('user::verify_email.line1'))
         * ->action(__('user::verify_email.action'), $url)
         * ->line(__('user::verify_email.line2'))
         * ->salutation($salutation);
         * });
         */
<<<<<<< HEAD
=======
=======
                    'notifiable_id' => $notifiable->id ?? 'unknown'
=======
                    'notifiable_id' => $notifiable->id ?? 'unknown',
>>>>>>> b93ef594b4 (.)
                ]);
            }

            return $email;
        });

        /*
<<<<<<< HEAD
=======
                \Illuminate\Support\Facades\Log::error('SpatieEmail: Destinatario email non trovato', [
                    'notifiable_class' => get_class($notifiable),
                    'notifiable_id' => $notifiable->id ?? 'unknown'
                ]);
            }
            
            return $email;
        });

        
        /*
>>>>>>> origin/develop
        $salutation = __('user::verify_email.salutation', ['app_name' => $app_name]);
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) use ($salutation): MailMessage {
            return (new MailMessage)
                ->template('user::notifications.email')
                ->subject(__('user::verify_email.subject'))
                ->greeting(__('user::verify_email.greeting'))
                ->line(__('user::verify_email.line1'))
                ->action(__('user::verify_email.action'), $url)
                ->line(__('user::verify_email.line2'))
                ->salutation($salutation);
        });
        */
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
         * $salutation = __('user::verify_email.salutation', ['app_name' => $app_name]);
         * VerifyEmail::toMailUsing(function (object $notifiable, string $url) use ($salutation): MailMessage {
         * return (new MailMessage)
         * ->template('user::notifications.email')
         * ->subject(__('user::verify_email.subject'))
         * ->greeting(__('user::verify_email.greeting'))
         * ->line(__('user::verify_email.line1'))
         * ->action(__('user::verify_email.action'), $url)
         * ->line(__('user::verify_email.line2'))
         * ->salutation($salutation);
         * });
         */
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        VerifyEmail::toMailUsing(function ($notifiable, string $url): SpatieEmail {
            Assert::isInstanceOf($notifiable, Model::class);
            $email = new SpatieEmail($notifiable, 'verify-email');
            $email->mergeData([
                'verification_url' => $url,
            ]);
            if (method_exists($notifiable, 'getEmailForPasswordReset')) {
                $email->to($notifiable->getEmailForPasswordReset());
            } elseif (isset($notifiable->email)) {
                $email->to($notifiable->email);
            }
            return $email;
        });
    }

    public function registerPulse(): void
    {
        Config::set('pulse.path', 'pulse/admin');
<<<<<<< HEAD
        Gate::define('viewPulse', fn(UserContract $user): bool => $user->hasRole('super-admin'));
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        Gate::define('viewPulse', fn(UserContract $user): bool => $user->hasRole('super-admin'));
=======
        Gate::define('viewPulse', function (UserContract $user): bool {
            return $user->hasRole('super-admin');
        });
>>>>>>> a12f125f4a (.)
=======
        Gate::define('viewPulse', fn(UserContract $user): bool => $user->hasRole('super-admin'));
>>>>>>> b93ef594b4 (.)
=======
        Gate::define('viewPulse', function (UserContract $user): bool {
            return $user->hasRole('super-admin');
        });
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    public function registerPasswordRules(): void
    {
        Password::defaults(function (): Password {
            $pwd = PasswordData::make();
            return $pwd->getPasswordRule();
        });
    }

    protected function registerAuthenticationProviders(): void
    {
        $this->registerPassport();
        $this->registerSocialite();
    }

    protected function registerEventListener(): void
    {
        $this->app->register(EventServiceProvider::class);
    }

    private function registerSocialite(): void
    {
        $this->app->register(SocialiteServiceProvider::class);
    }

    private function registerPassport(): void
    {
        if (method_exists(Passport::class, 'routes')) {
            Passport::routes();
        }

        Passport::tokensExpireIn(now()->addDays(1));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
        Passport::tokensCan([
            'view-user' => 'View user information',
            'core-technicians' => 'the technicians can ',
        ]);
    }
}
