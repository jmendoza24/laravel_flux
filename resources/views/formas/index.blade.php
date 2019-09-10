@extends('layouts.app')
@section('titulo') Formas @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('formas.create') !!}">+ Forma</a>
    </h1>
</div>
<div style="overflow-x: scroll;" class="col-md-12">
    @include('formas.table')
</div>
@endsection

