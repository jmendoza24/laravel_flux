<table class="table table-striped table-bordered datacol-basic-initialisation" id="productoDibujos-table">
    <thead>
        <tr style="background-color:#427874;color:white">
            <th>Id dibujo</th>
            <th>Fecha de revisión</th>
            <th>Número de revisión</th>
            <!-- <th>Tiempo Entrega</th>-->
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($productoDibujos as $productoDibujo)
        <tr>
            <td>{!! $productoDibujo->dibujo_nombre !!}</td>
            <td>{!! $productoDibujo->fecha !!}</td>
            <td>{!! $productoDibujo->revision !!}</td>
            <!--<td>{!! $productoDibujo->tiempo_entrega !!}</td>-->
            <td>
                <div class='btn-group'>
                    <a class="btn btn-float btn-outline-info btn-round" onclick="show_dibujo('{{ $productoDibujo->dibujo }}')" data-toggle="modal" data-target="#large"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-float btn-outline-success btn-round" data-toggle="modal" onclick="edita_dibujo({{ $productoDibujo->id }}, {{ $productoDibujo->id_producto }})" data-target="#large"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-float btn-outline-danger btn-round"  onclick="elimina_dibujo({{ $productoDibujo->id }}, {{ $productoDibujo->id_producto }})" ><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
