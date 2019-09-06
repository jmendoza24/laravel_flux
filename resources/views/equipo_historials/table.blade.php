<table class="table table-striped table-bordered datacol-basic-initialisation" id="equipoHistorials-table">
    <thead>
        <tr>
            <th>Responsable</th>
            <th>Descripción</th>
            <th>Vencimiento</th>
            <th>Activo</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($equipoHistorials as $equipoHistorial)
        <tr>
            <td>{!! $equipoHistorial->responsable !!}</td>
            <td>{!! $equipoHistorial->descripcion !!}</td>
            <td>{!! $equipoHistorial->vencimiento !!}</td>
            <td>{!! $equipoHistorial->activo !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="" data-toggle="modal" data-target="#large" onclick="show_logistica(1)"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <a onclick="delete_logistica(1)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>