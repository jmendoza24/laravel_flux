<div class="row">
  <div class="col-md-8">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Familia</label>
      <div class="col-md-9">
        {!! Form::text('familia', null, ['class' => 'form-control','required']) !!}
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
</div>
<div class="row">
 
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
<hr/>
<div class="form-group col-sm-8" style="text-align: right;">
    <a href="{!! route('familias.index') !!}" class="btn btn-warning mr-1">Cancelar</a>
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
