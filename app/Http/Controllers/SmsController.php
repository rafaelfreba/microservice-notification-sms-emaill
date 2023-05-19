<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmsRequest;
use App\Services\SMS\SmsServiceInterface;

class SmsController extends Controller
{
    public function send(SmsRequest $request, SmsServiceInterface $smsService)
    {
        $response = $smsService->send(
            $request->safe()->cellNumber,
            $request->safe()->message
        );

        return $response == 200 ? response('success', $response) : response('error', $response);
    }
}
