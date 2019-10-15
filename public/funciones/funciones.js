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
  var horas = $("#horas"+id_proceso).val();
  alert(horas);
  $.confirm({
            title: 'Confirmar!',
            content: 'Estas seguro que deseas agregar este proceso?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: {"id_proceso":id_proceso,"id_producto":id_producto,"horas":horas},
                          url: '/api/v1/agrega_proceso',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                            $("#listasubprocesos").html(response.options);
                            $("#costeos").html(response.costeo);
                            
                            $('.switch:checkbox').checkboxpicker();
                          },error(a,b,c){
                            console.log(a);
                            console.log(b);
                            console.log(c);
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
          $('.switch:checkbox').checkboxpicker();
        }
    }); 
}

function quitar_proceso(id_proceso,id_producto){
  $.ajax({
        data: {"id_proceso":id_proceso,"id_producto":id_producto},
        url: '/api/v1/quitar_proceso',
        dataType: 'json',
        type:  'get',
        success:  function (response) {  
          console.log(response);
          //$("#listasubprocesos").html(response);
          $("#listasubprocesos").html(response.options);
          $("#costeos").html(response.costeo);
          $('.switch:checkbox').checkboxpicker();
        }
    }); 
}

function agrega_subproceso(id_subproceso,id_proceso,id_producto){
  $.confirm({
            title: 'Confirmar!',
            content: 'Estas seguro que deseas agregar este subproceso?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: {"id_subproceso":id_subproceso,"id_producto":id_producto, "id_proceso":id_proceso},
                          url: '/api/v1/agrega_subproceso',
                          dataType: 'json',
                          type:  'get',
                           success:  function (response) {
                           console.log(response);  
                            if(response==1){
                              $.alert('El proceso debe se estar agregado poder agregar los subprocesos');
                            }else{
                              $("#listasubprocesos").html(response);
                              $('.switch:checkbox').checkboxpicker();  
                            }
                            
                           // $.alert('Subroceso agregado');
                          }
                      }); 

                },
                cancelar: function () {
                    $.alert('Canceledo!');

                }
              }
          });
}

function quitar_subproceso(id_subproceso,id_proceso,id_producto){
  $.ajax({
        data: {"id_subproceso":id_subproceso,"id_producto":id_producto, "id_proceso":id_proceso},
        url: '/api/v1/quitar_subproceso',
        dataType: 'json',
        type:  'get',
        success:  function (response) {  
          $("#listasubprocesos").html(response);
          $('.switch:checkbox').checkboxpicker();
        }
    }); 
}

function show_dibujo(dibujo){   
      $("#modal_large").addClass('modal-lg');   
      $("#img_dibujo").html('');
      $.ajax({
        data: {"dibujo":dibujo},
        url: '/api/v1/show_dibujo',
        dataType: 'json',
        type:  'get',
        success:  function (response) {  
          $("#img_dibujo").html('');
          $("#img_dibujo").html(response);
        }
    }); 
}

function nuevo_dibujo(id_producto){
  $("#modal_large").removeClass('modal-lg');  
  $("#img_dibujo").html(''); 
      $.ajax({
        data: {"id_producto":id_producto},
        url: '/api/v1/nuevo_dibujo', 
        dataType: 'json',
        type:  'get',
        success:  function (response) {  
          $("#img_dibujo").html('');
          $("#img_dibujo").html(response);
        }
    }); 
}

function edita_dibujo(id_dibujo,id_producto ){
  $("#modal_large").removeClass('modal-lg');   
  $("#img_dibujo").html('');
      $.ajax({
        data: {"id_producto":id_producto,"id_dibujo":id_dibujo},
        url: '/api/v1/editar_dibujo',
        dataType: 'json',
        type:  'get',
        success:  function (response) {  
          $("#img_dibujo").html('');
          $("#img_dibujo").html(response);
        }
    }); 
}

function elimina_dibujo(id_dibujo,id_producto){
  $.confirm({
            title: 'Confirmar!',
            content: 'Estas seguro que deseas eliminar este dibujo?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                        data: {"id_producto":id_producto,"id_dibujo":id_dibujo},
                        url: '/api/v1/elimina_dibujo',
                        dataType: 'json',
                        type:  'get',
                        success:  function (response) {  
                          $("#dibujos_table").html(response);
                          $("#productoDibujos-table").dataTable();
                        }
                    });

                },
                cancelar: function () {
                    $.alert('Canceledo!');

                }
              }
          });

}

function showcampos(){
  var forma = $("#forma").val();
  var campos = [1,2,3,4,5,6,7,8];
    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).hide();
    }

  if(forma ==''){
    $("#medidas").hide();
    $("#medida_div").hide();
  }else if(forma ==1 || forma ==2){
    $("#medidas").show();
    $("#medida_div").show();
    var campos = [1,5,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    }
  }else if(forma ==3 || forma == 4 || forma == 14){
    $("#medidas").show();
    $("#medida_div").show();
    var campos = [1,2,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    }
  }else if(forma ==5 || forma ==6){
    $("#medidas").show();
    $("#medida_div").show();
    var campos = [1,2,3,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    }
  }else if(forma ==7 || forma ==8 || forma ==9 || forma ==10){
    $("#medidas").show();
    $("#medida_div").show();
    var campos = [3,4,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    }
  }else if(forma ==11 || forma ==12){
    $("#medidas").show();
    $("#medida_div").show();
    var campos = [2,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    }
  }else if(forma ==13){
    $("#medidas").show();
    $("#medida_div").show();
    var campos = [1,4,5,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    }
  }

}


function agrega_material(id_material, id_producto){
  $.confirm({
            title: 'Confirmar!',
            content: 'Estas seguro que deseas agregar este material?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: {"id_material":id_material,"id_producto":id_producto},
                          url: '/api/v1/agrega_material',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                            $("#listamateriales").html(response.options);
                            $("#costeos").html(response.costeo);
                            $('.switch:checkbox').checkboxpicker();
                          }
                      }); 

                },
                cancelar: function () {
                    $.alert('Canceledo!');

                }
              }
          });
}

function quitar_material(id_material, id_producto){

  $.ajax({
          data: {"id_material":id_material,"id_producto":id_producto},
          url: '/api/v1/quitar_material',
          dataType: 'json',
          type:  'get',
          success:  function (response) {  
            $("#listamateriales").html(response.options);
            $("#costeos").html(response.costeo);
            $('.switch:checkbox').checkboxpicker();
          }
      }); 
}


function cotizacion_info(id_cotizacion){
  var producto = $("#producto").val();
  var parameters = {"id_producto":producto};

   $.ajax({
          data: parameters,
          url: '/api/v1/informacion_cotizacion',
          dataType: 'json',
          type:  'get',
          success:  function (response) {  
            $("#cliente").val(response.cotizacion[0].nombre_corto);
            $("#numero_parte").val(response.cotizacion[0].numero_parte);
            $("#descripcion").val(response.cotizacion[0].descripcion);
            $("#dibujo").html(response.dibujos);
          }
      }); 
  
}

function dibujo_info(){
  $.ajax({
          data: {"dibujo":$("#dibujo").val()},
          url: '/api/v1/informacion_dibujo',
          dataType: 'json',
          type:  'get',
          success:  function (response) {  
            $("#tiempo").val(response);
          }
      }); 
  
}

function guarda_informacion(){
  var parameters = { "income":$("#income").val()};
  $.ajax({
          data: parameters,
          url: '/api/v1/guarda_informacion',
          dataType: 'json',
          type:  'get',
          success:  function (response) {  
            $("#tiempo").val(response);
          }
      }); 
}


function obtiene_producto(){
  if($("#cliente").val()==''){
      $.alert('Seleccione un cliente valido');
  }else{


  var cliente_cot = $("#cliente_cot").val();  
    if(cliente_cot ==''){cliente_cot = 0};
    
  var cliente = $("#cliente").val();

  if(cliente !=cliente_cot && cliente_cot != 0){
  $.confirm({
            title: 'Confirmar!',
            content: 'Estas seguro que deseas cambiar de cliente, si cambias se perdera la informacion de los productos seleccionados?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: {"cliente":cliente},
                          url: '/api/v1/obtiene_producto',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                            console.log(response)
                          }
                      }); 

                },
                cancelar: function () {
                  $("#cliente").val(cliente_cot);

                }
              }
          });

    }else if(cliente == cliente_cot || cliente_cot ==0){
      $.ajax({
              data: {"cliente":cliente},
              url: '/api/v1/obtiene_producto',
              dataType: 'json',
              type:  'get',
              success:  function (response) {  
                console.log(response)
              }
          }); 
    }
  }
}


function agrega_producto(){
  
    var parameters = {"producto":$("#producto").val(),
                      "cliente":$("#cliente").val()}

     if($("#producto").val()==''){
        $.alert('Seleccione un producto');

     }else{                 
    $.ajax({
              data: parameters,
              url: '/api/v1/agrega_producto',
              dataType: 'json',
              type:  'get',
              success:  function (response) {  
                if(response==1){
                    $.alert('El producto ya se encuentra agregado');
                }else{
                  $("#detalle_cotiza").html(response);
                }
                
              }
          }); 
  }
}


function borra_producto(id){

    $.confirm({
            title: 'Confirmar!',
            content: 'Estas seguro que deseas eliminar este producto?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: {"id_prod":id},
                          url: '/api/v1/delete_producto',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                             $("#detalle_cotiza").html(response);
                          }
                      }); 

                },
                cancelar: function () {
                    //$.alert('Canceledo!');

                }
              }
          });
}

function actualiza_producto(producto){

  $.ajax({
    data: {"producto":producto,"cantidad":$("#cantidad"+producto).val()},
    url: '/api/v1/actualiza_producto',
    dataType: 'json',
    type:  'get',
    success:  function (response) {  
       $("#detalle_cotiza").html(response);
    },error(a,b,c){
      console.log(a);
      console.log(b);
      console.log(c);
    }
}); 
}

function actualiza_proceso(proceso, producto){
   $.ajax({
        data: {"id_producto":producto,"id_proceso":proceso,"horas":$("#horas"+proceso).val()},
        url: '/api/v1/actualiza_proceso',
        dataType: 'json',
        type:  'get',
        success:  function (response) {  
          console.log(response);
          $("#listasubprocesos").html(response.options);
          $("#costeos").html(response.costeo);
          $('.switch:checkbox').checkboxpicker();
        },error(a,b,c){
          console.log(a);
          console.log(b);
          console.log(c);
        }
    }); 
}

function guarda_horas(id_planta, id_prod){
  $.ajax({
        data: {"id_producto":id_prod,"id_planta":id_planta,"costo":$("#plantacosto"+id_planta).val()},
        url: '/api/v1/actualiza_costoplanta',
        dataType: 'json',
        type:  'get',
        success:  function (response) {  
           console.log(response);
          //$("#listasubprocesos").html(response);
        }
    }); 
}

function showcampos(id_mat){
  var forma = $("#tipoforma").val();
  var campos = [1,2,3,4,5,6,7,8];
    for (x=0;x<campos.length;x++){
      $("#cam"+id_mat+campos[x]).hide();
    }

  if(forma ==''){
    $.alert("Seleccione una forma")
  }else if(forma ==1 || forma ==2){
    var campos = [1,5,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+id_mat+campos[x]).show();
    }
  }else if(forma ==3 || forma == 4 || forma == 14){
    var campos = [1,2,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+id_mat+campos[x]).show();
    }
  }else if(forma ==5 || forma ==6){
    var campos = [1,2,3,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+id_mat+campos[x]).show();
    }
  }else if(forma ==7 || forma ==8 || forma ==9 || forma ==10){
    var campos = [3,4,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+id_mat+campos[x]).show();
    }
  }else if(forma ==11 || forma ==12){
    var campos = [2,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+id_mat+campos[x]).show();
    }
  }else if(forma ==13){
    var campos = [1,4,5,6,7,8];

    for (x=0;x<campos.length;x++){
      $("#cam"+id_mat+campos[x]).show();
    }
  }

}

function agrega_material_forma(id_producto){
  if($("#idforma").val() !=""){
  $.ajax({
        data: {"id_producto":id_producto,"id_forma":$("#idforma").val()},
        url: '/api/v1/agrega_material_forma',
        dataType: 'json',
        type:  'get',
        success:  function (response) {  
          $("#listamateriales").html(response);
        }
    }); 
}else{
  $.alert("Seleccione una forma");
}
}

function elimina_producforma(id_mat, id_producto){
  $.confirm({
            title: 'Fluxmetals',
            content: 'Estas seguro que deseas eliminar esta forma?',
            buttons: {
                confirmar: function () {
                   $.ajax({
                          data: {"id_producto":id_producto,"id_forma":id_mat},
                          url: '/api/v1/elimina_producforma',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                            $("#listamateriales").html(response);
                          }
                      }); 

                },
                cancelar: function () {
                   

                }
              }
          });
}