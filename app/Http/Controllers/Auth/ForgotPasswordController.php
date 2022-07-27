<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Peer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\ClientResetPassword;
use App\Notifications\PeerResetPassword;
use Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;
    public function showForgetPasswordForm($value)
    {
        return view('customer.Passwords.forgetPassword', ['value' => $value]);
    }
    public function submitForgetPasswordForm(Request $request, $value)
    {
        if ($value == 1) {
            $request->validate([
                'email' => 'required|email|exists:peers',
            ]);
        }
        if ($value == 2) {
            $request->validate([
                'email' => 'required|email|exists:clients',
            ]);
        }
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        if ($value == 1) {
            $peer = Peer::where('email', $request->email)->first();
            Notification::send($peer, new PeerResetPassword($peer, $token, $value));
        }
        if($value == 2){
            $client = Client::where('email', $request->email)->first();
            Notification::send($client , new ClientResetPassword($client, $token, $value));
        }

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    public function showResetPasswordForm($token, $value)
    {
        return view('customer.Passwords.ForgetPasswordLink', ['token' => $token, 'value' => $value]);
    }
    public function submitResetPasswordForm(Request $request, $value)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();
        // if (!$updatePassword) {
        //     return back()->withInput()->with('error', 'Invalid token!');
        // }
        if ($value == 1) {
            $peers = Peer::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);
        } if($value == 2){
            $clients = Client::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);
        }
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('login')->with('message', 'Your password has been changed!');
        // return redirect()->back();
    }
}
