<div class="form-group col-sm-6" style="" id="cam1">
    {!! Form::label('espesor', 'Espesor (Thickness):') !!}
    <select class="form-control" id="espesor" name="espesor">
        <option value="">Seleccione</option>
        @foreach($espesor as $esp)
          @if($esp->id_forma == $idforma)
          <option value="{{$esp->id}}" {{($materiales->espesor ==$esp->id)? 'selected':''}}>{{$esp->valor}}</option>
          @endif
        @endforeach
      </select>
</div>
<!-- Ancho Field -->
<div class="form-group col-sm-6" style="" id="cam2">
    {!! Form::label('ancho', 'Ancho (Wide):') !!}
    <select class="form-control" id="ancho" name="ancho">
        <option value="">Seleccione</option>
        @foreach($ancho as $anc)
          @if($anc->id_forma == $idforma)
          <option value="{{$anc->id}}" {{($materiales->ancho ==$anc->id)? 'selected':''}}>{{$anc->valor}}</option>
          @endif
        @endforeach
      </select>
</div>
 <div class="form-group col-sm-6" style="" id="cam3">
    {!! Form::label('altura', 'Altura (Wide2):') !!}
    <select class="form-control" id="altura" name="altura">
        <option value="">Seleccione</option>
        @foreach($altura as $alt)
          @if($alt->id_forma == $idforma)
          <option value="{{$alt->id}}" {{($materiales->altura ==$alt->id)? 'selected':''}}>{{$alt->valor}}</option>
          @endif
        @endforeach
      </select>
</div>
<div class="form-group col-sm-6" style="" id="cam4">
    {!! Form::label('peso_distancia', 'Peso por Distancia:') !!}
    <select class="form-control" id="peso_distancia" name="peso_distancia">
        <option value="">Seleccione</option>
        @foreach($peso as $pes)
          @if($pes->id_forma == $idforma)
          <option value="{{$pes->id}}" {{($materiales->peso_distancia ==$pes->id)? 'selected':''}}>{{$pes->valor}}</option>
          @endif
        @endforeach
      </select>
</div>
{{-- <div class="form-group col-sm-6" style="" id="cam5">
    {!! Form::label('wide', 'Ancho (Wide):') !!}
    {!! Form::number('wide', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
</div>

<div class="form-group col-sm-6" style="" id="cam6">
    {!! Form::label('lenght', 'Largo (Length):') !!}
    {!! Form::number('lenght', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
</div>
--}}
<div class="form-group col-sm-6" style="" id="cam7">
    {!! Form::label('weight', 'Peso Teórico:') !!}
    {!! Form::number('weight', null, ['class' => 'form-control','min'=>'0','step'=>'any']) !!}
</div>
<div class="form-group col-sm-6" style="" id="cam8">
    {!! Form::label('precio', 'USD/Lb.:') !!}
    {!! Form::text('precio', null, ['class' => 'form-control currency','min'=>'0','step'=>'any']) !!}
</div>