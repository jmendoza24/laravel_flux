<?php if(!empty($logisticas_fields->id)): ?>
<div class="modal-body">
<?php endif; ?>
  
    <input type="hidden" id="id_logistica" value="<?php echo e($logisticas_fields->id); ?>">
    <input type="hidden" id="id_producto" value="<?php echo e($logisticas_fields->id_producto); ?>">
    <input type="hidden" name="nombre_log" id="nombre_log" class="form-control" value="0">
  <!-- <div class="row">
      <div class="col-md-12">
          <div class="form-group row">
            <div class="col-md-12">
            <input type="text" name="nombre_log" id="nombre_log" class="form-control" value="<?php echo e($logisticas_fields->nombre); ?>" placeholder='Nombre'>
            </div>
          </div>
      </div>
        
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">        
            <input type="text" name="telefono_log" id="telefono_log" class="form-control phone-inputmask" value="<?php echo e($logisticas_fields->telefono); ?>" placeholder='Telefono'>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
            <input type="text" name="correo_log" id="correo_log" class="form-control email-inputmask" value="<?php echo e($logisticas_fields->correo); ?>" placeholder='Correo electronico'>
          </div>
        </div>
      </div>
    </div>--->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
              <input type="text" name="calle_log" id="calle_log" class="form-control" value="<?php echo e($logisticas_fields->calle); ?>" placeholder='Calle'>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
            <input type="number" min="0" name="numero_log" id="numero_log" class="form-control" value="<?php echo e($logisticas_fields->numero); ?>" placeholder='Número'>
          </div>
        </div>
      </div>      
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
          <select class="form-control" name="pais_log" style="width: 100%;" id="pais_log" onchange="get_estados('pais_log','estado_log')">
            <option value="">País</option>
            <?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($pais->id); ?>" 
                <?php if(!empty($logisticas_fields->pais)): ?>
                  <?php echo e(($logisticas_fields->pais == $pais->id) ? 'selected' : ''); ?>

                <?php endif; ?> >
                <?php echo e($pais->nombre); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
              <select class="form-control" style="width: 100%;" name="estado_log" id="estado_log" >
                <option value="">Estado</option>
                <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($estado->id); ?>" 
                  <?php if(!empty($logisticas_fields->estado)): ?>
                    <?php echo e(($logisticas_fields->estado == $estado->id) ? 'selected' : ''); ?>

                  <?php endif; ?> >
                  <?php echo e($estado->estado); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
        </div>
      </div> 
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
              <input type="text"  class="form-control" placeholder="Ciudad"  name="municipio_log" id="municipio_log" value="<?php echo e($logisticas_fields->municipio); ?>">
          </div>
        </div>
      </div>           
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
            <input type="text" name="cp_log" id="cp_log" class="form-control" value="<?php echo e($logisticas_fields->cp); ?>" placeholder='Código postal'>
          </div>
        </div>
      </div>            
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">        
            <input type="text" name="telefono_log" id="telefono_log" class="form-control phone-inputmask" value="<?php echo e($logisticas_fields->telefono); ?>" placeholder='Teléfono'>
          </div>
        </div>
      </div>
    </div>
  
<?php if(!empty($logisticas_fields->id)): ?>
</div>

<div class="modal-footer">
  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancelar</button>
  <button type="button" class="btn btn-outline-primary" onclick="actualiza_direccion()">Guardar</button>
</div>
<?php endif; ?>

<?php /**PATH /var/www/html/flux/laravel/resources/views/logisticas/fields.blade.php ENDPATH**/ ?>