@extends('layouts.app')
@section('titulo') Trafico @endsection

@section('content')
    <div class="row">
        <div class="col-md-2" style="border:2px solid #F4F2F1; ">
            <h4>Traficos</h4>
            <ul>
                <li style="font-weight: bold;color: blue;" >T-{{$trafico_numero}}</li>
            </ul>
            <ul style="overflow-y: scroll; height: 300px;">
                
                @foreach($trafico as $trafic)
                <li>T-{{$trafic->id}}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-10" style="overflow-x: scroll;">
            @include('traficos.fields')    
        </div>
        
    </div>
@endsection
