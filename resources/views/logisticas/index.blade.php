@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('logisticas.create') !!}">Add New</a>
    </h1>
</div>
@include('flash::message')
<div style="overflow-x: scroll;" class="col-md-12">
        @include('logisticas.table')
</div>
        
@endsection

