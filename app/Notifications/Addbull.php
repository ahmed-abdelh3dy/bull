<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Addbull extends Notification
{
    use Queueable;
    private $id_bull;
    private $users_create;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_bull,$users_create)
    {
        $this->id_bull =$id_bull;
        $this->users_create =$users_create;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
          'id_bull' => $this->id_bull,
          'title'=> 'تم اضافه الفاتوره بواسطه ',
         'users_create'=> $this->users_create,
        ];
    }
}
