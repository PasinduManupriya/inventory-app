<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $details)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting($this->details['greeting'])
            ->line($this->details['first_line'])
            ->line($this->details['body'])
            ->action('View Details', $this->details['url'])
            ->line($this->details['last_line']);

            if (!empty($this->details['pdf_path'])) {
            $mail->attach($this->details['pdf_path'], [
            'as'   => $this->details['pdf_name'],
            'mime' => 'application/pdf',
            ]);
            }

            return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
