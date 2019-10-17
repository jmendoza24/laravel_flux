<div class="row">
  <div class="col-md-8">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Proceso</label>
      <div class="col-md-9">
        {!! Form::text('procesos', null, ['class' => 'form-control','required']) !!}
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
<input type="hidden" name="horas" id="horas" class="form-control" required="" min="0" value="0">
  <!--<div class="col-md-8">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Horas hombre</label>
      <div class="col-md-9">
        
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
</div>--->
  
  <div class="col-md-8">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Descripción</label>
      <div class="col-md-9">
        {!! Form::textarea('descripcion', null, ['class' => 'form-control','required']) !!}
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>  
</div>
<hr>
<div class="form-group col-sm-8" style="text-align: right;">
    <a href="{!! route('procesos.index') !!}" class="btn btn-warning mr-1">Cancelar</a>
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
