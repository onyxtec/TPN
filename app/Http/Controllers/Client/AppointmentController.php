<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
        $client=Auth::guard('client')->user();
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
        // $fullname = explode(" ", $request->input('fullName'));
        // $firstname = $fullname[0];
        // $lastname = $fullname[1];
        $response=Http::withToken($token->access_token)->get(
            'https://merchant-api.flexbooker.com/api/Customers?searchTerm='.$client['email']
            
        );
        $client=$response['customers'];
        $client_id=$client[0]['id'];
        $client_history=Http::withToken($token->access_token)->get(
            'https://merchant-api.flexbooker.com/api/CustomerHistory?customerId='.$client_id
            
        );
        return view('content/clientbooking',[
            'client_bookings'=>json_decode($client_history),
        ]);
    }
    public function bookingform(){
       
        return view('content/bookingform');

    }
}
