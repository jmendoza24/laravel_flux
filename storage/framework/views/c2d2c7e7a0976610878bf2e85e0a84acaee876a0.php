<form enctype="multipart/form-data" id="catalogos_forma" action="">
  <?php echo csrf_field(); ?>
<input type="hidden" name="tipo" id="id_tipo" value="<?php echo e($eqHistofields->tipo); ?>">
<input type="hidden" name="id" id="id_historia" value="<?php echo e($eqHistofields->id); ?>">
<input type="hidden" name="historial_tipo" id="historia_tipo" value="<?php echo e($eqHistofields->historial_tipo); ?>">
<input type="hidden" name="id_catalogo" value="1" id="id_catalogo">
<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Responsable:</label>
        <input type="text" name="responsable" id="responsable" class="form-control" value="<?php echo e($eqHistofields->responsable); ?>" >
        </div>
      </div>
  </div>
  <div class="col-md-6"> 
      <div class="form-group row">
        <div class="col-md-12">
            <label>Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo e(substr($eqHistofields->fecha,0,10)); ?>">
        </div>
      </div>
  </div>      
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label><?php echo e(utf8_encode("Descripción:")); ?></label>
            <textarea name="descripcion" id="descripcion" placeholder="<?php echo e(utf8_encode("Descripción:")); ?>" class="form-control"><?php echo e($eqHistofields->descripcion); ?></textarea>
        </div>
      </div>
  </div>       
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Fecha vencimiento:</label>
            <input type="date" name="vencimiento" id="vencimiento" class="form-control" value="<?php echo e(substr($eqHistofields->vencimiento,0,10)); ?>">
        </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
         
        </div>
      </div>
  </div>       
</div>
<div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-12 label-control" for="userinput2">
            <?php if($eqHistofields->documento1 != ''): ?> <a id="doc1" href="<?php echo e($eqHistofields->documento1); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a><?php endif; ?>
            Documento 1: 
          </label>
          <div class="col-md-12">
                <input id="doc_prev1" name="documento1" type="file" class="form-control" >
          </div>
        </div>   
    </div>
    <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-12 label-control" for="userinput2">
            <?php if($eqHistofields->documento2 != ''): ?> <a id="doc2" href="<?php echo e($eqHistofields->documento2); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a><?php endif; ?>

          Documento 2:</label>
          <div class="col-md-12">
                <input id="doc_prev2" name="documento2" type="file"  class="form-control" >
          </div>
        </div>   
    </div>
</div>
<div class="row">
  <div class="col-md-12">
    <span class="btn btn-primary pull-right" onclick="guardar_catalogos(1,<?php echo e($eqHistofields->id); ?>,1,'tabla',1)">Guardar</span>
  </div>
</div>
</form><?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/equipo_historials/fields.blade.php ENDPATH**/ ?>