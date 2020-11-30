function convierte_occ(id_cotizacion, tipo){
   $.confirm({
            title: 'Fluxmetals',
            content: 'Deseas convertir esta cotización en orden de trabajo?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: {"id_cotizacion":id_cotizacion,"tipo":tipo},
                          url: '/api/v1/convierteocc',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                            console.log(response);
                            console.log("ordenesCompras/"+response);
                            $.alert('La cotizacion ahora es una orden de trabajo')                            
                            setTimeout(function() {
                                    window.location.href = "ordenesCompras/"+response;
                                  }, 2000);
                          }
                      }); 

                },
                cancelar: function () {}
              } 
          });
}

function validar_orden(id_orden){
  var parametros = {"notas":$("#notas").val(),
                    "income":$("#income").val(),
                    "id_orden":id_orden};
    if($(".requerido").val()==''){
      $.alert("Para validar es necesario tener capturado los campos requeridos")
    }else{
      $.ajax({
              data: parametros,
              url: '/api/v1/validar_orden',
              dataType: 'json',
              type:  'get',
              success:  function (response) {  
                console.log(response);
                $.alert('La orden de trabajo se a guardado como valido')
                setTimeout(function() {
                    window.location.href = "/ordenesCompras";
                  }, 2000);
              }
          }); 
    }
   /**$.confirm({
            title: 'Fluxmetals',
            content: 'Validar esta orden de trabajo?',
            buttons: {
                confirmar: function () {
                  

                },
                cancelar: function () {}
              }
          }); */
  }

  function agrega_subproducto(id_det,id_ot){
      $.ajax({
            data: {"id_detalle":id_det,"id_ot":id_ot},
            url: '/api/v1/agregar_productos',
            dataType: 'json',
            type:  'get',
            success:  function (response) {  
              $("#detalle_cotiza").html(response);
            }
        }); 
  }

function actualiza_producto_occ(producto,id_ot){
  var parametros = {"producto":producto,
                    "cantidad":$("#cantidad"+producto).val(),
                    "id_ot":id_ot
                    };
  $.ajax({
    data: parametros,
    url: '/api/v1/actualiza_producto_occ',
    dataType: 'json',
    type:  'get',
    success:  function (response) {  
       $("#detalle_cotiza").html(response);
    }
}); 
}

function actualiza_producto_occ2(producto,id_ot){
  var parametros = {"producto":producto,
                    "id_ot":id_ot,
                    "incremento":$("#incremento"+producto).val(),
                    "fecha_entrega":$("#fecha_entrega"+producto).val(),
                    "planta":$("#planta"+producto).val(),
                    "notas_det":$("#notas_det").val()
                    };
  $.ajax({
    data: parametros,
    url: '/api/v1/actualiza_producto_occ2',
    dataType: 'json',
    type:  'get',
    success:  function (response) {  
      // $("#detalle_cotiza").html(response);
    }
}); 
}

function borra_producto_occ(producto, id_ot){
  $.ajax({
            data: {"producto":producto,"id_ot":id_ot},
            url: '/api/v1/borra_producto_occ',
            dataType: 'json',
            type:  'get',
            success:  function (response) {  
              $("#detalle_cotiza").html(response);
            }
        }); 
}

function actualiza_info_occ(orden){
  var parametros = {"orden":orden,
                    "orden_compra":$("#orden_compra").val(),
                    "notas":$("#notas").val(),
                    "income":$("#income").val(),
                    "lugar":$("#lugar").val(),
                    'logistica':$("#shipping_id").val()
                  };
  $.ajax({
            data: parametros,
            url: '/api/v1/actualiza_info_occ',
            dataType: 'json',
            type:  'get',
            success:  function (response) {  
              $("#detalle_cotiza").html(response);
            }
        });
}

function obtiene_seguimiento(id_detalle){
  $.ajax({
            data: {"id_detalle":id_detalle},
            url: '/api/v1/obtiene_seguimiento',
            dataType: 'json',
            type:  'get',
            success:  function (response) {  
              $("#informe_seguimiento").html(response);
            }
        });
}

/**
function guarda_seguimiento(id_seguimiento){
  event.preventDefault();
  var parametros = {"id_seguimiento":id_seguimiento,
                    "_method": 'POST',
                    "image": $('input[name=foto'+id_seguimiento+']').val(),
                    "_token": $("meta[name='csrf-token']").attr("content")
                  }
  $.ajax({
            url: '/api/v1/guarda_seguimiento',          
            data: parametros,
            dataType: "json",
            method: "POST",                     
            success: function(result){
               console.log(result);
            }
        });
}
*/
function agrega_comentarios(columna,detalle,orden){
  var parametros = {"columna":columna,
                    "id_detalle":detalle,
                    "id_orden":orden};

 $.ajax({
            url: '/api/v1/agrega_comentarios',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               $("#contenido").html(result);
               $("#modal_primary").removeClass("modal-xl");
               $("#modal_primary").addClass("modal-lg");
               $('.modal-dialog').draggable({handle: ".modal-header"});
               $("#footer_primary").hide();
            }
        });
}

function seguimiento_subproceso(id_proceso, id_producto,id_detalle){
  var parametros = {"id_proceso":id_proceso,
                    "id_producto":id_producto,
                    "id_detalle":id_detalle};

 $.ajax({
            url: '/api/v1/seguimiento_subproceso',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               $("#contenido").html(result);
               $('#tabla_procesos_seg').DataTable({
                  "scrollX": true,
                  "fixedColumns":   {
                        leftColumns:2
                  },
                  "scrollCollapse": true,
                  "paging": false
                });
               $("#modal_primary").addClass("modal-xl");
               //$("#modal_primary").addClass("modal-lg");
               $('.modal-dialog').draggable({handle: ".modal-header"});
               $("#footer_primary").hide();
               initPhotoSwipeFromDOM('.my-gallery');
            }
        });
}

function informacion_producto(id_producto,id_detalle){
  //alert(id_producto);
  var parametros = {"id_producto":id_producto,'id_detalle':id_detalle};
    $.ajax({
            url: '/api/v1/informacion_producto',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               $("#contenido").html(result);
               $('#sub_seguimiento').DataTable({
                   "scrollY":        "300px",
                   "scrollCollapse": true,
                   "paging":         false
                });
               $("#modal_primary").removeClass("modal-xl");
               $('.modal-dialog').draggable({handle: ".modal-header"});
               $("#footer_primary").hide();
                initPhotoSwipeFromDOM('.my-gallery');
            }
        });

}

function muestra_bloque(){
  var bloque_muesta = $("#bloque_muesta").val();
  var table = $('#seguimiento_subproceso').DataTable();
  //alert(bloque_muesta);
  // 0,1,2,3,4,5 default
  if(bloque_muesta=="show_estatus"){
    table.columns([6,7,8,9,10]).visible(true);
    table.columns([11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34]).visible(false);
  }else if(bloque_muesta=='planeacion'){
    table.columns([11,12,13,14,15,16,17]).visible(true);
    table.columns([6,7,8,9,10,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34]).visible(false);
  }else if(bloque_muesta == 'produccion'){
    table.columns([18,19,20,21,22,23,24,25]).visible(true);
    table.columns([6,7,8,9,10,11,12,13,14,15,16,17,26,27,28,29,30,31,32,33,34]).visible(false);
  }else if(bloque_muesta == 'calidad'){
    table.columns([26,27,28,29,30,31,32]).visible(true);
    table.columns([6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,33,34]).visible(false);
  }else if(bloque_muesta == 'trafico'){
    table.columns([33]).visible(true);
    table.columns([6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,34]).visible(false);
  }else if(bloque_muesta == 'factura'){
    table.columns([34]).visible(true);
    table.columns([6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33]).visible(false);
  }/**else if(bloque_muesta=='all'){
    table.columns([6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34]).visible(false);
  }else if(bloque_muesta=='shohwall'){
    table.columns([6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34]).visible(true);
  }*/

  //
 // jQuery('#Tabla_Mostrar'+id).toggle();
  //$.alert(bloque_muesta);
 // jQuery("."+bloque_muesta).toggle();

}

function seguimiento_calidad(id_producto,id_proceso,id_detalle){
  var parametros = {"id_proceso":id_proceso,
                    "id_producto":id_producto,
                    "id_detalle":id_detalle};

 $.ajax({
            url: '/api/v1/seguimiento_calidad',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               $("#contenido").html(result);
               $('#sub_seguimiento').DataTable({
                   "scrollY":        "300px",
                   "scrollCollapse": true,
                   "paging":         false
                });
               $("#modal_primary").removeClass("modal-xl");
               $("#modal_primary").addClass("modal-lg");
               $('.modal-dialog').draggable({handle: ".modal-header"});
               $("#footer_primary").hide();
               initPhotoSwipeFromDOM('.my-gallery');
            }
        });
}


function guarda_planeacion(id_columna, id_detalle, id_orden){
  if(id_columna== 8){
    var comentario = $("#fecha_termino_seg").val();
  }else{
    var comentario = $("#comentario_seg").val();
  }
  var parametros  = {'id_columna':id_columna,
                     'id_detalle':id_detalle,
                     'id_orden':id_orden,
                     'comentario':comentario
                    };
      console.log(parametros);

    $.ajax({
            url: '/api/v1/guarda_seguimiento',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               $("#primary").modal('hide');
               $.confirm({
                      title: 'Fluxmetals',
                      content: 'Comentario guardado',
                      autoClose: 'logoutUser|1500',
                      buttons: {
                          logoutUser: {
                              text: 'Ok'
                          }
                      }
                  });

               $("#comentario_seg").val('');
            }
        });

}

function guarda_detalles_pro(col,id_detalle, campo, id_orden){

  var valor = '';
  if(campo =='id_planta'){
    valor = $("#"+campo+id_detalle).val();
  }else if(campo=='st_lanzamiento' || campo=='st_informacion' || campo=='st_pregunta' || campo=='st_pintura' || campo=='st_prog_corte' 
           || campo=='st_tacm'  ){

    if($("#"+campo+id_detalle).is(":checked")){
      valor = 1;  
    }else{
      valor = 0;
    }
    
  }

  var parametros  = {'columna':campo,
                     'id_detalle':id_detalle,
                     'id_orden':id_orden,
                     'valor': valor
                    };
  console.log(parametros);
  $.ajax({
            url: '/api/v1/guarda_detalles_pro',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               console.log(result);
               //$("#comentario_seg").val('');
            }
        });

}

function configura_metariales(id_detalle, id_orden){
  var parametros  = {'id_detalle':id_detalle,
                     'id_orden':id_orden
                    };
  
  if($("#id_planta"+id_detalle).val()< 0){
    $.alert("Seleccione una planta para poder realizar la asinacion de materiales");
  }else{
  $.ajax({
            url: '/api/v1/configura_metariales',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               console.log(result);
               $("#contenido").html(result);
               $("#tbl_materiales").DataTable({
                      "scrollY":        "400px",
                      "paging":         false
                  } );
               $("#modal_primary").removeClass("modal-xl");
               $("#modal_primary").addClass("modal-lg");
               $('.modal-dialog').draggable({handle: ".modal-header"});
               $("#footer_primary").hide();
               //$("#comentario_seg").val('');
            }
        });
}
}

function agrega_producto_ot(id_orden){
  var parametros = {'producto_ot':$("#producto").val(),
                    'cantidad':$("#cantidad_p").val(),
                    'id_orden':id_orden}


  if($("#producto").val()==''){
    $.alert("Seleccione un producto");
  }else{
    $.ajax({
            url: '/api/v1/agrega_producto_ot',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
              if(result==1){
                $.alert('El producto ya esta agregado');
              }else{
                $("#detalle_cotiza").html(result);
              }
            }
        });
  }
  
}

function obtiene_producto_ot(id_orden){
  $.ajax({
            url: '/api/v1/obtiene_producto_ot',          
            data: {'id_orden':id_orden,'cliente':$("#cliente").val()},
            dataType: "json",
            method: "get",                     
            success: function(result){
              actualiza_info_occ(id_orden);
              console.log(result);
               //$("#producto").html(result.prod);
               //$("#shipping_id").html(result.logisticas);

            }
        });
}


function obtiene_info_plantas(id_planta){
  var parametros = {'id_planta':id_planta};
  $.ajax({
            url: '/api/v1/obtiene_info_plantas',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               $("#tabla_plantas").html(result);
               $("#tabla_plantas_n").DataTable({"paging": false, "lengthChange": false, "sSearch":"Buscar:",});
            }
        });
}

function envia_info_planta(id_planta){
  var parametros = {'id_planta':id_planta};
  $.ajax({
            url: '/api/v1/envia_info_planta',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               console.log(1);
            }
        });
}

function seguimiento_materiales(id_orden,id_detalle,id_material,id_forma){
  if($("#mat_"+id_orden+'_'+id_detalle + '_'+id_material+'_'+id_forma).is(":checked")){
      valor = 1;  
    }else{
      valor = 0;
    }

    var parametros = {'id_orden':id_orden,
                      'id_detalle':id_detalle,
                      'id_material':id_material,
                      'id_forma':id_forma,
                      'valor':valor};

    $.ajax({
            url: '/api/v1/guarda_seguimiento_materiales',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               console.log(1);
            }
        });
}

function  finalizar_asignacion(id_orden){
   $.ajax({
            url: '/api/v1/finalizar_asignacion',          
            data: {'id_orden':id_orden},
            dataType: "json",
            method: "get",                     
            success: function(result){
               console.log(1);
               $.alert("Asignacion finalizada");
               setTimeout(function() {
                      window.location.href = "/ordenesCompras";
                    }, 2000);
            }
        });
}

function finaliza_material_asigna(id_orden,id_detalle,tipo){
  if(tipo==0){
    $.confirm({
            title: 'Fluxmetals',
            content: 'Estas seguro deseas modificar la asinacion?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                        url: '/api/v1/finaliza_material_asigna',          
                        data: {'id_orden':id_orden,'id_detalle':id_detalle,"tipo":tipo},
                        dataType: "json",
                        method: "get",                     
                        success: function(result){
                          configura_metariales(id_detalle,id_orden);
                        }
                    }); 
                },
                cancelar: function () {}
              }
          });
  }else{
        $.ajax({
            url: '/api/v1/finaliza_material_asigna',          
            data: {'id_orden':id_orden,'id_detalle':id_detalle,"tipo":tipo},
            dataType: "json",
            method: "get",                     
            success: function(result){
              configura_metariales(id_detalle,id_orden);
            }
        });
  }
}

function guarda_seg_produccion(campo, id_detalle, id_sub, id_orden){

    var parametros = {'campo':campo,
                      'id_detalle':id_detalle,
                      'id_sub':id_sub,
                      'valor':$("#"+campo+'_'+id_detalle+'_'+id_sub).val()
                    };
               
  $.ajax({
            url: '/api/v1/guarda_seg_produccion',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
              $("#seg_produccion").html(result);
              $('#tabla_procesos_seg').DataTable({
                  "scrollX": true,
                  "fixedColumns":   {
                        leftColumns:2
                  },
                  "scrollCollapse": true,
                  "paging": false
                });
            }
        });
}

function carga_documentos(id){

   var nombre=  $("#documento"+id).val();
   var formData = new FormData($("#formUpload")[0]);

    $.ajax({
            url:"/api/v1/carga_files_produccion",
            type: 'POST',
            method: "POST",        
            data:  formData,
            //async: false,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(respuesta){
              $('#seguimiento_calidad').html(respuesta);
            }
        });
}

function seguimiento_calidad_proceso(id_proceso, id_detalle, id_orden,campo){
  var valor = $("#"+campo).val();

  var parametros = {'id_proceso':id_proceso,
                    'id_detalle':id_detalle,
                    'id_orden':id_orden,
                    'campo':campo,
                    'valor':valor}
  if(campo=='estatus' && valor==2){
      $.confirm({
            title: 'Fluxmetals',
            content: 'Estas seguro que esta proceso a sido aceptado, una vez aceptado no se puede modificar?',
            buttons: {
                confirmar: function () {
                     $.ajax({
                          url: '/api/v1/seguimiento_calidad_proceso',          
                          data: parametros,
                          dataType: "json",
                          method: "get",                     
                          success: function(result){
                            $("#primary").modal('hide');
                          }
                      });
                    $.alert('Proceso aceptado');
                },
                cancelar: function () {

                }
            }
        });
  }else{

  $.ajax({
            url: '/api/v1/seguimiento_calidad_proceso',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
              console.log(1);
            }
        });
  }
}

function agrega_trafico(id_detalle,id_cliente){
  if($("#trafic_"+id_detalle).is(":checked")){
      var valor = 1;  
    }else{
      var valor = 0;
    }
    var nom_cliente = $("#nom_cliente").val();
    var parametros = {'id_detalle':id_detalle,
                       'valor':valor,
                       'id_cliente':id_cliente}
    console.log(parametros);

  if(id_cliente != $("#id_cliente").val() && $("#id_cliente").val() > 0){
    console.log('primera validacion');
    $.confirm({
            title: 'Fluxmetals',
            content: 'Tu cliente actual es '+ nom_cliente+ ', deseas cambiar cliente?',
            buttons: {
                confirmar: function () {
                 
                  $.ajax({
                            url: '/api/v1/agrega_trafico',          
                            data: parametros,
                            dataType: "json",
                            method: "get",                     
                            success: function(result){
                              console.log(result);
                              console.log(result.cliente);
                              $("#id_cliente").val(result.cliente_actual.cliente);
                              $("#nom_cliente").val(result.cliente_actual.nombre_corto);
                              $("#traficos_sin").html(result.options);
                              $('#trafico_seg').DataTable({
                                                          "scrollX": true,
                                                          "paging": false
                                                        });
                            }
                        });

                },
                cancelar: function () {}
              }
          });
  }else if(id_cliente == $("#id_cliente").val() && id_cliente > 0){
    console.log('seg validacion');
                 
    $.ajax({
              url: '/api/v1/agrega_trafico',          
              data: parametros,
              dataType: "json",
              method: "get",                     
              success: function(result){
                console.log(result);
                console.log(result.cliente);
                $("#id_cliente").val(result.cliente_actual.cliente);
                $("#nom_cliente").val(result.cliente_actual.nombre_corto);
                $("#traficos_sin").html(result.options);
                $('#trafico_seg').DataTable({
                                            "scrollX": true,
                                            "paging": false
                                          });
              }
          });

               
  } else if($("#id_cliente").val() == 0 || $("#id_cliente").val() =='' && id_cliente > 0){
    console.log('terc validacion');
    $.ajax({
            url: '/api/v1/agrega_trafico',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
              console.log(result.cliente);
              $("#id_cliente").val(result.cliente_actual.cliente);
              $("#nom_cliente").val(result.cliente_actual.nombre_corto);
              $("#traficos_sin").html(result.options);
              $('#trafico_seg').DataTable({
                                            "scrollX": true,
                                            "paging": false
                                          });
            }
        });
  }else{
    console.log('no entro');
  }

  

  
}

function muestra_trafico(){
  var id_cliente = $("#cliente").val()
  $.ajax({
            url: '/api/v1/muestra_trafico',          
            data: {'id_cliente':id_cliente},
            dataType: "json",
            method: "get",                     
            success: function(result){
              console.log(result);
              $("#traficos_sin").html(result);
              $('#trafico_seg').DataTable({
                            "scrollX": true,
                            "paging": false 
                          });
            }
        });
}

function seguimiento_trafico(ide){
  $.ajax({
        url: '/api/v1/seguimiento_trafico',          
        data: {'ide':ide},
        dataType: "json",
        method: "get",                     
        success: function(result){
          $("#tamano_ventana").height(screen.height-50);

          console.log(result);
          $("#contenido").html(result);
          $('.modal-dialog').draggable({handle: ".modal-header"});
          $("#footer_primary").hide();           
        }
    });
  
}

function finaliza_trafico(trafico){
  $.confirm({
            title: 'Fluxmetals',
            content: 'Se creará el IDE <b>'+trafico+'</b> con los IDN´s seleccionados.',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: '',
                          url: '/api/v1/finaliza_trafico',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                            $.alert('Trafico finalizado');
                            window.location.href = "/traficos";
                          }
                      }); 

                },
                cancelar: function () {}
              }
          });
}

function carga_documentos_trafico(){

   var formData = new FormData($("#documentos_seguimiento")[0]);

    $.ajax({
            url:"/api/v1/carga_files_trafico",
            type: 'POST',
            method: "POST",        
            data:  formData,
            //async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
              $("#lista_documentos").html(respuesta);
            }
        });
}

function guarda_tarima(){
  var formData = new FormData($("#nueva_tarima")[0]);
   $.ajax({
            url:"/api/v1/guarda_trafico_tarima",
            type: 'POST',
            method: "POST",        
            data:  formData,
            //async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
              $("#listado_tarimas").html(respuesta);
              $("#nueva_tarima")[0].reset();
              $(".select2-placeholder-multiple").select2({
                placeholder: "Seleccionar idns",
              });
            }
        });
}

function actualiza_tarima(campo,id,trafico){
  
  var valor = [];
  if(campo=='idns'){
    $('#idns'+id+' :selected').each(function(i, sel){ 
    valor.push($(sel).val());

    });
  }else{
    var valor = $("#"+campo+id).val();
  }
  
  var parametros = {'campo':campo,
                    'id':id,
                    'valor':valor,
                    'id_trafico':trafico
                    };

  console.log(parametros);
   $.ajax({
        url: '/api/v1/actualiza_tarimas',          
        data: parametros,
        dataType: "json",
        method: "get",                     
        success: function(result){
          $("#listado_tarimas").html(result);
          $(".select2-placeholder-multiple").select2({
                placeholder: "Seleccionar idns",
              });
        }
    });
}

function borrar_tarima(id,trafico){
  var parametros = {'id':id,
                    'id_trafico':trafico}
  $.ajax({
        url: '/api/v1/elimina_tarifa',          
        data: parametros,
        dataType: "json",
        method: "get",                     
        success: function(result){
          console.log(result);
          $("#listado_tarimas").html(result);
          $(".select2-placeholder-multiple").select2({
                placeholder: "Seleccionar idns",
              });
        }
    });
}

function guarda_flete(){
  var formData = new FormData($("#informacion_flete")[0]);
   $.ajax({
            url:"/api/v1/guarda_flete",
            type: 'POST',
            method: "POST",        
            data:  formData,
            //async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
              console.log(1);
            }
        });
}


function informacion_trafico(trafico){
  $.ajax({
        url: '/api/v1/informacion_trafico',          
        data: {'id_trafico':trafico},
        dataType: "json",
        method: "get",                     
        success: function(result){

          $("#titulo_default").html('Información IDE: '+ trafico);
          $("#default_contenido").html(result);
          $("#modal_default").addClass("modal-lg");
        }
    });
}

function guarda_planta_trafico(campo,trafico){
  console.log($("#id_planta").val());
  var valor = $("#"+campo).val();
  $.ajax({
        url: '/api/v1/guarda_planta_trafico',          
        data: {'id_trafico':trafico,'campo':campo,'valor':valor},
        dataType: "json",
        method: "get",                     
        success: function(result){
          console.log(1);
        }
    });
}

function guarda_fracciones(campo, id, trafico){ 
  var valor = $("#"+campo+'_'+id).val();
  var parametros = {'campo':campo,
                    'id':id,
                    'id_trafico':trafico,
                    'valor':valor}
  $.ajax({
        url: '/api/v1/guarda_fracciones',          
        data: parametros,
        dataType: "json",
        method: "get",                     
        success: function(result){
          console.log(1);
        }
    });
}

function muestra_line_productos(orden){
  var parametros = {'id_orden':orden};
  $.ajax({
        url: '/api/v1/muestra_line_productos',          
        data: parametros,
        dataType: "json",
        method: "get",                     
        success: function(result){
          $("#contenido").html(result);
          $('.modal-dialog').draggable({handle: ".modal-header"});
          $("#footer_primary").hide();
        }
    });
}

function muestra_line_facturado(orden){
 var parametros = {'id_orden':orden};
  $.ajax({
        url: '/api/v1/muestra_line_facturado',          
        data: parametros,
        dataType: "json",
        method: "get",                     
        success: function(result){
          $("#contenido").html(result);
          $('.modal-dialog').draggable({handle: ".modal-header"});
          $("#footer_primary").hide();
        }
    });
}

function actualiza_monto(occ, id){
  var valor = $("#monto_pagado_"+id).val();
  var parametros = {'id':id,
                    'occ':occ,
                    'valor':valor
                    };
  $.ajax({
        url: '/api/v1/actualiza_monto_factura',          
        data: parametros,
        dataType: "json",
        method: "get",                     
        success: function(result){
          $("#contenido").html(result);
          $('.modal-dialog').draggable({handle: ".modal-header"});
          $("#footer_primary").hide();
        }
    });
}

function muestra_productos(id_orden){
  $.ajax({
        url: '/api/v1/muestra_productos',          
        data: {"id_orden":id_orden},
        dataType: "json",
        method: "get",                     
        success: function(result){
          $("#contenido").html(result);
          $("#modal_primary").removeClass("modal-xl");
          $('.modal-dialog').draggable({handle: ".modal-header"});
          $("#footer_primary").hide();
        }
    });
}

function nueva_tarima(trafico,id){
  $.ajax({
        url: '/api/v1/nueva_tarima',          
        data: {"trafico":trafico,'id':id},
        dataType: "json",
        method: "get",                     
        success: function(result){
          console.log(result);
          $("#default_contenido").html(result);
          $("#modal_default").addClass("modal-lg");
          $("#titulo_default").html('Tráfico');
          $('.modal-dialog').draggable({handle: ".modal-header"});
          $(".select2-placeholder-multiple").select2({
              placeholder: "Seleccionar idns",
            });
        }
    });
}

function obtiene_idns(trafico){
  $.ajax({
        url: '/api/v1/obtiene_idns_trafico',          
        data: {"trafico":trafico,'ship_to':$("#shipping_id").val()},
        dataType: "json",
        method: "get",                     
        success: function(result){
          console.log(result);
          $("#idns_mul").html(result);
        }
    });
}


function guarda_anexos(id_trafico){
  var formData = new FormData($("#documentos_anex")[0]);
   $.ajax({
            url:"/api/v1/documentos_anexos",
            type: 'POST',
            method: "POST",        
            data:  formData,
            //async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
              console.log(1);
            }
        });
}


function validar_cotizacion(id_cotiza){
  if($(".requerido").val()==''){
    $.alert("LLene los campos requeridos");
    $(".requerido").css("border-color", "red");   
  }
}