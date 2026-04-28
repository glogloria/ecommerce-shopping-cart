<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

// User registration form
Route::get('/register', [RegisteredUserController::class, 'create']) ->name('register');

// Homepage
Route::get("/", [HomeController::class, 'index'])->name('home');

/**
 * Routes for admin
 */
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'admin_index'])->name('admin.dashboard');
    // Add Product form
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    // Save new product
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    // Edit product
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    // Save product changes 
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
    // Delete product
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    // List all products
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
});

/**
 * Routes for customer facing pages
 */
Route::middleware(['auth', 'customer'])->group(function () {
    /**
     * Cart routes
     */
    // Get cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // Add product to cart
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
    // Remove product from cart
    Route::post('/cart/remove/{product}', [CartController::class, 'destroy'])->name('cart.remove')->middleware('auth');

    /**
     * Checkout routes
     */
    // Checkout
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    // Show individual order
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    // Show all orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    /**
     * Address routes
     */
    // Add Address
    Route::post('/address/store', [AddressController::class, 'store'])->name('address.store');

});

/**
 * Profile update, delete
 */
Route::middleware('auth')->group(function () {
    Route::get('/customer/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Product routes
 */
// Show all products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
//Show product
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/dashboard', [DashboardController::class, 'admin_index'])->name('dashboard');


require __DIR__.'/auth.php';
