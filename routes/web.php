<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

# Homepage
Route::get("/", [HomeController::class, 'index'])->name('index');

// Route to user registration form
Route::get('/register', [RegisteredUserController::class, 'create']) ->name('register');

/**
 * Routes for admin
 */
Route::middleware(['auth', 'admin'])->group(function () {
    // Show admin dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'admin_index'])->name('admin.dashboard');
    // Show add Product form
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
 * Routes for customer
 */
Route::middleware(['auth', 'customer'])->group(function () {
    // Show home page
    Route::get('/customer/index', [DashboardController::class, 'customer_index'])->name('customer.index');
});

/**
 * Profile update, delete
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/**
 * Product routes
 */
// Get products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

require __DIR__.'/auth.php';
