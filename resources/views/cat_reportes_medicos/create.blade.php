@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cat Reportes Medicos
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'catReportesMedicos.store']) !!}

                        @include('cat_reportes_medicos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
