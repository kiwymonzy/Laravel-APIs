<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alphaolomi\Azampay\AzampayService;

class AzamPaymentController extends Controller
{
    public function initiateMobileCheckout()
    {
        // Your Azampay mobile checkout logic
        $azampay = new AzampayService();
        $data = $azampay->mobileCheckout([
            'amount' => 1000,
            'currency' => 'TZS',
            'accountNumber' => '0625933171',
            'externalId' => '08012345678',
            'provider' => 'Mpesa',
        ]);

        // Handle the response from Azampay

        // Making cURL request to another URL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://authenticator-sandbox.azampay.co.tz/AppRegistration/GenerateToken');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $result = curl_exec($ch);

        if ($result === false) {
            $error = 'Error: ' . curl_error($ch);
            // Handle the error
        }

        curl_close($ch);

        // Process $result if needed

        // Return Azampay mobile checkout response
        return response()->json($data);
    }
}
