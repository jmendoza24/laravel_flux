@extends('layouts.app')
@section('titulo') Familias @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('familias.create') !!}">+ Familia</a>
    </h1>
</div>
<div style="overflow-x: scroll;" class="col-md-12">
    @include('familias.table')
</div>
@endsection

