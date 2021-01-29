
<?php $__env->startSection('titulo'); ?>
Seguimiento ordenes de trabajo
<?php $__env->stopSection(); ?>
<?php ($id_detalle = ''); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
      <label class="col-md-9"></label>
        <select class="form-control col-md-3" id="bloque_muesta" onchange="muestra_bloque()">
            <option>Seleccione...</option>
            <option value="show_estatus"  class="mostr-estatus">Estatus</option>
            <!--<option value="all">Ocultar todos</option>
            <option value="hide_estatus" class="oct-estatus">Ocultar estatus</option>
            <option value="shohwall">Mostrar todos</option>--->
            <option value="planeacion">Planeación</option>
            <option value="produccion">Producción</option>
            <option value="trafico">Tráfico</option>
            <option value="factura">Facturación</option>
        </select>
    </div>
    <div class="row" style="">              
      <table class="table  table-bordered order-column" id="seguimiento_subproceso">
        <thead>
          <tr>
            <th colspan="6">Información general</th>
            <th colspan="5">Estatus</th>
            <th colspan="7" class="planeacion">Planeación</th>
            <th colspan="8" class="produccion">Producción</th>
            <th colspan="7" class="calidad">Calidad</th>
            <th class="trafico">Tráfico</th>
            <th class="factura">Facturación</th>
          </tr>
          <tr class="bg-success">
            <th>IDN</th>
            <th>#Pieza</th>
            <th>Fecha entrega</th>
            <th>Nombre corto</th>
            <th>OT</th>
            <th>Planta</th>
             
            <th>Planeación</th>
            <th>Producción</th>
            <th>Calidad</th>
            <th>Tráfico</th>
            <th>Facturación</th>
            
            <th class="planeacion">Lanzamiento</th>
            <th class="planeacion">Info</th>
            <th class="planeacion">Preguntas</th>
            <th class="planeacion">Asig. Mat</th>
            <th class="planeacion">Pintura</th>
            <th class="planeacion">Prog. Corte</th>
            <th class="planeacion">TACM</th>
            
            <th>Fecha producción</th> 
            <th class="produccion">Corte</th>
            <th class="produccion">Forma</th>
            <th class="produccion">Soldado</th>
            <th class="produccion">TT</th> 
            <th class="produccion">Pruebas NDE</th>
            <th class="produccion">Pintado</th>
            <th class="produccion">Empaque</th>
            
            <th class="calidad">Corte</th>
            <th class="calidad">Forma</th>
            <th class="calidad">Soldado</th>
            <th class="calidad">TT</th>
            <th class="calidad">Pruebas NDE</th>
            <th class="calidad">Pintado</th>
            <th class="calidad">Empaque</th>
            
            <th class="trafico">Trafico</th>
            <th class="factura">Facturacion</th>
          </tr>
        </thead>
        <tbody>
            
        
          <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td style="z-index: 1000;">
             <label  style="width: 90px;">FM<?php echo e(str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT)); ?></label>
            </td>
            <td style="z-index: 1000;"> <label style="width: 120px;"><?php echo e($producto->numero_parte); ?> <span class="btn btn-icon btn-info btn-sm" style="background-color: #518a87 !important" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="informacion_producto(<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>)" ><i class="fa fa-info"></i></span></label></td>
            <td style="z-index: 1000;"> <?php echo e(date("m-d-Y", strtotime($producto->fecha_entrega))); ?></td>
            <td><?php echo e($producto->nombre_corto); ?></td>
            <td><?php echo e($producto->orden_compra); ?></td>
            <td>
              <select class="form-control" style="width: 150px;" id="id_planta<?php echo e($producto->id_detalle); ?>" disabled="">
                <option value="">Seleccione</option>
                <?php $__currentLoopData = $plantas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($planta->id); ?>" <?php echo e(($producto->idplanta==$planta->id)?'selected':''); ?>><?php echo e($planta->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </td>
            <td><span class="badge badge-primary badge-outlined">Estatus...</span></td>
            <td><span class="badge badge-primary badge-outlined">Estatus...</span></td>
            <td><span class="badge badge-primary badge-outlined">Estatus...</span></td>
            <td><span class="badge badge-primary badge-outlined">Estatus...</span></td>
            <td><span class="badge badge-primary badge-outlined">Estatus...</span></td>
            
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group" style="">
                <!--<span class="badge badge-<?php echo e(($producto->lanzamiento != '')?'success':'warning'); ?> badge-outlined"><?php echo e(($producto->st_lanzamiento==1)?'SI':'NO'); ?></span>--->
                <input type="checkbox" class="switch" <?php echo e(($producto->st_lanzamiento==1)?'checked':''); ?> data-on-label="&nbsp;Si&nbsp;" id="st_lanzamiento<?php echo e($producto->id_detalle); ?>" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(2,<?php echo e($producto->id_detalle); ?>,'st_lanzamiento',<?php echo e($producto->id_orden); ?>)" >
                &nbsp;<span id="span<?php echo e($producto->id_detalle); ?>_2" class=""   onclick="agrega_comentarios(2,<?php echo e($producto->id_detalle); ?>,<?php echo e($producto->id_orden); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <!--<span class="badge badge-<?php echo e(($producto->informacion != '')?'success':'warning'); ?> badge-outlined"><?php echo e(($producto->st_informacion==1)?'SI':'NO'); ?></span>--->
                <input type="checkbox" class="switch" <?php echo e(($producto->st_informacion==1)?'checked':''); ?> data-on-label="&nbsp;Si&nbsp;" id="st_informacion<?php echo e($producto->id_detalle); ?>" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(3,<?php echo e($producto->id_detalle); ?>,'st_informacion',<?php echo e($producto->id_orden); ?>)" >
                &nbsp;<span id="span<?php echo e($producto->id_detalle); ?>_3" class=""  onclick="agrega_comentarios(3,<?php echo e($producto->id_detalle); ?>,<?php echo e($producto->id_orden); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <!--<span class="badge badge-<?php echo e(($producto->pregunta !='')?'success':'warning'); ?> badge-outlined"><?php echo e(($producto->st_pregunta==1)?'SI':'NO'); ?></span>--->
                <input type="checkbox" class="switch" <?php echo e(($producto->st_pregunta==1)?'checked':''); ?> data-on-label="&nbsp;Si&nbsp;" id="st_pregunta<?php echo e($producto->id_detalle); ?>" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(4,<?php echo e($producto->id_detalle); ?>,'st_pregunta',<?php echo e($producto->id_orden); ?>)" >
                &nbsp;<span id="span<?php echo e($producto->id_detalle); ?>_4" class="" onclick="agrega_comentarios(4,<?php echo e($producto->id_detalle); ?>,<?php echo e($producto->id_orden); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="configura_metariales(<?php echo e($producto->id_detalle); ?>,<?php echo e($producto->id_orden); ?>)"><i class="fa fa-cubes" aria-hidden="true"></i></button>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <!--<span class="badge badge-<?php echo e(($producto->pintura != '')?'success':'warning'); ?> badge-outlined"><?php echo e(($producto->st_pintura==1)?'SI':'NO'); ?></span>-->
                <input type="checkbox" class="switch" <?php echo e(($producto->st_pintura==1)?'checked':''); ?> data-on-label="&nbsp;Si&nbsp;" id="st_pintura<?php echo e($producto->id_detalle); ?>" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(5,<?php echo e($producto->id_detalle); ?>,'st_pintura',<?php echo e($producto->id_orden); ?>)" >
                &nbsp;<span id="span<?php echo e($producto->id_detalle); ?>_5" class=""  onclick="agrega_comentarios(5,<?php echo e($producto->id_detalle); ?>,<?php echo e($producto->id_orden); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <!--<span class="badge badge-<?php echo e(($producto->prog_corte != '')?'success':'warning'); ?> badge-outlined"><?php echo e(($producto->st_prog_corte==1)?'SI':'NO'); ?></span>--->
                <input type="checkbox" class="switch" <?php echo e(($producto->st_prog_corte==1)?'checked':''); ?> data-on-label="&nbsp;Si&nbsp;" id="st_prog_corte<?php echo e($producto->id_detalle); ?>" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(6,<?php echo e($producto->id_detalle); ?>,'st_prog_corte',<?php echo e($producto->id_orden); ?>)" >
                &nbsp;<span id="span<?php echo e($producto->id_detalle); ?>_6" class=""   onclick="agrega_comentarios(6,<?php echo e($producto->id_detalle); ?>,<?php echo e($producto->id_orden); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>

            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <!--<span class="badge badge-<?php echo e(($producto->tacm != '')?'success':'warning'); ?> badge-outlined"><?php echo e(($producto->st_tacm==1)?'SI':'NO'); ?></span>--->
                <input type="checkbox" class="switch" <?php echo e(($producto->st_tacm==1)?'checked':''); ?> data-on-label="&nbsp;Si&nbsp;" id="st_tacm<?php echo e($producto->id_detalle); ?>" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(7,<?php echo e($producto->id_detalle); ?>,'st_tacm',<?php echo e($producto->id_orden); ?>)" >
                &nbsp;<span id="span<?php echo e($producto->id_detalle); ?>_7" class=""  onclick="agrega_comentarios(7,<?php echo e($producto->id_detalle); ?>,<?php echo e($producto->id_orden); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            </td>
            <td class="produccion">
              <input type="date" id="fecha_termino_seg" value="<?php echo e($producto->fecha_estimado_termino); ?>" class="form-control" onchange="guarda_planeacion(8,<?php echo e($producto->id_detalle); ?>,<?php echo e($producto->id_orden); ?>);"> 
            </td>
            <td class="produccion">
              <div class="btn-group mx-2" role="group">
                <?php ($color_p = 'secondary'); ?>
                <?php $__currentLoopData = $seg_produccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 1 && $s_prod->conteo==0): ?>
                  <?php ($color_p = 'primary'); ?>
                <?php elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 1 && $s_prod->conteo > 0): ?>
                <?php ($color_p = 'secondary'); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <span class="badge badge-<?php echo e($color_p); ?> badge-outlined">P</span>&nbsp;
                <?php ($color = 'secondary'); ?>
                <?php $__currentLoopData = $calida_seg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==1 && $calidad->estatus==0): ?>
                  <?php ($color = 'secondary'); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==1 && $calidad->estatus==1): ?>
                    <?php ($color = 'danger'); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==1 && $calidad->estatus==2): ?>
                  <?php ($color = 'primary'); ?>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <span class="badge badge-<?php echo e($color); ?> badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(1,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>,'<?php echo e(str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT)); ?>')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="produccion">
              <?php ($color2 = 'secondary'); ?>
              <?php $__currentLoopData = $calida_seg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==2 && $calidad->estatus==0): ?>
                  <?php ($color2 = 'secondary'); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==2 && $calidad->estatus==1): ?>
                    <?php ($color2 = 'danger' ); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==2 && $calidad->estatus==2): ?>
                  <?php ($color2 = 'primary'); ?>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <div class="btn-group mx-2" role="group">
                <?php ($color_p = 'secondary'); ?>
                <?php $__currentLoopData = $seg_produccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 2 && $s_prod->conteo==0): ?>
                  <?php ($color_p = 'primary'); ?>
                <?php elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 2 && $s_prod->conteo > 0): ?>
                <?php ($color_p = 'secondary'); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <span class="badge badge-<?php echo e($color_p); ?> badge-outlined">P</span>&nbsp;
                <span class="badge badge-<?php echo e($color2); ?> badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(2,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>,'<?php echo e(str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT)); ?>')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="produccion">
              <?php ($color3 = 'secondary'); ?>
              <?php $__currentLoopData = $calida_seg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==3 && $calidad->estatus==0): ?>
                    <?php ($color3 = 'secondary'); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==3 && $calidad->estatus==1): ?>
                    <?php ($color3 = 'danger' ); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==3 && $calidad->estatus==2): ?>
                    <?php ($color3 = 'primary'); ?>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="btn-group mx-2" role="group">
                <?php ($color_p = 'secondary'); ?>
                <?php $__currentLoopData = $seg_produccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 3 && $s_prod->conteo==0): ?>
                  <?php ($color_p = 'primary'); ?>
                <?php elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 3 && $s_prod->conteo > 0): ?>
                <?php ($color_p = 'secondary'); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <span class="badge badge-<?php echo e($color_p); ?> badge-outlined">P</span>&nbsp;
                <span class="badge badge-<?php echo e($color3); ?> badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(3,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>,'<?php echo e(str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT)); ?>')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="produccion">
              <?php ($color4 = 'secondary'); ?>
              <?php $__currentLoopData = $calida_seg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==4 && $calidad->estatus==0): ?>
                    <?php ($color4 = 'secondary'); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==4 && $calidad->estatus==1): ?>
                    <?php ($color4 = 'danger' ); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==4 && $calidad->estatus==2): ?>
                    <?php ($color4 = 'primary'); ?>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="btn-group mx-2" role="group">
                <?php ($color_p = 'secondary'); ?>
                <?php $__currentLoopData = $seg_produccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 4 && $s_prod->conteo==0): ?>
                  <?php ($color_p = 'primary'); ?>
                <?php elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 4 && $s_prod->conteo > 0): ?>
                <?php ($color_p = 'secondary'); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <span class="badge badge-<?php echo e($color_p); ?> badge-outlined">P</span>&nbsp;
                <span class="badge badge-<?php echo e($color4); ?> badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(4,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>,'<?php echo e(str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT)); ?>')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="produccion">
              <?php ($color5 = 'secondary'); ?>
              <?php $__currentLoopData = $calida_seg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==5 && $calidad->estatus==0): ?>
                    <?php ($color5 = 'secondary'); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==5 && $calidad->estatus==1): ?>
                    <?php ($color5 = 'danger' ); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==5 && $calidad->estatus==2): ?>
                    <?php ($color5 = 'primary'); ?>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="btn-group mx-2" role="group">
                <?php ($color_p = 'secondary'); ?>
                <?php $__currentLoopData = $seg_produccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 5 && $s_prod->conteo==0): ?>
                  <?php ($color_p = 'primary'); ?>
                <?php elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 5 && $s_prod->conteo > 0): ?>
                <?php ($color_p = 'secondary'); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <span class="badge badge-<?php echo e($color_p); ?> badge-outlined">P</span>&nbsp;
                <span class="badge badge-<?php echo e($color5); ?> badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(5,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>,'<?php echo e(str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT)); ?>')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="produccion">
              <?php ($color6 = 'secondary'); ?>
              <?php $__currentLoopData = $calida_seg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==6 && $calidad->estatus==0): ?>
                  <?php ($color6 = 'secondary'); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==6 && $calidad->estatus==1): ?>
                    <?php ($color6 = 'danger' ); ?>

                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==6 && $calidad->estatus==2): ?>
                  <?php ($color6 = 'primary'); ?>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="btn-group mx-2" role="group">
                <?php ($color_p = 'secondary'); ?>
                <?php $__currentLoopData = $seg_produccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 6 && $s_prod->conteo==0): ?>
                  <?php ($color_p = 'primary'); ?>
                <?php elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 6 && $s_prod->conteo > 0): ?>
                <?php ($color_p = 'secondary'); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <span class="badge badge-<?php echo e($color_p); ?> badge-outlined">P</span>&nbsp;
                <span class="badge badge-<?php echo e($color6); ?> badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(6,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>,'<?php echo e(str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT)); ?>')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>

            <td class="produccion">
              <?php ($color7 = 'secondary'); ?>
              <?php $__currentLoopData = $calida_seg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==7 && $calidad->estatus==0): ?>
                  <?php ($color7 = 'secondary'); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==7 && $calidad->estatus==1): ?>
                    <?php ($color7 = 'danger' ); ?>
                  <?php elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==7 && $calidad->estatus==2): ?>
                  <?php ($color7 = 'primary'); ?>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="btn-group mx-2" role="group">
                <?php ($color_p = 'secondary'); ?>
                <?php $__currentLoopData = $seg_produccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 7 && $s_prod->conteo==0): ?>
                  <?php ($color_p = 'primary'); ?>
                <?php elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 7 && $s_prod->conteo > 0): ?>
                <?php ($color_p = 'secondary'); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <span class="badge badge-<?php echo e($color_p); ?> badge-outlined">P</span>&nbsp;
                <span class="badge badge-<?php echo e($color7); ?> badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(7,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>,'<?php echo e(str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT)); ?>')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(1,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(2,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(3,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(4,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(5,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(6,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(7,<?php echo e($producto->idproducto); ?>,<?php echo e($producto->id_detalle); ?>)" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="trafico">Trafico</td>
            <td class="factura">Facturacion</td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tfoot>
      </table>
      </div>
  
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script type="text/javascript">
    var table = $('#seguimiento_subproceso').DataTable({
      "scrollX": true,
      "fixedColumns":   {
            leftColumns:3
      },
      "paging": false
    });

    table.columns([11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34]).visible(false);
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/seguimiento.blade.php ENDPATH**/ ?>