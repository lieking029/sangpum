<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/select-login', function() {
    return view('auth.select-way.login');
})->name('auth.login');

Route::get('/select-register', function() {
    return view('auth.select-way.register');
})->name('auth.register');

Route::get('/login-seller', function() {
    return view('auth.login.seller');
})->name('login.seller');

Route::get('/login-buyer', function() {
    return view('auth.login.buyer');
})->name('login.buyer');

Route::get('/register-buyer', function() {
    return view('auth.register.buyer');
})->name('register.buyer');

Route::get('/register-seller', function() {
    return view('auth.register.seller');
})->name('register.seller');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware('role:seller')->group(function () {
        // Resources
        Route::resource('products', ProductController::class);


        Route::get('seller-home', [HomeController::class, 'sellerIndex'])->name('seller.home');
        Route::get('to-shipment/{shipment}', [ShipmentController::class, 'toShipment'])->name('toShipment');
        Route::get('to-shipping/{shipment}', [ShipmentController::class, 'toShipping'])->name('toShipping');
        Route::get('to-receive/{shipment}', [ShipmentController::class, 'toReceive'])->name('toReceive');
        Route::get('complete/{shipment}', [ShipmentController::class, 'complete'])->name('complete');
    });

    Route::view('about', 'about')->name('about');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
