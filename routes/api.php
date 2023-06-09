<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\SmsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/send-sms', [SmsController::class, 'send']);
Route::post('/send-email', [EmailController::class, 'send']);
