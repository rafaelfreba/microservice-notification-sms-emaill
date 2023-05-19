<?php

namespace App\Services\SMS;

interface SmsServiceInterface
{
    public function send(string $cellNumber, string $message): int;
}