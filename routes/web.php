<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/signup', function () {
    return view('signup');
});
Route::group(['middleware' => 'auth'], function(){
    Route::view('/dashboard', 'dashboard');
Route::resource('users',UserController::class);
Route::resource('products', ProductController::class);
});
Route::view('/login', 'login')->name('login');

Route::view('/about','about');

Route::view('/','layouts.default');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::post('/signup',[AuthController::class, 'signup']);
Route::post('/login',[AuthController::class, 'login'])->name('user.login');
