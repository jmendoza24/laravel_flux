@extends('layouts.app')
@section('titulo')
    Piezas 
@endsection

@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('productos.create') !!}">+ Pieza</a>
    </h1>
</div>
<br><br><br>
<div class="col-md-12">
    @include('productos.table')
</div>
            
@endsection

