<?php

namespace App\Jobs;

use App\Notifications\EmailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class EmailJob implements ShouldQueue
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
        Notification::route('mail', [
            $this->data['email'] => $this->data['name']
        ])->notify(new EmailNotification($this->data));
    }
}
