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
    $sw_url = "https://swahiliesapi.invict.site/Api";

    $data_to_swahilies = [
        "api_key" => "OWMzN2M1ZGVjMzQzNGIwY2EwNmM2NWMzZTE1YjQ3ZWY=",
        "order_id" => $request->input('order_id', 'default_order_id'),
        "amount" => $request->input('amount', 0),
        "username" => "vcard",
        "country" => "TZ",
        "method" => "mobile",
        "is_live" => false,
        "phone_number" => 255737205292,
        "cancel_url" => "https://www.yoursite.com/cancel",
        "webhook_url" => "https://www.yoursite.com/response",
        "success_url" => "https://www.yoursite.com/success",
    ];

    $info = [
        "api" => 170,
        "code" => 104,
        "data" => $data_to_swahilies
    ];

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post($sw_url, $info);

    if ($response->successful()) {
        $result = $response->json();
        if (isset($result['code']) && $result['code'] === 200 && isset($result['payment_url'])) {
            $paymentUrl = $result['payment_url'];
            // Redirect the user to the payment URL
            return redirect()->away($paymentUrl);
        } else {
            return response()->json(['error' => 'Invalid response format from Swahilies API'], $response->status());
        }
    } else {
        return response()->json(['error' => 'Error creating checkout order or failed to connect to Swahilies API'], $response->status());
    }
}
