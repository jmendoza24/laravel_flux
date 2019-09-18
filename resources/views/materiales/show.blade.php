@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Materiales
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('materiales.show_fields')
                    <a href="{!! route('materiales.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
