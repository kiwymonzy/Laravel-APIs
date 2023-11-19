<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alphaolomi\Swahilies\Swahilies;

class SwahiliesController extends Controller
{
    protected $swahilies;

    public function __construct()
    {
        
$this->swahilies = Swahilies::create([
    'apiKey' => "OWMzN2M1ZGVjMzQzNGIwY2EwNmM2NWMzZTE1YjQ3ZWY=",
    'username' => "vcard",
    'isLive' => true, // ie. sandbox mode
    "country" => "TZ",
    "method" => "mobile",
]);
    }

    public function initiatePayment()
    {
        // Get necessary payment data from the request
        //$orderId = $request->input('order_id');
        //$phoneNumber = $request->input('phone_number');
        // Retrieve other required fields
        // Make a payment request
        $response = $this->swahilies->payments()->request([
    // TZS by default
    'amount' => 50000,
    // 255 is country code for Tanzania, Only Tanzania is supported for now
    'orderId' => 1,
    'phoneNumber' => "255737205292",
    'cancelUrl' => "https://yoursite.com/cancel",
    'webhookUrl' => "https://yoursite.com/response",
    'successUrl' => "https://yoursite.com/success",
    'metadata' => [],
]);

        print_r($response);
    }

    public function handleWebhook(Request $request)
    {
        // Verify the webhook signature
        $isValid = $this->swahilies->webhooks()
            ->verify($request->getContent()); // Returns true/false

        // Handle webhook data and logic based on $isValid

        // For example:
        if ($isValid) {
            // Process the webhook payload
            // Do something with the validated data
            return response()->json(['message' => 'Webhook verified']);
        } else {
            return response()->json(['error' => 'Webhook verification failed'], 400);
        }
    }
}
