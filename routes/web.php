<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClientLoginController;
use App\Http\Controllers\DashboardController;
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

// Auth routes
// Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
// Route::post('post/login',[LoginController::class,'login'])->name('login.post');
Route::get('/', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login/post');
Route::get('register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('home', [DashboardController::class, 'index'])->name('dashboard');

// Route::group(['middleware' => 'auth'], function () {
    // Dashboard Routes
    Route::post('/logout',[LoginController::class,'logout'])->name('logout');
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
// });
Route::get('client/login', [ClientLoginController::class,'index'])->name('client/login');
Route::post('client/post-login',[ClientLoginController::class,'login'])->name('clientLogin.post');
Route::get('client/register', [ClientLoginController::class,'register'])->name('client/register');
Route::post('client/register', [ClientLoginController::class, 'registration']);

