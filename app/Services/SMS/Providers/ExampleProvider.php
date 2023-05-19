<?php

namespace App\Services\SMS\Providers;

use Illuminate\Support\Facades\Http;
use App\Services\SMS\SmsServiceInterface;

class ExampleProvider implements SmsServiceInterface
{
    public function __construct(private $user, private $password, private $url)
    {
    }

    public function send(string $cellNumber, string $message): int
    {
        //json according to the documentation of the service used
        $body = [
            "cellNumber" => "{$cellNumber}",
            "message" => "{$message}"
        ];

        $response = Http::withBasicAuth(
                            $this->user, 
                            $this->password
                        )
                        ->acceptJson()
                        ->post($this->url, $body);

        return $response->status();
    }

}