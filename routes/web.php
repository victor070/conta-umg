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
});


