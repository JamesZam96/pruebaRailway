<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
/*Route::match(['get', 'post'], '/orders/create', [OrderController::class, 'store'])->name('orders.store')->middleware('verify.role:administrador');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::match(['get', 'patch'], '/orders/{order}/edit', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware('verify.role:administrador');*/

