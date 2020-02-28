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
	Route::resource('ordenesCompras', 'ordenes_compraController');
	Route::get('ordenestrabajo/seguimiento', 'ordenes_compraController@seguimiento')->name('ordenesCompras.seguimiento');
	Route::get('/ordenesporenviar', 'ordenes_compraController@ordenesporenviar')->name('enviados.index');
	Route::resource('traficos', 'traficoController');
	Route::get('/factura', 'FacturacionController@index')->name('factura.index');
	Route::get('/packing_list', 'traficoController@packing_list')->name('download.package');
	Route::get('/report_pod', 'traficoController@report_pod')->name('download.pod');
	Route::get('/invoice', 'traficoController@report_invoice')->name('download.invoice');
	Route::get('/notificacion', 'traficoController@report_notificacion')->name('download.notificacion');
	Route::get('/complemento_ext', 'traficoController@complemento_ext')->name('download.complemento_ext');
	
});

Route::group(['middleware' => 'auth','prefix'=>'api/v1/'], function () {

	Route::get('get_municipios', 'CatalogosController@get_municipios');
	Route::get('get_estados', 'CatalogosController@get_estados');
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
	Route::get('/guardar_cotizacion', 'cotizacionesController@guardar_cotizacion')->name('cotizacion.guardar');
	Route::get('/guarda_informacion_cot', 'cotizacionesController@guarda_informacion_cot');
	Route::get('/elimina_cotizacion', 'cotizacionesController@elimina_cotizacion');
	Route::get('/convierteocc', 'ordenes_compraController@convierteocc');
	Route::get('/validar_orden', 'ordenes_compraController@validar_orden');
	Route::get('/agregar_productos', 'ordenes_compraController@agregar_productos');
	Route::get('/actualiza_producto_occ', 'ordenes_compraController@actualiza_producto_occ');
	Route::get('/borra_producto_occ', 'ordenes_compraController@borra_producto_occ');
	Route::get('/actualiza_producto_occ2', 'ordenes_compraController@actualiza_producto_occ_det');
	Route::get('/actualiza_info_occ', 'ordenes_compraController@actualiza_info_occ');
	Route::get('/obtiene_seguimiento', 'ordenes_compraController@obtiene_seguimiento');
	Route::post('/guarda_catalogo', 'catalogo_formaController@store');
	Route::get('/busca_forma', 'MaterialesController@busca_forma');
	Route::get('/detalle_cotizacion', 'cotizacionesController@detalle_cotizacion');
	Route::get('/revive_cotizacion', 'cotizacionesController@revive_cotizacion');
	Route::get('/get_costo_plaza', 'cotizacionesController@get_costo_plaza');
	Route::get('/agrega_comentarios', 'ordenes_compraController@agrega_comentarios');
	Route::get('/seguimiento_subproceso', 'ordenes_compraController@seguimiento_subproceso');
	Route::get('/informacion_producto', 'ordenes_compraController@informacion_producto');
	Route::get('/seguimiento_calidad', 'ordenes_compraController@seguimiento_calidad');
	Route::get('/guarda_detalles_pro', 'ordenes_compraController@guarda_detalles_pro');
	Route::get('/guarda_seguimiento', 'ordenes_compraController@guarda_seguimiento');
	Route::get('/configura_metariales', 'ordenes_compraController@configura_metariales');
	Route::get('/agrega_producto_ot', 'ordenes_compraController@agrega_producto_ot');
	Route::get('/obtiene_producto_ot', 'ordenes_compraController@obtiene_producto_ot');
	Route::get('/orden_factura', 'ordenes_compraController@orden_factura')->name('factura.plantilla');
	Route::get('/obtiene_info_plantas', 'ordenes_compraController@obtiene_info_plantas');
	Route::get('/envia_info_planta', 'ordenes_compraController@envia_info_planta')->name('envia_plantas');
	Route::get('/guarda_seguimiento_materiales', 'ordenes_compraController@guarda_seguimiento_materiales');
	Route::get('/finalizar_asignacion', 'ordenes_compraController@finalizar_asignacion');
	Route::get('/finaliza_material_asigna', 'ordenes_compraController@finaliza_material_asigna');
	Route::get('/guarda_seg_produccion', 'ordenes_compraController@guarda_seg_produccion');
	Route::post('/carga_files_produccion', 'ordenes_compraController@carga_files_produccion');
	Route::get('/seguimiento_calidad_proceso', 'ordenes_compraController@seguimiento_calidad_proceso');
	Route::get('/agrega_trafico', 'traficoController@agrega_trafico');
	Route::get('/muestra_trafico', 'traficoController@muestra_trafico');
	Route::get('/seguimiento_trafico', 'traficoController@seguimiento_trafico');
	Route::get('/finaliza_trafico', 'traficoController@finaliza_trafico');
	Route::post('/carga_files_trafico', 'traficoController@carga_files_trafico');
	Route::post('/guarda_trafico_tarima', 'traficoController@guarda_trafico_tarima');
	Route::get('/actualiza_tarimas', 'traficoController@actualiza_tarimas');
	Route::get('/elimina_tarifa', 'traficoController@elimina_tarifa');
	Route::post('/guarda_flete', 'traficoController@guarda_flete');
	Route::get('/informacion_trafico', 'traficoController@informacion_trafico');
	Route::get('/guarda_planta_trafico', 'traficoController@guarda_planta_trafico');
	Route::get('/guarda_fracciones', 'traficoController@guarda_fracciones');
	Route::get('/muestra_line_facturado', 'FacturacionController@muestra_line_facturado');
	Route::get('/muestra_line_productos', 'FacturacionController@muestra_line_productos');
	Route::get('/actualiza_monto_factura', 'FacturacionController@actualiza_monto_factura');
	

});


//Auth::routes();
	


//Route::get('mail/send', 'cotizacionesController@envio_mail')->name('trafico.index');
Route::get('mail/send', 'cotizacionesController@envio_mail');
Route::resource('catalogoFormas', 'catalogo_formaController');

