<table class="table display nowrap table-striped table-bordered zero-configuration" id="plantas-table" style="width: 100%;">
<thead class="bg-success">
    <tr>
        <th>Num Empleado</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Grado Escolaridad</th>
        <th>Edo Civil</th>
        <th>Imss</th>
         <th></th>
    </tr>
</thead> 
<tbody>
        <?php $__currentLoopData = $tblRhs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tblRh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
       <td><?php echo $tblRh->num_empleado; ?></td>
            <td><?php echo $tblRh->nombre; ?></td>
            <td><?php echo $tblRh->direccion; ?></td>
            <td><?php echo $tblRh->grado_escolaridad; ?></td>
            <td><?php echo $tblRh->edo_civil; ?></td>
            <td><?php echo $tblRh->imss; ?></td>
                <td>
                    <?php echo Form::open(['route' => ['tblRhs.destroy', $tblRh->id], 'method' => 'delete']); ?>


                    <div class='btn-group'>

                        <a href="<?php echo route('tblRhs.edit', [$tblRh->id]); ?>" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
        
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>

<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/tbl_rhs/table.blade.php ENDPATH**/ ?>