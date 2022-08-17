<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
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
Route::middleware('guest')->group(function(){
    Route::controller(LoginController::class)->group(function(){
        Route::get('/', 'login')->name('index');
        Route::post('/', 'store')->name('login.store');
    });
});

Route::middleware('auth')->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::post('/dashboard', 'store')->name('dashboard.store');
    });

    Route::controller(LogoutController::class)->group(function(){
        Route::get('/logout', 'logout')->name('logout');
    });
});


   
    





