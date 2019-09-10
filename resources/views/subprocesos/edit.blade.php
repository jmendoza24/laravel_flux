@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Subprocesos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subprocesos, ['route' => ['subprocesos.update', $subprocesos->id], 'method' => 'patch']) !!}

                        @include('subprocesos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection