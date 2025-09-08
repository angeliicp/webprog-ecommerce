<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdmUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdmProductController;
use App\Http\Controllers\ModController;
use App\Http\Controllers\ModProductController;
use App\Http\Controllers\ModUserController;

Route::middleware(['auth', 'verified'])->group(function(){
    Route::middleware(['role:Admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::resource('adm-users', AdmUserController::class)->except(['create', 'store', 'edit']);

        Route::get('adm-products/{id}/buyerView', [AdmProductController::class, 'buyerShow'])->name('adm-products.buyerView');
        Route::put('adm-products/{id}/listing', [AdmProductController::class, 'listing'])->name('adm-products.listing');
        Route::resource('adm-products', AdmProductController::class);

        Route::put('adm-review/{id}/ban', [ReviewController::class, 'ban'])->name('adm-review.ban');
        Route::delete('adm-review/{id}/', [ReviewController::class, 'destroy'])->name('adm-review.destroy');
    });
    
    Route::middleware(['role:Moderator'])->prefix('moderator')->group(function () {
        Route::get('/dashboard', [ModController::class, 'dashboard'])->name('moderator.dashboard');
        
        Route::resource('mod-users', ModUserController::class)->except(['create', 'store', 'edit']);

        Route::put('mod-products/{id}/listing', [ModProductController::class, 'listing'])->name('mod-products.listing');
        Route::resource('mod-products', ModProductController::class);

        Route::put('mod-review/{id}/ban', [ReviewController::class, 'ban'])->name('mod-review.ban');
        Route::delete('mod-review/{id}/', [ReviewController::class, 'destroy'])->name('mod-review.destroy');
    });

    Route::middleware(['role:Buyer'])->prefix('buyer')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::post('products/search', [ProductController::class, 'search'])->name('search');
        Route::get('products/live-search', [ProductController::class, 'liveSearch'])->name('live.search');
        Route::resource('products', ProductController::class)->only(['index', 'show']);

        Route::resource('review', ReviewController::class)->only(['index', 'store','update','destroy']);

        Route::resource('cart', CartController::class)->only(['index', 'update', 'destroy']);
        Route::post('cart/{cart}/store', [CartController::class, 'store'])->name('cart.store');
        Route::resource('order', OrderController::class)->only(['index', 'create', 'store', 'show']);
    });
});


Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::post('guest-products/search', [ProductController::class, 'search'])->name('guest-search');
    Route::get('guest-products/live-search', [ProductController::class, 'liveSearch'])->name('guest-live.search');
    Route::get('guest-products/', [ProductController::class, 'index'])->name('guest-products.index');
    Route::get('guest-products/{products}/', [ProductController::class, 'show'])->name('guest-products.show');

    
    Route::resource('guest-review', ReviewController::class)->only(['index', 'store','update','destroy']);

    // Route::post('guest-cart/{id}/store', [CartController::class, 'store'])->name('guest-cart.store');

    // Route::resource('order', OrderController::class)->only(['index', 'create', 'store', 'show']);
});

Route::middleware('auth')->group(function () {
        Route::resource('profile', ProfileController::class)->only(['index', 'edit','update','destroy']);
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
