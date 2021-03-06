@extends('layouts.app')
@section('titulo')Editar Pieza @endsection

@php($editar = 1)
@section('content')
	{!! Form::model($productos, ['route' => ['productos.update', $productos->id], 'method' => 'patch', 'class'=>'needs-validation','novalidate']) !!}
	    @include('productos.fields')
	{!! Form::close() !!}          
@if($editar ==1)
<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog" role="document" id="modal_large">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">Dibujo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body" id="img_dibujo">
            
            @include('productos.uploadFile')
          
          </div>
          
      </div>
    </div>
  </div>
 
  @endif

@endsection