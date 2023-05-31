<?php

namespace App\NotificationChannels;

use App\Services\SMS\SmsServiceInterface;
use Illuminate\Notifications\Notification;

class SmsNotificationChannel
{
    public function __construct(public SmsServiceInterface $smsService)
    {
    }

    public function send($notifiable, Notification $notification)
    {
        if(!method_exists($notification, 'toSms'))
        {
            throw new \Exception('toSms is not implemented on notification');
        }

        $data = $notification->toSms();

        return $this->smsService->send($data['cellNumber'], $data['message']);
    }
}
