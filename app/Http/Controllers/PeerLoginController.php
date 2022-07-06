<?php

namespace App\Http\Controllers;

use App\Models\Peer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PeerLoginController extends Controller
{
   public function index(){
    return view('layouts.PeerLogin');
   }
   public function login(Request $request){
    $credentials = $request->only('email', 'password');
    if (Auth::guard('peer')->attempt($credentials)) {
        return response()->json([
            'data'=>$request,
        ]);
    }
}
   public function register(){
    return view('layouts.PeerRegister');
   }
   public function registration(Request $request){
    $request->validate([
        'fullName' => 'required',
        'email' => 'required',
        'password' => 'required',
        'confirm_password' => 'required_with:password|same:password',
        'contact_no' => 'required',
        'dob' => 'required',
        'address' => 'required',
    ]);
    $peer = new Peer();
    $peer->fullName = $request->input('fullName');
    $peer->email = $request->input('email');
    $peer->password = Hash::make($request->input('password'));
    $peer->confirm_password = Hash::make($request->input('confirm_password'));
    $peer->contact_no = $request->input('contact_no');
    $peer->dob = $request->input('dob');
    $peer->address = $request->input('address');
    $peer->specialization_type = $request->input('specialization_type');
    $peer->sub_type = $request->input('sub_type');
    $peer->save();
    return response()->json([
        'data'=>$peer,
    ]);

   }
}
