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
                    "nombre_log":$("#nombre_log").val(),
                    "telefono_log":$("#telefono_log").val(),
                    "correo_log":$("#correo_log").val(),
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
                    "nombre_log":$("#nombre_log").val(),
                    "telefono_log":$("#telefono_log").val(),
                    "correo_log":$("#correo_log").val(),
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