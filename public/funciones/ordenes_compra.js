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
   $.confirm({
            title: 'Fluxmetals',
            content: 'Validar esta orden de trabajo?',
            buttons: {
                confirmar: function () {
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

                },
                cancelar: function () {}
              }
          });
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
                    "planta":$("#planta"+producto).val()
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
                    "income":$("#income").val()};
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

function agrega_comentarios(titulo){
  var parametros = {"id":1};

 $.ajax({
            url: '/api/v1/agrega_comentarios',          
            data: parametros,
            dataType: "json",
            method: "get",                     
            success: function(result){
               $("#contenido").html(result);
               $("#modal_primary").removeClass("modal-xl");
               $("#titulo_tabla").html(titulo);
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
               $('#sub_seguimiento').DataTable({
                   "scrollY":        "300px",
                   "scrollCollapse": true,
                   "paging":         false
                });
               //$("#modal_primary").removeClass("modal-xl");
               //$("#modal_primary").addClass("modal-lg");
               $('.modal-dialog').draggable({handle: ".modal-header"});
               $("#footer_primary").hide();
            }
        });
}

function informacion_producto(id_producto){
  var parametros = {"id_producto":id_producto};
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
  if(bloque_muesta=='planeacion'){
    // 0,1,2,3,4 default
    table.columns([6,7,8,9,10,11,12]).visible(true);
  }else if(bloque_muesta == 'produccion'){
    table.columns([13,14,15,16,17,18,19,20]).visible(true);
  }else if(bloque_muesta == 'calidad'){
    table.columns([21,22,23,24,25,26,27]).visible(true);
  }else if(bloque_muesta == 'trafico'){
    table.columns([28]).visible(true);
  }else if(bloque_muesta == 'factura'){
    table.columns([29]).visible(true);
  }else if(bloque_muesta=='all'){
    table.columns([6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29]).visible(false);
  }else if(bloque_muesta=='shohwall'){
    table.columns([6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29]).visible(true);
  }

  
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