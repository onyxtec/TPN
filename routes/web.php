<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClientLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeerLoginController;
use App\Http\Controllers\PeerController;
use App\Http\Controllers\ClientController;
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



// Dashboard Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('peers', PeerController::class);
    Route::resource('clients', ClientController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/',[HomeController::class,'index']);
Route::get('/login', [LoginRegisterController::class, 'index'])->name('peer/login');
Route::post('post-login', [LoginRegisterController::class, 'login'])->name('peerLogin.post');
Route::get('/register', [LoginRegisterController::class, 'register'])->name('peer/register');
Route::post('/register', [LoginRegisterController::class, 'registration']);
