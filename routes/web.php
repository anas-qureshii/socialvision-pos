<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Middleware\validUser;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->middleware([validUser::class]);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'show'])->name('login');
    Route::post('/loggedin', [AuthController::class, 'login'])->name('loggedin');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware([validUser::class]);

// Route::view('/category','category');

Route::resource('category', CategoryController::class)->middleware([validUser::class]);

// Route::get('/product',function(){
//     return view('inventory/product');
// });

Route::resource('product', ProductController::class)->middleware([validUser::class]);;

Route::resource('retail', RetailController::class)->middleware([validUser::class]);;

Route::resource('client', ClientController::class)->middleware([validUser::class]);;

Route::get('/bill', function () {
    return view('bill.bill');
})->middleware([validUser::class]);;

Route::get('/clientProfile', function () {
    return ('client.clientProfile');
})->middleware([validUser::class]);;
