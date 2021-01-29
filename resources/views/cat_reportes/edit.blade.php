@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cat Reportes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($catReportes, ['route' => ['catReportes.update', $catReportes->id], 'method' => 'patch']) !!}

                        @include('cat_reportes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection