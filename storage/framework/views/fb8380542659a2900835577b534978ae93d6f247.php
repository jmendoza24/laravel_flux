  <table class="table table-striped table-bordered" style="" id="salarios-table">
    <thead class="bg-success">
        <tr>
            <th>Fecha</th>
            <th>Mensual</th>
            <th>Diario</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
          <?php $__currentLoopData = $mes_salarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes_salarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><p><?php echo $mes_salarios->fecha; ?><P></td>
                <td style="text-align: right;"><p>$ <?php echo number_format($mes_salarios->salario,2); ?><p></td>
                <td style="text-align: right;"><p>$ <?php echo number_format($mes_salarios->salario_diario,2); ?><p></td>
                <td>
                    <div class='btn-group'>
                        <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(2,<?php echo e($mes_salarios->id); ?>,2,'',<?php echo e($mes_salarios->id_empleado); ?>)"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></span>
                        <span onclick="elimina_catalogo(2,<?php echo e($mes_salarios->id); ?>,'',<?php echo e($mes_salarios->id_empleado); ?>)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/tbl_rhs/salarios.blade.php ENDPATH**/ ?>