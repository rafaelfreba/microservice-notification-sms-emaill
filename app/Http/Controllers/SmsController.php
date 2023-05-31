<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmsRequest;
use App\Jobs\SmsJob;

class SmsController extends Controller
{
    public function send(SmsRequest $request)
    {
        $data = [
            'cellNumber' => $request->safe()->cellNumber,
            'message' => $request->safe()->message
        ];

        SmsJob::dispatch($data)->delay(now()->addSeconds(5));
        
    }
}
