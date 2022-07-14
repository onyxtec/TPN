<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClientLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeerLoginController;
use App\Http\Controllers\PeerController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('client/login', [ClientLoginController::class, 'index'])->name('client/login');
Route::post('client/post-login', [ClientLoginController::class, 'login'])->name('clientLogin.post');
Route::get('client/register', [ClientLoginController::class, 'register'])->name('client/register');
Route::post('client/register', [ClientLoginController::class, 'registration']);

Route::get('peer/login', [PeerLoginController::class, 'index'])->name('peer/login');
Route::post('peer/post-login', [PeerLoginController::class, 'login'])->name('peerLogin.post');
Route::get('peer/register', [PeerLoginController::class, 'register'])->name('peer/register');
Route::post('peer/register', [PeerLoginController::class, 'registration']);
