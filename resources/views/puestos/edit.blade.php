@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Puestos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($puestos, ['route' => ['puestos.update', $puestos->id], 'method' => 'patch']) !!}

                        @include('puestos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection