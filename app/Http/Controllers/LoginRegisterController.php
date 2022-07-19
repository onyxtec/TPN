<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Peer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function index()
    {
        return view('layouts.PeerLogin');
    }
    public function login(Request $request)
    {
        dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('peer')->attempt($credentials)) {
            return response()->json([
                'data' => $request,
            ]);       
        }
        elseif(Auth::guard('client')->attempt($credentials)){
            return response()->json([
                'data' => $request,
            ]);  
        }           
        return response()->json([
            'message' => "These Credentials do not match our records",
            'status' => 400,
            'data' => '',
        ],400, []);
    }
    public function register()
    {
        return view('layouts.PeerRegister');
    }
    public function registration(Request $request)
    {
        if($request->specialization_type != ''){
        $peer = new Peer();
        $peer->fullName = $request->input('fullName');
        $peer->email = $request->input('email');
        $peer->password = Hash::make($request->input('password'));
        $peer->confirm_password = Hash::make($request->input('confirm_password'));
        $peer->contact_no = $request->input('contact_no');
        $peer->dob = $request->input('dob');
        $peer->specialization_type = $request->input('specialization_type');
        $peer->sub_type = $request->input('sub_type');
        $peer->save();
        return response()->json([
            'data' => $peer
        ]);
        }
        else{
            $client = new Client();
        $client->fullName = $request->input('fullName');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->confirm_password = Hash::make($request->input('confirm_password'));
        $client->contact_no = $request->input('contact_no');
        $client->emergency_contact = $request->input('emergency_contact');
        $client->dob = $request->input('dob');
        $client->address = $request->input('address');
        $client->problem_type = $request->input('problem_type');
        $client->sub_type = $request->input('substance_type');
        $client->save();
        return response()->json([
            'data' => $client
        ]);
        }
       
    }
}
