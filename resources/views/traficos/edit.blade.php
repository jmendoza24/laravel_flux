@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Trafico
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($trafico, ['route' => ['traficos.update', $trafico->id], 'method' => 'patch']) !!}

                        @include('traficos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection