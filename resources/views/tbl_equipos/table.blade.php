<div class="table-responsive">
    <table class="table" id="tblEquipos-table">
        <thead>
            <tr>
                
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tblEquipos as $tblEquipos)
            <tr>
                
                <td>
                    {!! Form::open(['route' => ['tblEquipos.destroy', $tblEquipos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tblEquipos.show', [$tblEquipos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tblEquipos.edit', [$tblEquipos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
