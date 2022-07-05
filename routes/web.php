<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\exapmle;
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
Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('post/login',[LoginController::class,'login'])->name('login.post');

Route::group(['middleware' => 'auth'], function () {
    //Dashboard Routes
    Route::post('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});
Route::get('abc', [exapmle::class , 'index']);
