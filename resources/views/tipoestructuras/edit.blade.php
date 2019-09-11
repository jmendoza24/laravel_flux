@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipoestructura
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoestructura, ['route' => ['tipoestructuras.update', $tipoestructura->id], 'method' => 'patch']) !!}

                        @include('tipoestructuras.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection