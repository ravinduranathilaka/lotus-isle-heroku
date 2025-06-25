<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminDashboardController,
    UserDashboardController,
    PackageController,
    CategoryController,
    OrderController,
    ReviewController,
    ProfileController
};

// Home / Welcome
Route::get('/', function () {
    return view('home');
})->name('home');

// Breeze default dashboard (can be deleted or reused)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile management (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ======================
// CUSTOMER ROUTES
// ======================
Route::middleware(['auth', 'customer'])->name('customer.')->group(function () {
    Route::get('\/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // View packages and order
    Route::get('/view-packages', [PackageController::class, 'userIndex'])->name('packages.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    // View orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/history', [OrderController::class, 'history'])->name('customer.orders.history');

    // Create review
    // Route::get('/create-review', [ReviewController::class, 'create'])->name('customer.reviews.create');
    // Route::post('/reviews', [ReviewController::class, 'store'])->name('customer.reviews.store');
});

// ======================
// ADMIN ROUTES
// ======================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Category Management
    Route::resource('categories', CategoryController::class)
    ->except(['show'])
    ->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);

    // Package Management
    Route::resource('packages', PackageController::class)
    ->except(['show'])
    ->names([
        'index' => 'admin.packages.index',
        'create' => 'admin.packages.create',
        'store' => 'admin.packages.store',
        'edit' => 'admin.packages.edit',
        'update' => 'admin.packages.update',
        'destroy' => 'admin.packages.destroy',
    ]);

    // Orders Management
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');

    // Reviews Management
    // Route::get('/reviews', [ReviewController::class, 'adminIndex'])->name('admin.reviews');
    // Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// Breeze auth routes
require __DIR__.'/auth.php';
