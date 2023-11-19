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
    
    public function handleDeliveryReport(SmsDeliveryReportReceived $event): JsonResponse
    {
        $requestId = $event->request['request_id'];
        $recipientId = $event->request['recipient_id'];
        $mobileNumber = $event->request['dest_addr'];
        $status = $event->request['status'];
        
        // Process the report
        
        // After processing, send back an OK response to Beem
        return response()->json([]);
    }

    public function fetchSenderNames(): JsonResponse
    {
        $senderNames = Beem::smsSenderNames()->json();
        return response()->json($senderNames);
    }

    public function requestSmsSenderName(): JsonResponse
    {
        $name = 'BRYCEANDY';
        $sampleMessage = 'A sample message';
        Beem::requestSmsSenderName($name, $sampleMessage);
        return response()->json(['message' => 'Sender name requested']);
    }

    public function fetchSmsTemplates(): JsonResponse
    {
        $templates = Beem::smsTemplates()->json();
        return response()->json($templates);
    }

    public function addSmsTemplate(): JsonResponse
    {
        $message = 'Have a nice day!';
        $smsTitle = 'Greetings';
        Beem::addSmsTemplate($message, $smsTitle);
        return response()->json(['message' => 'SMS template added']);
    }

    public function editSmsTemplate($templateId): JsonResponse
    {
        // Edit the template with the given ID
        $message = 'Updated message';
        $smsTitle = 'Updated title';
        Beem::editSmsTemplate($templateId, $message, $smsTitle);
        return response()->json(['message' => 'SMS template updated']);
    }

    public function deleteSmsTemplate($templateId): JsonResponse
    {
        // Delete the template with the given ID
        Beem::deleteSmsTemplate($templateId);
        return response()->json(['message' => 'SMS template deleted']);
    }
}
