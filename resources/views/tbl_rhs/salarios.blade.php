  <table class="table table-striped table-bordered" style="" id="salarios-table">
    <thead class="bg-success">
        <tr>
            <th>Fecha</th>
            <th>Mensual</th>
            <th>Diario</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
          @foreach($mes_salarios as $mes_salarios)
            <tr>
                <td><p>{!! $mes_salarios->fecha !!}<P></td>
                <td style="text-align: right;"><p>$ {!! number_format($mes_salarios->salario,2) !!}<p></td>
                <td style="text-align: right;"><p>$ {!! number_format($mes_salarios->salario_diario,2) !!}<p></td>
                <td>
                    <div class='btn-group'>
                        <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(2,{{$mes_salarios->id}},2,'',{{$mes_salarios->id_empleado}})"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></span>
                        <span onclick="elimina_catalogo(2,{{ $mes_salarios->id}},'',{{$mes_salarios->id_empleado}})"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>