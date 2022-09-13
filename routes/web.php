<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginIndex'])->name('loginIndex');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerIndex'])->name('registerIndex');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    // Products
    Route::get('/', [ProductController::class, 'index'])->name('products');
    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
    Route::post('/cart', [CartController::class, 'add']);
    Route::post('/cart/update', [CartController::class, 'update']);
    Route::post('/cart/delete', [CartController::class, 'delete']);
    Route::post('/cart/destroy', [CartController::class, 'destroy']);
    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


