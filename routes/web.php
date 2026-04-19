<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

# Home (not logged in)
Route::get('/', function () {
    return view('index');
});

# Home (Logged in)
Route::get('/home', function () {
    return view('../customer/home');
})->middleware(['auth', 'verified'])->name('home');

// Route to user registration form
Route::get('/register', [RegisteredUserController::class, 'create']) ->name('register');

/**
 * Display admin dashboard
 */
Route::get('/admin', function() {
    return view('../admin/admin-dashboard');
});

# Routes for admin 
Route::middleware(['auth', 'verified'])->group(function () {
    // List all products
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
    // Show add Product form
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    // Save new product
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
});

/**
 * Profile update, delete
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
