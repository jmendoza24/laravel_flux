<?php if(!empty($eqHistofields->id)): ?>
<div class="modal-body">
<?php endif; ?>
<input type="text" name="id_tipo" id="id_tipo" value="<?php echo e($eqHistofields->historial_tipo); ?>">

<input type="text" name="id_historia" id="id_historia" value="<?php echo e($eqHistofields->id); ?>">
<input type="text" name="historia_tipo" id="historia_tipo" value="<?php echo e($eqHistofields->historial_tipo); ?>">
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
        <input type="text" name="fecha" id="fecha" class="form-control pickadate-format" value="<?php echo e($eqHistofields->fecha); ?>" >
        </div>
      </div>
  </div>      
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label><?php echo e(utf8_encode("Descripci?:")); ?></label>
            <textarea name="descripcion" id="descripcion" placeholder="<?php echo e(utf8_encode("Descripci?:")); ?>" class="form-control"><?php echo e($eqHistofields->descripcion); ?></textarea>
        </div>
      </div>
  </div>       
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Fecha vencimiento:</label>
        <input type="text" name="vencimiento" id="vencimiento" class="form-control pickadate-format" value="<?php echo e($eqHistofields->vencimiento); ?>">
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
          <label class="col-md-4 label-control" for="userinput2">
            <?php if($eqHistofields->documento1 != ''): ?> <a id="doc1" href="<?php echo e($eqHistofields->documento1); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a><?php endif; ?>
            Documento 1: 
          </label>
          <div class="col-md-12">
                <input id="doc_prev1" name="doc_prev1" type="file" class="form-control" >
          </div>
        </div>   
    </div>
    <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-4 label-control" for="userinput2">
            <?php if($eqHistofields->documento2 != ''): ?> <a id="doc2" href="<?php echo e($eqHistofields->documento2); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a><?php endif; ?>

          Documento 2:</label>
          <div class="col-md-12">
                <input id="doc_prev2" name="doc_prev2" type="file"  class="form-control" >
          </div>
        </div>   
    </div>
</div>


        
<?php if(!empty($eqHistofields->id) && $a=1): ?>


<div class="modal-footer">
  <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Cancelar</button>
  <button type="button" class="btn btn-primary" onclick="actualiza_historia(<?php echo e($eqHistofields->id); ?>,<?php echo e($eqHistofields->historial_tipo); ?>)">Guardar</button>
</div>
<?php else: ?>


          <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
              <button type="button"  class="btn btn-primary" onclick="guarda_historial(<?php echo e($equipos->id); ?>)">Guardar</button>
            </div>

<?php endif; ?>

<?php if($a=0): ?>

          <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
              <button type="button"  class="btn btn-primary" onclick="guarda_historial(<?php echo e($equipos->id); ?>)">Guardar</button>
            </div>
<?php endif; ?>
<?php /**PATH /var/www/html/flux/laravel/resources/views/equipo_historials/fields.blade.php ENDPATH**/ ?>