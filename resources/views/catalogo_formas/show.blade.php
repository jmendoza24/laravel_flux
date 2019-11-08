@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Catalogo Forma
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('catalogo_formas.show_fields')
                    <a href="{!! route('catalogoFormas.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
