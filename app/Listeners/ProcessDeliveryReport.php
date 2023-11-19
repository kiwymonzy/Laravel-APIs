<?php

namespace App\Listeners;

use Bryceandy\Beem\Events\SmsDeliveryReportReceived;

class ProcessDeliveryReport
{
    /**
     * Handle the event.
     *
     * @param  SmsDeliveryReportReceived $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(SmsDeliveryReportReceived $event)
    {
        $requestId = $event->request['request_id'];
        $recipientId = $event->request['recipient_id'];
        $mobileNumber = $event->request['dest_addr'];
        $status = $event->request['status'];
        //...
        
        // After processing this report, send back an OK response to Beem
        return response()->json([]);
    }
}