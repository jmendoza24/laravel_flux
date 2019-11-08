@extends('layouts.app')
@section('titulo')Inventario de materiales @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('materiales.create') !!}">+ Material</a>
   </h1>
</div>
<div style="overflow-x: scroll;" class="col-md-12">
    @include('materiales.table')
</div>
@endsection

