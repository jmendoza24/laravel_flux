(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

function get_municipios(estado,municipio){
  var id_estado = $("#"+estado).val();
  var parameters = {"id_estado":id_estado}
   $.ajax({
            data: parameters,
            url:   '/api/v1/get_municipios',
            dataType: 'json',
            type:  'get',
            success:  function (response) { 
              var len = response.length;
              $("#"+municipio).html('<option value="0">Seleccione una opción</option>');
              for (var i = 0; i < len; i++) {
                  $("#"+municipio).append("<option value='"+response[i].id+"'>"+response[i].municipio+"</option>");
              }      
            }
        }); 
}

function guarda_direccion(id_producto){
  var parameters = {"id_producto":id_producto,
                    "nombre_log":'',
                    "telefono_log":$("#telefono_log").val(),
                    "correo_log":'',
                    "pais_log":$("#pais_log").val(),
                    "estado_log":$("#estado_log").val(),
                    "municipio_log":$("#municipio_log").val(),
                    "calle_log":$("#calle_log").val(),
                    "cp_log":$("#cp_log").val(),
                    "numero_log":$("#numero_log").val()
                    };
   $.ajax({
            data: parameters,
            url:   '/api/v1/save_address',
            dataType: 'json',
            type:  'get',
            success:  function (response) {         
              $("#logisticas").html(response); 
              $("#logisticas-table").dataTable();
              $.alert('La direccion se agrego correctamente');

              $("#large").modal('hide');//ocultamos el modal
              $('#form_logistica')[0].reset();

            }
        }); 
}

function actualiza_direccion(){
  var parameters = {"id_producto":$("#id_producto").val(),
                    "id_direccion":$("#id_logistica").val(),
                    "nombre_log":'',
                    "telefono_log":$("#telefono_log").val(),
                    "correo_log":'',
                    "pais_log":$("#pais_log").val(),
                    "estado_log":$("#estado_log").val(),
                    "municipio_log":$("#municipio_log").val(),
                    "calle_log":$("#calle_log").val(),
                    "cp_log":$("#cp_log").val(),
                    "numero_log":$("#numero_log").val()
                    };
   $.ajax({
            data: parameters,
            url:   '/api/v1/update_address',
            dataType: 'json',
            type:  'get',
            success:  function (response) {
              $("#logisticas").html(response); 
              $("#logisticas-table").dataTable();
              $.alert('La dirección se actualizo correctamente');
              $("#large").modal('hide');//ocultamos el modal
              $('#form_logistica')[0].reset();
            }
        }); 

}


function show_logistica(id_logistica){
  var parameters = {"id_logistica":id_logistica};

  $.ajax({
            data: parameters,
            url:   '/api/v1/show_logistica',
            dataType: 'json',
            type:  'get',
            success:  function (response) {     
              $("#campos_logistica").html(response); 
            }
        }); 

}

function delete_logistica(id_logistica, id_producto){

  var parameters = {"id_logistica":id_logistica,
                    "id_producto":id_producto};
  
  $.confirm({
            title: 'Confirmar!',
            content: 'Estas seguro que deseas eliminar esta dirección de envio?',
            buttons: {
                confirmar: function () {
                    $.ajax({
                          data: parameters,
                          url: '/api/v1/delete_logistica',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {     
                            $("#logisticas").html(response); 
                            $("#logisticas-table").dataTable();
                          }
                      });
                    $.alert('Dirección eliminada');
                },
                cancelar: function () {
                    $.alert('Canceledo!');

                }
            }
        });
}

function agrega_historial(tipo){
  $("#historia_tipo").val(tipo);
}


function guarda_historial(tipo){
    var parameters = {"tipo":tipo,
                      "historia_tipo":$("#historia_tipo").val(),
                      "responsable":$("#responsable").val(),
                      "fecha":$("#fecha").val(),
                      "descripcion":$("#descripcion").val(),
                      "vencimiento":$("#vencimiento").val(),
                      "activo":$("#activo").val()
                    };
    $.ajax({
            data: parameters,
            url: '/api/v1/guarda_historial',
            dataType: 'json',
            type:  'get',
            success:  function (response) {  
              $.alert('Historial guardado');
              if($("#historia_tipo").val()==1){
                $("#equipo_historial").html(response); 
                $("#equipoHistorials-table").dataTable();
              }else if($("#historia_tipo").val()==2){
                $("#equipo_histPrev").html(response); 
                $("#equipoHistorials_prev-table").dataTable();
              }else if($("#historia_tipo").val()==3){
                $("#equipo_histCorrect").html(response); 
                $("#equipoHistorials_corect-table").dataTable();
              }

             // 
            }
        });                  
}

function show_historial(id_historia){
  var parameters = {"id_historia":id_historia};

  $.ajax({
            data: parameters,
            url:   '/api/v1/show_historia',
            dataType: 'json',
            type:  'get',
            success:  function (response) {     
              $("#campos_equipos").html(response); 
            }
        }); 

}

function actualiza_historia(id_historia){
  var parameters = {  "tipo":$("#id_tipo").val(),
                      "id_historia":id_historia,
                      "historial_tipo":$("#historia_tipo").val(),
                      "responsable":$("#responsable").val(),
                      "fecha":$("#fecha").val(),
                      "descripcion":$("#descripcion").val(),
                      "vencimiento":$("#vencimiento").val(),
                      "activo":$("#activo").val()
                    };
    $.ajax({
            data: parameters,
            url: '/api/v1/actualiza_historial',
            dataType: 'json',
            type:  'get',
            success:  function (response) {  
              $.alert('Historial actualizado');
              if($("#historia_tipo").val()==1){
                $("#equipo_historial").html(response); 
                $("#equipoHistorials-table").dataTable();
              }else if($("#historia_tipo").val()==2){
                $("#equipo_histPrev").html(response); 
                $("#equipoHistorials_prev-table").dataTable();
              }else if($("#historia_tipo").val()==3){
                $("#equipo_histCorrect").html(response); 
                $("#equipoHistorials_corect-table").dataTable();
              }

             // 
            }
        });      
}

function delete_historial(id_historia, tipo, historia_tipo){
  var parameters = {  "tipo":tipo,
                      "id_historia":id_historia,
                      "historial_tipo":historia_tipo
                    };
      $.confirm({
            title: 'Confirmar!',
            content: 'Estas seguro que deseas eliminar este historial?',
            buttons: {
                confirmar: function () {
                                 $.ajax({
                                          data: parameters,
                                          url: '/api/v1/delete_historial',
                                          dataType: 'json',
                                          type:  'get',
                                          success:  function (response) {  
                                            if(historia_tipo==1){
                                              $("#equipo_historial").html(response); 
                                              $("#equipoHistorials-table").dataTable();
                                            }else if(historia_tipo==2){
                                              $("#equipo_histPrev").html(response); 
                                              $("#equipoHistorials_prev-table").dataTable();
                                            }else if(historia_tipo==3){
                                              $("#equipo_histCorrect").html(response); 
                                              $("#equipoHistorials_corect-table").dataTable();
                                            } 
                                          }
                                      }); 
                                 $.alert('Historial actualizado');
                            },
                            cancelar: function () {
                                $.alert('Canceledo!');

                            }
                        }
                    });
}


function agrega_proceso(id_proceso,id_producto){
  $.confirm({
            title: 'Confirmar!',
            content: 'Estas seguro que deseas agregar este proceso?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: {"id_proceso":id_proceso,"id_producto":id_producto},
                          url: '/api/v1/agrega_proceso',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                            $.alert('Proceso agregado');
                          }
                      }); 

                },
                cancelar: function () {
                    $.alert('Canceledo!');

                }
              }
          });
}

function ver_proceso(id_proceso,id_producto){
  $.ajax({
        data: {"id_proceso":id_proceso,"id_producto":id_producto},
        url: '/api/v1/show_proceso',
        dataType: 'json',
        type:  'get',
        success:  function (response) {  
          console.log(response);
          $("#listasubprocesos").html(response);
        }
    }); 
}