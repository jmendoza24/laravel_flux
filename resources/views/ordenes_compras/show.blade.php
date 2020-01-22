@extends('layouts.app')

@section('titulo')
    Validación OT-000{{ $ordenesCompra->id }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}
@endsection  

@section('content')
@php($editar = 0)
@php($nuevo = 0)

<div class="col-md-12">
  <div id="detalle_cotiza">
    @include('ordenes_compras.detalle')
  </div>
  
  
  <div class="row ">
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Incoterms : </label>
        <select class="form-control custom-select required" style="width: 100%;"name="income" id="income" onchange="actualiza_info_occ({{ $ordenesCompra->id }})">
            <option value="">Seleccione una opcion</option>
            @foreach($income as $inco)
            <option value="{{ $inco->id}}" 
              @if(!empty($ordenesCompra->income))
                {{ ($ordenesCompra->income == $inco->id) ? 'selected' : '' }}
              @endif >
              {{ $inco->income}}
            </option>
            @endforeach
          </select>
      </div>
    </div> 
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Lugar : </label>
        <input type="text"  class="form-control" id="lugar" name="lugar" onchange="actualiza_info_occ({{ $ordenesCompra->id }})" value="<?php echo ($ordenesCompra->lugar);?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Términos : </label>
        <textarea class="form-control" style="height: 200px;"  onchange="actualiza_info_occ({{ $ordenesCompra->id }})" ><?php echo nl2br($ordenesCompra->desc_inco)?></textarea>
      </div>
    </div> 
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Notas : </label>
        <textarea class="form-control" id="notas" style="height: 200px;" name="notas" onchange="actualiza_info_occ({{ $ordenesCompra->id }})" ><?php echo ($ordenesCompra->notas);?></textarea>
      </div>
    </div> 
    <br>
    
  </div>
  <hr>
  <div class="form-group col-sm-12" style="text-align: right;">
    <a href="{{ route('ordenesCompras.index')}}" class="btn btn-warning mr-1">Regresar</a>
    @if($ordenesCompra->tipo==1)
    <a style="color: white;" onclick="validar_orden({{ $ordenesCompra->id }})" class="btn btn-primary">Validar</a>
    @endif
</div>
</div>

@endsection
