<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('customer/client/booking');
    }
    public function bookings()
    {
        $curl = curl_init();
        $auth_data = array(
            'client_id'         => 'qacsh136ou',
            'client_secret'     => '5hkzu3ptz2r2kbm4ih5yd3soaozn8a59bngn7fljt8jt8x0bfm',
            'grant_type'         => 'client_credentials'
        );
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
        curl_setopt($curl, CURLOPT_URL, 'https://auth.flexbooker.com/connect/token');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        $token = json_decode($result);
        $response = Http::withToken($token->access_token)->get(
            'https://merchant-api.flexbooker.com/api/CustomerHistory?customerId=10982201',
        );
        return response()->json([
            'data' => json_decode($response)
        ]);
    }
}
