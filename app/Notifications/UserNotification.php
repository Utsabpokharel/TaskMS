<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    use Queueable;

    protected $thread;

    public function __construct($thread)
    {
        $this->thread=$thread;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'thread' => $this->thread,
//            'user' => auth()->user()
        ];
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
