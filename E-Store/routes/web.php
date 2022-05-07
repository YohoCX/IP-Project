<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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
Route::get('/login', function (){
    return view('login');
});
Route::get('logout', function (){
    Session::forget('user');
    return view('login');
});
Route::get('/register', function (){
   return view('register');
});
Route::get('/', [HomeController::class, 'index']);
Route::get('detail/{id}',[HomeController::class, 'detail']);
Route::get('/cart',[HomeController::class, 'cart']);
Route::get('/order',[HomeController::class,'order']);
Route::get('/orders',[HomeController::class,'orderList']);
Route::get('/removecart/{id}',[HomeController::class,'removeCart']);

Route::post('/order_confirm',[HomeController::class,'order_confirm']);
Route::post('login', [UserController::class,'login']);
Route::post('/register', [UserController::class,'register']);
Route::post("add_to_cart",[HomeController::class,'addToCart']);
