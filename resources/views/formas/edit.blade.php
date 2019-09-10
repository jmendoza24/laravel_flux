@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Forma
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($forma, ['route' => ['formas.update', $forma->id], 'method' => 'patch']) !!}

                        @include('formas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection