<div class="row">
  <div class="col-md-8">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Proceso</label>
      <div class="col-md-9">
        <select class="form-control" name="idproceso" id="idproceso" required="">
        	<option value="">Seleccione una opcion</option>
        	@foreach($procesos as $proc)
              <option value="{{ $proc->id}}" 
                @if(!empty($subprocesos->idproceso))
                  {{ ($subprocesos->idproceso == $proc->id) ? 'selected' : '' }}
                @endif >
                {{ $proc->procesos}}</option>
              @endforeach

        </select>
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
  </div>
 <div class="row">   
  <div class="col-md-8">  
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Subproceso</label>
      <div class="col-md-9">
        {!! Form::text('subproceso', null, ['class' => 'form-control','required']) !!}
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
    	{!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div> 
</div>
<hr>
<div class="form-group col-sm-8" style="text-align: right;">
    <a href="{!! route('subprocesos.index') !!}" class="btn btn-warning mr-1">Cancelar</a>
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
