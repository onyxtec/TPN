<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClientLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeerLoginController;
use App\Http\Controllers\Admin\PeerController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Client\AppointmentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\Peer;
use Twilio\Jwt\AccessToken;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin Login
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin/login');
Route::post('/login', [LoginController::class, 'login'])->name('login/post');
Route::get('/client/appointments', [AppointmentController::class, 'index'])->name('client.index');
Route::get('bookingform', [AppointmentController::class, 'bookingform'])->name('/bookingform');


//Password Reset Routes 
Route::get('forget-password/{value}', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password/{value}', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}/{value}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password/{value}', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


// Dashboard Routes
Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('peers', PeerController::class);
  Route::resource('clients', ClientController::class);
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginRegisterController::class, 'index'])->name('peer/login');
Route::post('post-login', [LoginRegisterController::class, 'login'])->name('peerLogin.post');
Route::get('/register', [LoginRegisterController::class, 'register'])->name('peer/register');
Route::post('/register', [LoginRegisterController::class, 'registration']);
Route::get('/peer/verify/{token}', [LoginRegisterController::class, 'verifyPeerEmail'])->name('peer/verify');
Route::get('/client/verify/{token}', [LoginRegisterController::class, 'verifyClientEmail'])->name('peer/client');
Route::get('services/', function () {
  $curl = curl_init();
  $auth_data = array(
    'client_id'         => 'qacsh136ou',
    'client_secret'     => '5hkzu3ptz2r2kbm4ih5yd3soaozn8a59bngn7fljt8jt8x0bfm',
    'grant_type'         => 'client_credentials'
  );
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
  curl_setopt($curl, CURLOPT_URL, 'https://auth.flexbooker.com/connect/token');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  $result = curl_exec($curl);
  if (!$result) {
    die("Connection Failure");
  }
  curl_close($curl);
  $token = json_decode($result);
  $abc = Http::withToken($token->access_token)->post(
    'https://merchant-api.flexbooker.com/Schedule',
    [
      "employeeId" => 80335,
      "services" => [
        [
          "serviceId" => 50845,
          "price" => 0
        ],
        [
          "serviceId" => 50845,
          "price" => 0
        ],

      ],
      "bufferTimeInMinutes" => 40,
      "startDate" => "7/20/2022",
      "endDate" => "7/29/2022",
      "locationId" => 0,
      "recurs" => true,
      "availableDays" => [
        [
          "day" => 0,
          "hours" => [
            [
              "startTime" => "12:00 AM",
              "endTime" => "7:00 PM"
            ]
          ],
          "date" => "7/20/2022"
        ]
      ],
      "scheduleType" => 0,
      "slots" => 0
    ]
  );
  // $services=json_decode($abc);
  // dd($abc);
});
Route::get('/currentclient/{id}', [HomeController::class, 'getClient'])->name('/currentclient');
