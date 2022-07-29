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
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\PeerProfileController;
use App\Http\Controllers\ProfileController;
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

Route::get('/currentclient/{id}',[HomeController::class,'getClient'])->name('/currentclient');
Route::get('mybookings',[BookingController::class,'index']);
Route::get('clientbookings',[BookingController::class,'bookings']);

// Profile Pages Route
Route::get('myprofile', [ClientProfileController::class, 'index']);
