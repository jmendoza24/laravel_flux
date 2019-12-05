<ul class="nav nav-tabs nav-underline no-hover-bg">
  <li class="nav-item">
    <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31"
    href="#tab31" aria-expanded="true">Seguimiento</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32"
    aria-expanded="false">Horas de trabajo</a>
  </li>
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
    <table class="table table-striped table-bordered">
		<tr>
			<td>Seguimiento: abc -123 </td>
			<td>Fecha:{{ date("dm-d-Y")}}</td>
		</tr>
		<tr>
			<td>Proceso:Proceso 1</td>
			<td>Sub proceso: Sub proceso 1</td>
		</tr>
		<tr>
			<td style="text-align: right;">Horas totales:</td>
			<td><b>550</b></td>
		</tr>
	</table>
	<div class="row">
		<div class="col-md-6">
			<label>Fecha:</label>
			<input type="date" class="form-control" >
		</div>
		<div class="col-md-6">
			<label>Horas:</label>
			<input type="number" class="form-control" >
		</div>
	</div>
	<hr>
	<div class="col-md-12" style="text-align: right;">
		<button class="btn btn-info">
			Guardar
		</button>
	</div>
  </div>
  <div class="tab-pane" id="tab32" aria-labelledby="base-tab32">
    <div class="col-md-12">
		<table class="table table-bordered table-striped" id="sub_seguimiento">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Horas</th>
				</tr>	
			</thead>
			<tbody>
			@for($i = 1; $i<=20; $i++)
			<tr>
				<td>{{ date("m-d-Y")}}</td>
				<td>{{ $i}}</td>
			</tr>
			@endfor
			</tbody>
		</table>
	</div>
  </div>
</div>
