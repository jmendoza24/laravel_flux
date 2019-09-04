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
              console.log(response);
                  
            }
        }); 

}