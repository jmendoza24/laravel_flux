          <table class="table display  table-striped table-bordered" style="" id="salarios-table" style="width: 100%">
            <thead class="bg-success" style="width: 100%">
                <tr style="width: 100%">
                    <th style="width: 100%">Salario</th>
                    <th style="width: 100%">Fecha Registro</th>
                    <th colspan="" style="width: 100%"></th>
                </tr>
            </thead>
            <tbody>
                  <?php $__currentLoopData = $mes_salarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes_salarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <tr>
                    <td><p>$ <?php echo number_format($mes_salarios->salario,2); ?><p></td>
                    <td><p  style="width: 600px"><?php echo $mes_salarios->fecha; ?><P></td>
                    <td>
                    <div class='btn-group'>
                        <a href="#" onclick="borra_sal(<?php echo e($mes_salarios->id); ?>,<?php echo e($mes_salarios->id_empleado); ?>)" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-trash"></i></a>
                    </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table><?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/tbl_rhs/salarios.blade.php ENDPATH**/ ?>