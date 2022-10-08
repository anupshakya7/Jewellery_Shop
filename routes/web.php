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

//Gold Routes//
Route::get('gold',[GoldController::class,"index"]);
Route::get('gold-calculate',[GoldController::class,"gold"]);
Route::post('add-gold-item',[GoldController::class,"addGoldItem"]);
Route::get('edit-gold/{id}',[GoldController::class,"edit"]);
Route::put('update-gold-item',[GoldController::class,"update"]);
Route::get('delete-gold-item/{id}',[GoldController::class,"delete"])->name('delete');
Route::get('search',[GoldController::class,"search"]);
Route::get('search-calculate/{text}',[GoldController::class,"searchGold"]);
//End Gold Routes//

//Silver Routes//
Route::get('silver',[SilverController::class,"index"]);
Route::get('silver-calculate',[SilverController::class,"silver"]);
Route::post('add-silver-item',[SilverController::class,"addSilverItem"]);
Route::get('edit-silver/{id}',[SilverController::class,"edit"]);
Route::put('update-silver-item',[SilverController::class,"update"]);
Route::get('delete-silver-item/{id}',[SilverController::class,"delete"])->name('delete');
Route::get('silver-search',[SilverController::class,"search"]);
//End Silver Routes//

Route::get('calculate',[CalculatorController::class,"index"]);
Route::get('calculator/{id}',[CalculatorController::class,"calculator"]);
Route::get('calculators/{id}',[CalculatorController::class,"calculators"]);
