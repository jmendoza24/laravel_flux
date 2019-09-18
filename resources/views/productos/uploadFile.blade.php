
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<input type="text" name="idproducto" id="idproducto" value="{{ $productos->id }}">
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
          <a href="{{ $producto_dibujos->dibujo }} " target="_blank">Ver_dibujo</a>
          <div class="col-md-9">
            <input type="file" name="select_file" id="select_file" class="form-control" required="" />
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
          	<hr>
              <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Guardar">
      </div>
    </div>
