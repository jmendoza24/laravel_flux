@extends('layouts.app')
@section('titulo')
    Cotización 
@endsection
@section('content')
<form action="#" class="steps-validation wizard-circle" id="cotizacion_form">
  @include('cotizaciones.fields')
  </form>
@endsection

