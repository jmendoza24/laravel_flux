<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="logisticas-table">
    <thead>
        <tr>
            <!--<th>Nombre</th>
            <th>Correo</th>-->
            <th>Pais</th>
            <th>Estado</th>
            <th>Ciudad</th>
            <th>Teléfono</th>
            <th>Código postal</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($logisticas as $logistica)
        <tr>
            <!--<td>{!! $logistica->nombre !!}</td>
            <td>{!! $logistica->correo !!}</td>--->
            <td>{!! $logistica->npais !!}</td>
            <td>{!! $logistica->nestado !!}</td>
            <td>{!! $logistica->nmunicipio !!}</td>
            <td>{!! $logistica->telefono !!}</td>
            <td>{!! $logistica->cp !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="" data-toggle="modal" data-target="#large" onclick="show_logistica({{$logistica->id}})"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <a onclick="delete_logistica({{$logistica->id}},{{$logistica->id_producto}})"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>