<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
    return view('home');
   }
   public function getClient($id){
         $client=Client::where('id',$id)->first();
         return response()->json([
            'data' => $client,
        ]);
   }
}
