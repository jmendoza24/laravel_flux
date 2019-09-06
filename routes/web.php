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


Route::get('/', 'HomeController@index');

Auth::routes(); 

Route::group(['middleware' => ['auth']], function(){
	Route::get('/home', 'HomeController@index');
	Route::resource('productos', 'productosController');
	Route::resource('plantas', 'plantaController');
	Route::resource('equipos', 'equiposController');
	Route::resource('proveedores', 'proveedoresController');
	Route::resource('clientes', 'clientesController');        
	Route::get('/home', 'HomeController@index')->name('home');
});
/**
Route::group(['prefix' => 'api/v1/', 'middleware' => ['auth']], function(){
	//Route::get('municipio', 'CatalogosController@get_municipios');
	Route::get('get_municipios', 'HomeController@get_municipios');

});
*/
Route::group(['middleware' => 'auth','prefix'=>'api/v1/'], function () {

Route::get('get_municipios', 'CatalogosController@get_municipios');
Route::get('save_address', 'clientesController@save_address');
Route::get('show_logistica', 'logisticaController@edit');
Route::get('update_address', 'logisticaController@update');
Route::get('delete_logistica', 'logisticaController@eliminar');
});


//Auth::routes();

Route::resource('logisticas', 'logisticaController');

Route::resource('equipoHistorials', 'equipo_historialController');