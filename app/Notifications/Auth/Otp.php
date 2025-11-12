<?php

declare(strict_types=1);

namespace Modules\User\Notifications\Auth;

use Illuminate\Notifications\AnonymousNotifiable;
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
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    public function __construct(
        public UserContract $user,
        public string $code,
    ) {}
<<<<<<< HEAD
=======
    public function __construct(public UserContract $user, public string $code) {}
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

    /**
     * Get the notification's delivery channels.
     *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
     * @param  mixed  $_notifiable L'entità da notificare
     * @return array<int, string>
     */
    public function via(mixed $_notifiable): array
<<<<<<< HEAD
=======
     * @param AnonymousNotifiable $notifiable
     * @return array
     */
    public function via($notifiable)
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    {
        return ['mail']; // Puoi aggiungere anche 'database', 'slack', ecc. se vuoi supportare altri canali.
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param AnonymousNotifiable $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $pwd = PasswordData::make();
        /** @var string */
        $app_name = config('app.name');

<<<<<<< HEAD
<<<<<<< HEAD
        return new MailMessage()
=======
        return (new MailMessage)

>>>>>>> fbc8f8e (.)
            ->template('user::notifications.email')
            ->subject(__('user::otp.mail.subject'))
            ->greeting(__('user::otp.mail.greeting'))
            ->line(__('user::otp.mail.line1', ['code' => $this->code]))
            ->line(__('user::otp.mail.line2', ['minutes' => $pwd->otp_expiration_minutes]))
            ->line(__('user::otp.mail.line3'))
            ->action('vai', url('/'))
=======
        $mailMessage = new MailMessage();
        $mailMessage = $mailMessage->template('user::notifications.email');
        $mailMessage = $mailMessage->subject(__('user::otp.mail.subject'));
        $mailMessage = $mailMessage->greeting(__('user::otp.mail.greeting'));
        $mailMessage = $mailMessage->line(__('user::otp.mail.line1', ['code' => $this->code]));
        $mailMessage = $mailMessage->line(__('user::otp.mail.line2', ['minutes' => $pwd->otp_expiration_minutes]));
        $mailMessage = $mailMessage->line(__('user::otp.mail.line3'));
        $mailMessage = $mailMessage->action('vai', url('/'));
        
        return $mailMessage
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
        return [];
=======
        return [
        ];
>>>>>>> fbc8f8e (.)
=======
        return [];
>>>>>>> 6d20fbe (.)
    }
}
