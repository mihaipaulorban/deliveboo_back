<?php


use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Definizione della rotta per il dashboard
// Route::middleware(['auth', 'verified'])
//     ->get('/dashboard', [FoodController::class, 'index'])
//     ->name('dashboard');

Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::resource('foods', FoodController::class);
        Route::resource('restaurants', RestaurantController::class);
        Route::get('orders', [OrdersController::class, 'index'])->name('orders');
    });

require __DIR__ . '/auth.php';
