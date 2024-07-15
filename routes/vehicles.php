<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicle.index');
Route::match(['get', 'post'], '/vehicles/create', [VehicleController::class, 'store'])->name('vehicles.store')->middleware('verify.role:administrador');
Route::get('/vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');
Route::match(['get', 'patch'], '/vehicles/{vehicle}/edit', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy')->middleware('verify.role:administrador');
