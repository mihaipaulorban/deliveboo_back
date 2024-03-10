<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('restaurants', [\App\Http\Controllers\Api\RestaurantController::class, 'index']);
Route::get('restaurants/{slug}', [\App\Http\Controllers\Api\RestaurantController::class, 'show']);


Route::get('types', [\App\Http\Controllers\Api\TypeController::class, 'index']);

// Rotte per gli ordini
Route::post('/orders', [\App\Http\Controllers\Admin\OrdersController::class, 'store'])->name('orders.store');
// Route::middleware('auth:sanctum')->post('/orders', [\App\Http\Controllers\Admin\OrdersController::class, 'store'])->name('orders.store');
// Crea un nuovo ordine per l'utente autenticato
