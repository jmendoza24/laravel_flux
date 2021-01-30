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


$( document ).ready(function() {

  //$(document.body).on('hidden.bs.modal', function () { $('#equipo_historials').removeData('bs.modal') });

  Inputmask.extendAliases({
      numeros: {
                groupSeparator: ".",
                alias: "numeric",
                placeholder: "0",
                autoGroup: !0,
                digits: 3,
                digitsOptional: !1,
                clearMaskOnLostFocus: !1
            }
    });

    $(".currency").inputmask({ alias : "currency", prefix: '$ ' });
    $(".numeros").inputmask({ alias : "numeros", prefix: '' });
    $(".mask").inputmask('Regex', {regex: "^[0-9]{1,6}(\\.\\d{1,2})?$"});

});

function ver_catalogo(catalogo,id,tipo,data_table,datos1,datos2){
 var parameters = {'catalogo':catalogo,
                    'id':id,
                    'tipo':tipo,
                    'datos':datos1,
                    'datos2':datos2
                    }
  $.ajax({
            data: parameters,
            url:   '/api/v1/opciones_catalogo',
            dataType: 'json',
            type:  'get',
            success:  function (response) { 
              $("#contenido").html(response);
              $("#modal_primary").removeClass("modal-xl"); 
              $("#modal_primary").addClass("modal-lg"); 
              $('.modal-dialog').draggable({handle: ".modal-header"});
              $("#footer_primary").hide();
            }
        }); 
}

function guardar_catalogos(catalogo,id,tipo,nom_table,dato){
    var formData = new FormData($("#catalogos_forma")[0]);

    $.ajax({
            url:"/api/v1/guardar_catalogos",
            type: 'POST',
            method: "POST",        
            data:  formData,
            //async: false,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(respuesta){
              if(catalogo==1 && dato==1){
                $("#equipo_historial").html(respuesta);
              }else if(catalogo==1 && dato==2){
                $("#equipo_histPrev").html(respuesta);
              }else if(catalogo==1 && dato==3){
                $("#equipo_histCorrect").html(respuesta);
              }

              $(".zero-configuration").DataTable();
              $("#primary").modal('hide');
              $("#catalogos_forma")[0].reset();
          }
        });
}


function elimina_catalogo(catalogo,id,nom_table,dato,dato2){
  var parameters = {'catalogo':catalogo,
                    'id':id,
                    'dato':dato,
                    'dato2':dato2
                    }

  $.confirm({
            title: 'Fluxmetals',
            content: 'Estas seguro deseas elimniar este registro?',
            type:'orange',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: parameters,
                          url: '/api/v1/elimina_catalogo',
                          dataType: 'json',
                          type:  'get',
                          success:  function (respuesta) {  
                            if(catalogo==1 && dato==1){
                              $("#equipo_historial").html(respuesta);
                            }else if(catalogo==1 && dato==2){
                              $("#equipo_histPrev").html(respuesta);
                            }else if(catalogo==1 && dato==3){
                              $("#equipo_histCorrect").html(respuesta);
                            }
                            
                            $(".zero-configuration").DataTable();
                          }
                      }); 

                },
                cancelar: function () {}
              } 
          });
}


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


function virtus(id){

  var parameters = {
                    "Emociones":$("#Emociones").val(),
                    "Pensamientos":$("#Pensamientos").val(),
                    "Compromiso":$("#Compromiso").val(),
                    "Relaciones":$("#Relaciones").val(),
                    "Sentido":$("#Sentido").val(),
                    "Logros":$("#Logros").val(),
                    "Salud":$("#Salud").val(),
                    "Soledad":$("#Soledad").val(),
                    "Felicidad":$("#Felicidad").val(),
                    "Promedio":$("#Promedio").val(),
                    "Sabiduria":$("#Sabiduria").val(),
                    "Valor":$("#Valor").val(),
                    "Humanidad":$("#Humanidad").val(),
                    "Justicia":$("#Justicia").val(),
                    "Trascendencia":$("#Trascendencia").val(),
                    "Templanza":$("#Templanza").val(),
                    "Creatividad":$("#Creatividad").val(),
                    "Amor":$("#Amor").val(),
                    "Curiosidad":$("#Curiosidad").val(),
                    "Perspectiva":$("#Perspectiva").val(),
                    "Juicio":$("#Juicio").val(),
                    "Honestidad":$("#Honestidad").val(),
                    "Perseverancia":$("#Perseverancia").val(),
                    "Entusiasmo":$("#Entusiasmo").val(),
                    "Valentia":$("#Valentia").val(),
                    "Amabilidad":$("#Amabilidad").val(),
                    "Inteligencia":$("#Inteligencia").val(),
                    "Amor_amor":$("#Amor_amor").val(),
                    "Equidad":$("#Equidad").val(),
                    "Liderazgo":$("#Liderazgo").val(),
                    "Trabajo":$("#Trabajo").val(),
                    "Esperitualidad":$("#Esperitualidad").val(),
                    "Gratitud":$("#Gratitud").val(),
                    "Esperanza":$("#Esperanza").val(),
                    "Humor":$("#Humor").val(),
                    "Belleza":$("#Belleza").val(),
                    "Prudencia":$("#Prudencia").val(),
                    "Humildad":$("#Humildad").val(),
                    "Perdon":$("#Perdon").val(),
                    "Control":$("#Control").val(),
                    "id":id,

                    };



                       $.ajax({
                        data: parameters,
                        url:   '/api/v1/virtus',
                        dataType: 'json',
                        type:  'get',
                        success:  function (response) {         
                        
                        }
                    }); 
}


function guarda_sal(id){


  var parameters = {
                    "salario":$("#salario").val(),
                   
                    "id":id,

                    };


                       $.ajax({
                        data: parameters,
                        url:   '/api/v1/salario',
                        dataType: 'json',
                        type:  'get',
                        success:  function (response) {         
                          
                          $("#salario").val('');
               $('#abc').modal('toggle');


                        }
                    }); 


}

function MyersBriggs(id){



  var parameters = {
                    "Introversion":$("#Introversion").val(),
                    "Extroversion":$("#Extroversion").val(),
                    "Intuitivo":$("#Intuitivo").val(),
                    "Sensorial":$("#Sensorial").val(),
                    "Pensamiento":$("#Pensamiento").val(),
                    "IEmocional":$("#IEmocional").val(),
                    "Calificador":$("#Calificador").val(),
                    "Perceptivo":$("#Perceptivo").val(),
                    "id":id,

                    };


                       $.ajax({
                        data: parameters,
                        url:   '/api/v1/MyersBriggs',
                        dataType: 'json',
                        type:  'get',
                        success:  function (response) {         
                        
                        }
                    }); 
}

function guarda_direccion(id_producto){
  var parameters = {"id_producto":id_producto,
                    "nombre_log":'0',
                    "telefono_log":$("#telefono_log").val(),
                    "correo_log":' ',
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
              $("#calle_log").val('');
              $("#pais_log").val('');
              $("#numero_log").val('');
              $("#municipio_log").val('');
              $("#estado_log").val('');
              $("#cp_log").val('');
              $("#telefono_log").val('');
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
            title: 'Fluxmetals',
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

function agrega_historial(equipo,tipo){
  
show_historial2(equipo,tipo);


  $("#id_tipo").val('');
  $("#historia_tipo").val('');
  $("#responsable").val('');
  $("#fecha").val('');
  $("#descripcion").val('');
  $("#vencimiento").val('');
  $("#activo").val('');
  $("#id_historia").val('');
  $("#doc_prev1").val('');
  $("#doc_prev2").val('');


    $('#doc1').css('display', 'none');
    $('#doc2').css('display', 'none'); 
 

  
  if(tipo==1){
    $("#myModalLabel17").html('Calibración');
  }else if (tipo ==2){
    $("#myModalLabel17").html('Mtto. Preventivo');
  }else if (tipo ==3){
    $("#myModalLabel17").html('Mtto. Correctivo');
  }

  $("#historia_tipo").val(tipo);
  $("#id_tipo").val(equipo);
  $('.pickadate-format').pickadate();
  $('#b').css('display', 'none'); 
 // $('#c').css('display', 'none'); 

  //show_historial2(equipo,tipo);
  
}



    function guarda_historial(id){

    var formData = new FormData($("#documentos_formUpload")[0]);
    $.ajax({
            url:"/api/v1/guarda_historial2",
            type: 'POST',
            method: "POST",        
            data:  formData,
            //async: false,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(response){
            $.alert('Historial guardado');






                              if($("#historia_tipo").val()==1){
                                $("#equipo_historial").html(response); 

                                 $('#equipoHistorials-table').DataTable({
                                    "scrollX": true,
                                    "scrollCollapse": true,
                                    "searching": false,
                                      "showNEntries" : false,
                                        "info": false,

                                    "paging": false
                                  });



                              }else if($("#historia_tipo").val()==2){
                                $("#equipo_histPrev").html(response); 

                                 $('#equipoHistorials_prev').DataTable({
                                    "scrollX": true,
                                    "scrollCollapse": true,
                                    "searching": false,
                                      "showNEntries" : false,
                                        "info": false,

                                    "paging": false
                                  });
                              }else if($("#historia_tipo").val()==3){
                                $("#equipo_histCorrect").html(response); 


                                 $('#equipoHistorials_corect-table').DataTable({
                                    "scrollX": true,
                                    "scrollCollapse": true,
                                    "searching": false,
                                      "showNEntries" : false,
                                        "info": false,

                                    "paging": false
                                  });
                              }
                             $("#historia_tipo").val('');
                              $("#responsable").val('');
                              $("#fecha").val('');
                              $("#descripcion").val('');
                              $("#vencimiento").val('');
                              $("#activo").val('');

                              $("#doc_prev1").val('');
                              $("#doc_prev2").val('');
                              $("#equipo_historials").modal('toggle');


            }
        });
   



}



/*

function guarda_historial(tipo){
   
  var formData3 = new FormData($("#formUpload")[0]);

                        $.ajax({
                          url:"/api/v1/guarda_historial",
                          type: 'post',
                          method: "POST",        
                          data:  formData3,
                          //async: false,
                          cache: false,
                          contentType: false,
                          processData: false,
                          data:formData3,
                          success: function(respuesta){ 
                            

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

                             $("#historia_tipo").val('');
                              $("#responsable").val('');
                              $("#fecha").val('');
                              $("#descripcion").val('');
                              $("#vencimiento").val('');
                              $("#activo").val('');
                              $("#equipo_historials").modal('toggle');

                          },  
                          error: function(XMLHttpRequest, textStatus, errorThrown) { 
                              //alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                          }   

                      });
}
*/
function show_historial(tipo,id_historia){
  var parameters = {"id_historia":id_historia};

  $.ajax({
            data: parameters,
            url:   '/api/v1/show_historia',
            dataType: 'json',
            type:  'get',
            success:  function (response) {     
              $("#campos_equipos").html(response); 
              $('.pickadate-format').pickadate();
                $("#id_tipo").val(tipo);

            }
        });      

}

function show_historial2(tipo,id_historia){
  var parameters = {"id_historia":id_historia};

  $.ajax({
            data: parameters,
            url:   '/api/v1/show_historia2',
            dataType: 'json',
            type:  'get',
            success:  function (response) {     
             
            }
        });      

}

function actualiza_historia(id_historia,tipo){

    var formData = new FormData($("#documentos_formUpload")[0]);
    $.ajax({
            url:"/api/v1/actualiza_historial",
            type: 'POST',
            method: "POST",        
            data:  formData,
            //async: false,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(response){


              $.alert('Historial actualizado');
              



                              if(tipo==1){
                                $("#equipo_historial").html(response); 

                                 $('#equipoHistorials-table').DataTable({
                                    "scrollX": false,
                                    "scrollCollapse": false,
                                    "searching": false,
                                      "showNEntries" : false,
                                        "info": false,

                                    "paging": false
                                  });



                              }else if(tipo==2){
                                $("#equipo_histPrev").html(response); 

                                 $('#equipoHistorials_prev').DataTable({
                                    "scrollX": false,
                                    "scrollCollapse": false,
                                    "searching": false,
                                      "showNEntries" : false,
                                        "info": false,

                                    "paging": false
                                  });
                              }else if(tipo==3){
                                $("#equipo_histCorrect").html(response); 


                                 $('#equipoHistorials_corect-table').DataTable({
                                    "scrollX": false,
                                    "scrollCollapse": false,
                                    "searching": false,
                                      "showNEntries" : false,
                                        "info": false,

                                    "paging": false
                                  });
                              }

                             $("#historia_tipo").val('');
                              $("#responsable").val('');
                              $("#fecha").val('');
                              $("#descripcion").val('');
                              $("#vencimiento").val('');
                              $("#activo").val('');
                              $("#doc_prev1").val('');
                              $("#doc_prev2").val('');

                              $("#equipo_historials").modal('toggle');
//equipoHistorials_prev-table
//equipoHistorials_corect-table

                 


            }
        });      
}

function delete_historial(id_historia, tipo, historia_tipo){
  var parameters = {  "tipo":tipo,
                      "id_historia":id_historia,
                      "historial_tipo":historia_tipo
                    };
      $.confirm({
            title: 'Fluxmetals',
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

                                 $('#equipoHistorials-table').DataTable({
                                    "scrollX": false,
                                    "scrollCollapse": false,
                                    "searching": false,
                                      "showNEntries" : false,
                                        "info": false,

                                    "paging": false
                                  });



                              }else if(historia_tipo==2){
                                $("#equipo_histPrev").html(response); 

                                 $('#equipoHistorials_prev').DataTable({
                                    "scrollX": false,
                                    "scrollCollapse": false,
                                    "searching": false,
                                      "showNEntries" : false,
                                        "info": false,

                                    "paging": false
                                  });
                              }else if(historia_tipo==3){
                                $("#equipo_histCorrect").html(response); 


                                 $('#equipoHistorials_corect-table').DataTable({
                                    "scrollX": false,
                                    "scrollCollapse": false,
                                    "searching": false,
                                      "showNEntries" : false,
                                        "info": false,

                                    "paging": false
                                  });
                              }

                             $("#historia_tipo").val('');
                              $("#responsable").val('');
                              $("#fecha").val('');
                              $("#descripcion").val('');
                              $("#vencimiento").val('');
                              $("#activo").val('');
                              $("#doc_prev1").val('');
                              $("#doc_prev2").val('');

                                          }
                                      }); 
                                 $.alert('Historial borrado');
                            },
                            cancelar: function () {
                                $.alert('Canceledo!');

                            }
                        }
                    });
}


function agrega_proceso(id_proceso,id_producto){
  var horas = $("#horas"+id_proceso).val();
   $.ajax({
        data: {"id_proceso":id_proceso,"id_producto":id_producto,"horas":horas},
        url: '/api/v1/agrega_proceso',
        dataType: 'json',
        type:  'get',
        success:  function (response) {  
          $("#listasubprocesos").html(response.options);
          $("#costeos").html(response.costeo);
          
          $('.switch:checkbox').checkboxpicker();
          ver_proceso(id_proceso,id_producto);
        },error(a,b,c){
          console.log(a);
          console.log(b);
          console.log(c);
        }

    }); 

  /**$.confirm({
            title: 'Fluxmetals',
            content: 'Estas seguro que deseas agregar este proceso?',
            buttons: {
                confirmar: function () {
                 

                },
                cancelar: function () {
                    $.alert('Canceledo!');

                }
              }
          });*/
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
  /** $.confirm({
            title: 'Fluxmetals',
            content: 'Estas seguro que deseas agregar este subproceso?',
            buttons: {
                confirmar: function () {
                  

                },
                cancelar: function () {
                    $.alert('Canceledo!');

                }
              }
          }); */
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
          $('.pickadate-format').pickadate();
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
          $('.pickadate-format').pickadate({
              format: 'mm/dd/yyyy',
              formatSubmit: 'yyyy/mm/dd',
              hiddenPrefix: 'prefix__',
              hiddenSuffix: '__suffix'
            });
        }
    }); 
}

function elimina_dibujo(id_dibujo,id_producto){
  $.confirm({
            title: 'Fluxmetals',
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
  var materiales = $("#idmateriales").val();
  $.ajax({
      data: {"forma":forma,"idmateriales":materiales},
      url: '/api/v1/busca_forma',
      dataType: 'json',
      type:  'get',
      success:  function (response) {  
        $("#medidas_formas").html(response);
      }
  });


  
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
            title: 'Fluxmetals',
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
/** 
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
}*/


function obtiene_producto(){
  if($("#cliente").val()==''){
      $.alert('Seleccione un cliente valido');
  }else{


  var cliente_cot = $("#cliente_cot").val();  
    if(cliente_cot ==''){cliente_cot = 0};
    
  var cliente = $("#cliente").val();

  if(cliente !=cliente_cot && cliente_cot != 0){
  $.confirm({
            title: 'Fluxmetals',
            content: 'Estas seguro que deseas cambiar de cliente, si cambias se perdera la informacion de los productos seleccionados?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: {"cliente":cliente},
                          url: '/api/v1/obtiene_producto',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                            $("#producto").html(response.productos);
                            $("#clientenombre").html(response.clientes[0].nombre_corto);
                            $("#numproveedor").html(response.clientes[0].id_proveedor);
                            $("#email").html(response.clientes[0].correo_compra);
                            $("#telefono").html(response.clientes[0].compra_telefono);
                            $("#detalle_cotiza").html(response.options);
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
                console.log(response);
                $("#producto").html(response.productos);
                $("#clientenombre").html(response.clientes.nombre_corto);
                $("#numproveedor").html(response.clientes.id_proveedor);
                $("#email").html(response.clientes.correo_compra);
                $("#telefono").html(response.clientes.compra_telefono);
                $("#detalle_cotiza").html(response.options);
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
                  console.log(response);
                  $("#detalle_cotiza").html(response.options);
                  $("#clientenombre").html(response.clientes[0].nombre_corto);
                  $("#numproveedor").html(response.clientes[0].id_proveedor);
                  $("#email").html(response.clientes[0].correo_compra);
                  $("#telefono").html(response.clientes[0].compra_telefono);
                }
                
              }
          }); 
  }
}


function borra_producto(id){

    $.confirm({
            title: 'Fluxmetals',
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
  var costo_unitario =  parseInt($("#costo_material").val().replace('$','').replace(',',''));
  var costo = parseInt($("#plantacosto"+id_planta).val().replace('$','').replace(',',''));

  if(costo < costo_unitario){
    $.alert("El costo por planta no puede ser menor al costo unitario" );  
  }else{
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
  
  
}


function filtra_forma(){
  var forma = $("#forma").val();
  //alert(forma);

  var campos = [1,2,3,4];
    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).hide();
    }

  if(forma ==''){
    $.alert("Seleccione una forma")
  }else if(forma ==1 || forma ==2){
    var campos = [1];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    }
  }else if(forma ==3 || forma == 4 || forma == 14){
    var campos = [1,2];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    }
  }else if(forma ==5 || forma ==6){
    var campos = [1,2,3];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    }
  }else if(forma ==7 || forma ==8 || forma ==9 || forma ==10){
    var campos = [3,4];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    } 
  }else if(forma ==11 || forma ==12){
    var campos = [2];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
    }
  }else if(forma ==13){
    var campos = [1,4];

    for (x=0;x<campos.length;x++){
      $("#cam"+campos[x]).show();
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

function guarda_materialforma(id, campo){
  $.ajax({
          data: {"id":id, "campo":$("#"+campo+id).val(),"columna":campo},
          url: '/api/v1/guarda_materialforma',
          dataType: 'json',
          type:  'get',
          success:  function (response) {  
            //$("#listamateriales").html(response);
          }
      });
}

function guarda_informacion(cotizacion){
  $.ajax({
          data: {"cotizacion":cotizacion, "notas":$("#notas").val(),"income":$("#income").val(),"lugar":$("#lugar").val()},
          url: '/api/v1/guarda_informacion_cot',
          dataType: 'json',
          type:  'get',
          success:  function (response) {  

          }
      });
}


function elimina_cotizacion(id_cotizacion){
  $.confirm({
            title: 'Fluxmetals',
            content: 'Estas seguro que deseas eliminar esta cotizacion?',
            buttons: {
                confirmar: function () {
                   $.ajax({
                          data: {"id":id_cotizacion},
                          url: '/api/v1/elimina_cotizacion',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                              $("#table_cotizacion").html(response);
                              $("#cotizaciones-table").DataTable();
                          }
                      }); 

                },
                cancelar: function () {
                   

                }
              }
          });
}

function get_estados(pais,estado){

  var parameters = {"pais":$("#"+pais).val()}
   $.ajax({
            data: parameters,
            url:   '/api/v1/get_estados',
            dataType: 'json',
            type:  'get',
            success:  function (response) { 
              var len = response.length;
              $("#"+estado).html('<option value="0">Seleccione una opción</option>');
              for (var i = 0; i < len; i++) {
                  $("#"+estado).append("<option value='"+response[i].id+"'>"+response[i].estado+"</option>");
              }      
            }
        });
}


function guarda_catalogo(){
  event.preventDefault();
  var parametros = {"forma":$("#forma").val(),
                    "identificador":$("#identificador").val(),
                    "valor":$("#valor").val(),
                    "_method": 'POST',
                    "_token": $("meta[name='csrf-token']").attr("content")
                  };
  if($("#forma").val() != '' && $("#identificador").val() != '' && $("#valor").val() != ''){
    $.ajax({
            url: '/api/v1/guarda_catalogo',          
            data: parametros,
            dataType: "json",
            method: "POST",                     
            success: function(result){
              $("#cat_formas").html(result);
              $(".display").DataTable();
              $.alert("Agregado correctamente");
              $("#identificador").val('');
              $("#valor").val('');
              $("#forma").val('');
              dragula([document.getElementById('card-drag-area')]);
            }
        });
    }else{
      $.alert("Seleccione los campos requeridos")
    }

}

function detalle_cotizacion(id_cotizacion){
  $.ajax({
            data: {"id_cotizacion":id_cotizacion},
            url:   '/api/v1/detalle_cotizacion',
            dataType: 'json',
            type:  'get',
            success:  function (response) { 
              $("#contenido").html(response);      
            }
        });
}

function revive_cotizacion(id_cotizacion){
  $.confirm({
            title: 'Fluxmetals',
            content: 'Estas seguro que deseas revivir esta cotizacion?',
            buttons: {
                confirmar: function () {
                   $.ajax({
                          data: {"id":id_cotizacion},
                          url: '/api/v1/revive_cotizacion',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                            if(response==1){
                              window.location.href = '/cotizaciones';    
                            }else{
                              $.alert('Error!');
                            }
                            
                          }
                      }); 
                },
                cancelar: function () {}
              }
          });
}


function show_costo_planta(id_producto){
      $.ajax({
            data: {"id_producto":id_producto},
            url:   '/api/v1/get_costo_plaza',
            dataType: 'json',
            type:  'get',
            success:  function (response) { 
              $("#contenido").html(response);
              $(".display").DataTable({"lengthChange": false,"searching": false,"paging": false, "info": false});
              $("#modal_primary").removeClass("modal-xl");
              $("#footer_primary").hide();

              if (!($('.modal.in').length)) {
                  $('.modal-dialog').css({
                    top: 0,
                    left: 0
                  });
                }

                $('#primary').modal({
                  backdrop: false,
                  show: true
                });

                $('.modal-dialog').draggable({
                  handle: ".modal-header"
                });      
            }
        });
}

function show_dibujo_producto(dibujo, num_parte){

  var text = '<h4>Costo por planta: <span><b>'+ num_parte +'</b></span></h4> <hr/>'+
             '<div style="text-align:center;"><img src="'+dibujo+'"/></div>';
  $("#contenido").html(text);
  $("#modal_primary").removeClass("modal-xl");
  $("#modal_primary").addClass("modal-lg");
  $('.modal-dialog').draggable({handle: ".modal-header"});
  $("#footer_primary").hide();

}

function validation_cotizacion(tipo){
  $.ajax({
            data: {"tipo":tipo},
            url:   '/api/v1/enviar_cotizacion',
            dataType: 'json',
            type:  'get',
            success:  function (response) { 
                  if(response==1){
                    window.location.href='/historiaCotizacion';
                  }else{
                    $.alert("Para conitnuar necesitar tener agregado al menos una pieza");
                  }
            }
        });
}