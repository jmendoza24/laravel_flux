 
 <div class="row">
    <div class="col-md-12">
      <h5>Datos del cliente</h5>
      <h5><?php echo e($estatus); ?></h5>
      <hr>
    </div>
    <table style="width: 100%;" border="0">
      <tr>
        <td style="width: 20%;"><label class="label-control" for="descripcion"><b style="color: red;">*</b> Ciente:</label></td>
        <td  style="width: 30%;">
              <?php if($nuevo ==0): ?>
              <label id="numproveedor"><?php echo e($ordenesCompra->nombre_corto); ?></label>
               <?php else: ?>
               <select class="form-control requerido" style="width: 100%;" name="cliente"  id="cliente" onchange="obtiene_producto_ot(<?php echo e($ordenesCompra->id); ?>)">
                      <option value="">Seleccione una opcion</option>
                      <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cliente->id); ?>" 
                        <?php if(!empty($ordenesCompra->cliente)): ?>
                          <?php echo e(($ordenesCompra->cliente == $cliente->id) ? 'selected' : ''); ?>

                        <?php endif; ?> >
                        <?php echo e($cliente->nombre_corto); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            <?php endif; ?>
        </td>
        <td  style="width: 25%;"><label class="label-control" for="descripcion">Contacto compra:</label></td>
        <td  style="width: 25%;"><label id="clientenombre"><?php echo e($ordenesCompra->nombre_corto); ?></label></td>
      </tr>
      <tr>
        <td><label class="label-control" for="descripcion"><b style="color: red;">*</b> OCC:</label></td>
        <td>
              <input type="text" id="orden_compra" <?php echo e($ordenesCompra->tipo==3?'disabled':''); ?> onchange="actualiza_info_occ(<?php echo e($ordenesCompra->id); ?>)" value="<?php echo e($ordenesCompra->orden_compra); ?>" class="form-control requerido" <?php echo e(($editar ==1)?'disabled':''); ?> />
        </td>
        <td><label class="label-control" for="descripcion">Email  compra:</label></td>
        <td>
              <label id="email"><?php echo e($ordenesCompra->correo_compra); ?></label> 
        </td>
      </tr>
      <tr>
        <td><label class="label-control" for="descripcion" ><b style="color: red;">*</b> Shipping to:</label></td>
        <td colspan="3">
              <select class="form-control requerido" id="shipping_id" <?php echo e(($editar ==1)?'disabled':''); ?> <?php echo e($ordenesCompra->tipo==3?'disabled':''); ?> onchange="actualiza_info_occ(<?php echo e($ordenesCompra->id); ?>)">
                <option value="">Seleccione...</option>
                <?php $__currentLoopData = $logisticas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logistica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($logistica->id); ?>" <?php echo e(($ordenesCompra->shipping==$logistica->id)?'selected':''); ?>>
                  <?php echo e($logistica->calle . ', ' .$logistica->municipio .', '. $logistica->nestado .', '. $logistica->npais); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
        </td>
      </tr>
    </table>
  </div>
  
  <hr/>
<?php if($nuevo==1): ?>
<div class="row" style="<?php echo e($ordenesCompra->tipo==3?'display:none':''); ?>">
  <div class="form-group form-inline">
    <label class="mr-1">Pieza:</label>
        <select class="form-control" name="producto" id="producto">
          <option value="">Seleccione una opcion</option>
          <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($prod->id); ?>" 
            <?php if(!empty($ordenesCompra->producto)): ?>
              <?php echo e(($cotizacion->producto == $prod->id) ? 'selected' : ''); ?>

            <?php endif; ?> >
            <?php echo e($prod->numero_parte); ?>

          </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>&nbsp;
        <input type="number" name="cantidad_p" id="cantidad_p" class="form-control" value="1">&nbsp;
    <button class="btn btn-primary" onclick="agrega_producto_ot(<?php echo e($ordenesCompra->id); ?>)">Agregar</button>
  </div>
</div>
<?php endif; ?>
<div class="row" style="margin-top: 5px; overflow: scroll;" id="">
<table class="table table-bordered">
    <thead class="" style="background: #518a87; border: 1px solid #518a87; color: white;">
      <tr>
        <?php if($editar==0 || $nuevo == 1): ?>
          <td>Item</td> 
          <th>Número pieza</th>
          <th>Descripción</th>
          <th>Familia</th>
          <th>Id Dibujo</th>
          <th>Tiempo entrega (días)</th>
          <th>Costo unitario</th>
          <th>Precio unitario</th>
          <th>Fecha entrega</th>
          <th>Notas</th>
          <th></th>
        <?php endif; ?>
        <?php if($editar==1): ?>
          <td>Item</td> 
          <th>Número pieza</th>
          <th>Descripción</th>
          <th>Familia</th>
          <th>Fecha entrega</th>
          <th>Tiempo entrega (días)</th>
          <th>Planta</th>
         <?php endif; ?>
        
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($editar==0 || $nuevo == 1): ?>
        <tr>
            <td>
              <input type="text" style="width: 60px;" <?php echo e($ordenesCompra->tipo==3?'disabled':''); ?> name="incremento" id="incremento<?php echo e($det->id); ?>" value="<?php echo e($det->incremento); ?>" class="form-control requerido" onchange="actualiza_producto_occ2(<?php echo e($det->id); ?>,<?php echo e($ordenesCompra->id); ?>)">
          </td>
          <td><?php echo e($det->numero_parte); ?></td>
          <td><?php echo e($det->descripcion); ?></td>
          <td><?php echo e($det->nfamilia); ?></td>
          <td><?php echo e($det->dibujo_nombre); ?></td>
          <td style="text-align: center;"><?php echo e($det->tiempo_entrega); ?></td>
          
          <td style="text-align: right;">$<?php echo e(number_format($det->costo_material,2)); ?></td>
          <td style="text-align: right;">$<?php echo e(number_format($det->costo_produccion,2)); ?></td>
          <td>            
              <input type="date" id="fecha_entrega<?php echo e($det->id); ?>" <?php echo e($ordenesCompra->tipo==3?'disabled':''); ?>   class=".datepicker form-control" value="<?php echo e($det->fecha_entrega); ?>" onblur="actualiza_producto_occ2(<?php echo e($det->id); ?>,<?php echo e($ordenesCompra->id); ?>)">
          </td>




          <td>
            <textarea class="form-control" style="width: 200px;" <?php echo e($ordenesCompra->tipo==3?'disabled':''); ?>  id="notas_det" onchange="actualiza_producto_occ2(<?php echo e($det->id); ?>,<?php echo e($ordenesCompra->id); ?>)"><?php echo e($det->nota_det); ?></textarea>
          </td>
          <td>
            <?php if($ordenesCompra->tipo !=3): ?>
            <a class='btn btn-float btn-outline-danger btn-round' onclick="borra_producto_occ(<?php echo e($det->id); ?>,<?php echo e($ordenesCompra->id); ?>)"><i class="fa fa-trash"></i></a>
            <?php endif; ?>
          </td>
        </tr>
        <?php endif; ?>
        <?php if($editar==1): ?>
          <tr>
            <td><?php echo e($det->incremento); ?>

              <input type="hidden" id="incremento<?php echo e($det->id); ?>" value="<?php echo e($det->incremento); ?>">
            </td>
            <td><?php echo e($det->numero_parte); ?></td>
            <td><?php echo e($det->descripcion); ?></td>
            <td><?php echo e($det->nfamilia); ?></td>
            <td><?php echo e(date('m/d/Y', strtotime($det->fecha_entrega))); ?>

                <input type="hidden" id="fecha_entrega<?php echo e($det->id); ?>" value="<?php echo e($det->fecha_entrega); ?>">
              </td>

            <td><?php echo e($det->tiempo_entrega); ?></td>
            <td>
              <select class="form-control select2" id="planta<?php echo e($det->id); ?>" style="width: 150px;" onchange="actualiza_producto_occ2(<?php echo e($det->id); ?>,<?php echo e($ordenesCompra->id); ?>)">
                <option value="0">Seleccione...</option>
                <?php $__currentLoopData = $plantas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($planta->id); ?>" <?php echo e(($planta->id==$det->planta) ? 'selected':''); ?>><?php echo e($planta->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </td>
          </tr>
        <?php endif; ?>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
 <div class="row ">
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4"><b style="color: red;">*</b> Incoterms : </label>
        <select class="form-control custom-select requerido" <?php echo e($ordenesCompra->tipo==3?'disabled':''); ?> <?php echo e(($editar ==1)?'disabled':''); ?> style="width: 100%;"name="income" id="income" onchange="actualiza_info_occ(<?php echo e($ordenesCompra->id); ?>)">
            <option value="">Seleccione una opcion</option>
            <?php $__currentLoopData = $income; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inco): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($inco->id); ?>" 
              <?php if(!empty($ordenesCompra->income)): ?>
                <?php echo e(($ordenesCompra->income == $inco->id) ? 'selected' : ''); ?>

              <?php endif; ?> >
              <?php echo e($inco->income); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
      </div>
    </div> 
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4"><b style="color: red;">*</b> Lugar : </label>
        <input type="text" <?php echo e(($editar ==1)?'disabled':''); ?> <?php echo e($ordenesCompra->tipo==3?'disabled':''); ?> class="form-control requerido" id="lugar" name="lugar" onchange="actualiza_info_occ(<?php echo e($ordenesCompra->id); ?>)" value="<?php echo ($ordenesCompra->lugar);?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Términos : </label>
        <textarea class="form-control" <?php echo e(($editar ==1)?'disabled':''); ?> <?php echo e($ordenesCompra->tipo==3?'disabled':''); ?> <?php echo e(($nuevo ==1)?'disabled':''); ?> style="height: 200px;"  onchange="actualiza_info_occ(<?php echo e($ordenesCompra->id); ?>)" ><?php echo nl2br($ordenesCompra->desc_inco)?></textarea>
      </div>
    </div> 
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Notas : </label>
        <textarea class="form-control" id="notas" <?php echo e(($editar ==1)?'disabled':''); ?> <?php echo e($ordenesCompra->tipo==3?'disabled':''); ?> style="height: 200px;" name="notas" onchange="actualiza_info_occ(<?php echo e($ordenesCompra->id); ?>)" ><?php echo ($ordenesCompra->notas);?></textarea>
      </div>
    </div> 
    <br>
    
  </div><?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/detalle.blade.php ENDPATH**/ ?>