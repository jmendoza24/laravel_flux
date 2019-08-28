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
    return view('welcome');
});
Auth::routes(); 

Route::group(['prefix' => 'clientes/api/v1/', 'middleware' => ['auth']], function(){
	Route::get('get_municipios', 'CatalogosController@get_municipios');

});
Route::group(['prefix' => 'plantas/api/v1/', 'middleware' => ['auth']], function(){
	Route::get('get_municipios', 'CatalogosController@get_municipios');

});


Route::group(['middleware' => ['auth']], function(){
	Route::get('/home', 'HomeController@index');
	Route::resource('productos', 'productosController');
	Route::resource('plantas', 'plantaController');
	Route::resource('equipos', 'equiposController');
	Route::resource('proveedores', 'proveedoresController');
	Route::resource('clientes', 'clientesController');        
	Route::get('/home', 'HomeController@index')->name('home');
});


//Auth::routes();


