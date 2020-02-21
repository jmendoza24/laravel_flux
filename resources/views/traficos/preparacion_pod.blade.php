@foreach($tarimas_pod as $pod)
<a href="{{ route('download.pod',['id_trafico'=>$trafico,'ship_to'=>$pod->shipping_id])}}" target="_blank">
	<button class="btn btn-float btn-primary col-md-2">
		<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
		<label style="font-size: 11px;"> POD - {{$pod->calle . ', ' .$pod->municipio .', '. $pod->nestado .', '. $pod->npais}}</label>
	</button>
</a>
@endforeach
<a href="{{ route('download.package',['id_trafico'=>$trafico])}}" target="_blank">
	<button class="btn btn-float btn-primary col-md-2">
		<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Packing List
	</button>
</a>
<a href="{{ route('download.invoice',['id_trafico'=>$trafico])}}" target="_blank">
	<button class="btn btn-float btn-primary col-md-2">
		<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Invoice
	</button>
</a>