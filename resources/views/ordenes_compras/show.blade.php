@extends('layouts.app')

@section('titulo')
    Orden de trabajo OT-000{{ $ordenesCompra->id }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}
@endsection  

@section('content')
@php($editar = 0)
  <div class="row">
    <div class="col-md-12">
      <br/>
      <h5>Datos del cliente</h5>
      <hr>
    </div>
    <div class="col-md-6">
      <p><b>Nombre:</b> <label id="clientenombre">{{ $ordenesCompra->nombre_corto}}</label> </p>
      <p><b>Número proveedor:</b> <label id="numproveedor">{{ $ordenesCompra->id_proveedor}}</label> </p>
    </div>
    <div class="col-md-6">
      <p><b>Email de compra:</b> <label id="email">{{$ordenesCompra->correo_compra}}</label> </p>
      <p><b>Teléfono de compra:</b> <label id="telefono">{{$ordenesCompra->compra_telefono}}</label> </p>
    </div>
  </div>
  <hr>
  <div class="row" style="margin-top: 5px; overflow: scroll;" id="detalle_cotiza">
    @include('ordenes_compras.detalle')
  </div>
  
  <div class="row ">
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Notas : </label>
        <textarea class="form-control" id="notas" name="notas" ><?php echo ($ordenesCompra->notas);?></textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Income terms : </label>
        <select class="form-control custom-select required" style="width: 100%;"name="income" id="income">
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
    <br>
    
  </div>
  <hr>
  <div class="form-group col-sm-12" style="text-align: right;">
    <a href="{{ route('ordenesCompras.index')}}" class="btn btn-warning mr-1">Cancelar</a>
    <a style="color: white;" onclick="validar_orden({{ $ordenesCompra->id }})" class="btn btn-primary">Validar</a>
</div>

@endsection
