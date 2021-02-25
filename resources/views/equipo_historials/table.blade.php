<table class="table table-striped table-bordered" id="equipoHistorials-table">
    <thead>
        <tr style="background-color:#427874;color:white">
            <th>Responsable</th>
            <th>Descripción</th>
            <th>Fecha inicio</th>
            <th>Vencimiento</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($equipoHistorials as $equipoHistorial)
        <tr>
            <td>{!! $equipoHistorial->responsable !!}</td>
            <td>{!! $equipoHistorial->descripcion !!}</td>
            <td>{{ $equipoHistorial->fecha}}</td>
            <td>{{  $equipoHistorial->vencimiento != '' ? date("m-d-Y",strtotime(substr($equipoHistorial->vencimiento,0,10))) :''}}</td>
            <td>
                <div class='btn-group'>
                    <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(1,{{$equipoHistorial->id}},2,'',{{$equipoHistorial->historial_tipo}},{{$equipoHistorial->id}})"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(1,{{ $equipoHistorial->id}},'',{{$equipoHistorial->historial_tipo}},{{$equipoHistorial->tipo}})"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>