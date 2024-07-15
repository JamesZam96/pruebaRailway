<?php
namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\ServiceModel;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Inicio.Inicio_ingreso');
})->name('home.customer');

Route::get('/ProductosyServicios', function(){
    $products = ProductModel::all();
    $services = ServiceModel::all();
    return view('Inicio.ProductoServicioIngreso', compact('products','services'));
});
Route::get('/Talleresyalmacenes', function(){
    return view('Inicio.AlmacenIngreso');
});

// Route::get('/TallerIngreso', function(){
//     return view('Inicio.TallerIngreso');
// });

