<!-- Income Field -->
<div class="form-group col-sm-6">
    {!! Form::label('income', 'Income:') !!}
    {!! Form::text('income', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('incomeTerms.index') !!}" class="btn btn-default">Cancel</a>
</div>
