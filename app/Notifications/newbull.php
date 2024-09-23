<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\bull;

class newbull extends Notification
{
    use Queueable;
    private $id_bull;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_bull)
    {
        $this->id_bull = $id_bull;
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
        $url = 'http://127.0.0.1:8000/bulldetalies/' . $this->id_bull;
        return (new MailMessage)
                    ->subject('شغااااااااال')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url($url))
                    ->line('Thank you for using our application!');
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
