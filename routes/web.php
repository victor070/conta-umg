<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'clientes'],function(){
	Route::get('','ClientesController@index');
	Route::get('news','ClientesController@new');
	Route::get('{ids?}','ClientesController@confirm');
	Route::post('import','ClientesController@import');
	Route::post('search','ClientesController@search');
	Route::post('searchCredit','ClientesController@searchCredit');
	Route::post('balance','ClientesController@balance');
	Route::post('importar', 'ClientesController@importar');
});


