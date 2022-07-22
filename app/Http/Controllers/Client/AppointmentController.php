<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
        return view('content/clientbooking');
    }
    public function bookingform(){
        return view('content/bookingform');

    }
}
