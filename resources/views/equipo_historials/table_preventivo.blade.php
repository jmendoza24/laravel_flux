<table class="table table-striped table-bordered zero-configuration" id="equipoHistorials_prev-table">
    <thead>
        <tr style="background-color:#427874;color:white">

            <th>Registro</th>

            <th>Responsable</th>

            <th>Descripción</th>
            <th>Vencimiento</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($equipoHistPrev as $equipoHistorial)
        <tr>
            <td>{!! $equipoHistorial->responsable !!}</td>
            <td>{!! $equipoHistorial->descripcion !!}</td>

            <td>{{  date("m-d-Y", strtotime($equipoHistorial->vencimiento)) }} </td>
            <td>
                <div class='btn-group'>
                    <a data-toggle="modal" data-target="#equipo_historials" onclick="show_historial({{$equipoHistorial->tipo}},{{ $equipoHistorial->id}})"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <a onclick="delete_historial({{ $equipoHistorial->id}},{{$equipoHistorial->tipo}},{{$equipoHistorial->historial_tipo}})"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></a>

            <td>{{  $equipoHistorial->vencimiento}} </td>
            <td>@if($equipoHistorial->activo==1) Si @else No @endif</td>
            <td>
                <div class='btn-group'>
                    <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(1,{{$equipoHistorial->id}},2,'',{{$equipoHistorial->historial_tipo}},{{$equipoHistorial->id}})"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(1,{{ $equipoHistorial->id}},'',{{$equipoHistorial->historial_tipo}},{{$equipoHistorial->tipo}},)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>