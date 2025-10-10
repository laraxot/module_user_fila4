<?php

declare(strict_types=1);

namespace Modules\User\Notifications\Auth;

<<<<<<< HEAD
use Illuminate\Notifications\AnonymousNotifiable;
=======
<<<<<<< HEAD
use Illuminate\Notifications\AnonymousNotifiable;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\UserContract;

class Otp extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    public function __construct(
        public UserContract $user,
        public string $code,
    ) {}
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    public function __construct(public UserContract $user, public string $code) {}
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
    public function __construct(public UserContract $user, public string $code) {}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Get the notification's delivery channels.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @param  mixed  $_notifiable L'entità da notificare
     * @return array<int, string>
     */
    public function via(mixed $_notifiable): array
<<<<<<< HEAD
=======
=======
     * @param AnonymousNotifiable $notifiable
     * @return array
     */
    public function via($notifiable)
>>>>>>> a12f125f4a (.)
=======
     * @param  mixed  $_notifiable L'entità da notificare
     * @return array<int, string>
     */
    public function via(mixed $_notifiable): array
>>>>>>> b93ef594b4 (.)
=======
     * @param  \Illuminate\Notifications\AnonymousNotifiable  $notifiable
     * @return array
     */
    public function via($notifiable)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return ['mail']; // Puoi aggiungere anche 'database', 'slack', ecc. se vuoi supportare altri canali.
    }

    /**
     * Get the mail representation of the notification.
     *
<<<<<<< HEAD
     * @param AnonymousNotifiable $notifiable
=======
<<<<<<< HEAD
     * @param AnonymousNotifiable $notifiable
=======
     * @param  \Illuminate\Notifications\AnonymousNotifiable  $notifiable
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $pwd = PasswordData::make();
        /** @var string */
        $app_name = config('app.name');

<<<<<<< HEAD
        return new MailMessage()
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return new MailMessage()
=======
        return (new MailMessage)

>>>>>>> a12f125f4a (.)
=======
        return new MailMessage()
>>>>>>> b93ef594b4 (.)
=======
        return (new MailMessage)

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            ->template('user::notifications.email')
            ->subject(__('user::otp.mail.subject'))
            ->greeting(__('user::otp.mail.greeting'))
            ->line(__('user::otp.mail.line1', ['code' => $this->code]))
            ->line(__('user::otp.mail.line2', ['minutes' => $pwd->otp_expiration_minutes]))
            ->line(__('user::otp.mail.line3'))
            ->action('vai', url('/'))
            ->salutation(__('user::otp.mail.salutation', ['app_name' => $app_name]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray(UserContract $notifiable)
    {
<<<<<<< HEAD
        return [];
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return [];
=======
        return [
        ];
>>>>>>> a12f125f4a (.)
=======
        return [];
>>>>>>> b93ef594b4 (.)
=======
        return [
        ];
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
}
