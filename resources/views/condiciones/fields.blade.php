<div class="row">
  <div class="col-md-8">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Tipo</label>
      <div class="col-md-9">
      	<select class="form-control" name="tipo" id="tipo" required="">
      		<option value="">Seleccione una opción</option>
      		<option value="1" @if(!empty($condiciones->tipo)){{ ($condiciones->tipo==1 ? 'Selected' : '') }} @endif>Cotización</option>
      		<option value="2" @if(!empty($condiciones->tipo)){{ ($condiciones->tipo==2 ? 'Selected' : '') }} @endif>Orden de compra</option>
      	</select>
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
</div>
 <div class="row">   
  <div class="col-md-8">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Condición</label>
      <div class="col-md-9">
        {!! Form::textarea('condicion', null, ['class' => 'form-control','required']) !!}
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>  
</div>
<hr>
<div class="form-group col-sm-8" style="text-align: right;">
    <a href="{!! route('condiciones.index') !!}" class="btn btn-warning mr-1">Cancelar</a>
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>