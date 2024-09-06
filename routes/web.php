<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'clientes'],function(){
	Route::get('','ClientesController@index');
	Route::get('{ids?}','ClientesController@confirm');
	Route::post('import','ClientesController@import');
	Route::post('search','ClientesController@search');
	Route::post('searchCredit','ClientesController@searchCredit');
	Route::post('balance','ClientesController@balance');
	Route::post('importar', 'ClientesController@importar');
});


