@extends('layouts.app')
@section('titulo') Grados @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('grados.create') !!}">+ Grado</a>
    </h1>
</div>
<div style="overflow-x: scroll;" class="col-md-12">
    @include('grados.table')
</div>
@endsection

