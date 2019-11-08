<div class="table-responsive">
    <table class="table" id="documentos-table">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($documentos as $documentos)
            <tr>
                <td>{!! $documentos->documento !!}</td>
            <td>{!! $documentos->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['documentos.destroy', $documentos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('documentos.show', [$documentos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('documentos.edit', [$documentos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
