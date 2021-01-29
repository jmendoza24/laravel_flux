          <table class="table display  table-striped table-bordered" style="" id="salarios-table" style="width: 100%">
            <thead class="bg-success" style="width: 100%">
                <tr style="width: 100%">
                    <th style="width: 100%">Salario</th>
                    <th style="width: 100%">Fecha Registro</th>
                    <th colspan="" style="width: 100%"></th>
                </tr>
            </thead>
            <tbody>
                  @foreach($mes_salarios as $mes_salarios)
                
                <tr>
                    <td><p>$ {!! number_format($mes_salarios->salario,2) !!}<p></td>
                    <td><p  style="width: 600px">{!! $mes_salarios->fecha !!}<P></td>
                    <td>
                    <div class='btn-group'>
                        <a href="#" onclick="borra_sal({{ $mes_salarios->id }},{{ $mes_salarios->id_empleado }})" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-trash"></i></a>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>