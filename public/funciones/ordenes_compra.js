function convierte_occ(id_cotizacion){
	 $.confirm({
            title: 'Fluxmetals!',
            content: 'Estas seguro que deseas convertir esta cotización a orden de compra?',
            buttons: {
                confirmar: function () {
                  $.ajax({
                          data: {"id_cotizacion":id_cotizacion},
                          url: '/api/v1/convierteocc',
                          dataType: 'json',
                          type:  'get',
                          success:  function (response) {  
                          	console.log(response);
                          	$.alert('La cotizacion ahora es una orden de compra')
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