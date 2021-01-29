<div class="table-responsive">
    <table class="table" id="catReportes-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Documento</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catReportes as $catReportes)
            <tr>
                <td>{!! $catReportes->nombre !!}</td>
            <td>{!! $catReportes->documento !!}</td>
                <td>
                    {!! Form::open(['route' => ['catReportes.destroy', $catReportes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('catReportes.show', [$catReportes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('catReportes.edit', [$catReportes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
