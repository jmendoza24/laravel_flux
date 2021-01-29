<table class="table display nowrap table-striped table-bordered scroll-horizontal" id="plantas-table">
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
            <td>{!! $tblRh->grado_escolaridad !!}</td>
            <td>{!! $tblRh->edo_civil !!}</td>
            <td>{!! $tblRh->imss !!}</td>
                <td>
                    {!! Form::open(['route' => ['tblRhs.destroy', $tblRh->id], 'method' => 'delete']) !!}

                    <div class='btn-group'>

                        <a href="{!! route('tblRhs.edit', [$tblRh->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
        
    </tr>
@endforeach
</tbody>
</table>

