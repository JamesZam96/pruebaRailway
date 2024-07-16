<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



// Registro de clientes
Route::get('/register/customer', [RegisterController::class, 'showRegistrationFormCustomer'])->name('register.customer');
Route::post('/register/customer', [RegisterController::class, 'createCustomer'])->name('register.customer.submit');

// Registro de empresas
Route::get('/register/company', [RegisterController::class, 'showRegistrationFormCompany'])->name('register.company');
Route::post('/register/company', [RegisterController::class, 'createCompany'])->name('register.company.submit');

// Registro de domiciliarios
Route::get('/register/delivery', [RegisterController::class, 'showRegistrationFormDelivery'])->name('register.delivery');
Route::post('/register/delivery', [RegisterController::class, 'createDelivery'])->name('register.delivery.submit');

// Login cliente
Route::get('login/customer', [LoginApiController::class, 'showLoginFormCustomer'])->name('login.form.customer');
Route::post('login/customer', [LoginApiController::class, 'loginCustomer'])->name('login.customer');

// Login empresa
Route::get('login/company', [LoginApiController::class, 'showLoginFormCompany'])->name('login.form.company');
Route::post('login/company', [LoginApiController::class, 'loginCompany'])->name('login.company');


// Logout empresa
Route::post('/logout/company', [LoginApiController::class, 'logoutCompany'])->name('logout.company');


// Logout customer
Route::post('/logout/customer', [LoginApiController::class, 'logoutCustomer'])->name('logout.customer');


