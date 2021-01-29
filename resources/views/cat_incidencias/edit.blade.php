@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cat Incidencias
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($catIncidencias, ['route' => ['catIncidencias.update', $catIncidencias->id], 'method' => 'patch']) !!}

                        @include('cat_incidencias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection