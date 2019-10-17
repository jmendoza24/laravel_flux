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
	Route::get('/home', 'HomeController@index')->name('home');
	
	Route::resource('productos', 'productosController');
	Route::resource('plantas', 'plantaController');
	Route::resource('equipos', 'equiposController');
	Route::resource('proveedores', 'proveedoresController');
	Route::resource('clientes', 'clientesController');        
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
	Route::resource('materiales', 'MaterialesController');
	Route::resource('cotizaciones', 'cotizacionesController');
	Route::resource('listaMateriales', 'ListaMaterialesController');
	Route::get('/historiaCotizacion', 'cotizacionesController@historia')->name('cotizaciones.historia');

});

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
	Route::get('quitar_proceso', 'productosController@quitar_proceso');
	Route::get('agrega_subproceso', 'productosController@agrega_subproceso');
	Route::get('quitar_subproceso', 'productosController@quitar_subproceso');
	Route::get('/ajax_upload', 'productosController@subir_imagen');
	Route::post('/ajax_upload/action', 'productosController@action')->name('ajaxupload.action');
	Route::post('/ajax_upload/actualiza', 'productosController@actualiza')->name('ajaxupload.actualiza');
	Route::get('/show_dibujo', 'productosController@show_dibujo');
	Route::get('/nuevo_dibujo', 'productosController@nuevo_dibujo');
	Route::get('/editar_dibujo', 'productosController@editar_dibujo');
	Route::get('/elimina_dibujo', 'productosController@elimina_dibujo');
	Route::get('/agrega_material', 'productosController@agrega_material');
	Route::get('/quitar_material', 'productosController@quitar_material');
	Route::get('/informacion_cotizacion', 'cotizacionesController@informacion');
	Route::get('/informacion_dibujo', 'cotizacionesController@informacion_dibujo');
	Route::get('/guarda_informacion', 'cotizacionesController@guarda_informacion');
	Route::get('/obtiene_producto', 'cotizacionesController@obtiene_producto');
	Route::get('/agrega_producto', 'cotizacionesController@agrega_producto');
	Route::get('/delete_producto', 'cotizacionesController@delete_producto');
	Route::get('/actualiza_producto', 'cotizacionesController@actualiza_producto');
	Route::get('/actualiza_proceso', 'productosController@actualiza_proceso');
	Route::get('/actualiza_costoplanta', 'productosController@actualiza_costoplanta');
	Route::get('/agrega_material_forma', 'productosController@agrega_material_forma');
	Route::get('/elimina_producforma', 'productosController@elimina_producforma');
	Route::get('/guarda_materialforma', 'productosController@guarda_materialforma');
	Route::get('/enviar_cotizacion', 'cotizacionesController@enviar_cotizacion')->name('cotizacion.enviar');
	Route::get('/guarda_informacion_cot', 'cotizacionesController@guarda_informacion_cot');
	
});




//Auth::routes();
	