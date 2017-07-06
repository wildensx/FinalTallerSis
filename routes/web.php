<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/articulo','ArticuloController');
Route::resource('ventas/cliente','ClienteController');
Route::resource('compras/proveedor','ProveedorController');
Route::resource('compras/ingreso','IngresoController');
Route::resource('ventas/venta','VentaController');

Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');
Route::resource('seguridad/usuario','UsuarioController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/{slug?}', 'HomeController@index')->name('home');
<<<<<<< HEAD
Route::get('ventas/pdf', 'VentaController@invoice');
=======
Route::resource('/pdf','PdfController@index');
Route::get('crear_reporte_porventa/{tipo}','PdfController@crear_reporte_porventa');
Route::get('/ventas/venta/reporte/{id}', 'VentaController@crear_pdf');
>>>>>>> 981b20ff5174b630e1000d2e0a335e4629aa548a


