<?php
namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\ServiceModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*Route::get('/InicioUsuario', function(){
    return view('InicioUsuario.InicioUsuario');
})->name('home.customer');

Route::get('/TallerUsuario', function(){
    return view('InicioUsuario.TallerUsuario');
});
Route::get('/AlmacenSession', function(){
    return view('InicioUsuario.AlmacenSession');
});

Route::get('/ProductoServicioSession', function(){
    $products = ProductModel::all();
    $services = ServiceModel::all();
    return view('InicioUsuario.ProductoServicioSession', compact('products','services'));
});

Route::get('/GestionPago', function(){
    return view('InicioUsuario.GestionPago');
});
Route::get('/CompraServicio', function(){
    return view('InicioUsuario.CompraServicio');
});

Route::get('/PedidoConfirmado', function(){
    return view('InicioUsuario.PedidoConfirmado');
});*/