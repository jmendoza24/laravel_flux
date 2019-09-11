@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipoacero
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoacero, ['route' => ['tipoaceros.update', $tipoacero->id], 'method' => 'patch']) !!}

                        @include('tipoaceros.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection