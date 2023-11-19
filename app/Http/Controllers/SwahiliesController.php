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
        $payload = [
            "api" => 170,
            "code" => 101,
            "data" => [
                "api_key" => "OWMzN2M1ZGVjMzQzNGIwY2EwNmM2NWMzZTE1YjQ3ZWY=",
                "amount" => 50000,
                "username" => "vcards",
                "phone_number" => 255737205292,
                "country" => "TZ",
                "method" => "mobile",
                "metadata" => [
                    "anykey" => "anyvalue",
                    "another_anyKey" => "another_anyvalue"
                ],
            ]
        ];


            $dataString = json_encode($payload);

            $headers = [
                'Content-Type: application/json',
            ];


            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $sw_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            $result = @curl_exec($ch);
            $result = json_decode($result, true);
            if (curl_errno($ch)) {
                die("Swahilies connection error. err:" . curl_error($ch));
            }
            curl_close($ch); 

        if ($result['code'] == 200){
            return response()->json(['link' => $result['payment_url'], 'status' => 200]);
        } else {
            return response()->json(['Error' => 'Failed', 'status' => 300]);
        }
    }
}
