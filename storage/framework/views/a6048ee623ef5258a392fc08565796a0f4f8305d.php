<table class="table table-striped table-bordered " id="ordenesCompras-table">
    <thead class="bg-success">
        <tr>
            <th>OT</th>
            <th>OCC</th>
            <th>Fecha OCC</th>
            <th>Cliente</th>
            <!--<th>Productos</th>-->
            <th>Ctd. Piezas</th>
            <!--<th>Fecha Entrega</th>-->
            <th>Estatus</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
        <?php if(sizeof($ordenesCompras)>0): ?>
    <?php $__currentLoopData = $ordenesCompras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ordenesCompra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
        <?php if(Auth::user()->tipo==0 && $ordenesCompra->tipo ==2): ?>
            <tr>
                <td><?php echo e($ordenesCompra->id); ?></td>
                <td>
                    <span class=""><i class="fa fa-info" aria-hidden="true"></i></span>
                    <?php echo e($ordenesCompra->orden_compra); ?>

                </td>
                <td><?php echo e(date("m-d-Y", strtotime($ordenesCompra->fecha))); ?></td>
                <td style="text-align: center;"><?php echo e($ordenesCompra->nombre_corto); ?></td>
                <td style="text-align: center;"><?php echo e($ordenesCompra->cantidad); ?></td>

                <td>
                    <?php if($ordenesCompra->tipo ==1): ?>
                     Por validar
                    <?php elseif($ordenesCompra->tipo==2): ?>
                    Por asignar
                    <?php elseif($ordenesCompra->tipo==3): ?>
                    En enviar
                    <?php elseif($ordenesCompra->tipo==4): ?>
                      En seguimiento

                    <?php endif; ?>
                </td>
                <td>
                    <div class='btn-group'>
                        <a href="<?php echo route('ordenesCompras.edit', [$ordenesCompra->id]); ?>" class='btn  btn-float btn-outline-info btn-round' title="Asignacion" style="<?php echo e(($ordenesCompra->tipo==3)?'background: #518a87; color:white;':''); ?>"><i  class="fa fa-share-alt"></i></a>
                    </div>
                </td>
            </tr>
        
        <?php else: ?>
        <tr>
            <td><?php echo e($ordenesCompra->id); ?></td>
            <th>
                <span class="badge badge-success" style="cursor: pointer;" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="muestra_productos(<?php echo e($ordenesCompra->id); ?>)"><i class="fa fa-info" aria-hidden="true"></i></span>
                <?php echo e($ordenesCompra->orden_compra); ?>

            </th>
            <td><?php echo e(date("m-d-Y", strtotime($ordenesCompra->fecha))); ?></td>
            <td><?php echo $ordenesCompra->nombre_corto; ?></td>
            
            <td style="text-align: center;"><?php echo e($ordenesCompra->cantidad); ?></td>
            <td>
                 <?php if($ordenesCompra->tipo ==1): ?>
                 Por validar
                <?php elseif($ordenesCompra->tipo==2): ?>
                Por asignar
                <?php elseif($ordenesCompra->tipo==3): ?>
                Por enviar
                <?php elseif($ordenesCompra->tipo==4): ?>
                 En seguimiento

                <?php endif; ?>
            </td>
            <td>
                <div class='btn-group'>
                    <a href="<?php echo route('ordenesCompras.edit', [$ordenesCompra->id]); ?>" class='btn  btn-float btn-outline-info btn-round' title="Asignacion" style="<?php echo e(($ordenesCompra->tipo==3)?'background: #518a87; color:white;':''); ?>"><i  class="fa fa-share-alt"></i></a>
                    <a href="<?php echo route('ordenesCompras.show', [$ordenesCompra->id]); ?>" class='btn  btn-float btn-outline-info btn-round' title="Administrador" style="<?php echo e(($ordenesCompra->tipo==3)?'background: #518a87; color:white;':''); ?>" ><i class="fa fa-check"></i></a>
                    <!--<a href="<?php echo route('ordenesCompras.seguimiento', [$ordenesCompra->id]); ?>" class='btn  btn-float btn-outline-info btn-round' title="Seguimiento"><i  class="fa fa-list-ul" aria-hidden="true"></i></a>                    --->
                </div>
            </td>
        </tr>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </tbody>
</table>
<?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/table.blade.php ENDPATH**/ ?>