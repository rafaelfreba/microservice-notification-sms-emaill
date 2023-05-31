<?php

namespace App\Jobs;

use App\NotificationChannels\SmsNotificationChannel;
use App\Notifications\SmsNotification;
use App\Services\SMS\SmsServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $data)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Notification::send('', new SmsNotification($this->data));
        Notification::route(SmsNotificationChannel::class, 'toSms')
                    ->notify(new SmsNotification($this->data));
    }
}
