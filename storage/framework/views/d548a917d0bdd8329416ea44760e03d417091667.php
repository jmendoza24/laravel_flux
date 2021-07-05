  <div class="row">
  <div class="col-md-8">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Departamento</label>
      <div class="col-md-9">
        <?php echo Form::text('departamento', null, ['class' => 'form-control','required']); ?>

        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>  
</div>

<hr/>
<div class="form-group col-sm-8" style="text-align: right;">
    <a href="<?php echo route('departamento.index'); ?>" class="btn btn-warning mr-1">Cancelar</a>
    <?php echo Form::submit('Guardar', ['class' => 'btn btn-primary']); ?>

</div>
<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/departamento/fields.blade.php ENDPATH**/ ?>