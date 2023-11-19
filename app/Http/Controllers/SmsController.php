<?php

namespace App\Http\Controllers;

use Bryceandy\Beem\Facades\Beem;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class SmsController extends Controller
{
    public function sendSms()
    {
        $recipients = [
            [
                'recipient_id' => (string) 1,
                'dest_addr' => (string) 255737205292,
            ]
        ];

        Beem::sms('This is the message', $recipients);
        return response()->json(['message' => 'SMS sent successfully']);
    }

    public function checkSmsBalance(): JsonResponse
    {
        $balance = Beem::smsBalance()->json();
        return response()->json($balance);
    }
}
