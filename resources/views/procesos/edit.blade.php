@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Procesos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($procesos, ['route' => ['procesos.update', $procesos->id], 'method' => 'patch']) !!}

                        @include('procesos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection