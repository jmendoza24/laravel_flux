@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Puesto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($puesto, ['route' => ['puestos.update', $puesto->id], 'method' => 'patch']) !!}

                        @include('puestos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection