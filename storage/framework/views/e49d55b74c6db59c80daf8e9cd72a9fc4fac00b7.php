<div class="row">
  <div class="col-md-8">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Familia</label>
      <div class="col-md-9">
        <select class="form-control" name="id_familia" required="">
        	<option value="">Seleccione una opción</option>
        	<?php $__currentLoopData = $familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($fam->id); ?>" <?php echo e($fam->id == $departamentos->id_familia ? 'selected' : ''); ?>><?php echo e($fam->familia); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
  </div>
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
<div class="row">
  <div class="col-md-8">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Descripción</label>
      <div class="col-md-9">
        <?php echo Form::textarea('descripcion', null, ['class' => 'form-control','required']); ?>

        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div> 
</div>
<hr/>
<div class="form-group col-sm-8" style="text-align: right;">
    <a href="<?php echo route('departamentos.index'); ?>" class="btn btn-warning mr-1">Cancelar</a>
    <?php echo Form::submit('Guardar', ['class' => 'btn btn-primary']); ?>

</div>
<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/departamentos/fields.blade.php ENDPATH**/ ?>