<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DistilleryController;
use App\Http\Controllers\ProfileController;

// Javne rute
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [ProductController::class, 'index'])->name('catalog');
Route::get('/product/{product}', [HomeController::class, 'show'])->name('products.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Autentifikacione rute (Breeze)
require __DIR__ . '/auth.php';

// Admin panel
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified', 'role:admin|editor'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Resource rute
        Route::resource('products', ProductController::class)->except(['show']);
        Route::resource('distilleries', DistilleryController::class)->except(['show']);

        // Dodatne funkcionalnosti
        Route::post('products/{product}/toggle-featured', [ProductController::class, 'toggleFeatured'])
            ->name('products.toggle-featured');
    });

// Za admin dashboard
Route::middleware(['auth', 'verified', 'role:admin|editor'])
    ->get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

// Za korisnički dashboard
Route::middleware(['auth', 'verified'])
    ->get('/dashboard', fn() => view('dashboard'))->name('dashboard');

// Profile rute
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
