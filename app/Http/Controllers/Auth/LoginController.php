<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Login
    public function showLoginForm()
    {
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true
        ];

        return view('vuexy.layouts.AdminLogin', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard()->attempt($credentials)) {
            return response()->json([
                'data' => $request,
            ]);
        }
        return response()->json([
            'message' => "You Have Invalid Credentials",
            'status' => 400,
            'data' => '',
        ],400, []);
               
    }
    public function logout(Request $request)
    {
        if (Auth::guard('client')->check()) {
            Session::flush();
            Auth::guard('client')->user()->logout;
            return redirect()->route('login');
        } elseif (Auth::guard('peer')->check()) {
            Session::flush();
            Auth::guard('peer')->user()->logout;
            return redirect()->route('login');
        } else{
            Auth::logout();
            Session::flush();
            return redirect('admin/login');
        }
    }
}
