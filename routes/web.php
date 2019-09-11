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
Route::get('guarda_historial', 'equipo_historialController@store');
Route::get('show_historia', 'equipo_historialController@edit');
Route::get('actualiza_historial', 'equipo_historialController@update');
Route::get('delete_historial', 'equipo_historialController@destroy');
Route::get('agrega_proceso', 'productosController@agrega_proceso');
Route::get('show_proceso', 'productosController@show_proceso');
});


//Auth::routes();

Route::resource('logisticas', 'logisticaController');

Route::resource('equipoHistorials', 'equipo_historialController');

Route::resource('procesos', 'ProcesosController');

Route::resource('subprocesos', 'SubprocesosController');

Route::resource('puestos', 'PuestoController');

Route::resource('departamentos', 'DepartamentosController');

Route::resource('familias', 'FamiliaController');

Route::resource('tipoEquipos', 'TipoEquipoController');

Route::resource('tipoMaterials', 'TipoMaterialController');

Route::resource('grados', 'GradoController');

Route::resource('formas', 'FormaController');

Route::resource('incomeTerms', 'IncomeTermsController');

Route::resource('actividades', 'ActividadesController');

Route::resource('documentos', 'DocumentosController');

Route::resource('condiciones', 'condicionesController');

Route::resource('tipoaceros', 'tipoaceroController');

Route::resource('tipoestructuras', 'tipoestructuraController');

Route::resource('productoDibujos', 'producto_dibujoController');