<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SwahiliesController extends Controller
{

    public function showPaymentForm()
    {
        // You can create a Blade view file to display the form
        return view('swahilies');
    }
    public function createCheckoutOrder(Request $request)
    {
        $url = "https://swahiliesapi.invict.site/Api";

        $payload = [
            "api" => 170,
            "code" => 104,
            "data" => [
                "api_key" => "OWMzN2M1ZGVjMzQzNGIwY2EwNmM2NWMzZTE1YjQ3ZWY=",
                "order_id" => $request->input('order_id', 'KIWY9137'), // Fetching from request or set as needed
                "amount" => $request->input('amount', 1000), // Fetching from request or set as needed
                "username" => "vcard", // Set as needed
                "is_live" => "true", // Set as needed
                "phone_number" => 255737205292, // Set as needed
                "country" => "TZ",
                "method" => "mobile",
                "cancel_url" => "localhost", // Set as needed
                "webhook_url" => "localhost", // Set as needed
                "success_url" => "localhost", // Set as needed
                "metadata" => [
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $payload);

        if ($response->status() === 200) {
            $responseData = $response->json();

            if ($responseData['code'] === 200) {
                $paymentUrl = $responseData['payment_url'];
                // Redirect the user to the payment URL
                return redirect()->away($paymentUrl);
            } else {
                // Handle error scenario
                return response()->json(['error' => 'Error creating checkout order'], 500);
            }
        } else {
            // Handle non-200 status code
            return response()->json(['error' => 'Failed to connect to Swahilies API'], 500);
        }
    }
}
