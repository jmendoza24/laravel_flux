<div class="table-responsive">
    <table class="table" id="incomeTerms-table">
        <thead>
            <tr>
                <th>Income</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($incomeTerms as $incomeTerms)
            <tr>
                <td>{!! $incomeTerms->income !!}</td>
            <td>{!! $incomeTerms->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['incomeTerms.destroy', $incomeTerms->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('incomeTerms.show', [$incomeTerms->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('incomeTerms.edit', [$incomeTerms->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
