@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Logistica
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($logistica, ['route' => ['logisticas.update', $logistica->id], 'method' => 'patch']) !!}

                        @include('logisticas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection