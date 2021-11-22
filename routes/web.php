<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

// create route for search
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/products/hot', [ProductController::class, 'hot'])->name('products.hot');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/{slug}', [StoreController::class, 'show'])->name('store.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::get('/account/address', [AccountController::class, 'address'])->name('account.address');
    Route::get('/account/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('/account/order/{id}', [AccountController::class, 'order'])->name('account.order');
    Route::get('/account/settings', [AccountController::class, 'settings'])->name('account.settings');
    Route::put('/account/settings', [AccountController::class, 'updateSettings'])->name('account.updateSettings');

    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.index');
    Route::post('/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');
});

require __DIR__ . '/auth.php';
