@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Income Terms
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($incomeTerms, ['route' => ['incomeTerms.update', $incomeTerms->id], 'method' => 'patch']) !!}

                        @include('income_terms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection