<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\auth;
use App\Http\Controllers\compras;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::controller(auth::class)->name('login.')->group(function(){
    Route::get('/', 'auth')->name('home');
    Route::post('/', 'auth');

    Route::get('/registrar', 'register');
    Route::post('/registrar', 'register');

    Route::get('/cerrar-sesion', 'deleteSesion');
});

Route::controller(admin::class)->name('admin')->group(function(){


    Route::get('/admin/home', 'index')->name('index');

    /**FACTURACIÓN */
    Route::post('/admin/home/facturacion', 'facturas');
    Route::get('/admin/home/facturacion/get', 'getFacturas');
    Route::get('/admin/home/factura', 'viewFactura');
    ////

    /**PRODUCTOS */
    Route::get('/admin/home/productos', 'productos');

    Route::get('/admin/home/productos/create', 'createProductos');
    Route::post('/admin/home/productos/create', 'createProductos');

    Route::get('/admin/home/productos/update', 'updateProductos');
    Route::post('/admin/home/productos/update', 'updateProductos');

    Route::get('/admin/home/productos/delete', 'deleteProductos');


});


Route::controller(compras::class)->group(function(){
    Route::get('/home', 'index')->name('cliente');
    Route::post('/home', 'index');
});



