<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('tipo_acero', 'Tipo Acero:') !!}
        <select class="form-control" id="tipo_acero" name="tipo_acero" required="">
            <option value="">Seleccione una opción</option>
            @foreach($aceros as $ace)
              <option value="{{ $ace->id}}" 
                @if(!empty($materiales->tipo_acero))
                  {{ ($materiales->tipo_acero == $ace->id) ? 'selected' : '' }}
                @endif >
                {{ $ace->acero}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">Este campo es requerido.</div>
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('forma', 'Forma:') !!}
        <select class="form-control" id="forma" name="forma" required="" onchange="showcampos()">
            <option value="">Seleccione una opción</option>
            @foreach($formas as $forma)
              <option value="{{ $forma->id}}" 
                @if(!empty($materiales->forma))
                  {{ ($materiales->forma == $forma->id) ? 'selected' : '' }}
                @endif >
                {{ $forma->forma}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">Este campo es requerido.</div>
    </div>
</div>
<!-- Grado Field -->
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('grado', 'Grado:') !!}
        <select class="form-control" id="grado" name="grado" required="">
            <option value="">Seleccione una opción</option>
            @foreach($grados as $grad)
              <option value="{{ $grad->id}}" 
                @if(!empty($materiales->grado))
                  {{ ($materiales->grado == $grad->id) ? 'selected' : '' }}
                @endif >
                {{ $grad->grado}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">Este campo es requerido.</div>
    </div>
</div>
<h4 class="form-section" id="medida_div" style="display: none;"><i class="ft-mail"></i>Medidas</h4> <br/>
<div class="row" style="display: none;" id="medidas">
    
    <div class="form-group col-sm-6" style="display: none;" id="cam1">
        {!! Form::label('espesor', 'Espesor (Thickness):') !!}
        <input type="number" name="espesor" id="espesor" class="form-control" min="0" step="any">
    </div>
    <!-- Ancho Field -->
    <div class="form-group col-sm-6" style="display: none;" id="cam2">
        {!! Form::label('ancho', 'Ancho (Wide):') !!}
        <input type="number" name="ancho" id="ancho" class="form-control" min="0" step="any">
    </div>
     <div class="form-group col-sm-6" style="display: none;" id="cam3">
        {!! Form::label('altura', 'Altura (Wide2):') !!}
        <input type="number" name="altura" id="altura" class="form-control" min="0" step="any">
    </div>
    <div class="form-group col-sm-6" style="display: none;" id="cam4">
        {!! Form::label('peso_distancia', 'Peso por Distancia:') !!}
        <input type="number" name="peso_distancia" id="peso_distancia" class="form-control" min="0" step="any">
    </div>
     <div class="form-group col-sm-6" style="display: none;" id="cam5">
        {!! Form::label('wide', 'Ancho (Wide):') !!}
        <input type="number" name="wide" id="wide" class="form-control" min="0" step="any">
    </div>
    <div class="form-group col-sm-6" style="display: none;" id="cam6">
        {!! Form::label('lenght', 'Largo (Length):') !!}
        <input type="number" name="lenght" id="lenght" class="form-control" min="0" step="any">
    </div>
    <div class="form-group col-sm-6" style="display: none;" id="cam7">
        {!! Form::label('weight', 'Peso (Weight):') !!}
        <input type="number" name="weight" id="weight" class="form-control" min="0" step="any">
    </div>
    <div class="form-group col-sm-6" style="display: none;" id="cam8">
        {!! Form::label('precio', 'Precio:') !!}
        <input type="number" name="precio" id="precio" class="form-control" min="0" step="any">
    </div>
</div>
<h4 class="form-section"></h4>

<div class="row">
    <div class="form-group col-sm-6" >
        {!! Form::label('peso_pieza', 'Peso Pieza:') !!}
        <input type="number" name="peso_pieza" id="peso_pieza" class="form-control" min="0" step="any">
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('precion_nacional', 'Precion Nacional:') !!}
        <input type="number" name="precion_nacional" id="precion_nacional" class="form-control" min="0" step="any">
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('fecha', 'Fecha:') !!}
        {!! Form::date('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('num_orden', 'Num Orden:') !!}
        {!! Form::text('num_orden', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('id_proveedor', 'Proveedor:') !!}
        <select class="form-control" id="id_proveedor" name="id_proveedor" required="">
            <option value="">Seleccione una opción</option>
            @foreach($proveedores as $prov)
              <option value="{{ $prov->id}}" 
                @if(!empty($materiales->id_proveedor))
                  {{ ($materiales->id_proveedor == $prov->id) ? 'selected' : '' }}
                @endif >
                {{ $prov->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('molino', 'Molino:') !!}
        {!! Form::text('molino', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('pais', 'Pais:') !!}
        {!! Form::text('pais', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('colada_numero', 'Colada Numero:') !!}
        {!! Form::number('colada_numero', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
        {!! Form::date('fecha_entrega', null, ['class' => 'form-control','id'=>'fecha_entrega']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('num_embarque', 'Num Embarque:') !!}
        {!! Form::text('num_embarque', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('certificado_mat', 'Certificado Mat:') !!}
        {!! Form::text('certificado_mat', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('ordencompra', 'Ordencompra:') !!}
        {!! Form::text('ordencompra', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('remisionprov', 'Remisionprov:') !!}
        {!! Form::text('remisionprov', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('reporteprod', 'Reporteprod:') !!}
        {!! Form::text('reporteprod', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('resolucionprod', 'Resolucionprod:') !!}
        {!! Form::text('resolucionprod', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group col-sm-12"  style="text-align: right;">
    <a href="{!! route('materiales.index') !!}" class="btn btn-warning mr-1">Cancelar</a>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
