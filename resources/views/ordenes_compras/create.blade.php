@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ordenes Compra
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'ordenesCompras.store']) !!}

                        @include('ordenes_compras.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
