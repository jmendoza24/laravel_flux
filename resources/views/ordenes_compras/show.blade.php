@extends('layouts.app')

@section('titulo')
    Crear orden de trabajo OT-000{{ $ordenesCompra->id }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}
@endsection  

@section('content')
@php($editar = 0)

<div class="col-md-12">
  <div id="detalle_cotiza">
    @include('ordenes_compras.detalle')
  </div>
  
  
  <div class="row ">
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Notas : </label>
        <textarea class="form-control" id="notas" name="notas" onchange="actualiza_info_occ({{ $ordenesCompra->id }})" ><?php echo ($ordenesCompra->notas);?></textarea>
      </div>
    </div> 
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Inco term : </label>
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
        <textarea class="form-control" id="lugar" name="lugar" onchange="actualiza_info_occ({{ $ordenesCompra->id }})" ><?php echo ($ordenesCompra->lugar);?></textarea>
      </div>
    </div> 
    <br>
    
  </div>
  <hr>
  <div class="form-group col-sm-12" style="text-align: right;">
    <a href="{{ route('ordenesCompras.index')}}" class="btn btn-warning mr-1">Cancelar</a>
    <a style="color: white;" onclick="validar_orden({{ $ordenesCompra->id }})" class="btn btn-primary">Validar</a>
</div>
</div>

@endsection
