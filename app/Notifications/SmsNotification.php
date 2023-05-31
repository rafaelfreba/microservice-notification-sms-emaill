<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\NotificationChannels\SmsNotificationChannel;

class SmsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public $data)
    {
    }

    public function via($notifiable)
    {
        return [
            SmsNotificationChannel::class
        ];
    }

    public function toSms()
    {
        return [
            'cellNumber' => $this->data['cellNumber'],
            'message' => $this->data['message']
        ];
    }

}
