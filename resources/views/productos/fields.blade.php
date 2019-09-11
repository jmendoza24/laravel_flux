<div class="form-body" style="">                        
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="descripcion">Descripción</label>
      <div class="col-md-9">
        {!! Form::textarea('descripcion', null, ['placeholder'=>'Número Económico', 'class' => 'form-control border-primary']) !!}       

      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="familia">Familia</label>
      <div class="col-md-9">
          <select id="familia" name="familia" class="form-control">
            <option value="0">Selecione una opción</option>
            @foreach($familias as $fam)
              <option value="{{ $fam->id}}" 
                @if(!empty($productos->familia))
                  {{ ($productos->familia== $fam->id) ? 'selected' : '' }}
                @endif >
                {{ $fam->familia}}</option>
              @endforeach
        </select>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="empresa">Cliente</label>
      <div class="col-md-9">
        <select id="empresa" name="empresa" class="form-control">
            <option value="0">Selecione una opción</option>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Tipo de acero</label>
      <div class="col-md-9">
        <select id="id_acero" name="id_acero" class="form-control">
            <option value="0">Selecione una opción</option>
        </select>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Tipo estructura</label>
      <div class="col-md-9">
        <select id="id_estructura" name="id_estructura" class="form-control">
            <option value="0">Selecione una opción</option>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Espesor</label>
      <div class="col-md-9">
       {{ Form::number('espesor', null, ['placeholder'=>'', 'class' => 'form-control border-primary','min'=>'0','step'=>'any']) }}       
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Ancho</label>
      <div class="col-md-9">
        {{ Form::number('ancho', null, ['placeholder'=>'', 'class' => 'form-control border-primary','min'=>'0','step'=>'any']) }}       
      </div>
    </div>
  </div>
</div>

</div>
<div class="form-actions right">
  <a href="{{ route('productos.index') }}">
<button type="button" class="btn btn-warning mr-1">
  <i class="ft-x"></i> Cancel
</button>
</a>
<button type="submit" class="btn btn-primary">
  <i class="fa fa-check-square-o"></i> Guardar
</button>
</div>
