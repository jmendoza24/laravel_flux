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
        {!! Form::label('metros', 'Metros:') !!}
        {!! Form::number('metros', null, ['class' => 'form-control','min'=>'0']) !!}
    </div>
</div>
<h4 class="form-section" id="medida_div" style=""><i class="ft-mail"></i>Medidas</h4> <br/>
<div class="row" style="" id="medidas">
    
    <div class="form-group col-sm-6" style="" id="cam1">
        {!! Form::label('espesor', 'Espesor (Thickness):') !!}
        {!! Form::number('espesor', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
    <!-- Ancho Field -->
    <div class="form-group col-sm-6" style="" id="cam2">
        {!! Form::label('ancho', 'Ancho (Wide):') !!}
        {!! Form::number('ancho', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
     <div class="form-group col-sm-6" style="" id="cam3">
        {!! Form::label('altura', 'Altura (Wide2):') !!}
        {!! Form::number('altura', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
    <div class="form-group col-sm-6" style="" id="cam4">
        {!! Form::label('peso_distancia', 'Peso por Distancia:') !!}
        {!! Form::number('peso_distancia', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
     <div class="form-group col-sm-6" style="" id="cam5">
        {!! Form::label('wide', 'Ancho (Wide):') !!}
        {!! Form::number('wide', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
    <div class="form-group col-sm-6" style="" id="cam6">
        {!! Form::label('lenght', 'Largo (Length):') !!}
        {!! Form::number('lenght', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
    <div class="form-group col-sm-6" style="" id="cam7">
        {!! Form::label('weight', 'Peso (Weight):') !!}
        {!! Form::number('weight', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
    <div class="form-group col-sm-6" style="" id="cam8">
        {!! Form::label('precio', 'Precio:') !!}
        {!! Form::number('precio', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
</div>
<h4 class="form-section"></h4>

<div class="row">
    <div class="form-group col-sm-6" >
        {!! Form::label('peso_pieza', 'Peso Pieza:') !!}
        {!! Form::number('peso_pieza', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('precion_nacional', 'Precio en moneda nacional:') !!}
        {!! Form::number('precion_nacional', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('fecha', 'Fecha de orden de compra:') !!}
        {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
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
        {!! Form::label('pais', 'País de procedendia:') !!}
        {!! Form::text('pais', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('colada_numero', 'Colada Numero:') !!}
        {!! Form::number('colada_numero', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
        {!! Form::date('fecha_entrega', null, ['class' => 'form-control']) !!}
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
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        showcampos();
    });
</script>
@endsection