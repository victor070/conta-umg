<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'clientes'],function(){
	Route::get('','ClientesController@index');
	Route::get('new','ClientesController@new');
	Route::post('add','ClientesController@add');
	Route::get('edit/{ids?}','ClientesController@edit');
	Route::post('update','ClientesController@update');
});

Route::group(['prefix'=>'bancos'],function(){
	Route::get('','BancosController@index');
	Route::get('new','BancosController@new');
	Route::post('add','BancosController@add');
	Route::get('edit/{ids?}','BancosController@edit');
	Route::post('update','BancosController@update');
});

Route::group(['prefix'=>'proveedores'],function(){
	Route::get('','ProveedoresController@index');
	Route::get('new','ProveedoresController@new');
	Route::post('add','ProveedoresController@add');
	Route::get('edit/{ids?}','ProveedoresController@edit');
	Route::post('update','ProveedoresController@update');
});

Route::group(['prefix'=>'productos'],function(){
	Route::get('','ProductosController@index');
	Route::get('new','ProductosController@new');
	Route::post('add','ProductosController@add');
	Route::get('edit/{ids?}','ProductosController@edit');
	Route::post('update','ProductosController@update');
});

// Agregar las rutas para Cuentas por Cobrar
Route::group(['prefix' => 'cuentasporcobrar'], function () {
    Route::get('', 'CuentasPorCobrarController@index'); 
	Route::get('new', 'CuentasPorCobrarController@new');
    Route::post('add', 'CuentasPorCobrarController@add');
    Route::get('edit/{ids?}', 'CuentasPorCobrarController@edit');
    Route::post('update', 'CuentasPorCobrarController@update');
});

// Rutas para Cuentas por Pagar
Route::group(['prefix' => 'cuentasporpagar'], function () {
    Route::get('', 'CuentasPorPagarController@index');
    Route::get('new', 'CuentasPorPagarController@new');
    Route::post('add', 'CuentasPorPagarController@add');
    Route::get('edit/{ids?}', 'CuentasPorPagarController@edit');
    Route::post('update', 'CuentasPorPagarController@update');
});