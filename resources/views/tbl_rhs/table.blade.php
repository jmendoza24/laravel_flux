<table class="table display nowrap table-striped table-bordered zero-configuration" id="plantas-table" style="width: 100%;">
<thead class="bg-success">
    <tr>
        <th>Num Empleado</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Grado Escolaridad</th>
        <th>Edo Civil</th>
        <th>Imss</th>
         <th></th>
    </tr>
</thead> 
<tbody>
        @foreach($tblRhs as $tblRh)
    <tr>
       <td>{!! $tblRh->num_empleado !!}</td>
            <td>{!! $tblRh->nombre !!}</td>
            <td>{!! $tblRh->direccion !!}</td>
            <td><?php
                    switch ($tblRh->grado_escolaridad) {
                      case "1":
                        echo "Escuela Técnica";
                        break;
                      case "2":
                        echo "Preparatoria";
                        break;
                      case "3":
                        echo "Universidad";
                        break;
                      case "4":
                        echo "Posgrado";
                        break;
                      case "5":
                        echo "Nada";
                        break;
                      default:
                        echo "";
                    }
                ?>
                </td>
                <td><?php
                    switch ($tblRh->edo_civil) {
                      case "1":
                        echo "Soltero";
                        break;
                      case "2":
                        echo "Casado";
                        break;
                      case "3":
                        echo "Divorciado";
                        break;
                      case "4":
                        echo "Viudo";
                        break;
                      case "5":
                        echo "Concubinato";
                        break;
                      case "6":
                        echo "Separado";
                        break;
                      default:
                        echo "";
                    }
                ?>
                </td>
                <td>{!! $tblRh->imss !!}</td>
                <td>
                    {!! Form::open(['route' => ['tblRhs.destroy', $tblRh->id], 'method' => 'delete']) !!}

                    <div class='btn-group'>

                        <a href="{!! route('tblRhs.edit', [$tblRh->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas borrar este registro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
        
    </tr>
@endforeach
</tbody>
</table>

