@foreach($tarimas_pod as $pod)
		<a href="{{ route('download.pod',['id_trafico'=>$trafico,'ship_to'=>$pod->shipping_id])}}" target="_blank">
			<button class="btn btn-float btn-primary col-md-2" style="padding: 10px;">
				<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
				<label style="font-size: 11px;"> POD - {{$pod->calle . ', ' .$pod->municipio .', '. $pod->nestado .', '. $pod->npais}}</label>
			</button>
		</a> 
@endforeach
@if($info_trafico->id_planta > 0 && sizeof($tarimas_idns) > 0 )
@foreach($tarimas_pod as $pod)
<a href="{{ route('download.package',['id_trafico'=>$trafico,'ship_to'=>$pod->shipping_id])}}" target="_blank">
	<button class="btn btn-float btn-{{ $info_trafico->id_planta > 0 ? 'primary':'secondary'}} col-md-2" style="padding: 10px;">
		<i class="fa fa-file-pdf-o" aria-hidden="true"></i> <label style="font-size: 11px;"> Packing List - {{$pod->calle . ', ' .$pod->municipio .', '. $pod->nestado .', '. $pod->npais}}</label>
	</button>
</a>
@endforeach
@else
<a href="#">
	<button class="btn btn-float btn-secondary col-md-2">
		<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Packing List
	</button>
</a>
@endif
<a href="{{ route('download.invoice',['id_trafico'=>$trafico])}}" target="_blank">
	<button class="btn btn-float btn-primary col-md-2" style="padding: 10px;">
		<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Invoice proforma
	</button>
</a>