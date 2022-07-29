<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Peer;
use Illuminate\Support\Facades\Auth;

class ClientProfileController extends Controller
{
    public function index()
    {
        if (Auth::guard('client')->check()) {
            $id = Auth::guard('client')->user()->id;
            $client = Client::where('id', $id)->get();
            return view('customer.client.profile', compact('client'));
        }

        if (Auth::guard('peer')->check()) {
            $id = Auth::guard('peer')->user()->id;
            $peer = Peer::where('id', $id)->get();
            return view('customer.peer.profile', compact('peer'));
        }
    }
}
