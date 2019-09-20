<form method="post"  action="@if($opcion =='editar') {{ route('ajaxupload.actualiza') }} @elseif($opcion =='nuevo') {{ route('ajaxupload.action')}} @endif" class="form-horizontal needs-validation novalidate" enctype='multipart/form-data'>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<input type="hidden" name="idproducto" id="idproducto" value="{{ $productos->id }}">
  <input type="hidden" name="iddibujo" id="iddibujo" value="{{ $producto_dibujos->id }}">
	 <div class="row">
      <div class="col-md-12">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="empresa">Tiempo de entrega</label>
          <div class="col-md-9">
            <input type="number" min="0" name="tiempoentrega" id="tiempoentrega" required=""  class="form-control" value="{{ $producto_dibujos->tiempo_entrega }}">
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">Revisión</label>
          <div class="col-md-9">
           	<input type="number" min="0" name="revision" id="revision" class="form-control" value="{{ $producto_dibujos->revision }}">
           	<div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="empresa">Dibujo</label>
          <div class="col-md-9">
<<<<<<< Updated upstream
            <input type="file" name="select_file" id="select_file" class="form-control"  />
            @if(!empty($producto_dibujos->dibujo))
          <a href="{{ $producto_dibujos->dibujo }} " target="_blank">Ver_dibujo</a>
          @endif
=======
            <input type="file" name="select_file" id="select_file" class="form-control" required="" />
            @if(!empty($producto_dibujos->dibujo))
            <a href="{{ $producto_dibujos->dibujo }} " target="_blank">Ver_dibujo</a>
            @endif
>>>>>>> Stashed changes
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>

        </div>
      </div>
      <div class="col-md-12" style="text-align: right;">
        <hr>
        <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Guardar">
      </div>
    </div>
</form>