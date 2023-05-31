<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Jobs\EmailJob;

class EmailController extends Controller
{
    public function send(EmailRequest $request)
    {
        $data = [
            'subject' => $request->safe()->subject,
            'name' => $request->safe()->name,
            'email' => $request->safe()->email,
            'message' => $request->safe()->message
        ];

        EmailJob::dispatch($data)->delay(now()->addSeconds(5));
    }
}
