<form enctype="multipart/form-data" id="catalogos_forma" action="">
  @csrf
<input type="hidden" name="id" id="id" value="{{ $salarios->id}}">
<input type="hidden" name="id_empleado" id="id_empleado" value="{{ $salarios->id_empleado}}">
<input type="hidden" name="id_catalogo" value="2" id="id_catalogo">

<div class="row">
  <div class="col-md-12">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Salario:</label>
        	<input type="text" name="salario" id="salario" class="form-control decimal-inputmask" value="{{ $salarios->salario}}" >
        </div>
      </div>
  </div>    
  <div class="col-md-12">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Fecha:</label>
          <input type="text" name="fecha" id="fecha" class="form-control jit-inputmask" value="{{ $salarios->fecha}}" >
        </div>
      </div>
  </div>    
  <div class="col-md-12">
    <span class="btn btn-primary pull-right" onclick="guardar_catalogos(2,{{$salarios->id}},1,'tabla',{{$salarios->id_empleado}})">Guardar</span>
  </div>
</div>
</form>