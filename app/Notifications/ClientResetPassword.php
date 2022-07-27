<?php

namespace App\Notifications;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClientResetPassword extends Notification implements ShouldQueue
{
    use Queueable;
    public $client, $token, $value;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Client $client, $token, $value)
    {
        $this->client = $client;
        $this->value = $value;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Password')
            ->greeting('Hello ' . $this->client->fullName . ' !')
            ->line('You are receiving this email because we
                    received a password reset
                    request for your account.')
            ->line('This password reset link will expire in 60 minutes.
                    If you did not request a password reset, no further action is
                    required.')
            ->action('Reset Password', url('/reset-password/'.$this->token. '/' .$this->value))
            ->line('Thank you !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
