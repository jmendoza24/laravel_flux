<div style="width: 100%; text-align: center;" >
@php( $tipo = explode('.',$url) )
@if($tipo[1] !='pdf')
<img src="{{ url($url) }}" style="max-width: 100%;" >
@else
<iframe src="{{$url}}" style="width: 100%; height: 400px;"></iframe> 
@endif
</div>