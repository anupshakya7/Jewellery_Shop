<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoldController;
use App\Http\Controllers\SilverController;
use App\Http\Controllers\CalculatorController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('register','AuthPages.register');
Route::post('register',[UserController::class,"register"]);

Route::get('login',[UserController::class,"userlogin"]);
Route::post('login',[UserController::class,"login"]);

Route::get('logout',function(){
    session()->flush();
    return redirect('login');
});

Route::get('dashboard',[UserController::class,"dashboard"]);

Route::get('gold',[GoldController::class,"index"]);

Route::get('silver',[SilverController::class,"index"]);

Route::get('calculate',[CalculatorController::class,"index"]);