<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alphaolomi\Swahilies\Swahilies;


class SwahiliesController extends Controller
{

    public function showPaymentForm()
    {
        // You can create a Blade view file to display the form
        return view('swahilies');
    }

    public function createCheckoutOrder(Request $request)
    {
        //return $request->amount;
        $swahilies = new Swahilies([]);
        // Or
        $swahilies = Swahilies::create([
            'apiKey' => 'OWMzN2M1ZGVjMzQzNGIwY2EwNmM2NWMzZTE1YjQ3ZWY=',
            'username' => 'vcard',
            'isLive' => false, // ie. sandbox mode
        ]);
        
        $response = $swahilies->payments()->request([
            'amount' => $request->amount,
            // 255 is country code for Tanzania, Only Tanzania is supported for now
            'orderId' => $request->order_id,
            'phoneNumber' => "255783262616",
            'cancelUrl' => "https://yoursite.com/cancel",
            'webhookUrl' => "https://yoursite.com/response",
            'successUrl' => "https://yoursite.com/success",
            'metadata' => [],
        ]);

        print_r($response);
        
        // Output:
        // [
        //     "payment_url" => "https://swahiliespay.invict.site/make-payment-1.html?order=jdhvjadmvjehrve"
        // ]

        //if ($response['code'] == 200) {
        //    return response()->json(['link' => $response, 'status' => 200]);
        //} else {
        //    return response()->json(['Error' => 'Failed', 'status' => 300]);
        //}
    }
}
