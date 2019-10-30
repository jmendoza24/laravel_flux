function convierte_occ(id_cotizacion){
	 $.confirm({
            title: 'Fluxmetals',
            content: 'Estas seguro que deseas convertir esta cotización a orden de trabajo?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: {"id_cotizacion":id_cotizacion},
                          url: '/api/v1/convierteocc',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                          	console.log(response);
                          	$.alert('La cotizacion ahora es una orden de trabajo')
                            //window.location.href = 'ordenesCompras';
                            setTimeout(function() {
                  								  window.location.href = "ordenesCompras";
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
            content: 'Estas seguro esta orden de trabajo es valido?',
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
       $("#detalle_cotiza").html(response);
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