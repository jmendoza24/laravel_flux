@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tbl Equipos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tblEquipos, ['route' => ['tblEquipos.update', $tblEquipos->id], 'method' => 'patch']) !!}

                        @include('tbl_equipos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection