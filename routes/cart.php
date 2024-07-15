<?php
namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\ServiceModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['customer.auth','role.customer'])->group(function(){
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/remove', [CartController::class, 'remove'])->name('cart.remove');
});
 