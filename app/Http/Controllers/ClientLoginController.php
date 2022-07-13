<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ClientLoginController extends Controller
{
    public function index()
    {
        return view('layouts.ClientLogin');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('client')->attempt($credentials)) {
            return response()->json([
                'data' => $request,
            ]);
        }
    }
    public function register()
    {
        return view('layouts.ClientRegister');
    }
    public function registration(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required_with:password|same:password',
            'contact_no' => 'required',
            'emergency_contact' => 'required',
            'dob' => 'required',
            'address' => 'required',
        ]);
        // dd($request->all());
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
        $client->sub_type = $request->input('sub_type');
        $client->save();
        return response()->json([
            'data' => $client,
        ]);
    }
}
