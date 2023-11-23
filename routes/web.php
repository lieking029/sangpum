<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\UserManagementController;
use App\Models\ProductVariation;
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

Auth::routes();

Route::get('/home', function () {
    return view('welcome');
})->name('home.welcome');

Route::get('/select-login', function () {
    return view('auth.select-way.login');
})->name('auth.login');

Route::get('/select-register', function () {
    return view('auth.select-way.register');
})->name('auth.register');

Route::get('/login-seller', function () {
    return view('auth.login.seller');
})->name('login.seller');

Route::get('/login-buyer', function () {
    return view('auth.login.buyer');
})->name('login.buyer');

Route::get('/register-buyer', function () {
    return view('auth.register.buyer');
})->name('register.buyer');

Route::get('/register-seller', function () {
    return view('auth.register.seller');
})->name('register.seller');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('admin-home', [HomeController::class, 'adminIndex'])->name('admin.home');

        Route::get('user-sellers', [UserManagementController::class, 'showSeller'])->name('showSeller');
        Route::get('user-buyers', [UserManagementController::class, 'showBuyer'])->name('showBuyer');
        Route::resource('top-up', TopUpController::class)->except('create');
    });

    // Seller
    Route::middleware('role:seller')->group(function () {
        // Resources
        Route::resource('products', ProductController::class);
        Route::post('product-published', [ProductController::class, 'published'])->name('product.published');
        Route::post('product-bulkDelete', [ProductController::class, 'bulkDelete'])->name('product.bulkDelete');

        Route::get('seller-home', [HomeController::class, 'sellerIndex'])->name('seller.home');
        Route::get('completed', [ShipmentController::class, 'completed'])->name('seller.completed');
        Route::get('shipment', [ShipmentController::class, 'shipmentStatus'])->name('seller.shipment');
        Route::get('to-shipment/{shipment}', [ShipmentController::class, 'toShipment'])->name('toShipment');
        Route::get('to-shipping/{shipment}', [ShipmentController::class, 'toShipping'])->name('toShipping');
        Route::get('to-receive/{shipment}', [ShipmentController::class, 'toReceive'])->name('toReceive');
        Route::get('complete/{shipment}', [ShipmentController::class, 'complete'])->name('complete');
    });

    // Buyer
    Route::middleware('role:buyer')->group(function () {
        Route::get('top-ups/create', [TopUpController::class,'create'])->name('top-up.create');
        Route::post('top-ups', [TopUpController::class,'store'])->name('top-up.store');
        Route::get('top-ups/{user}', [TopUpController::class,'show'])->name('top-up.show');
        Route::get('checkout/{id}', [ShippingController::class, 'index'])->name('shipping.index');
        Route::post('checkout', [ShippingController::class, 'store'])->name('shipping.store');
        Route::get('my-purchase', [ShipmentController::class, 'myPurchase'])->name('shipping.myPurchase');
        Route::get('tracking/{shipment}', [ShipmentController::class, 'tracking'])->name('shipping.tracking');

        Route::resource('post', PostController::class);
        Route::post('post-store', [PostController::class, 'store'])->name('post.store');


        Route::get('post/{id}/comment',[CommentController::class, 'show'])->name('comment');
        Route::post('comment-store', [CommentController::class, 'store'])->name('comment.store');

        Route::resource('message', MessageController::class);

        Route::resource('order', OrderController::class);
        Route::post('order-quantity/{order}', [OrderController::class, 'changeQuantity'])->name('order.changeQuantity');
        Route::get('/', [OrderController::class, 'marketplace'])->name('marketplace');
        Route::get('all-items', [OrderController::class, 'allItems'])->name('allItems');
        Route::get('product-detail/{product}', [OrderController::class, 'productDetails'])->name('productDetails');
        Route::post('addToCart/{product}', [OrderController::class, 'addToCart'])->name('addToCart');

        Route::get('variation-get/{id}', function ($id) {
            $variation = ProductVariation::find($id);
            return response()->json($variation);
        });
    });

    Route::view('about', 'about')->name('about');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
