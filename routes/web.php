<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',function(){
    return view('auth/login');
});

// Route::view('/category','category');

Route::resource('category',CategoryController::class);

// Route::get('/product',function(){
//     return view('inventory/product');
// });

Route::resource('product',ProductController::class);

Route::resource('retail',RetailController::class);

Route::resource('client',ClientController::class);

Route::get('/bill',function(){
    return view('bill.bill');
});

Route::get('/clientProfile',function(){
    return('client.clientProfile');
});
