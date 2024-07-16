<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Prueba
Route::get('/student', function () {
    return 'students';
})->middleware('auth:sanctum');

// Registro company y customer
Route::post('/register/customer', [RegisterController::class, 'createCustomer']);
Route::post('/register/company', [RegisterController::class, 'createCompany']);

// Login company y customer
Route::post('/login/customer', [LoginApiController::class, 'loginCustomer']);
Route::post('/login/company', [LoginApiController::class, 'loginCompany']);


Route::middleware(['company.auth', 'role.company','auth:sanctum'])->group(function(){
    Route::post('/logout/company', [LoginApiController::class, 'logoutCompany']);
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index.api');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store.api');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit.api');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show.api');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update.api');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy.api');
});
