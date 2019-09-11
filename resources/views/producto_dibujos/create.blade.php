@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Producto Dibujo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'productoDibujos.store']) !!}

                        @include('producto_dibujos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
