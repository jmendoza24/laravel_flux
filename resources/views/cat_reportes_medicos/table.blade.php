<div class="table-responsive">
    <table class="table" id="catReportesMedicos-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Documento</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catReportesMedicos as $catReportesMedicos)
            <tr>
                <td>{!! $catReportesMedicos->nombre !!}</td>
            <td>{!! $catReportesMedicos->documento !!}</td>
                <td>
                    {!! Form::open(['route' => ['catReportesMedicos.destroy', $catReportesMedicos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('catReportesMedicos.show', [$catReportesMedicos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('catReportesMedicos.edit', [$catReportesMedicos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
