<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Peer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
    return view('customer.home');
   }
   public function getClient($id){
      if(Auth::guard('client')->check()){
         $client=Client::where('id',$id)->first();
         return response()->json([
            'data' => $client,
        ]);
      }
      if(Auth::guard('peer')->check()){
         $peer=Peer::where('id',$id)->first();
         return response()->json([
            'data' => $peer,
        ]);
      }
   }
}

