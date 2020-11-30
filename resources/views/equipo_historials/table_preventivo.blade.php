<table class="table table-striped table-bordered datacol-basic-initialisation" id="equipoHistorials_prev-table">
    <thead>
        <tr style="background-color:#427874;color:white">
            <th>Responsable</th>
            <th>Descripción</th>
            <th>Vencimiento</th>
            <th>Activo</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($equipoHistPrev as $equipoHistorial)
        <tr>
            <td>{!! $equipoHistorial->responsable !!}</td>
            <td>{!! $equipoHistorial->descripcion !!}</td>
            <td>{{  $equipoHistorial->vencimiento}} </td>
            <td>@if($equipoHistorial->activo==1) Si @else No @endif</td>
            <td>
                <div class='btn-group'>
                    <a data-toggle="modal" data-target="#equipo_historials" onclick="show_historial({{ $equipoHistorial->id}})"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <a onclick="delete_historial({{ $equipoHistorial->id}},{{$equipoHistorial->tipo}},{{$equipoHistorial->historial_tipo}})"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>