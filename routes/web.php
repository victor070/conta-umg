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

