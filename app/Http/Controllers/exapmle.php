<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exapmle extends Controller
{
    public function index(){
        return view('layouts.example');
    }
}
