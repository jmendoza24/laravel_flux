<input type="hidden" id="idmateriales" value="{{ $materiales->id}}">
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('materiales', 'Material') !!}
        {!! Form::text('material', null, ['class' => 'form-control','required']) !!}
    </div>
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
        <label>Forma:</label>
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
    <div class="form-group col-sm-6">
        {!! Form::label('forma', 'Planta:') !!}
        <select class="form-control" id="planta" name="planta" required="">
            <option value="">Seleccione una opción</option>
            @foreach($plantas as $planta)
              <option value="{{ $planta->id}}" 
                @if(!empty($materiales->planta))
                  {{ ($planta->id == $materiales->planta) ? 'selected' : '' }}
                @endif >
                {{ $planta->nombre }} </option>
            @endforeach
        </select>
        <div class="invalid-feedback">Este campo es requerido.</div>
    </div>
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
     <div class="form-group col-sm-6">
        {!! Form::label('cantidad', 'Cantidad:') !!}
        {!! Form::number('cantidad', null, ['class' => 'form-control','min'=>'0']) !!}
    </div>
     <div class="form-group col-sm-6">
        {!! Form::label('metros', 'Metros inventario:') !!}
        {!! Form::number('metros', null, ['class' => 'form-control','min'=>'0']) !!}
    </div>
</div>
<h4 class="form-section" id="medida_div" style=""><i class="ft-mail"></i>Medidas</h4> <br/>
<div class="row" style="" id="medidas_formas">
    @include('materiales.medidas')
</div>
<h4 class="form-section"></h4>
<div class="row">
    <div class="form-group col-sm-6" >
        {!! Form::label('peso_pieza', 'Peso Real:') !!}
        {!! Form::number('peso_pieza', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('precion_nacional', 'Precio en moneda nacional:') !!}
        {!! Form::number('precion_nacional', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('fecha', 'Fecha de orden de compra:') !!}
        {!! Form::date('fecha', null, ['class' => 'form-control pickadate-dropdown']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('num_orden', 'No. orden de compra:') !!}
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
    <div class="form-group col-sm-6">
        {!! Form::label('molino', 'Molino:') !!}
        {!! Form::text('molino', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('pais', 'País de procedencia:') !!}
        {!! Form::text('pais', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('colada_numero', 'Colada Número:') !!}
        {!! Form::text('colada_numero', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
        {!! Form::date('fecha_entrega', null, ['class' => 'form-control pickadate-dropdown']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('num_embarque', 'No. Embarque:') !!}
        {!! Form::text('num_embarque', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('certificado_mat', 'Certificado de material:') !!}
        {!! Form::text('certificado_mat', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('ordencompra', 'Orden de compra:') !!}
        {!! Form::text('ordencompra', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('remisionprov', 'Remisión de proveedor:') !!}
        {!! Form::text('remisionprov', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('reporteprod', 'Reporte no. de producto:') !!}
        {!! Form::text('reporteprod', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('resolucionprod', 'Resolución de producto:') !!}
        {!! Form::text('resolucionprod', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group col-sm-12"  style="text-align: right;">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('materiales.index') !!}" class="btn btn-warning mr-1">Cancelar</a>
    
</div>
